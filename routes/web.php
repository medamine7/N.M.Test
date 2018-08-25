<?php

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
})->name('welcome')->middleware("guest");

// Authentication Routes...
Route::post('login', 'Auth\LoginController@login')->name("login");


Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::post('register', 'Auth\RegisterController@register')->name('register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

Route::get('/nearbyshops', function(){
	return view('nearbyShops');
})->name('nearbyShops')->middleware('auth');



//overriding laravel's default login route
Route::get('/login', function(){
	return redirect('/');
});




Route::get('/preferredshops', function(){
	return view('preferredShops');
})->name('preferredShops')->middleware('auth');





//API routes, supposed to go on  api.php and be secured with JWT or Passport but for the sake of the test let's just keep them here

Route::get('/getnearbyshops', 'ShopsController@getNearbyShops');
Route::get('/getpreferredshops', 'ShopsController@getPreferredShops');
Route::post('/shop/like/{shop_id}','ShopsController@likeShop');
Route::post('/shop/dislike/{shop_id}','ShopsController@dislikeShop');
Route::post('/shop/unlike/{shop_id}','ShopsController@unlikeShop');


