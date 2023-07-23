<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepositedController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WithdrawalController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/register', [AuthController::class, 'register_show'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'login_show'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/', [TransactionController::class, 'index'])->name('transactions.index');

    Route::get('/deposited_transactions', [DepositedController::class, 'index'])->name('deposited_transactions.index');
    Route::get('/deposited_transactions/create', [DepositedController::class, 'create'])->name('deposited_transactions.create');
    Route::post('/deposited_transactions', [DepositedController::class, 'store'])->name('deposited_transactions.store');

    Route::get('/withdrawal_transactions', [WithdrawalController::class, 'index'])->name('withdrawal_transactions.index');
    Route::get('/withdrawal_transactions/create', [WithdrawalController::class, 'create'])->name('withdrawal_transactions.create');
    Route::post('/withdrawal_transactions', [WithdrawalController::class, 'store'])->name('withdrawal_transactions.store');
});
