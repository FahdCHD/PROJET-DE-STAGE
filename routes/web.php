<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FUsersController;

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

Route::get('/home', function () {
    return view('home');
});
// connexion
Route::get('/',[LoginController::class,'show'])->name('login.show');
Route::post('/',[LoginController::class,'login'])->name('login');
Route::get('/logout',[LoginController::class,'logout'])->name('login.logout');

// ajouter
Route::get('/login/create',[LoginController::class,'create'])->name("create");
Route::post('/login/store',[LoginController::class,'store'])->name("store");
