<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\EmpleadoController;

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

/*

Route::get('/empleado', function () {
    return view('empleado.index');
});
//Route::get('empleado/create',[EmpleadoController::class,'create']);

Route::resource('empleado', EmpleadoController::class);*/
Route::resource('empleado', EmpleadoController::class) -> middleware('auth');

Auth::routes();

//Auth::routes('register'->false, 'reset');

Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['middleware' => 'auth'], function(){
    Route::get('/',[EmpleadoController::class, 'index'])->name('home');
});