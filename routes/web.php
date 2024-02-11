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

    Route::controller(PurchaseOrderController::class)->group(function () {
        Route::get('/purchase_orders', 'index')->name('purchase_orders');
        Route::post('/purchase_orders', 'datatable')->name('purchase_orders.datatable');
        Route::get('/purchase_orders/create', 'create')->name('purchase_orders.create');
        Route::post('/purchase_orders/store', 'store')->name('purchase_orders.store');
        Route::get('/purchase_orders/{vendor}', 'edit')->name('purchase_orders.edit');
        Route::put('/purchase_orders/{vendor}', 'update')->name('purchase_orders.update');
        Route::get('/purchase_orders/{vendor}/delete', 'delete')->name('purchase_orders.delete');
        Route::delete('/purchase_orders/{vendor}/destroy', 'destroy')->name('purchase_orders.destroy');
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
