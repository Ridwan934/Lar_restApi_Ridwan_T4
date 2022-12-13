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

Route::get('/', function () {
    return view('welcome');
});
// Route::get("pengguna",[PenggunaController::class, "index"]);
// Route::get("pengguna/{id}",[PenggunaController::class, "show"]);
// Route::post("pengguna",[PenggunaController::class, "store"]);
// Route::put("pengguna/{id}",[PenggunaController::class, "update"]);
// Route::put("pengguna/{id}",[PenggunaController::class, "destroy"]);