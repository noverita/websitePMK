<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\ListPersonelController;
use App\Http\Controllers\DataPersonelController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\LaporanPersonelController;
use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\DataPerOrangController;

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

Route::get('/', function () {
    return redirect()->route('login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Protecting admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/datapersonel/create', [DataPersonelController::class, 'create'])->name('datapersonel.create');
// Route::post('/datapersonel/store-personnel', [DataPersonelController::class, 'storePersonnel'])->name('datapersonel.storePersonnel');
Route::post('/datapersonel/store-sertifikasi', [DataPersonelController::class, 'storeSertifikasi'])->name('datapersonel.storeSertifikasi');
Route::post('/datapersonel/store-pelatihan', [DataPersonelController::class, 'storePelatihan'])->name('datapersonel.storePelatihan');
    Route::get('/admin/daftar-personel', [ListPersonelController::class, 'listPersonel'])-> name('list.personel');
    Route::get('/admin/laporan-personel', [LaporanPersonelController::class, 'laporanPersonel'])-> name('laporan.personel');
    Route::get('/admin/detail-personel', [DataPerOrangController::class, 'profilpersonel'])-> name('profil.personel');
    Route::get('/admin/sertifikasi-personel', [DataPerOrangController::class, 'sertifikasipersonel'])-> name('sertifikasi.personel');
    Route::get('/admin/pelatihan-personel', [DataPerOrangController::class, 'pelatihanpersonel'])-> name('pelatihan.personel');
});

// Protecting personnel routes
Route::middleware(['auth', 'personnel'])->group(function () {
    Route::get('/personnel/dashboard', [PersonnelController::class, 'index'])->name('personnel.dashboard');
    Route::get('/personnel/kuesioner', [KuesionerController::class, 'index'])->name('personnel.kuesioner');
});

Route::get('/admin', 'App\Http\Controllers\AdminController@index');
// Route::get('/register', 'App\Http\Controllers\RegistrasiController@registrasi');




//Personel
//Route::get('/personnel/kuesioner', 'App\Http\Controllers\KuesionerController@kuesioner');
Route::get('/personnel', 'App\Http\Controllers\PersonnelController@index');

require __DIR__.'/auth.php';
