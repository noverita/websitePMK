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
use App\Http\Controllers\AuthenticatedSessionController;

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
    Route::get('/datapersonel', [DataPersonelController::class, 'datapersonel'])-> name('data.personel');
    Route::get('/list-personel', [ListPersonelController::class, 'listPersonel'])-> name('list.personel');
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
