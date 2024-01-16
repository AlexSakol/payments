<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\LimitsController;

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

Route::get('/', [MainController::class,'show'])->name('main');
Route::get('/myPayments', [PaymentsController::class, 'getPayments'])->name('payments');
Route::get('/createPayment', [PaymentsController::class, 'addPaymentView'])->name('create_payment');
Route::post('/addPayment', [PaymentsController::class, 'addPayment'])->name('add_payment');
Route::post('/deletePayment', [PaymentsController::class, 'deletePayment'])->name('delete_payment');
Route::get('/editPayment/{id}', [PaymentsController::class, 'editPaymentView'])->name('edit_payment');
Route::post('/editPayment/{id}/updatePayment', [PaymentsController::class, 'updatePayment'])->name('update_payment');
Route::get('/myLimits', [LimitsController::class, 'getLimits'])->name('limits');
Route::get('/createLimit', [LimitsController::class, 'createLimitView'])->name('create_limit');
Route::post('/addLimit', [LimitsController::class, 'addLimit'])->name('add_limit');
Route::post('/addLimit', [LimitsController::class, 'deleteLimit'])->name('delete_limit');
Route::get('/editLimit/{id}', [LimitsController::class, 'editLimitView'])->name('edit_limit');
Route::post('/editLimit/{id}/updateLimit', [LimitsController::class, 'updateLimit'])->name('update_limit');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
