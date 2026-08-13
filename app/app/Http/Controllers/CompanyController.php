<?php

namespace App\Http\Controllers;

use App\Enums\CommonStatus;
use App\Models\Company;
use Illuminate\Validation\Rule;

class CompanyController extends CrudController
{
    protected string $model = Company::class;

    protected string $viewPrefix = 'companies';

    protected string $permissionModule = 'company';

    protected array $searchable = ['name', 'code', 'registration_number', 'email'];

    protected function rules($item = null): array
    {
        $uniqueName = Rule::unique('companies', 'name')->where('organization_id', tenant_id());

        if ($item) {
            $uniqueName->ignore($item->id);
        }

        return [
            'name' => ['required', 'string', 'max:255', $uniqueName],
            'code' => ['nullable', 'string', 'max:30'],
            'registration_number' => ['nullable', 'string', 'max:100'],
            'tax_id' => ['nullable', 'string', 'max:100'],
            'address' => ['nullable', 'string', 'max:500'],
            'phone' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email', 'max:255'],
            'fiscal_year_start' => ['nullable', 'string', 'max:5'],
            'base_currency' => ['nullable', 'string', 'max:3'],
            'status' => ['required', Rule::enum(CommonStatus::class)],
        ];
    }
}
