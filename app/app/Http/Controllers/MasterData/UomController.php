<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\CrudController;
use App\Models\Uom;
use Illuminate\Validation\Rule;

class UomController extends CrudController
{
    protected string $model = Uom::class;

    protected string $viewPrefix = 'master-data.uoms';

    protected string $permissionModule = 'uom';

    protected array $searchable = ['code', 'name'];

    protected function rules($item = null): array
    {
        $unique = Rule::unique('uoms', 'code')->where('organization_id', tenant_id());

        if ($item) {
            $unique->ignore($item->id);
        }

        return [
            'code' => ['required', 'string', 'max:10', $unique],
            'name' => ['required', 'string', 'max:100'],
            'category' => ['required', 'string', 'max:30'],
            'conversion_factor' => ['required', 'numeric', 'gt:0'],
        ];
    }
}
