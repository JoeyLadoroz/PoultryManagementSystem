<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\EggProductionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\EggSalesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware('auth','isAdmin')->group(function(){

        Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

        //EggsProduction
        Route::get('/table-production',[App\Http\Controllers\Admin\EggProductionController::class, 'index'])->name('table.production');
        Route::get('/table-production-create',[App\Http\Controllers\Admin\EggProductionController::class, 'create'])->name('table.production.create');
        Route::post('/table-production-store',[App\Http\Controllers\Admin\EggProductionController::class, 'store'])->name('table.production.store');

        // //EggSales
        Route::get('/table-sales',[App\Http\Controllers\Admin\EggSalesController::class, 'index'])->name('table.sales');
        Route::post('/table-sales-store',[App\Http\Controllers\Admin\EggSalesController::class, 'store'])->name('table.sales.store');
        // Route::get('eggsales/show',[App\Http\Controllers\Admin\EggSalesController::class, 'show']);
        // Route::get('eggsales/create',[App\Http\Controllers\Admin\EggSalesController::class, 'create']);
        // Route::post('eggsales/store','App\Http\Controllers\Admin\EggSalesController@store')->name('store');


});

