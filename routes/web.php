<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Users\UserController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Inventory\ItemController;
use App\Http\Controllers\Purchases\VendorController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Inventory\InventoryController;
use App\Http\Controllers\Purchases\PurchaseOrderController;
use App\Http\Controllers\Setups\Items\BrandController;
use App\Http\Controllers\Setups\Items\CategoryController;
use App\Http\Controllers\Setups\Items\SubcategoryController;
use App\Http\Controllers\Setups\Items\UnitController;

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

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/', [LoginController::class, 'authenticate'])->name('authenticate');
});

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout', [LogoutController::class, 'unauthenticate'])->name('unauthenticate');

    Route::get('/users/{user}', [UserController::class, 'index'])->name('users.profile');

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
    });

    #-----------------------------------------------------------------------------------#
    #                               PURCHASE MANAGEMENT                                 #
    #-----------------------------------------------------------------------------------#

    Route::controller(VendorController::class)->group(function () {
        Route::get('/vendors', 'index')->name('vendors.index');
        Route::post('/vendors', 'datatable')->name('vendors.datatable');
        Route::get('/vendors/create', 'create')->name('vendors.create');
        Route::post('/vendors/store', 'store')->name('vendors.store');
        Route::get('/vendors/{vendor}', 'show')->name('vendors.show');
        Route::get('/vendors/{vendor}/edit', 'edit')->name('vendors.edit');
        Route::put('/vendors/{vendor}/update', 'update')->name('vendors.update');
        Route::get('/vendors/{vendor}/delete', 'delete')->name('vendors.delete');
        Route::delete('/vendors/{vendor}/destroy', 'destroy')->name('vendors.destroy');
    });

    Route::controller(PurchaseOrderController::class)->group(function () {
        Route::get('/purchase_orders', 'index')->name('purchase_orders.index');
        Route::post('/purchase_orders', 'datatable')->name('purchase_orders.datatable');
        Route::get('/purchase_orders/create', 'create')->name('purchase_orders.create');
        Route::post('/purchase_orders/store', 'store')->name('purchase_orders.store');
        Route::get('/purchase_orders/{vendor}/edit', 'edit')->name('purchase_orders.edit');
        Route::put('/purchase_orders/{vendor}/update', 'update')->name('purchase_orders.update');
        Route::get('/purchase_orders/{vendor}/delete', 'delete')->name('purchase_orders.delete');
        Route::delete('/purchase_orders/{vendor}/destroy', 'destroy')->name('purchase_orders.destroy');
    });

    #-----------------------------------------------------------------------------------#
    #                               PURCHASE MANAGEMENT                                 #
    #-----------------------------------------------------------------------------------#

    #-----------------------------------------------------------------------------------#
    #                               SETUPS MANAGEMENT                                   #
    #-----------------------------------------------------------------------------------#

    Route::controller(BrandController::class)->group(function () {
        Route::get('/brands', 'index')->name('brands.index');
        Route::post('/brands', 'datatable')->name('brands.datatable');
        Route::get('/brands/create', 'create')->name('brands.create');
        Route::post('/brands/store', 'store')->name('brands.store');
        Route::get('/brands/{brand}', 'edit')->name('brands.edit');
        Route::put('/brands/{brand}', 'update')->name('brands.update');
        Route::get('/brands/{brand}/delete', 'delete')->name('brands.delete');
        Route::delete('/brands/{brand}/destroy', 'destroy')->name('brands.destroy');
    });

    Route::controller(CategoryController::class)->group(function () {
        Route::get('/categories', 'index')->name('categories.index');
        Route::post('/categories', 'datatable')->name('categories.datatable');
        Route::get('/categories/create', 'create')->name('categories.create');
        Route::post('/categories/store', 'store')->name('categories.store');
        Route::get('/categories/{category}', 'edit')->name('categories.edit');
        Route::put('/categories/{category}', 'update')->name('categories.update');
        Route::get('/categories/{category}/delete', 'delete')->name('categories.delete');
        Route::delete('/categories/{category}/destroy', 'destroy')->name('categories.destroy');
    });

    Route::controller(UnitController::class)->group(function () {
        Route::get('/units', 'index')->name('units.index');
        Route::post('/units', 'datatable')->name('units.datatable');
        Route::get('/units/create', 'create')->name('units.create');
        Route::post('/units/store', 'store')->name('units.store');
        Route::get('/units/{unit}', 'edit')->name('units.edit');
        Route::put('/units/{unit}', 'update')->name('units.update');
        Route::get('/units/{unit}/delete', 'delete')->name('units.delete');
        Route::delete('/units/{unit}/destroy', 'destroy')->name('units.destroy');
    });

    Route::controller(SubcategoryController::class)->group(function () {
        Route::get('/subcategories', 'index')->name('subcategories.index');
        Route::post('/subcategories', 'datatable')->name('subcategories.datatable');
        Route::get('/subcategories/create', 'create')->name('subcategories.create');
        Route::post('/subcategories/store', 'store')->name('subcategories.store');
        Route::get('/subcategories/{subcategory}', 'edit')->name('subcategories.edit');
        Route::put('/subcategories/{subcategory}', 'update')->name('subcategories.update');
        Route::get('/subcategories/{subcategory}/delete', 'delete')->name('subcategories.delete');
        Route::delete('/subcategories/{subcategory}/destroy', 'destroy')->name('subcategories.destroy');
    });
    #-----------------------------------------------------------------------------------#
    #                               SETUPS MANAGEMENT                                   #
    #-----------------------------------------------------------------------------------#
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
