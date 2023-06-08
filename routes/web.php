<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BidangKeahlianController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SurveyController;
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


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'viewProfile'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'viewProfileEdit'])->name('profile.edit');
    Route::get('/profile/edit-password', [ProfileController::class, 'viewPasswordEdit']);
    Route::post('/profile/edit-password', [ProfileController::class, 'passwordEdit']);
    Route::post('/profile/edit', [ProfileController::class, 'profileEdit']);
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/', function () {
        return redirect('/dashboard');
    });
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/user/detail/{id}', [ProfileController::class, 'viewDetail']);
    Route::get('/isi-saldo', [ProfileController::class, 'isiSaldoView']);
    Route::post('/isi-saldo', [ProfileController::class, 'isiSaldo']);

    Route::post('/order/detail', [OrderController::class, 'changeDetail']);
    Route::get('/list-customer', [OrderController::class, 'viewCustomer']);

    Route::get('/user/order/{id}', [OrderController::class, 'viewOrder']);
    Route::get('/order/detail/{id}', [OrderController::class, 'viewOrderDetail']);
    Route::get('/order/customer/{id}', [OrderController::class, 'viewOrderDetailCustomer']);
    Route::post('/user/order', [OrderController::class, 'createOrder']);
    Route::get('/history', [OrderController::class, 'showHistory']);

    
    Route::get('/survey/{id}', function($id){
        return view('survey',[
            'mode' => $id
        ]);
    });
    Route::get('/permintaan-responden', [SurveyController::class, 'read']);
    Route::get('/permintaan-responden/{id}', [SurveyController::class, 'readDetail']);
    Route::post('/permintaan-responden', [SurveyController::class, 'changeState']);
    Route::post('/survey/create', [SurveyController::class, 'create']);
    
    Route::get('/dashboard/analisis-data', [BidangKeahlianController::class, 'read'])->name('profile.destroy');
    Route::get('/dashboard/analisis-data/{keahlian}', [BidangKeahlianController::class, 'readKeahlian'])->name('profile.destroy');
    
    Route::get('/dashboard/konsultasi-statistika', function () {
        return view('konsultasi-statistika');
    });
    Route::get('/dashboard/konsultasi-statistika/{id}', [ProfileController::class, 'konsultasi']);

    

    Route::get('/dashboard/survey', function () {
        return view('survey');
    });

    Route::get('/dashboard/detail', function () {
        return view('detail');
    });

    Route::get('/dashboard/form', function () {
        return view('form');
    });

});

require __DIR__.'/auth.php';
