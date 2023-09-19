<?php

use Illuminate\Support\Facades\Route;

Route::name('admin.')->prefix('admin')->group(function(){
Route::get('/', 'Front\DashboardController@index')->name('dashboard');

});
