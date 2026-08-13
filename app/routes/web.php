<?php

use App\Http\Controllers\Admin\OrganizationController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FarmController;
use App\Http\Controllers\MasterData\BreedController;
use App\Http\Controllers\MasterData\BreedTypeController;
use App\Http\Controllers\MasterData\DiseaseTypeController;
use App\Http\Controllers\MasterData\FeedTypeController;
use App\Http\Controllers\MasterData\MedicineTypeController;
use App\Http\Controllers\MasterData\UomController;
use App\Http\Controllers\MasterData\VaccineTypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShedController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check() ? redirect()->route('dashboard') : view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('companies', CompanyController::class)->whereUuid('company');
    Route::resource('farms', FarmController::class)->whereUuid('farm');
    Route::resource('sheds', ShedController::class)->whereUuid('shed');

    Route::resource('breed-types', BreedTypeController::class)->whereUuid('breed_type');
    Route::resource('breeds', BreedController::class)->whereUuid('breed');
    Route::resource('feed-types', FeedTypeController::class)->whereUuid('feed_type');
    Route::resource('medicine-types', MedicineTypeController::class)->whereUuid('medicine_type');
    Route::resource('vaccine-types', VaccineTypeController::class)->whereUuid('vaccine_type');
    Route::resource('disease-types', DiseaseTypeController::class)->whereUuid('disease_type');
    Route::resource('uoms', UomController::class)->whereUuid('uom');

    Route::resource('users', UserController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy'])->whereUuid('user');
    Route::get('roles', [RoleController::class, 'index'])->name('roles.index');
    Route::get('roles/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit')->whereUuid('role');
    Route::put('roles/{role}', [RoleController::class, 'update'])->name('roles.update')->whereUuid('role');

    Route::get('organization', [OrganizationController::class, 'edit'])->name('organization.edit');
    Route::put('organization', [OrganizationController::class, 'update'])->name('organization.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';