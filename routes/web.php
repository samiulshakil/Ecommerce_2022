<?php

use App\Http\Controllers\Backend\BackupController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\PasswordController;
use App\Http\Controllers\backend\RoleController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\MenuItemController;


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

                //roles and users
                Route::resource('roles', RoleController::class);
                Route::resource('users', UserController::class);

                //profile route 
                Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
                Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

                //profile change Password 
                Route::get('password/edit', [PasswordController::class, 'editPassword'])->name('password.edit');
                Route::put('password/update', [PasswordController::class, 'updatePassword'])->name('password.update');
                
                //backups route
                Route::resource('backups', BackupController::class)->only(['index', 'store', 'destroy']);
                
                //Pages route
                Route::resource('pages', PageController::class);

                //Menus route
                Route::resource('menus', MenuController::class)->except(['show']);

                //Menus Items route
                Route::resource('menuitems', MenuItemController::class);

                                
        });
    });
});


require __DIR__.'/auth.php';


// Pages route e.g. [about,contact,etc]
Route::get('/{slug}', [PagesController::class, 'index'])->name('page');
