<?php

use App\Http\Controllers\AkunpajakController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BkuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JenispajakController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\KamarControlleruser;
use App\Http\Controllers\OpdController;
use App\Http\Controllers\Pajakls1Controller;
use App\Http\Controllers\PajaklsController;
use App\Http\Controllers\RealisasiController;
use App\Http\Controllers\RekeningController;
use App\Http\Controllers\TarikpajakController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
// Route::get('/', function () {
//     return view('Halaman_Depan.index');
// });

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/cek_login', [AuthController::class, 'cek_login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [BerandaController::class, 'index'])->middleware('auth:web','checkRole:Admin,Verifikasi,User');

// ======= DATA USER =======
Route::get('/tampiluser', [UserController::class, 'index'])->middleware('auth:web','checkRole:Admin');
Route::post('/user/store', [UserController::class, 'store'])->middleware('auth:web','checkRole:Admin');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware('auth:web','checkRole:Admin');
Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->middleware('auth:web','checkRole:Admin');
Route::post('/user/aktif/{id}', [UserController::class, 'aktif'])->middleware('auth:web','checkRole:Admin');
Route::post('/user/nonaktif/{id}', [UserController::class, 'nonaktif'])->middleware('auth:web','checkRole:Admin');

// ======= DATA OPD =======
Route::get('/tampilopd', [OpdController::class, 'index'])->middleware('auth:web','checkRole:Admin');
Route::post('/opd/store', [OpdController::class, 'store'])->middleware('auth:web','checkRole:Admin');
Route::get('/opd/edit/{id}', [OpdController::class, 'edit'])->middleware('auth:web','checkRole:Admin');
Route::delete('/opd/destroy/{id}', [OpdController::class, 'destroy'])->middleware('auth:web','checkRole:Admin');

// ======= DATA REKENING =======
Route::get('/tampilrekening', [RekeningController::class, 'index'])->middleware('auth:web','checkRole:Admin');
// Route::post('/user/store', [UserController::class, 'store'])->middleware('auth:web','checkRole:Admin');
// Route::get('/user/edit/{id}', [UserController::class, 'edit'])->middleware('auth:web','checkRole:Admin');
Route::delete('/rek/destroy/{id_rekening}', [RekeningController::class, 'destroy'])->middleware('auth:web','checkRole:Admin');
// Route::post('/user/aktif/{id}', [UserController::class, 'aktif'])->middleware('auth:web','checkRole:Admin');
// Route::post('/user/nonaktif/{id}', [UserController::class, 'nonaktif'])->middleware('auth:web','checkRole:Admin');
Route::post('rekening', [RekeningController::class, 'import'])->name('rekening.import')->middleware('auth:web','checkRole:Admin');

// ======= DATA BANK =======
Route::get('/tampilbank', [BankController::class, 'index'])->middleware('auth:web','checkRole:Admin');
Route::post('/bank/store', [BankController::class, 'store'])->middleware('auth:web','checkRole:Admin');
Route::get('/bank/edit/{id_bank}', [BankController::class, 'edit'])->middleware('auth:web','checkRole:Admin');
Route::delete('/bank/destroy/{id_bank}', [BankController::class, 'destroy'])->middleware('auth:web','checkRole:Admin');

// ======= DATA BKU =======
Route::get('/tampilbku', [BkuController::class, 'index'])->middleware('auth:web','checkRole:Admin');
Route::post('bku', [BkuController::class, 'import'])->name('bku.import')->middleware('auth:web','checkRole:Admin');

// ======= REALISASI =======
Route::get('/tampilrealisasi', [RealisasiController::class, 'index'])->name('realisasi.index')->middleware('auth:web','checkRole:Admin');
// Route::get('/tampilrealisasidihome', [RealisasiController::class, 'tampilhome'])->name('realisasihome.index');

// ======= ANGGARAN =======
Route::get('/tampilanggaran', [AnggaranController::class, 'index'])->middleware('auth:web','checkRole:Admin');
Route::post('anggaran', [AnggaranController::class, 'import'])->name('anggaran.import')->middleware('auth:web','checkRole:Admin');

// ======= REKAPAN REKENING =======
Route::get('/tampilrekapanrek', [KamarController::class, 'index'])->middleware('auth:web','checkRole:Admin');

// ======= REKAPAN REKENING USER =======
Route::get('/tampilrekapanrekuser', [KamarControlleruser::class, 'index'])->middleware('auth:web','checkRole:User');