<?php

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

Route::get('/', 'FrontendController@index')->name('index');
Auth::routes();
Route::group(['middleware'=>'role:admin','prefix'=> 'backside', 'as' => 'backside.'],function(){
	Route::resource('/package','PackageController');
	Route::resource('/location','LocationController');
	Route::resource('/hotel','HotelController');
	Route::resource('/transportation','TransportationController');
	Route::resource('/restaurant','RestaurantController');
	Route::resource('/booking','BookingController');
	Route::resource('/nature','NatureController');
	Route::resource('/originalpackage','OriginalPackageController');
	Route::resource('/blog','BlogController');
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('booking','FrontendController@booking')->name('booking');
Route::get('location','FrontendController@location')->name('location');
Route::get('customize','FrontendController@customize')->name('customize');
Route::get('service','FrontendController@service')->name('service');
