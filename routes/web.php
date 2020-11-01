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
    return redirect('login');
});
Route::post('user/store2','userController@store2')->name('user.store2');
    Route::get('transaksi/manual','transaksiController@manual')->name('transaksi.manual');
//Admin
Route::group(['middleware' => ['auth'],['admin']], function () {
    Route::get('user','userController@index')->name('user.index');
    Route::get('user/create','userController@create')->name('user.create');
    Route::post('user/store','userController@store')->name('user.store');
    Route::post('user/destroy/{id}','userController@destroy')->name('user.destroy');
    Route::get('user/edit/{id}','userController@edit')->name('user.edit');
    Route::post('user/update/{id}','userController@update')->name('user.update');
    //==============================================================================================
    Route::get('masakan','masakanController@index')->name('masakan.index');
    Route::get('masakan/create','masakanController@create')->name('masakan.create');
    Route::post('masakan/store','masakanController@store')->name('masakan.store');
    Route::post('masakan/destroy/{id}','masakanController@destroy')->name('masakan.destroy');
    Route::get('masakan/edit/{id}','masakanController@edit')->name('masakan.edit');
    Route::post('masakan/update/{id}','masakanController@update')->name('masakan.update');
    //==============================================================================================
    Route::get('meja','mejaController@index')->name('meja.index');
    Route::get('meja/create','mejaController@create')->name('meja.create');
    Route::post('meja/store','mejaController@store')->name('meja.store');
    Route::post('meja/destroy/{id}','mejaController@destroy')->name('meja.destroy');
    Route::get('meja/edit/{id}','mejaController@edit')->name('meja.edit');
    Route::post('meja/update/{id}','mejaController@update')->name('meja.update');
    //==============================================================================================
    Route::get('order','orderController@index')->name('order.index');
    Route::get('order/create','orderController@create')->name('order.create');
    Route::post('order/store','orderController@store')->name('order.store');
    Route::post('order/destroy/{id}','orderController@destroy')->name('order.destroy');
    Route::get('order/edit/{id}','orderController@edit')->name('order.edit');
    Route::post('order/update/{id}','orderController@update')->name('order.update');
    //==============================================================================================
    Route::get('detail/{id}','detailController@index')->name('detail.index');
    Route::post('detail/store/{id}','detailController@store')->name('detail.store');
    Route::post('detail/destroy/{id}','detailController@destroy')->name('detail.destroy');
    Route::post('detail/update/{id}/{id_order}','detailController@update')->name('detail.update');
    //==============================================================================================
    Route::get('transaksi','transaksiController@index')->name('transaksi.index');
    Route::post('transaksi/store','transaksiController@store')->name('transaksi.store');
    Route::post('transaksi/destroy/{id}','transaksiController@destroy')->name('transaksi.destroy');
    Route::get('transaksi/create/{id}','transaksiController@create')->name('transaksi.create');
    Route::post('transaksi/print/{id}','transaksiController@print')->name('transaksi.print');
    Route::get('transaksi/manual','transaksiController@manual')->name('transaksi.manual');
    Route::get('transaksi/laporan','transaksiController@laporan')->name('transaksi.laporan');
});


Route::group(['middleware' => ['auth'],['waiter']], function () {
    Route::get('user','userController@index')->name('user.index');
    Route::get('user/create','userController@create')->name('user.create');
    Route::post('user/store','userController@store')->name('user.store');
    Route::post('user/destroy/{id}','userController@destroy')->name('user.destroy');
    Route::get('user/edit/{id}','userController@edit')->name('user.edit');
    Route::post('user/update/{id}','userController@update')->name('user.update');
    //==============================================================================================
    Route::get('order','orderController@index')->name('order.index');
    Route::get('order/create','orderController@create')->name('order.create');
    Route::post('order/store','orderController@store')->name('order.store');
    Route::post('order/destroy/{id}','orderController@destroy')->name('order.destroy');
    Route::get('order/edit/{id}','orderController@edit')->name('order.edit');
    Route::post('order/update/{id}','orderController@update')->name('order.update');
    //==============================================================================================
    Route::get('detail/{id}','detailController@index')->name('detail.index');
    Route::post('detail/store/{id}','detailController@store')->name('detail.store');
    Route::post('detail/destroy/{id}','detailController@destroy')->name('detail.destroy');
    //==============================================================================================
    Route::get('transaksi','transaksiController@index')->name('transaksi.index');
    Route::post('transaksi/destroy/{id}','transaksiController@destroy')->name('transaksi.destroy');
    Route::post('transaksi/print/{id}','transaksiController@print')->name('transaksi.print');
    Route::get('transaksi/manual','transaksiController@manual')->name('transaksi.manual');
    Route::get('transaksi/laporan','transaksiController@laporan')->name('transaksi.laporan');
});
Route::group(['middleware' => ['auth'],['kasir']], function () {
    Route::get('user','userController@index')->name('user.index');
    Route::get('user/create','userController@create')->name('user.create');
    Route::post('user/store','userController@store')->name('user.store');
    Route::post('user/destroy/{id}','userController@destroy')->name('user.destroy');
    Route::get('user/edit/{id}','userController@edit')->name('user.edit');
    Route::post('user/update/{id}','userController@update')->name('user.update');;
    //==============================================================================================
    Route::get('transaksi','transaksiController@index')->name('transaksi.index');
    Route::post('transaksi/store','transaksiController@store')->name('transaksi.store');
    Route::post('transaksi/destroy/{id}','transaksiController@destroy')->name('transaksi.destroy');
    Route::get('transaksi/create/{id}','transaksiController@create')->name('transaksi.create');
    Route::post('transaksi/print/{id}','transaksiController@print')->name('transaksi.print');
    Route::get('transaksi/manual','transaksiController@manual')->name('transaksi.manual');
    Route::get('transaksi/laporan','transaksiController@laporan')->name('transaksi.laporan');
});
Route::group(['middleware' => ['auth'],['owner']], function () {
    Route::get('transaksi','transaksiController@index')->name('transaksi.index');
    Route::post('transaksi/destroy/{id}','transaksiController@destroy')->name('transaksi.destroy');
    Route::post('transaksi/print/{id}','transaksiController@print')->name('transaksi.print');
    Route::get('transaksi/manual','transaksiController@manual')->name('transaksi.manual');
    Route::get('transaksi/laporan','transaksiController@laporan')->name('transaksi.laporan');
});
Route::group(['middleware' => ['auth'],['pelanggan']], function () {
    //==============================================================================================
    Route::get('order/{id}','orderController@index2')->name('order.index2');
    Route::get('order/create/{id}','orderController@create')->name('order.create');
    Route::post('order/store/{id}','orderController@store2')->name('order.store2');
    Route::post('order/destroy/{id}/{id_user}','orderController@destroy2')->name('order.destroy');
    Route::get('order/edit/{id}','orderController@edit')->name('order.edit');
    Route::post('order/update/{id}/{id_user}','orderController@update2')->name('order.update2');
    //==============================================================================================
    Route::get('detail/{id}','detailController@index')->name('detail.index');
    Route::post('detail/store/{id}','detailController@store')->name('detail.store');
    Route::post('detail/destroy/{id}','detailController@destroy')->name('detail.destroy');
    Route::get('transaksi/manual','transaksiController@manual')->name('transaksi.manual');

});
    //    Route::get('/link1', function ()    {
//        // Uses Auth Middleware
//    });

    //Please do not remove this if you want adminlte:route and adminlte:link commands to works correctly.
    #adminlte_routes
