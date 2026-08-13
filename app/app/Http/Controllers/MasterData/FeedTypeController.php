<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\CrudController;
use App\Models\FeedType;
use Illuminate\Validation\Rule;

class FeedTypeController extends CrudController
{
    protected string $model = FeedType::class;

    protected string $viewPrefix = 'master-data.feed-types';

    protected string $permissionModule = 'feed_type';

    protected array $searchable = ['name', 'code'];

    protected function rules($item = null): array
    {
        $unique = Rule::unique('feed_types', 'name')->where('organization_id', tenant_id());

        if ($item) {
            $unique->ignore($item->id);
        }

        return [
            'name' => ['required', 'string', 'max:255', $unique],
            'code' => ['required', 'string', 'max:20'],
            'nutritional_info' => ['nullable', 'string', 'max:1000'],
            'protein_percent' => ['nullable', 'numeric', 'min:0', 'max:100'],
            'energy_kcal' => ['nullable', 'numeric', 'min:0'],
            'recommended_start_day' => ['nullable', 'integer', 'min:0'],
            'recommended_end_day' => ['nullable', 'integer', 'min:0', 'gte:recommended_start_day'],
        ];
    }
}
