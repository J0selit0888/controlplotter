<?php

use App\Http\Controllers\admin\RegimpresionController;
use App\Http\Controllers\admin\TamhojaController;
use App\Http\Controllers\admin\UnisolicitanteController;
use App\Http\Controllers\admin\UsuarioController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\publicController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [publicController::class,'index'])->name('index.welcome');


Auth::routes();


Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/auth/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('auth.login');
    Route::get('/change-password', 'UserController@showChangePasswordForm')->name('change-password');
    Route::get('/admin/regimpresion/pdf', [RegimpresionController::class, 'pdf'])->name('regimpresion.pdf');

    
    // Route::get('/admin/regimpresions/pdf', [App\Http\Controllers\admin\RegimpresionController::class, 'pdf'])->name('regimpresion.pdf');

    Route::resource('/admin/tamhoja', TamhojaController::class);
    Route::resource('/admin/unisolicitante', UnisolicitanteController::class);
    Route::resource('/admin/usuario', UsuarioController::class);
    Route::resource('/admin/regimpresion', RegimpresionController::class);
});

    Route::post('/verificar-usuario', [publicController::class,'verificarUsuario'])->name('verificar.usuario');
    Route::post('/registrar-impresion/{id}', [publicController::class,'registrarImpresion'])->name('registrar.impresion');
    Route::post('/validar-registro', [publicController::class,'validarRegistro'])->name('validar.registro');
    Route::post('/change-password', 'UserController@changePassword')->name('update-password');
