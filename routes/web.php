<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('master/')->group(function () {
    Route::get('data-user', [App\Http\Controllers\UserController::class, 'index'])->name('data-user');
    Route::get('data-user-get', [App\Http\Controllers\UserController::class, 'ajax'])->name('data-user-get');
    Route::get('data-user-add', [App\Http\Controllers\UserController::class, 'create'])->name('add-master-user');
    Route::post('data-user-add-process', [App\Http\Controllers\UserController::class, 'store'])->name('add-master-user-process');
    Route::get('data-user-edit/{id}', [App\Http\Controllers\UserController::class, 'edit'])->name('edit-master-user');
    Route::post('data-user-edit-process/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('edit-master-user-process');
    Route::post('data-user-delete-process', [App\Http\Controllers\UserController::class, 'destroy'])->name('delete-master-user-process');

    Route::get('data-kategori', [App\Http\Controllers\KategoriController::class, 'index'])->name('data-kategori');
    Route::get('data-kategori-get', [App\Http\Controllers\KategoriController::class, 'ajax'])->name('data-kategori-get');
    Route::get('data-kategori-add', [App\Http\Controllers\KategoriController::class, 'create'])->name('add-master-kategori');
    Route::post('data-kategori-add-process', [App\Http\Controllers\KategoriController::class, 'store'])->name('add-master-kategori-process');
    Route::get('data-kategori-edit/{id}', [App\Http\Controllers\KategoriController::class, 'edit'])->name('edit-master-kategori');
    Route::post('data-kategori-edit-process/{id}', [App\Http\Controllers\KategoriController::class, 'update'])->name('edit-master-kategori-process');
    Route::post('data-kategori-delete-process', [App\Http\Controllers\KategoriController::class, 'destroy'])->name('delete-master-kategori-process');

    Route::get('data-produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('data-produk');
    Route::get('data-produk-get', [App\Http\Controllers\ProdukController::class, 'ajax'])->name('data-produk-get');
    Route::get('data-produk-add', [App\Http\Controllers\ProdukController::class, 'create'])->name('add-master-produk');
    Route::post('data-produk-add-process', [App\Http\Controllers\ProdukController::class, 'store'])->name('add-master-produk-process');
    Route::get('data-produk-edit/{id}', [App\Http\Controllers\ProdukController::class, 'edit'])->name('edit-master-produk');
    Route::post('data-produk-edit-process/{id}', [App\Http\Controllers\ProdukController::class, 'update'])->name('edit-master-produk-process');
    Route::post('data-produk-delete-process', [App\Http\Controllers\ProdukController::class, 'destroy'])->name('delete-master-produk-process');
});
