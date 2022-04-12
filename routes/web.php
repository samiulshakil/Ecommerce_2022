<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\backend\RoleController;

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


Route::middleware(['auth'])->group(function () {
    Route::prefix('admin')->group(function () {
            Route::name('admin.')->group(function () {
                Route::get('/dashboard', DashboardController::class)->name('dashboard');
                Route::resource('roles', RoleController::class);
        });
    });
});


require __DIR__.'/auth.php';
