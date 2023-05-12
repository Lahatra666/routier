<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\BackController;
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
//login
Route::get('/',[LoginController::class, 'index'])->name('login');
Route::post('login',[LoginController::class, 'authenticate'])->name('authenticate');
Route::get('logout',[AuthController::class, 'logout'])->name('logout');

//frontoffice
Route::get('/frontoffice',[FrontController::class, 'front'])->name('front');

// backoffice
Route::get('/backoffice',[BackController::class, 'back'])->name('back');
Route::get('/export',[BackController::class, 'exportpdf'])->name('exportpdf');
// portion
Route::get('/portion/{idroute}',[BackController::class, 'showportion'])->name('portion.showportion');
Route::post('/portion/create',[BackController::class, 'storeportion'])->name('portion.addportion');

