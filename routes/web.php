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

use App\Http\Controllers\PrimerController;
Route::match(['get', 'post'],'/mi-primer-controller', [PrimerController::class, 'index']);
Route::get('/mi-primer-controller/{texto}', [PrimerController::class, 'show'])->name('mi-controller');

use App\Http\Controllers\ContactoController;

Route::get('/contacto', [ContactoController::class, 'index']);
Route::post('/contacto', [ContactoController::class, 'send']);
Route::get('/contactado', [ContactoController::class, 'contacted'])->name('contactado');
