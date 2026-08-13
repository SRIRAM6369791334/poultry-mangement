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
        Schema::create('companies', function (Blueprint $table) {
            $this->baseColumns($table);
            $table->string('name');
            $table->string('code', 30)->nullable();
            $table->string('registration_number')->nullable();
            $table->string('tax_id')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('fiscal_year_start', 5)->nullable();
            $table->string('base_currency', 3)->default('INR');
            $table->string('status', 20)->default('active');
            $table->unique(['organization_id', 'name']);
        });

        Schema::create('farms', function (Blueprint $table) {
            $this->baseColumns($table);
            $table->foreignUuid('company_id')->nullable()->constrained()->nullOnDelete();
            $table->string('name');
            $table->string('code', 30);
            $table->string('address')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('farm_type', 30)->default('broiler');
            $table->integer('total_capacity')->nullable();
            $table->string('ownership', 20)->default('owned');
            $table->string('status', 20)->default('active');
            $table->string('region')->nullable();
            $table->unique(['organization_id', 'code']);
        });

        Schema::create('sheds', function (Blueprint $table) {
            $this->baseColumns($table);
            $table->foreignUuid('farm_id')->constrained()->cascadeOnDelete();
            $table->string('name');
            $table->decimal('length_m', 8, 2)->nullable();
            $table->decimal('width_m', 8, 2)->nullable();
            $table->decimal('area_sqm', 10, 2)->nullable();
            $table->integer('max_capacity')->nullable();
            $table->string('housing_type', 30)->default('deep_litter');
            $table->string('status', 20)->default('empty');
            $table->integer('fans_count')->nullable();
            $table->integer('feeders_count')->nullable();
            $table->integer('drinkers_count')->nullable();
            $table->integer('heaters_count')->nullable();
            $table->text('notes')->nullable();
            $table->unique(['farm_id', 'name']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sheds');
        Schema::dropIfExists('farms');
        Schema::dropIfExists('companies');
    }
};