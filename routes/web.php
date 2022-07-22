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

Route::resource('zipCodes', App\Http\Controllers\ZipCodeController::class);

Route::controller(App\Http\Controllers\ImportFilesController::class)->group(function () {
    Route::get('zipCodes/import', 'import')->name('zipCodes.import');
    Route::post('zipCodes/import', 'importData')->name('zipCodes.importData');
});
