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

    Route::group(['prefix' => 'admin', 'middleware' => 'hakakses:pimpinan|admin'], function () {

        Route::get('/', function () {
            return view('/admin/menuawal');
        })->name('admin');

        Route::group(['prefix' => 'user'], function () {
            Route::get('/', 'Master\userController@index')->name('pageuser');
            Route::get('/dataUser', 'Master\userController@getDataUser');
            Route::post('/simpanUser', 'Master\userController@addUser');
            Route::post('/editUser', 'Master\userController@editUser');
            Route::post('/editPassword', 'Master\userController@editPassword');
            Route::delete('/deleteUser', 'Master\userController@delete');
        });

        Route::group(['prefix' => 'satuan'], function () {
            Route::get('/', 'Master\satuanController@index')->name('pagesatuan');
            Route::get('/dataSatuan', 'Master\satuanController@getDataSatuan');
            Route::post('/simpanSatuan', 'Master\satuanController@insert');
            Route::post('/editSatuan', 'Master\satuanController@edit');
            Route::delete('/deleteSatuan', 'Master\satuanController@delete');
        });

        Route::group(['prefix' => 'kategori'], function () {
            Route::get('/', 'Master\kategoriController@index')->name('pagekategori');
            Route::get('/dataKategori', 'Master\kategoriController@getDatakategori');
            Route::post('/simpankategori', 'Master\kategoriController@insert');
            Route::post('/editkategori', 'Master\kategoriController@edit');
            Route::delete('/deletekategori', 'Master\kategoriController@delete');
        });

        Route::group(['prefix' => 'sales'], function () {
            Route::get('/', 'Master\salesController@index')->name('pagesales');
            Route::get('/dataSales', 'Master\salesController@getDatakategori');
            Route::post( '/simpanSales', 'Master\salesController@insert');
            Route::post( '/editSales', 'Master\salesController@edit');
            Route::delete( '/deleteSales', 'Master\salesController@delete');
        });

        Route::group(['prefix' => 'customer'], function () {
            Route::get('/', 'Master\customerController@index')->name('pagecustomer');
            Route::get('/dataCustomer', 'Master\customerController@getDataCustomer');
            Route::post('/simpanCustomer', 'Master\customerController@insert');
            Route::post('/editCustomer', 'Master\customerController@edit');
            Route::delete('/deleteCustomer', 'Master\customerController@delete');
        });

        Route::group(['prefix' => 'product'], function () {
            Route::get('/', 'Master\productController@masterProduct')->name('pageproduct');
            Route::get('/dataSatuan', 'Master\productController@getDataSatuan');
            Route::get('/dataKategori', 'Master\productController@getDatakategori');
            Route::get('/getDataProduct', 'Master\productController@getDataproduct');
            Route::post('/simpanDataProduct', 'Master\productController@insert');
            Route::post('/editProduct', 'Master\productController@edit');
            Route::post('/editPromo', 'Master\productController@editpromo');
            Route::delete('/deleteProduct', 'Master\productController@delete');
        });

        Route::get('/penjualan', function () {
            return view('/admin/transaksi/datapenjualan');
        })->name('penjualan');

        Route::get('/tambahpenjualan', function () {
            return view('/admin/transaksi/tambahpenjualan');
        })->name('tambahpenjualan');
    });

    



});
