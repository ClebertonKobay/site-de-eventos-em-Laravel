<?php

use Illuminate\Support\Facades\Route;

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

use App\http\Controllers\EventController;

Route::get('/',[EventController::class, 'index']);

Route::get('/events/create',[EventController::class, 'create']);

Route::get('/contact',[EventController::class, 'contact']);

Route::get('/products',[EventController::class, 'product']);

Route::post('/events',[EventController::class, 'store'] );