<?php

namespace App\Http\Controllers;

use App\Enums\HousingType;
use App\Models\Farm;
use App\Models\Shed;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ShedController extends CrudController
{
    protected string $model = Shed::class;

    protected string $viewPrefix = 'sheds';

    protected string $permissionModule = 'shed';

    protected array $searchable = ['name'];

    protected function rules($item = null): array
    {
        $uniqueName = Rule::unique('sheds', 'name')
            ->where('farm_id', request()->input('farm_id', $item?->farm_id))
            ->where('organization_id', tenant_id());

        if ($item) {
            $uniqueName->ignore($item->id);
        }

        return [
            'farm_id' => ['required', 'exists:farms,id'],
            'name' => ['required', 'string', 'max:100', $uniqueName],
            'length_m' => ['nullable', 'numeric', 'min:1', 'max:500'],
            'width_m' => ['nullable', 'numeric', 'min:1', 'max:200'],
            'area_sqm' => ['nullable', 'numeric', 'min:1'],
            'max_capacity' => ['nullable', 'integer', 'min:1'],
            'housing_type' => ['required', Rule::enum(HousingType::class)],
            'status' => ['required', Rule::in([Shed::STATUS_EMPTY, Shed::STATUS_OCCUPIED, Shed::STATUS_MAINTENANCE, 'active', 'inactive'])],
            'fans_count' => ['nullable', 'integer', 'min:0'],
            'feeders_count' => ['nullable', 'integer', 'min:0'],
            'drinkers_count' => ['nullable', 'integer', 'min:0'],
            'heaters_count' => ['nullable', 'integer', 'min:0'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function create()
    {
        $this->authorizeModule('create');

        $farmId = request()->query('farm_id');

        return view('sheds.form', [
            'item' => null,
            'title' => 'New Shed',
            'backUrl' => $this->indexUrl(),
            'formUrl' => $this->storeUrl(),
            'method' => 'POST',
            'farms' => Farm::query()->orderBy('name')->get(),
            'housingTypes' => HousingType::labels(),
            'preselectedFarmId' => $farmId,
        ]);
    }

    public function edit($id)
    {
        $this->authorizeModule('update');

        $item = $this->find($id);

        return view('sheds.form', [
            'item' => $item,
            'title' => 'Edit Shed',
            'backUrl' => $this->indexUrl(),
            'formUrl' => route('sheds.update', $item),
            'method' => 'PUT',
            'farms' => Farm::query()->orderBy('name')->get(),
            'housingTypes' => HousingType::labels(),
            'preselectedFarmId' => null,
        ]);
    }

    public function index(Request $request)
    {
        $this->authorizeModule('view');

        $query = $this->model::query()->with('farm');

        if ($farmId = $request->query('farm_id')) {
            $query->where('farm_id', $farmId);
        }

        $items = $query->latest()->paginate(20)->withQueryString();

        return view('sheds.index', [
            'items' => $items,
            'title' => 'Sheds',
            'createUrl' => $this->createUrl(),
            'farms' => Farm::query()->orderBy('name')->get(),
        ]);
    }
}
