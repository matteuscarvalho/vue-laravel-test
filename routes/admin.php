<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    // Route::resource('roles', RolesController::class);
    // Route::resource('permissions', PermissionsController::class);
    // Route::resource('users', UsersController::class);
    // Route::resource('categories', CategoriesController::class);
    // Route::resource('products', ProductsController::class);
});

require __DIR__.'/auth.php';
