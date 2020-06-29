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

Route::get('/', 'DokumenController@Dashboard');

Route::get('/admin','DokumenController@Dashboard');
Route::get('/Dokumen/create','DokumenController@create') ->name('Dokumen.create');
Route::post('/Dokumen/','DokumenController@store') ->name('Dokumen.store');
Route::put('/Dokumen/update/{id_dokumen}','DokumenController@update') ->name('Dokumen.update');
Route::get('/Dokumen/edit/{id_dokumen}','DokumenController@edit') ->name('Dokumen.edit');
Route::post('/Dokumen/delete/{id_dokumen}','DokumenController@destroy') ->name('Dokumen.destroy');


//pelanggan
Route::get('/pelanggan', 'PelangganController@Dashboard');
Route::get('/Pelanggan/create', 'PelangganController@create')->name('Pelanggan.create');
Route::post('/Pelanggan/', 'PelangganController@store')->name('Pelanggan.store');
Route::put('/Pelanggan/update/{id}', 'PelangganController@update')->name('Pelanggan.update');
Route::get('/Pelanggan/edit/{id}', 'PelangganController@edit')->name('Pelanggan.edit');
Route::post('/Pelanggan/delete/{id_pelanggan}', 'PelangganController@destroy')->name('Pelanggan.destroy');


//petugas
Route::get('/petugas', 'PetugasController@Dashboard');
Route::get('/Petugas/create', 'PetugasController@create')->name('Petugas.create');
Route::post('/Petugas/', 'PetugasController@store')->name('Petugas.store');
Route::put('/Petugas/update/{id}', 'PetugasController@update')->name('Petugas.update');
Route::get('/Petugas/edit/{id}', 'PetugasController@edit')->name('Petugas.edit');
Route::post('/Petugas/delete/{id_petugas}', 'PetugasController@destroy')->name('Petugas.destroy');

//petugas
Route::get('/pembayaran', 'PembayaranController@Dashboard');
Route::get('/Pembayaran/create', 'PembayaranController@create')->name('Pembayaran.create');
Route::post('/Pembayaran/', 'PembayaranController@store')->name('Pembayaran.store');
Route::put('/Pembayaran/update/{id}', 'PembayaranController@update')->name('Pembayaran.update');
Route::get('/Pembayaran/edit/{id}', 'PembayaranController@edit')->name('Pembayaran.edit');
Route::post('/Pembayaran/delete/{id_pembayaran}','PembayaranController@destroy') ->name('Pembayaran.destroy');


//jika menekan logout akan redirect ke login
Route::get('/logout', function () {
    Auth::logout();
    return Redirect::to('login');
});

//jika di url adalah / , maka akan diarahkan ke login jika user belum melakukan login
Route::get('/', function () {
    if (!Auth::user()) {
        return Redirect::to('login');
    }

});

Auth::routes();

Route::get('/home', 'DokumenController@Dashboard')->name('home');


//untuk role pengguna
Route::get('/dashboard', 'homePenggunaController@Dashboard');
// Route::get('/dashboard/Dokumen/createNew', 'homePenggunaController@create')->name('Dokumen.createNew');
// Route::post('/dashboard/Dokumen/', 'homePenggunaController@store')->name('Dokumen.storeNew');
