<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

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


Route::get('{user}/posts/{post}', [PostController::class, 'show'])->name('showpost');


Route::resource('posts', PostController::class);

//cambiar la visibilidad de mascotas
Route::get('visibility/{pet}', [PetController::class, 'visibility'])->name('visibility')->middleware('auth');

//buscar
Route::get('search', [HomeController::class, 'search'])->name('search');

//follow
Route::get('follow/{user}', [UserController::class, 'follow'])->name('follow');

//recommend
Route::get('recommend/{user}', [UserController::class, 'recommend'])->name('recommend');

//comments
Route::post('comment/{post}', [CommentController::class, 'store'])->name('comments.store');

//idioma
Route::get('lang/{lang}', [HomeController::class, 'changelang'])->name('changelang');

//añadir enlaces
Route::post('addlinks', [UserController::class, 'addlinks'])->name('addlinks');

//eliminar posts diarios antiguos
Route::get('delposts', [HomeController::class, 'delposts'])->name('delposts');

/* ----------------------------------------- */
Route::get('/prueba', function () {
    
    return view('pruebas');
})->name('prueba');