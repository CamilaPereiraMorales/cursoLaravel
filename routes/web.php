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

/* Route::get('/', function () {   Aca ejecuta una funcion que retorna
    return view('app');         la vista que le indiquemos
});
*/

Route::view('/', 'app');    // Aca hace lo mismo pero de manera mas simplificada