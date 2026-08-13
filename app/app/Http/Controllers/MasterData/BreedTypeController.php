<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\CrudController;
use App\Models\BreedType;
use Illuminate\Validation\Rule;

class BreedTypeController extends CrudController
{
    protected string $model = BreedType::class;

    protected string $viewPrefix = 'master-data.breed-types';

    protected string $permissionModule = 'breed_type';

    protected array $searchable = ['name', 'code'];

    protected function rules($item = null): array
    {
        $unique = Rule::unique('breed_types', 'name')->where('organization_id', tenant_id());
        $uniqueCode = Rule::unique('breed_types', 'code')->where('organization_id', tenant_id());

        if ($item) {
            $unique->ignore($item->id);
            $uniqueCode->ignore($item->id);
        }

        return [
            'name' => ['required', 'string', 'max:255', $unique],
            'code' => ['required', 'string', 'max:20', $uniqueCode],
            'description' => ['nullable', 'string', 'max:1000'],
        ];
    }
}
