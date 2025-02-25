<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PersonnelController;

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

//register

Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/', function () {
    return view('welcome');
});

// Protecting admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
});

// Protecting personnel routes
Route::middleware(['auth', 'personnel'])->group(function () {
    Route::get('/personnel', [PersonnelController::class, 'index'])->name('personnel.dashboard');
});

// require __DIR__.'/auth.php';


Route::get('/login', 'App\Http\Controllers\LoginController@index');
Route::post('/login-proses', [App\Http\Controllers\LoginController::class, 'login_proses'])-> name('login-proses');


Route::get('/dashboard', 'App\Http\Controllers\DashboardController@dashboard');
// Route::get('/register', 'App\Http\Controllers\RegistrasiController@registrasi');
Route::get('/datapersonel', 'App\Http\Controllers\DataPersonelController@datapersonel');
Route::get('/list-personel', 'App\Http\Controllers\ListPersonelController@listPersonel');


//Personel
Route::get('/kuesioner', 'App\Http\Controllers\KuesionerController@kuesioner');
Route::get('/personel', 'App\Http\Controllers\PersonelPageController@personelPage');
