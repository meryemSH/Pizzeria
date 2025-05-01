<?php

use App\Http\Controllers\SquarePaymentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\SchoolPartnershipController;
use App\Http\Livewire\Checkout;

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


Route::get('/', [HomeController::class, 'index']);


Route::view('/aboutUs', 'Aprops.aboutUs')->name('about');

Route::get('/faq', [FaqController::class, 'index'])->name('faq');

Route::get('/online-ordering', [WorkshopController::class, 'enligne'])->name('workshop-enligne');

Route::get('/atelier-horsligne', [WorkshopController::class, 'offline'])->name('workshop-horsligne');

Route::get('/atelier-enligne/{slug}', [WorkshopController::class, 'enligneShow'])->name('workshop-detail-enligne');
Route::get('/atelier-horsligne/{slug}', [WorkshopController::class, 'offlineShow'])->name('workshop-detail-offline');


Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/blog/{slug}', [BlogController::class, 'show'])->name('blog-detail');
Route::get('/Offre-parascolaire', [ SchoolPartnershipController::class, 'index'])->name('nos-partenaire');
// Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout');

Route::middleware(['auth'])->group(function (){
    Route::post('charge', [\App\Http\Controllers\PaymentController::class, 'charge'])->name('payment.charge');
    Route::get('success', [\App\Http\Controllers\PaymentController::class, 'success'])->name('payment.success');
    Route::get('error', [\App\Http\Controllers\PaymentController::class, 'error'])->name('payment.error');
});

// Route::get('/contact', [cantactForm::class, 'index'])->name('contact');
Route::get('/checkout', [CheckoutController::class, 'showCheckoutPage'])->name('checkout');

// Traitement du paiement via Square
// Route::post('/payment/charge', [CheckoutController::class, 'charge'])->name('payment.charge');
// Artisan commands
require_once __DIR__ . '/artisan.php';
