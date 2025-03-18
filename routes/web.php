<?php

use App\Http\Controllers\AdminBeritaController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\loginControler;
use Illuminate\Support\Facades\Route;
use PhpParser\Node\Stmt\Return_;

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


Route::fallback(function () {
    return view('error404');
});

Route::get('/admin/login', [loginControler::class, 'index'])->name('login');
Route::get('/admin/logout', [loginControler::class, 'logout']);
Route::post('/admin/login', [loginControler::class, 'login']);


Route::get('/', [frontendController::class, 'index']);
Route::get('/indeks', [frontendController::class, 'indeks']);
Route::post('/indeks', [frontendController::class, 'indeks_cari']);
Route::get('/detail/{id}', [frontendController::class, 'detail']);
Route::get('/kategori/{nama_kategori}', [frontendController::class, 'category']);



Route::middleware(['auth'])->group(function () {
    Route::get('/admin',[AdminBeritaController::class, 'index']);
    Route::get('/admin/table', [AdminBeritaController::class, 'table']);
    Route::get('/admin/tambah', [AdminBeritaController::class, 'form']);
    Route::post('/admin/create', [AdminBeritaController::class, 'create']);
    Route::get('/admin/hapus/{id}', [AdminBeritaController::class, 'delete']);
    Route::get('/admin/edit/{id}', [AdminBeritaController::class, 'edit']);
    Route::get('/admin/set-headline/{status}/{id}', [AdminBeritaController::class, 'set_headline']);
    Route::post('/admin/update/{id}', [AdminBeritaController::class, 'update']);


    Route::get('/admin/kategori', [AdminCategoryController::class, 'index']);
    Route::get('/admin/kategori/tambah', [AdminCategoryController::class, 'form']);
    Route::post('/admin/kategori/create', [AdminCategoryController::class, 'create']);
    Route::get('/admin/kategori/hapus/{id}', [AdminCategoryController::class, 'delete']);
    Route::get('/admin/kategori/edit/{id}', [AdminCategoryController::class, 'edit']);
    Route::post('/admin/kategori/update/{id}', [AdminCategoryController::class, 'update']);
});
