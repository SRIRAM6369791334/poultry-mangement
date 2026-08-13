<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\CrudController;
use App\Models\VaccineType;
use Illuminate\Validation\Rule;

class VaccineTypeController extends CrudController
{
    protected string $model = VaccineType::class;

    protected string $viewPrefix = 'master-data.vaccine-types';

    protected string $permissionModule = 'vaccine_type';

    protected array $searchable = ['name'];

    protected function rules($item = null): array
    {
        $unique = Rule::unique('vaccine_types', 'name')->where('organization_id', tenant_id());

        if ($item) {
            $unique->ignore($item->id);
        }

        return [
            'name' => ['required', 'string', 'max:255', $unique],
            'administration_method' => ['nullable', 'string', 'max:30'],
            'schedule_day' => ['nullable', 'integer', 'min:0'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
