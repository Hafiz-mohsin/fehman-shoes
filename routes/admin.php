<?php

use Illuminate\Support\Facades\Route;

Route::name('admin.')->prefix('admin')->group(function(){
    Route::get('/', 'Admin\DashboardController@index')->name('dashboard');
    Route::resource('blog', 'Admin\BlogController');
    Route::resource('category', 'Admin\CategoryController');
    Route::resource('sub_category', 'Admin\SubCategoryController');
    Route::resource('brand', 'Admin\BrandController');
    Route::resource('faq', 'Admin\FaqController');
    Route::resource('product', 'Admin\ProductController');

});
