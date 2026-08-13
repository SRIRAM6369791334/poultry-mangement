<?php

namespace App\Http\Controllers;

use App\Enums\CommonStatus;
use App\Enums\FarmType;
use App\Enums\OwnershipType;
use App\Models\Company;
use App\Models\Farm;
use Illuminate\Validation\Rule;

class FarmController extends CrudController
{
    protected string $model = Farm::class;

    protected string $viewPrefix = 'farms';

    protected string $permissionModule = 'farm';

    protected array $searchable = ['name', 'code', 'region', 'address'];

    protected function rules($item = null): array
    {
        $uniqueName = Rule::unique('farms', 'name')->where('organization_id', tenant_id());
        $uniqueCode = Rule::unique('farms', 'code')->where('organization_id', tenant_id());

        if ($item) {
            $uniqueName->ignore($item->id);
            $uniqueCode->ignore($item->id);
        }

        return [
            'company_id' => ['nullable', 'exists:companies,id'],
            'name' => ['required', 'string', 'max:255', $uniqueName],
            'code' => ['required', 'string', 'max:30', $uniqueCode],
            'address' => ['nullable', 'string', 'max:500'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            'farm_type' => ['required', Rule::enum(FarmType::class)],
            'total_capacity' => ['nullable', 'integer', 'min:0'],
            'ownership' => ['required', Rule::enum(OwnershipType::class)],
            'region' => ['nullable', 'string', 'max:100'],
            'status' => ['required', Rule::enum(CommonStatus::class)],
        ];
    }

    public function create()
    {
        $this->authorizeModule('create');

        return view('farms.form', [
            'item' => null,
            'title' => 'New Farm',
            'backUrl' => $this->indexUrl(),
            'formUrl' => $this->storeUrl(),
            'method' => 'POST',
            'companies' => Company::query()->orderBy('name')->get(),
            'farmTypes' => FarmType::labels(),
            'ownershipTypes' => OwnershipType::labels(),
        ]);
    }

    public function edit($id)
    {
        $this->authorizeModule('update');

        $item = $this->find($id);

        return view('farms.form', [
            'item' => $item,
            'title' => 'Edit Farm',
            'backUrl' => $this->indexUrl(),
            'formUrl' => route('farms.update', $item),
            'method' => 'PUT',
            'companies' => Company::query()->orderBy('name')->get(),
            'farmTypes' => FarmType::labels(),
            'ownershipTypes' => OwnershipType::labels(),
        ]);
    }
}
