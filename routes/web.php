<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\MovieController;

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
    return view('Auth.login');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



/*************************** Start Routes User Management ***************************/

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');

Route::get('users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');

Route::post('users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');

Route::get('users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');

Route::get('users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');

Route::put('users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');

Route::get('users/{user}/destroy', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.destroy');


/*************************** End Routes User Management ***************************/



/*************************** Start Routes Roles Management ***************************/

Route::get("/roles", [Rolecontroller::class, 'index'])->name('roles.index');

Route::get("roles/create", [Rolecontroller::class, 'create'])->name('roles.create');

Route::Post("roles", [Rolecontroller::class, 'store'])->name('roles.store');

Route::get("roles/{role}/edit", [Rolecontroller::class, 'edit'])->name('roles.edit');

Route::Put("roles/{role}", [Rolecontroller::class, 'update'])->name('roles.update');

Route::get("roles/{role}/delete", [Rolecontroller::class, 'destroy'])->name('roles.destroy');

/*************************** End Routes Roles Management ***************************/



/*************************** Start Routes Movies Management ***************************/

Route::get("/movies", [MovieController::class, 'index'])->name('movies.index');

Route::get("movies/create", [MovieController::class, 'create'])->name('movies.create');

Route::Post("movies", [MovieController::class, 'store'])->name('movies.store');

Route::get("movies/{movie}", [MovieController::class, 'show'])->name('movies.show');

Route::get("movies/{movie}/edit", [MovieController::class, 'edit'])->name('movies.edit');

Route::Put("movies/{movie}", [MovieController::class, 'update'])->name('movies.update');

Route::get("movies/{movie}/delete", [MovieController::class, 'destroy'])->name('movies.destroy');

/*************************** Start Routes Movies Management ***************************/

});