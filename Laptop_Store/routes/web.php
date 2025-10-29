<?php

use Illuminate\Support\Facades\Route;


Route::get('/home' , 'App\Http\Controllers\Home\homeController@index')->name('home');
Route::get('/about' , 'App\Http\Controllers\Home\homeController@about')->name('home.about');
Route::get('/contact' , 'App\Http\Controllers\Home\ContactController@index')->name('home.contact');
Route::post('/contact/submit' , 'App\Http\Controllers\Home\ContactController@submitForm')->name('contact.submit');
Route::get('product/{id}' , 'App\Http\Controllers\Home\productsController@show')->name('product.show');

Route::get('/admin' , 'App\Http\Controllers\Admin\AdminController@index')->name('admin.dashbroad');
Route::get('/admin/products' , 'App\Http\Controllers\Admin\AdminController@createProducts')->name('admin.products');
Route::post('/admin/product/store' , 'App\Http\Controllers\Admin\AdminController@store')->name('admin.product.store');
Route::delete('/admin/product/delete/{id}' , 'App\Http\Controllers\Admin\AdminController@delete')->name('admin.product.delete');
Route::get('/admin/product/edit/{id}', 'App\Http\Controllers\admin\AdminController@edit')->name('admin.product.edit');
Route::put('/admin/product/update/{id}', 'App\Http\Controllers\admin\AdminController@update')->name('admin.product.update');


?>