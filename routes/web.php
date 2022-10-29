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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//representatives routes
Route::group(['prefix' => 'representatives', 'middleware' => ['auth']], function () {
    Route::get('/', [\App\Http\Controllers\RepresentativeController::class, 'index'])->name('representatives.index');
    Route::get('/create', [\App\Http\Controllers\RepresentativeController::class, 'create'])->name('representatives.create');
    Route::post('/store', [\App\Http\Controllers\RepresentativeController::class, 'store'])->name('representatives.store');
    Route::get('/{representative}/edit', [\App\Http\Controllers\RepresentativeController::class, 'edit'])->name('representatives.edit');
    Route::put('/{representative}', [\App\Http\Controllers\RepresentativeController::class, 'update'])->name('representatives.update');
    Route::delete('/{representative}', [\App\Http\Controllers\RepresentativeController::class, 'destroy'])->name('representatives.destroy');
});
