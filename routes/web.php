<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RequestController;

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

Route::get('/', [RequestController::class, 'getRequests'])->middleware(['auth', 'verified'])->name('welcome');

Route::post('/', [RequestController::class, 'addRequest'])->middleware(['auth', 'verified'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
