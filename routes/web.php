<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\LimitsController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\AdminController;

Route::get('/', [PagesController::class,'mainView'])->name('main');
Route::get('/instruction', [PagesController::class, 'instruction'])->name('instruction');

Route::get('/myPayments', [PaymentsController::class, 'getPayments'])
    ->name('payments');
Route::get('/createPayment', [PaymentsController::class, 'addPaymentView'])
    ->name('create_payment')->middleware('can:create, App\Models\Payment');
Route::post('/addPayment', [PaymentsController::class, 'addPayment'])->name('add_payment')
    ->middleware('can:create, App\Models\Payment');
Route::delete('/deletePayment/{payment}', [PaymentsController::class, 'deletePayment'])
    ->name('delete_payment')->middleware('can:delete,payment');
Route::get('/editPayment/{payment}', [PaymentsController::class, 'editPaymentView'])
    ->name('edit_payment')->middleware('can:update,payment');
Route::patch('/editPayment/{payment}/updatePayment', [PaymentsController::class, 'updatePayment'])
    ->name('update_payment')->middleware('can:update,payment');
Route::get('/myLimits', [LimitsController::class, 'getLimits'])->name('limits');
Route::get('/createLimit', [LimitsController::class, 'createLimitView'])->name('create_limit')
    ->middleware('can:create, App\Models\Limit');
Route::post('/addLimit', [LimitsController::class, 'addLimit'])->name('add_limit')
    ->middleware('can:create, App\Models\Limit');
Route::delete('/deleteLimit/{limit}', [LimitsController::class, 'deleteLimit'])
    ->name('delete_limit')->middleware('can:delete,limit');
Route::get('/editLimit/{limit}', [LimitsController::class, 'editLimitView'])
    ->name('edit_limit')->middleware('can:update,limit');
Route::patch('/editLimit/{limit}/updateLimit', [LimitsController::class, 'updateLimit'])
    ->name('update_limit')->middleware('can:update,limit');
Route::get('/myBalance', [BalanceController::class, 'getBalance'])->name('balance');
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::post('/ban/{user}', [AdminController::class, 'ban'])->name('ban');
Route::post('/unban/{user}', [AdminController::class, 'unban'])->name('unban');
Route::post('/makeAdmin/{user}', [AdminController::class, 'makeAdmin'])->name('makeAdmin');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::fallback([PagesController::class,'mainView']);
