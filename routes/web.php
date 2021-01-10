<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

//Route front end
Route::get('/', 'HomeController@index')->name('home');

Route::get('detail/{slug}', 'DetailController@index')->name('detail');

// Route::get('checkout', 'CheckoutController@index')
// ->name('checkout');

// Route::get('checkout/success', 'CheckoutController@success')
// ->name('checkout-success');
Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::post('checkout/{id}', 'CheckoutController@process')
    ->name('checkout_process');

    Route::get('checkout/{id}', 'CheckoutController@index')
    ->name('checkout');

    Route::post('checkout/create/{detail_id}', 'CheckoutController@create')
    ->name('checkout_create');

    Route::get('checkout/remove/{detail_id}', 'CheckoutController@remove')
    ->name('checkout_remove');

    Route::get('checkout/confirm/{id}', 'CheckoutController@success')
    ->name('checkout_success');
});

//Route /admin/xxxx
Route::prefix('admin')->namespace('Admin')
->middleware(['auth', 'admin'])
->group(function(){
    Route::get('/', 'DashboardController@index')
    ->name('dashboard');

    Route::resource('travel-package', 'TravelPackageController');
    Route::resource('gallery', 'GalleryController');
    Route::resource('transaction', 'TransactionController');
});

Auth::routes(['verify' => true]);

//Midtrans
Route::post('/midtrans/callback', 'MidtransController@notificationHandler');
Route::get('/midtrans/finish', 'MidtransController@finishRedirect');
Route::get('/midtrans/unfinish', 'MidtransController@unfinishRedirect');
Route::get('/midtrans/error', 'MidtransController@errorRedirect');


