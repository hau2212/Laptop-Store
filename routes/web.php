<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\AdminAuthMiddleware;

Route::get('/home' , 'App\Http\Controllers\Home\HomeController@index')->name('home.main');
Route::get('/about' , 'App\Http\Controllers\Home\HomeController@about')->name('home.about');
Route::get('/contact' , 'App\Http\Controllers\Home\ContactController@index')->name('home.contact');
Route::post('/contact/submit' , 'App\Http\Controllers\Home\ContactController@submitForm')->name('contact.submit');
Route::get('product/{id}' , 'App\Http\Controllers\Home\productsController@show')->name('product.show');

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");

Route::middleware(['auth'])->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
});

Route::middleware(['admin'])->group(function () {
    Route::get('/admin' , 'App\Http\Controllers\Admin\AdminController@index')->name('admin.dashbroad');
    Route::get('/admin/products' , 'App\Http\Controllers\Admin\AdminController@createProducts')->name('admin.products');
    Route::post('/admin/product/store' , 'App\Http\Controllers\Admin\AdminController@store')->name('admin.product.store');
    Route::delete('/admin/product/delete/{id}' , 'App\Http\Controllers\Admin\AdminController@delete')->name('admin.product.delete');
    Route::get('/admin/products/edit/{id}', 'App\Http\Controllers\admin\AdminController@edit')->name('admin.product.edit');
    Route::put('/admin/products/update/{id}', 'App\Http\Controllers\admin\AdminController@update')->name('admin.product.update');
    Route::get('/admin/users', 'App\Http\Controllers\Admin\AdminUsersController@index')->name('admin.users');
});

Route::prefix('admin/users')->name('admin.users.')->group(function () {
    Route::get('/', 'App\Http\Controllers\Admin\AdminUsersController@index')->name('index');
    Route::get('/create','App\Http\Controllers\Admin\AdminUsersController@create')->name('create');
    Route::post('/', 'App\Http\Controllers\Admin\AdminUsersController@store')->name('store');
    Route::get('/{id}/edit', 'App\Http\Controllers\Admin\AdminUsersController@edit')->name('edit');
    Route::put('/{id}', 'App\Http\Controllers\Admin\AdminUsersController@update')->name('update');
    Route::delete('/{id}/destroy', 'App\Http\Controllers\Admin\AdminUsersController@destroy')->name('destroy');
    Route::patch('/{id}/toggle', 'App\Http\Controllers\Admin\AdminUsersController@userStatus')->name('userStatus');
});
Auth::routes();
