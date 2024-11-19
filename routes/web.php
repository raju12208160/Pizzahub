<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


route::group(['middleware'=>'pizza_middleware'],function(){
Route::get('/pizza/create', [App\Http\Controllers\pizzaController::class, 'create'])->name('pizza.create');
Route::get('/pizza/index', [App\Http\Controllers\pizzaController::class, 'index'])->name('pizza.index');
Route::post('/pizza/store', [App\Http\Controllers\pizzaController::class, 'store'])->name('pizza.store');
Route::get('/pizza/{id}/edit', [App\Http\Controllers\pizzaController::class, 'edit'])->name('pizza.edit');
Route::put('/pizza/{id}/update', [App\Http\Controllers\pizzaController::class, 'update'])->name('pizza.update');
Route::delete('/pizza/{id}/delete', [App\Http\Controllers\pizzaController::class, 'destroy'])->name('pizza.delete');




});
