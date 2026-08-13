<?php

use App\Support\MigrationColumns;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    use MigrationColumns;

    public function up(): void
    {
        Schema::create('breed_types', function (Blueprint $table) {
            $this->baseColumns($table);
            $table->string('name');
            $table->string('code', 20);
            $table->text('description')->nullable();
            $table->unique(['organization_id', 'name', 'code']);
        });

        Schema::create('breeds', function (Blueprint $table) {
            $this->baseColumns($table);
            $table->foreignUuid('breed_type_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->string('code', 30)->nullable();
            $table->decimal('standard_weight_kg', 6, 3)->nullable();
            $table->decimal('standard_fcr', 6, 3)->nullable();
            $table->integer('target_days')->nullable();
            $table->text('description')->nullable();
            $table->unique(['organization_id', 'name']);
        });

        Schema::create('feed_types', function (Blueprint $table) {
            $this->baseColumns($table);
            $table->string('name');
            $table->string('code', 20);
            $table->text('nutritional_info')->nullable();
            $table->decimal('protein_percent', 5, 2)->nullable();
            $table->decimal('energy_kcal', 8, 2)->nullable();
            $table->integer('recommended_start_day')->nullable();
            $table->integer('recommended_end_day')->nullable();
            $table->unique(['organization_id', 'name']);
        });

        Schema::create('medicine_types', function (Blueprint $table) {
            $this->baseColumns($table);
            $table->string('name');
            $table->string('active_ingredient')->nullable();
            $table->integer('withdrawal_period_days')->default(0);
            $table->text('description')->nullable();
            $table->unique(['organization_id', 'name']);
        });

        Schema::create('vaccine_types', function (Blueprint $table) {
            $this->baseColumns($table);
            $table->string('name');
            $table->string('administration_method', 30)->nullable();
            $table->integer('schedule_day')->nullable();
            $table->text('description')->nullable();
            $table->unique(['organization_id', 'name']);
        });

        Schema::create('disease_types', function (Blueprint $table) {
            $this->baseColumns($table);
            $table->string('name');
            $table->string('code', 20);
            $table->text('symptoms')->nullable();
            $table->string('severity', 20)->default('medium');
            $table->text('description')->nullable();
            $table->unique(['organization_id', 'name']);
        });

        Schema::create('uoms', function (Blueprint $table) {
            $this->baseColumns($table);
            $table->string('code', 10);
            $table->string('name');
            $table->string('category', 30)->default('weight');
            $table->decimal('conversion_factor', 12, 4)->default(1);
            $table->unique(['organization_id', 'code']);
        });

        Schema::create('currencies', function (Blueprint $table) {
            $table->string('code', 3)->primary();
            $table->string('name');
            $table->string('symbol', 10)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('currencies');
        Schema::dropIfExists('uoms');
        Schema::dropIfExists('disease_types');
        Schema::dropIfExists('vaccine_types');
        Schema::dropIfExists('medicine_types');
        Schema::dropIfExists('feed_types');
        Schema::dropIfExists('breeds');
        Schema::dropIfExists('breed_types');
    }
};