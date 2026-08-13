<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

abstract class CrudController extends Controller
{
    /** @var class-string<Model> */
    protected string $model;

    protected string $viewPrefix;

    protected string $permissionModule;

    protected array $rules = [];

    protected array $searchable = ['name'];

    public function index(Request $request)
    {
        $this->authorizeModule('view');

        $query = $this->model::query();

        if ($search = $request->string('q')->trim()->toString()) {
            $query->where(function ($q) use ($search) {
                foreach ($this->searchable as $i => $column) {
                    $q->{$i === 0 ? 'where' : 'orWhere'}($column, 'like', "%{$search}%");
                }
            });
        }

        $items = $query->latest()->paginate(20)->withQueryString();

        return view("{$this->viewPrefix}.index", [
            'items' => $items,
            'title' => $this->title(),
            'createUrl' => $this->createUrl(),
        ]);
    }

    public function create()
    {
        $this->authorizeModule('create');

        return view("{$this->viewPrefix}.form", [
            'item' => null,
            'title' => 'New '.$this->title(),
            'backUrl' => $this->indexUrl(),
            'formUrl' => $this->storeUrl(),
            'method' => 'POST',
        ]);
    }

    public function store(Request $request)
    {
        $this->authorizeModule('create');

        $data = $request->validate($this->rules());

        $item = $this->model::create($data);

        return redirect()->route($this->routeName().'.show', $item)
            ->with('success', $this->title().' created successfully.');
    }

    public function show($id)
    {
        $this->authorizeModule('view');

        return redirect()->route($this->routeName().'.edit', $id);
    }

    public function edit($id)
    {
        $this->authorizeModule('update');

        $item = $this->find($id);

        return view("{$this->viewPrefix}.form", [
            'item' => $item,
            'title' => 'Edit '.$this->title(),
            'backUrl' => $this->indexUrl(),
            'formUrl' => route($this->routeName().'.update', $item),
            'method' => 'PUT',
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->authorizeModule('update');

        $item = $this->find($id);
        $item->update($request->validate($this->rules($item)));

        return redirect()->route($this->routeName().'.edit', $item)
            ->with('success', $this->title().' updated successfully.');
    }

    public function destroy($id)
    {
        $this->authorizeModule('delete');

        $item = $this->find($id);
        $item->delete();

        return redirect()->route($this->routeName().'.index')
            ->with('success', $this->title().' deleted.');
    }

    protected function find($id): Model
    {
        return $this->model::whereUuid($id)->firstOrFail();
    }

    protected function rules($item = null): array
    {
        return $this->rules;
    }

    protected function title(): string
    {
        return Str::headline(str_replace('-', ' ', $this->viewPrefix));
    }

    protected function routeName(): string
    {
        return $this->viewPrefix;
    }

    protected function indexUrl(): string
    {
        return route($this->routeName().'.index');
    }

    protected function createUrl(): string
    {
        return route($this->routeName().'.create');
    }

    protected function storeUrl(): string
    {
        return route($this->routeName().'.store');
    }

    protected function authorizeModule(string $action): void
    {
        $user = auth()->user();

        if ($user === null || ($user->isSuperAdmin() || $user->hasPermissionTo("{$this->permissionModule}.{$action}"))) {
            return;
        }

        abort(403, "You do not have permission to perform this action.");
    }
}