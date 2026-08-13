<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\CrudController;
use App\Models\DiseaseType;
use Illuminate\Validation\Rule;

class DiseaseTypeController extends CrudController
{
    protected string $model = DiseaseType::class;

    protected string $viewPrefix = 'master-data.disease-types';

    protected string $permissionModule = 'disease_type';

    protected array $searchable = ['name', 'code', 'symptoms'];

    protected function rules($item = null): array
    {
        $unique = Rule::unique('disease_types', 'name')->where('organization_id', tenant_id());
        $uniqueCode = Rule::unique('disease_types', 'code')->where('organization_id', tenant_id());

        if ($item) {
            $unique->ignore($item->id);
            $uniqueCode->ignore($item->id);
        }

        return [
            'name' => ['required', 'string', 'max:255', $unique],
            'code' => ['required', 'string', 'max:20', $uniqueCode],
            'symptoms' => ['nullable', 'string', 'max:1000'],
            'severity' => ['required', Rule::in(['low', 'medium', 'high', 'critical'])],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
