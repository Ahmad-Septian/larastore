<?php

use Illuminate\Support\Facades\Auth;
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

route::get('/', 'HomeController@index')->name('home');

Auth::routes(['verify'=>true]);


// Admin
Route::prefix('admin')
    ->namespace('Admin')
    ->middleware('auth','admin' )
    ->group(function(){
        Route::get('/', 'DashboardController@index')
        ->name('dashboard');

        // Profile
          // Route Profile Admin
          Route::get('/profile/{id}', 'ProfileController@profile')->name('profile-index');
          Route::get('/edit/user/', 'ProfileController@edit')->name('profile-edit');
          Route::post('/edit/user/{id}', 'ProfileController@update')->name('profile-update');

        // Photo 
        // Route Avatar
        Route::get('/edit/user/{id}', 'PhotoController@photo')->name('profile-photo');
        Route::post('/edit/user/', 'PhotoController@update_photo')->name('update-photo');


        // Product
        Route::get('/product', 'ProductController@index')->name('product');
        Route::get('/product/create', 'ProductController@create')->name('product-create');
        Route::post('/product', 'ProductController@store')->name('product-store');
        Route::get('/product/edit/{id}', 'ProductController@edit')->name('product-edit');
        Route::patch('product/update/{id}', 'ProductController@update')->name('product-update');
        Route::delete('product/delete{id}', 'ProductController@destroy')->name('product-destroy');

        // Pesanan
        Route::get('/pesanan', 'PesananController@index')->name('pesanan');
        Route::post('/pesanan/search', 'PesananController@search')->name('pesanan-search');
        Route::get('/pesanan{id}', 'PesananController@show')->name('pesanan-show');
        Route::get('/pesanan/edit/{id}', 'PesananController@edit')->name('pesanan-edit');
        Route::patch('/pesanan/update/{id}', 'PesananController@update')->name('pesanan-update');
        Route::delete('/pesanan/delete/{id}', 'PesananController@destroy')->name('pesanan-destroy');


        // Kategori
        Route::get('/kategori', 'KategoriController@index')->name('kategori');
        Route::get('/kategori/create', 'KategoriController@create')->name('kategori-create');
        Route::post('/kategori', 'KategoriController@store')->name('kategori-store');
        Route::get('/kategori/edit/{id}', 'KategoriController@edit')->name('kategori-edit');
        Route::patch('/kategori/update/{id}', 'KategoriController@update')->name('kategori-update');
        Route::delete('/kategori/delete/{id}', 'KategoriController@destroy')->name('kategori-destroy');
    });


