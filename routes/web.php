<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\Superadmin\SuperadminController;
use App\Http\Controllers\Admin_spi\AdminspiController;
use App\Http\Controllers\Auditee\AuditeeController;
use App\Http\Controllers\Pic\PicController;
use App\Http\Controllers\Ka_spi\KaspiController;
use App\Http\Controllers\PegawaiController;

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
Route::get('/get-related-rekomendasi/{temuanId}',[App\Http\Controllers\Admin_spi\AssignController::class,'getRelatedRekomendasi']);

//  jika user belum login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);

});

// untuk superadmin
Route::group(['middleware' => ['auth', 'checkrole:1,2,3,4,5']], function() {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/redirect', [RedirectController::class, 'cek']);
});

Route::group(['middleware' => ['auth', 'checkrole:1'], 'prefix' => 'superadmin'], function() {
    Route::get('/', [SuperadminController::class, 'index']);

    // Tambahkan resource controller di sini
    Route::resource('role', 'App\Http\Controllers\Superadmin\RoleController');
    Route::resource('unit', 'App\Http\Controllers\Superadmin\UnitController');
    Route::resource('user', 'App\Http\Controllers\Superadmin\UserController');

    Route::get('/lha', [App\Http\Controllers\Superadmin\LhaController::class, 'index'])->name('superadmin.lha.index');
    Route::get('/report', [App\Http\Controllers\Superadmin\ReportController::class, 'index'])->name('superadmin.report.index');
    Route::get('/profile', [App\Http\Controllers\Superadmin\ProfileController::class, 'index'])->name('superadmin.profile.index');
    Route::get('/profile/edit-profile', [App\Http\Controllers\Superadmin\ProfileController::class, 'edit'])->name('superadmin.profile.edit');
    Route::post('/profile/edit-profile/{user}', [App\Http\Controllers\Superadmin\ProfileController::class, 'update'])->name('superadmin.profile.update');
});

// Untuk admin spi
Route::group(['middleware' => ['auth', 'checkrole:2'], 'prefix' => 'adminspi'], function() {
    Route::get('/', [AdminspiController::class, 'index']);

    // user
    Route::resource('user', 'App\Http\Controllers\Admin_spi\UserController');

    // lha
    Route::get('/lha', [App\Http\Controllers\Admin_spi\LhaController::class, 'index'])->name('adminspi.lha.index');
    Route::post('/lha', [App\Http\Controllers\Admin_spi\LhaController::class, 'store'])->name('adminspi.lha.store');
    Route::delete('/lha/{id}/delete', [App\Http\Controllers\Admin_spi\LhaController::class, 'delete'])->name('adminspi.lha.delete');
    Route::get('/lha/edit-lha/{id}', [App\Http\Controllers\Admin_spi\LhaController::class, 'edit'])->name('adminspi.lha.edit');
    Route::put('/lha/update-lha/{id}', [App\Http\Controllers\Admin_spi\LhaController::class, 'update'])->name('adminspi.lha.update');
    Route::get('/lha/{id}/download', [App\Http\Controllers\Admin_spi\LhaController::class, 'download'])->name('adminspi.lha.download');

    // reports
    Route::get('/report', [App\Http\Controllers\Admin_spi\ReportController::class, 'index'])->name('adminspi.report.index');
    Route::post('/report', [App\Http\Controllers\Admin_spi\ReportController::class, 'store'])->name('adminspi.report.store');
    Route::delete('/report/{id}/delete', [App\Http\Controllers\Admin_spi\ReportController::class, 'delete'])->name('adminspi.report.delete');
    Route::get('/report/edit-report/{id}', [App\Http\Controllers\Admin_spi\ReportController::class, 'edit'])->name('adminspi.report.edit');
    Route::put('/report/update-report/{id}', [App\Http\Controllers\Admin_spi\ReportController::class, 'update'])->name('adminspi.report.update');
    Route::get('/report/{id}/download', [App\Http\Controllers\Admin_spi\ReportController::class, 'download'])->name('adminspi.report.download');

    Route::get('/temuan',[App\Http\Controllers\Admin_spi\TemuanController::class,'add'])->name('adminspi.add.temuan');
    Route::post('/temuan',[App\Http\Controllers\Admin_spi\TemuanController::class,'store'])->name('adminspi.store.temuan');

    Route::get('/rekomendasi',[App\Http\Controllers\Admin_spi\RekomendasiController::class,'add'])->name('adminspi.add.rekomendasi');
    Route::post('/rekomendasi',[App\Http\Controllers\Admin_spi\RekomendasiController::class,'store'])->name('adminspi.store.rekomendasi');

    Route::get('/tabel-temuan',[App\Http\Controllers\Admin_spi\TableTemuanController::class,'index'])->name('adminspi.table_temuan');
    Route::get('/tabel-rekomendasi',[App\Http\Controllers\Admin_spi\TableRekomendasiController::class,'index'])->name('adminspi.table_rekomendasi');

    Route::get('/tabel-temuan/{id}',[App\Http\Controllers\Admin_spi\TableTemuanController::class,'edit'])->name('adminspi.edit_temuan');
    Route::post('/tabel-temuan/{id}',[App\Http\Controllers\Admin_spi\TableTemuanController::class,'update'])->name('adminspi.update_temuan');


    Route::get('/assign-divisi',[App\Http\Controllers\Admin_spi\AssignController::class,'index'])->name('adminspi.assign.index');
    Route::post('/assign-divisi',[App\Http\Controllers\Admin_spi\AssignController::class,'update'])->name('adminspi.assign.update');
    Route::get('/get-related-rekomendasi/{temuanId}',[App\Http\Controllers\Admin_spi\AssignController::class,'getRelatedRekomendasi']);
    Route::get('/get-rekomendasi-details/{rekomendasiId}',[App\Http\Controllers\Admin_spi\AssignController::class,'getRelatedRekomendasi']);
    
});

Route::group(['middleware' => ['auth', 'checkrole:3'], 'prefix' => 'auditee'], function() {
    Route::get('/', [AuditeeController::class, 'index']);
});

Route::group(['middleware' => ['auth', 'checkrole:4'], 'prefix' => 'pic'], function() {
    Route::get('/', [PicController::class, 'index']);
});

Route::group(['middleware' => ['auth', 'checkrole:5'], 'prefix' => 'kaspi'], function() {
    Route::get('/', [KaspiController::class, 'index']);
});


// untuk superadmin
// Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
//     Route::get('/superadmin', [SuperadminController::class, 'index']);
// });

// //untuk admin spi
// Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
//     Route::get('/adminspi', [AdminspiController::class, 'index']);

// });

// Route::group(['middleware' => ['auth', 'checkrole:3']], function() {
//     Route::get('/auditee', [AuditeeController::class, 'index']);

// });

// Route::group(['middleware' => ['auth', 'checkrole:4']], function() {
//     Route::get('/pic', [PicController::class, 'index']);

// });

// Route::group(['middleware' => ['auth', 'checkrole:5']], function() {
//     Route::get('/kaspi', [KaspiController::class, 'index']);

// });