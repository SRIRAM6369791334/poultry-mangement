<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\CrudController;
use App\Models\MedicineType;
use Illuminate\Validation\Rule;

class MedicineTypeController extends CrudController
{
    protected string $model = MedicineType::class;

    protected string $viewPrefix = 'master-data.medicine-types';

    protected string $permissionModule = 'medicine_type';

    protected array $searchable = ['name', 'active_ingredient'];

    protected function rules($item = null): array
    {
        $unique = Rule::unique('medicine_types', 'name')->where('organization_id', tenant_id());

        if ($item) {
            $unique->ignore($item->id);
        }

        return [
            'name' => ['required', 'string', 'max:255', $unique],
            'active_ingredient' => ['nullable', 'string', 'max:255'],
            'withdrawal_period_days' => ['required', 'integer', 'min:0', 'max:365'],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
