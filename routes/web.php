<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

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
        Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    });
});
