<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Ruta para búsqueda de factura por número
Route::get('/search', [OrderController::class, 'search'])->name('order.search');

// Rutas de acceso a detalles de facturas para usuarios no registrados
Route::get('/order-details/{order}', [OrderController::class, 'show'])->name('order.details');

// Grupo de rutas protegidas por autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Rutas CRUD protegidas
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('orders', OrderController::class);
    Route::resource('departments', DepartmentController::class);

    Route::patch('/orders/{order}/status', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');

});
