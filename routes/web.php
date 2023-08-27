<?php

use App\Http\Controllers\AgencyController;
use App\Http\Controllers\PalleteController;
use App\Http\Controllers\ReceiptsController;
use App\Http\Controllers\SellerController;
use App\Models\Agency;
use App\Models\Seller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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
    Auth::loginUsingId(1);
    return view('welcome');
});

Route::get('/agency', [AgencyController::class, 'index'])->name('agency.index');

Route::get('/agency/send', [AgencyController::class, 'sendSeller'])->name('agency.send');

Route::get('/agency/send/{id}', [AgencyController::class, 'viewDispatch'])->name('send.view');

Route::post('/agency/send/dispatch', [AgencyController::class, 'dispatchSeller'])->name('send.dispatch');

Route::get('/agency/receive/{id}', [AgencyController::class, 'receiveSeller'])->name('agency.receive');

Route::post('/agency/receive/dispatch/{id}', [AgencyController::class, 'receiveDispatch'])->name('receive.dispatch');

Route::get('/agency/receive/dispatch/view/{id}', [AgencyController::class, 'viewReceive'])->name('receive.view');



Route::get('/agency/sellers', [SellerController::class, 'sellers'])->name('agency.sellers');

Route::post('/agency/sellers/create', [SellerController::class, 'sellersCreate'])->name('sellers.create');

Route::put('/agency/sellers/update', [SellerController::class, 'sellersUpdate'])->name('sellers.update');

Route::delete('agency/sellers/delete', [SellerController::class, 'sellersDelete'])->name('sellers.delete');


Route::get('/agency/palletes', [PalleteController::class, 'palletes'])->name('agency.palletes');

Route::post('/agency/pricepallets/update',[PalleteController::class, 'pricesPalletesUpdate'])->name('palletes.update');


Route::get('/agency/receipts/', [ReceiptsController::class, 'view'])->name('receipts.view');
