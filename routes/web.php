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
    return view('umum/welcome');
});

Route::get('/product', 'Master\productController@index')->name('product');

Auth::routes();


//Login
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/postlogin', 'Auth\LoginController@postlogin');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {


    Route::get('/admin', function () {
        return view('/admin/menuawal');
    })->name('admin');

    Route::get('/produk', function () {
        return view('/admin/master/dataproduk');
    })->name('produk');

    Route::get('/user', function () {
        return view('/admin/master/datauser');
    })->name('user');

    Route::get('/customer', function () {
        return view('/admin/master/datacustomer');
    })->name('customer');

    Route::get('/sales', function () {
        return view('/admin/master/datasales');
    })->name('sales');

    Route::get('/kategori', function () {
        return view('/admin/master/datakategori');
    })->name('kategori');

    Route::get('/penjualan', function () {
        return view('/admin/transaksi/datapenjualan');
    })->name('penjualan');

    Route::get('/tambahpenjualan', function () {
        return view('/admin/transaksi/tambahpenjualan');
    })->name('tambahpenjualan');



});

Route::get('/home', 'HomeController@index')->name('home');
