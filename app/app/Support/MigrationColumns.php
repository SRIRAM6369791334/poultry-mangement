<?php

namespace App\Support;

use Illuminate\Database\Schema\Blueprint;

trait MigrationColumns
{
    protected function baseColumns(Blueprint $table, bool $withTenant = true): void
    {
        $table->uuid('id')->primary();

        if ($withTenant) {
            $table->foreignUuid('organization_id')->constrained()->cascadeOnDelete();
        }

        $table->uuid('created_by')->nullable();
        $table->uuid('updated_by')->nullable();
        $table->softDeletes();
        $table->timestamps();
    }
}