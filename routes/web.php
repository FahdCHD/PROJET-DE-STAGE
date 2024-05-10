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


Route::get('{user}/edit',[FUsersController::class,'edit'])->name('edit');
Route::put('/{user}',[FUsersController::class,'update'])->name('update');


Route::get('/superadmin',[FUsersController::class,'superadmin'])->name('superadmin');
Route::get('/admin',[FUsersController::class,'admin'])->name('admin');
Route::get('/dephead',[FUsersController::class,'departmenthead'])->name('superadmin');
Route::get('/staff',[FUsersController::class,'staff'])->name('staff');
Route::get('/client',[FUsersController::class,'client'])->name('client');

// ajouter
Route::get('/create',[LoginController::class,'create'])->name("create");
Route::post('/store',[LoginController::class,'store'])->name("store");
