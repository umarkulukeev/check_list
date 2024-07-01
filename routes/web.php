<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\ConsolidatedListController;
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

Route::get('uploads/create', [UploadController::class, 'create'])->name('uploads.create');
Route::post('uploads/store', [UploadController::class, 'store'])->name('uploads.store');

Route::get('list', [ConsolidatedListController::class, 'list'])->name('consolidated.list');
Route::post('list/check', [ConsolidatedListController::class, 'check'])->name('consolidated.list.check');
