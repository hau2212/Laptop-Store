<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminAuthMiddleware;

Route::get('/home' , 'App\Http\Controllers\Home\HomeController@index')->name('home.main');
Route::get('/about' , 'App\Http\Controllers\Home\HomeController@about')->name('home.about');
Route::get('/contact' , 'App\Http\Controllers\Home\ContactController@index')->name('home.contact');
Route::post('/contact/submit' , 'App\Http\Controllers\Home\ContactController@submitForm')->name('contact.submit');
Route::get('product/{id}' , 'App\Http\Controllers\Home\productsController@show')->name('product.show');

Route::middleware(['admin'])->group(function () {
Route::get('/admin' , 'App\Http\Controllers\Admin\AdminController@index')->name('admin.dashbroad');
Route::get('/admin/products' , 'App\Http\Controllers\Admin\AdminController@createProducts')->name('admin.products');
Route::post('/admin/product/store' , 'App\Http\Controllers\Admin\AdminController@store')->name('admin.product.store');
Route::delete('/admin/product/delete/{id}' , 'App\Http\Controllers\Admin\AdminController@delete')->name('admin.product.delete');


Route::get('/admin/product/edit/{id}', 'App\Http\Controllers\admin\AdminController@edit')->name('admin.product.edit');
Route::put('/admin/product/update/{id}', 'App\Http\Controllers\admin\AdminController@update')->name('admin.product.update');
});

Auth::routes();
