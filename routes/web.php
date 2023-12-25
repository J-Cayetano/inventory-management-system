<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Inventory\InventoryController;
use App\Http\Controllers\Purchases\SupplierController;
use App\Http\Controllers\Setups\CategoryController;
use App\Http\Controllers\Setups\UnitController;
use App\Http\Controllers\Users\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'authenticate'])->name('authenticate');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [LogoutController::class, 'unauthenticate'])->name('unauthenticate');

    Route::get('/users/{user}', [UserController::class, 'index'])->name('users.profile');

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories');
        Route::post('/categories', 'index')->name('categories.datatables');
        Route::get('/categories/create', 'create')->name('categories.create');
        Route::post('/categories/store', 'store')->name('categories.store');
        Route::get('/categories/{category}', 'edit')->name('categories.edit');
        Route::put('/categories/{category}', 'update')->name('categories.update');
        Route::get('/categories/{category}/delete', 'delete')->name('categories.delete');
        Route::delete('/categories/{category}/destroy', 'destroy')->name('categories.destroy');
    });

    Route::controller(UnitController::class)->group(function () {
        Route::get('/units', 'index')->name('units');
        Route::post('/units', 'index')->name('units.datatables');
        Route::get('/units/create', 'create')->name('units.create');
        Route::post('/units/store', 'store')->name('units.store');
        Route::get('/units/{unit}', 'edit')->name('units.edit');
        Route::put('/units/{unit}', 'update')->name('units.update');
        Route::get('/units/{unit}/delete', 'delete')->name('units.delete');
        Route::delete('/units/{unit}/destroy', 'destroy')->name('units.destroy');
    });

    Route::controller(SupplierController::class)->group(function () {
        Route::get('/suppliers', 'index')->name('suppliers');
        Route::post('/suppliers', 'index')->name('suppliers.datatables');
        Route::get('/suppliers/create', 'create')->name('suppliers.create');
        Route::post('/suppliers/store', 'store')->name('suppliers.store');
        Route::get('/suppliers/{supplier}', 'edit')->name('suppliers.edit');
        Route::put('/suppliers/{supplier}', 'update')->name('suppliers.update');
        Route::get('/suppliers/{supplier}/delete', 'delete')->name('suppliers.delete');
        Route::delete('/suppliers/{supplier}/destroy', 'destroy')->name('suppliers.destroy');
    });

    Route::controller(InventoryController::class)->group(function () {
        Route::get('/inventory', 'index')->name('inventory');
        Route::get('/inventory/sa', 'index')->name('inventory.create');
    });
});
