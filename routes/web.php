<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingController;

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

Route::get('/', function () {
    return view('welcome');
});


 Route::resource('home', HomeController::class);

 Route::resource('setting', SettingController::class);


 Route::group(['namespace' => 'site'], function () {


    Route::get('/index', [\App\Http\Controllers\HomeController::class, 'home']);
    Route::get('/winter', [\App\Http\Controllers\HomeController::class, 'winter']);
    Route::get('/sommer', [\App\Http\Controllers\HomeController::class, 'sommer']);
    Route::get('/price', [\App\Http\Controllers\HomeController::class, 'price']);




 });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
