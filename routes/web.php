<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuctionController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\DashboardController;
use App\View\Components\FrontendLayout;

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

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/auction-on', [FrontendController::class, 'auctionOn'])->name('auction-on');
Route::get('/auction-end', [FrontendController::class, 'auctionEnd'])->name('auction-end');
Route::get('/auction/{id}', [FrontendController::class, 'detail'])->name('detail');

Route::middleware('auth')->group(function() {
    Route::post('/auction/{id}', [FrontendController::class, 'bid']);
    Route::delete('/auction/{id}', [FrontendController::class, 'cancel_bid'])->name('cancel_bid');
    Route::resource('histories', HistoryController::class);
    Route::get('/cetak-bukti/{id}', [FrontendController::class, 'cetakBukti'])->name('cetak-bukti');

    // Profile
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::group([
        'prefix' => 'dashboard',
        'middleware' => 'level:staff'
    ], function(){
        Route::get('/', [DashboardController::class, 'index'])->name('admin');
        Route::resource('items', ItemController::class);
        Route::resource('auctions', AuctionController::class);
        Route::post('/auctions/closeOpen/{id}', [AuctionController::class, 'closeOpen'])->name('close-open');
        Route::get('/print-all-auctions', [AuctionController::class, 'printAllAuctions'])->name('print-all-auctions');
        Route::get('/print-per-auction/{id}', [AuctionController::class, 'printPerAuction'])->name('print-per-auction');
        Route::delete('/auctions/history/{id}', [AuctionController::class, 'deleteHistory'])->name('auctions.deleteHistory');

        // Admin
        Route::resource('users', UserController::class)->middleware('level:admin');
    });
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
