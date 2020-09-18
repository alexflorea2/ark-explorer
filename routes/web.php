<?php

use Ark\App\Services\ApiMainNetGateway;
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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/transactions', [App\Http\Controllers\TransactionsController::class, 'list'])->name('transactions');
Route::get('/transactions/{id}', [App\Http\Controllers\TransactionsController::class, 'show'])->name('transactions.detail');

Route::get('/blocks', [App\Http\Controllers\BlocksController::class, 'list'])->name('blocks');
Route::get('/blocks/{id}', [App\Http\Controllers\BlocksController::class, 'show'])->name('blocks.detail');

Route::get('/wallets/{id}', [App\Http\Controllers\WalletsController::class, 'show'])->name('wallet.detail');
