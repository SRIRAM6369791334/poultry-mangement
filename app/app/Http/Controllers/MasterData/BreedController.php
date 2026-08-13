<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\CrudController;
use App\Models\Breed;
use App\Models\BreedType;
use Illuminate\Validation\Rule;

class BreedController extends CrudController
{
    protected string $model = Breed::class;

    protected string $viewPrefix = 'master-data.breeds';

    protected string $permissionModule = 'breed';

    protected array $searchable = ['name', 'code'];

    protected function rules($item = null): array
    {
        $unique = Rule::unique('breeds', 'name')->where('organization_id', tenant_id());

        if ($item) {
            $unique->ignore($item->id);
        }

        return [
            'breed_type_id' => ['required', 'exists:breed_types,id'],
            'name' => ['required', 'string', 'max:255', $unique],
            'code' => ['nullable', 'string', 'max:30'],
            'standard_weight_kg' => ['nullable', 'numeric', 'min:0', 'max:20'],
            'standard_fcr' => ['nullable', 'numeric', 'min:0', 'max:10'],
            'target_days' => ['nullable', 'integer', 'min:1'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }

    public function create()
    {
        $this->authorizeModule('create');

        return view('master-data.breeds.form', [
            'item' => null,
            'title' => 'New Breed',
            'backUrl' => route('breeds.index'),
            'formUrl' => route('breeds.store'),
            'method' => 'POST',
            'breedTypes' => BreedType::query()->orderBy('name')->get(),
        ]);
    }

    public function edit($id)
    {
        $this->authorizeModule('update');

        $item = $this->find($id);

        return view('master-data.breeds.form', [
            'item' => $item,
            'title' => 'Edit Breed',
            'backUrl' => route('breeds.index'),
            'formUrl' => route('breeds.update', $item),
            'method' => 'PUT',
            'breedTypes' => BreedType::query()->orderBy('name')->get(),
        ]);
    }
}
