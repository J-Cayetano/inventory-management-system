<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Setups\UnitController;
use App\Http\Controllers\Inventory\ItemController;
use App\Http\Controllers\Setups\CategoryController;
use App\Http\Controllers\Purchases\VendorController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Inventory\InventoryController;

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

    // Purchase Management Module

    Route::controller(VendorController::class)->group(function () {
        Route::get('/vendors', 'index')->name('vendors');
        Route::post('/vendors', 'datatable')->name('vendors.datatable');
        Route::get('/vendors/create', 'create')->name('vendors.create');
        Route::post('/vendors/store', 'store')->name('vendors.store');
        Route::get('/vendors/{vendor}', 'edit')->name('vendors.edit');
        Route::put('/vendors/{vendor}', 'update')->name('vendors.update');
        Route::get('/vendors/{vendor}/delete', 'delete')->name('vendors.delete');
        Route::delete('/vendors/{vendor}/destroy', 'destroy')->name('vendors.destroy');
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



    Route::controller(InventoryController::class)->group(function () {
        Route::get('/inventory/gallery', 'gallery')->name('inventory.gallery');
        Route::get('/inventory/table', 'table')->name('inventory.table');
    });

    Route::controller(ItemController::class)->group(function () {
        Route::get('/inventory/items/create', 'create')->name('items.create');
        Route::post('/inventory/items/store', 'store')->name('items.store');
        Route::get('/inventory/items/{item}', 'show')->name('items.show');
    });
});
