<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;


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

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::resource('user', UserController::class);


//rutas para login y registro
Route::get('register', [LoginController::class, 'registerForm']);

Route::get('login', [LoginController::class, 'loginForm']);

Route::get('logout', [LoginController::class, 'logout'])->name(('logout'));

Route::post('register', [LoginController::class, 'register'])->name(('register'));

Route::post('login', [LoginController::class, 'login'])->name(('login'));

//rutas de usuarios
    //elimino create y store porque lo hago con el login controller
    Route::resource('users', UserController::class)->parameters(['user'=>'username'])->except(['create', 'store']);

//rutas de mascotas 
Route::resource('pets', PetController::class);

Route::resource('messages', MessageController::class)->except(['show', 'edit', 'update', 'destroy']);

Route::resource('posts', PostController::class);

/* ----------------------------------------- */
Route::get('/prueba', function () {
    
    return view('pruebas');
})->name('prueba');