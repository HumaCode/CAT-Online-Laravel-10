<?php

use App\Http\Controllers\Konfigurasi\AksesRoleController;
use App\Http\Controllers\Konfigurasi\AksesUserController;
use App\Http\Controllers\Konfigurasi\MenuController;
use App\Http\Controllers\Konfigurasi\PermissionController;
use App\Http\Controllers\Konfigurasi\RoleController;
use App\Http\Controllers\Konfigurasi\UserController;
use App\Http\Controllers\MainMenu\DetailSoalController;
use App\Http\Controllers\MainMenu\KategoriUjianController;
use App\Http\Controllers\MainMenu\QuestionController;
use App\Http\Controllers\MainMenu\SesiUjianController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'konfigurasi', 'as' => 'konfigurasi.'], function () {
    Route::put('menu/sort', [MenuController::class, 'sort'])->name('menu.sort');
    Route::resource('menu', MenuController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::get('akses-role/{role}/role', [AksesRoleController::class, 'getPermissionByRole']);
    Route::resource('akses-role', AksesRoleController::class)->except(['create', 'store', 'delete'])->parameters(['akses-role' => 'role']);
    Route::get('akses-user/{user}/user', [AksesUserController::class, 'getPermissionByUser']);
    Route::resource('akses-user', AksesUserController::class)->except(['create', 'store', 'delete'])->parameters(['akses-user' => 'user']);
    Route::resource('users', UserController::class);
});

Route::group(['prefix' => 'main-menu', 'as' => 'main-menu.'], function () {

    // Sesi Ujian
    Route::post('sesi-ujian/data', [SesiUjianController::class, 'getData'])->name('sesi-ujian.data');
    Route::resource('sesi-ujian', SesiUjianController::class);

    // Kategori Ujian
    Route::post('kategori-ujian/data', [KategoriUjianController::class, 'getData'])->name('kategori-ujian.data');
    Route::resource('kategori-ujian', KategoriUjianController::class);

    // detail soal
    Route::get('data-soal/detail/{kode_soal}', [DetailSoalController::class, 'index'])->name('detail-soal.index');
    Route::post('data-soal/detail/data/{kode_soal}', [DetailSoalController::class, 'getData'])->name('detail-soal.data');
    Route::get('data-soal/detail/create/{kode_soal}', [DetailSoalController::class, 'create'])->name('detail-soal.create');
    Route::post('data-soal/detail/store/{kode_soal}', [DetailSoalController::class, 'store'])->name('detail-soal.store');
    Route::get('data-soal/detail/show/{kode_soal}/{id}', [DetailSoalController::class, 'show'])->name('detail-soal.show');
    Route::get('data-soal/detail/edit/{kode_soal}/{id}', [DetailSoalController::class, 'edit'])->name('detail-soal.edit');
    Route::post('data-soal/detail/update/{kode_soal}/{id}', [DetailSoalController::class, 'update'])->name('detail-soal.update');
    Route::get('data-soal/detail/destroy/{kode_soal}/{id}', [DetailSoalController::class, 'destroy'])->name('detail-soal.destroy');

    // soal
    Route::post('data-soal/data', [QuestionController::class, 'getData'])->name('data-soal.data');
    Route::resource('data-soal', QuestionController::class);
});
