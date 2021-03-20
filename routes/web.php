<?php

use App\Http\Controllers\CmsUsersController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TransactionController;

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

Route::get('admin/login', [LoginController::class, 'showFormLogin'])->name('login');
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

        Route::resource('member', MemberController::class);
        Route::get('member/delete/{id}', [MemberController::class, 'destroy']);
        Route::delete('member/deleteAll', [MemberController::class, 'deleteAll']);
        Route::get('member/edit/{id}', [MemberController::class, 'edit']);
        Route::post('member/update/{id}', [MemberController::class, 'update']);

        Route::resource('paket', PaketController::class);
        Route::get('paket/delete/{id}', [PaketController::class, 'destroy']);
        Route::get('paket/edit/{id}', [PaketController::class, 'edit']);
        Route::post('paket/update/{id}', [PaketController::class, 'update']);

        Route::resource('transaction', TransactionController::class);
        Route::get('transaction/getcart/response', [TransactionController::class, 'getCart'])->name('getCart');
        Route::post('transaction/savecart/response', [TransactionController::class, 'saveCart'])->name('savecart');
        Route::get('transaction/delete-cart/response/{cart_id}', [TransactionController::class, 'delete_cart']);
        Route::post('transaction/sale', [TransactionController::class, 'kirimsemua'])->name('kirimsemua');
        Route::get('transaction/print/invoice/{id}', [TransactionController::class, 'print']);
        Route::get('transaction/edit/{id}', [TransactionController::class, 'edit']);
        Route::post('transaction/update/{id}', [TransactionController::class, 'update']);
        Route::get('transaction/baru/edit/{id}', [TransactionController::class, 'edit']);
        Route::post('transaction/baru/update/{id}', [TransactionController::class, 'update']);
        Route::get('transaction/proses/edit/{id}', [TransactionController::class, 'edit']);
        Route::post('transaction/proses/update/{id}', [TransactionController::class, 'update']);
        Route::get('transaction/selesai/edit/{id}', [TransactionController::class, 'edit']);
        Route::post('transaction/selesai/update/{id}', [TransactionController::class, 'update']);
        Route::get('transaction/diambil/edit/{id}', [TransactionController::class, 'edit']);
        Route::post('transaction/diambil/update/{id}', [TransactionController::class, 'update']);
        Route::get('transaction/category/baru', [TransactionController::class, 'baru']);
        Route::get('transaction/category/proses', [TransactionController::class, 'proses']);
        Route::get('transaction/category/selesai', [TransactionController::class, 'selesai']);
        Route::get('transaction/category/diambil', [TransactionController::class, 'diambil']);

        Route::get('logout', [LoginController::class, 'logout'])->name('logout');

        Route::get('report/day', [ReportController::class, 'day']);
        Route::get('report/day/search', [ReportController::class, 'day_search']);
        Route::get('report/day/cetakpdf', [ReportController::class, 'day_pdf']);

        Route::get('report/month', [ReportController::class, 'month']);
        Route::get('report/month/search', [ReportController::class, 'month_search']);
        Route::get('report/month/cetakpdf', [ReportController::class, 'month_pdf']);

        Route::get('report/year', [ReportController::class, 'year']);
        Route::get('report/year/search', [ReportController::class, 'year_search']);
        Route::get('report/year/cetakpdf', [ReportController::class, 'year_pdf']);
    });
});
