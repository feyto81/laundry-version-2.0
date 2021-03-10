<?php

use App\Http\Controllers\CmsUsersController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OutletController;

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

// Auth::routes();
Route::get('/', function () {
    return redirect()->route('dashboard.index');
});

Route::get('admin/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::group(['middleware' => 'auth'], function () {
    Route::group(['middleware' => ['role:Administrator'], 'prefix' => 'admin'], function () {
        Route::resource('dashboard', DashboardController::class);
        Route::resource('cms_users', CmsUsersController::class);
        Route::get('cms_users/delete/{id}', [CmsUsersController::class, 'destroy']);
        Route::get('cms_users/edit/{id}', [CmsUsersController::class, 'edit']);
        Route::post('cms_users/update/{id}', [CmsUsersController::class, 'update']);
        Route::get('cms_users/active/{id}', [CmsUsersController::class, 'active']);
        Route::get('cms_users/unactive/{id}', [CmsUsersController::class, 'unactive']);

        Route::resource('outlet', OutletController::class);
        Route::get('outlet/delete/{id}', [OutletController::class, 'destroy']);
        Route::get('outlet/edit/{id}', [OutletController::class, 'edit']);
        Route::post('outlet/update/{id}', [OutletController::class, 'update']);

        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    });
});
