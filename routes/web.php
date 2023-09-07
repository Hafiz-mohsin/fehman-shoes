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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::name('front.')->group(function(){
Route::get('/', 'Front\HomeController@index')->name('home');
Route::get('product', 'Front\ProductController@index')->name('product');
Route::get('category', 'Front\CategoryController@index')->name('category');
Route::get('shop', 'Front\ShopController@index')->name('shop');
Route::get('blog', 'Front\BlogController@index')->name('blog');
Route::get('about', 'Front\AboutController@index')->name('about');
Route::get('contact', 'Front\ContactController@index')->name('contact');
Route::get('wishlist', 'Front\WishlistController@index')->name('wishlist');
Route::get('login', 'Front\LoginController@index')->name('login');
Route::get('dashboard', 'Front\DashboardController@index')->name('dashsboard');

});
