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

use Illuminate\Support\Facades\Auth;


Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    route::get('/dashboard');
    Route::get('/kamar', 'rawatInapController@select_box')->name('select_kamar');

    Route::get('/', function () {
        return view('home');
    });

    Route::group(['middleware' => ['Admin']], function(){
        Route::get('/dokter', 'DokterController@index')->name('dokter.index');
        Route::post('/dokter/create', 'DokterController@create')->name('dokter.update');
        Route::get('/dokter/{id}/edit', 'DokterController@edit')->name('dokter.edit');
        Route::post('/dokter/{id}/update', 'DokterController@update')->name('dokter.update');
        Route::get('/dokter/{id}/destroy', 'DokterController@destroy')->name('dokter.index');


        Route::get('/perawat', 'PerawatController@index')->name('listPerawat');
        Route::get('/perawat/create', 'PerawatController@create');
        Route::post('/perawat/create','PerawatController@store')->name('createPerawat');
        Route::get('admin/perawat/{id}/edit', 'PerawatController@edit')->name('editPerawat');
        Route::post('admin/perawat/{id}/update', 'PerawatController@update')->name('updatePerawat');
        Route::get('admin/perawat/{id}/destroy', 'PerawatController@destroy')->name('deletePerawat');

    });


    Route::group(['middleware' => ['Dokter']], function(){

        Route::get('/perawat', 'PerawatController@index')->name('listPerawat');
        Route::get('/perawat/create', 'PerawatController@create');
        Route::post('/perawat/create','PerawatController@store')->name('createPerawat');
        Route::get('dokter/perawat/{id}/edit', 'PerawatController@edit')->name('editPerawat');
        Route::post('dokter/perawat/{id}/update', 'PerawatController@update')->name('updatePerawat');
        Route::get('dokter/perawat/{id}/destroy', 'PerawatController@destroy')->name('deletePerawat');



        Route::get('/pasien', 'PasienController@index')->name('listPasien');
        Route::post('/pasien/create', 'PasienController@store')->name('create.pasien');
        Route::get('/pasien/{id}/edit', 'PasienController@edit')->name('pasien.edit');
        Route::post('/pasien/{id}/update', 'PasienController@update')->name('pasien.update');
        Route::get('/pasien/{id}/destroy', 'PasienController@destroy')->name('deletePasien');


    });



    Route::group(['middleware' => ['Perawat']], function(){

        Route::get('/pasien', 'PasienController@index')->name('listPasien');
        Route::post('/pasien/create', 'PasienController@store')->name('create.pasien');
        Route::get('/pasien/{id}/edit', 'PasienController@edit')->name('pasien.edit');
        Route::post('/pasien/{id}/update', 'PasienController@update')->name('pasien.update');
        Route::get('/pasien/{id}/destroy', 'PasienController@destroy')->name('deletePasien');



        Route::get('/status', 'StatusController@index')->name('status.index');
        Route::post('/status/create', 'StatusController@create')->name('status.update');
        Route::get('/status/{id}/edit', 'StatusController@edit')->name('status.edit');
        Route::post('/status/{id}/update', 'StatusController@update')->name('status.update');
        Route::get('/status/{id}/destroy', 'StatusController@destroy')->name('status.index');

        Route::get('/rawatInap', 'rawatInapController@index')->name('listRawat');
        Route::get('/rawatInap/create', 'rawatInapController@create');
        Route::post('/rawatInap/create', 'rawatInapController@store')->name('createRawat');
        Route::get('/rawatInap/{id}/edit', 'rawatInapController@edit')->name('editRawat');
        Route::post('/rawatInap/{id}/update', 'rawatInapController@update')->name('updateRawat');
        Route::get('/rawatInap/{id}/destroy', 'rawatInapController@destroy')->name('deleteRawat');


    });



    Route::group(['middleware' => ['adminOrDokter']], function(){
        Route::get('/perawat', 'PerawatController@index')->name('listPerawat');
        Route::get('/perawat/create', 'PerawatController@create');
        Route::post('/perawat/create','PerawatController@store')->name('createPerawat');
        Route::get('/perawat/{id}/edit', 'PerawatController@edit')->name('editPerawat');
        Route::post('/perawat/{id}/update', 'PerawatController@update')->name('updatePerawat');
        Route::get('/perawat/{id}/destroy', 'PerawatController@destroy')->name('deletePerawat');


        Route::get('/pasien', 'PasienController@index')->name('listPasien');
        Route::post('/pasien/create', 'PasienController@store')->name('create.pasien');
        Route::get('/pasien/{id}/edit', 'PasienController@edit')->name('pasien.edit');
        Route::post('/pasien/{id}/update', 'PasienController@update')->name('pasien.update');
        Route::get('/pasien/{id}/destroy', 'PasienController@destroy')->name('deletePasien');





    });



    Route::group(['middleware' => ['dokterOrPerawat']], function(){

        Route::get('/pasien', 'PasienController@index')->name('listPasien');
        Route::post('/pasien/create', 'PasienController@store')->name('create.pasien');
        Route::get('/pasien/{id}/edit', 'PasienController@edit')->name('pasien.edit');
        Route::post('/pasien/{id}/update', 'PasienController@update')->name('pasien.update');
        Route::get('/pasien/{id}/destroy', 'PasienController@destroy')->name('deletePasien');




        Route::get('/riwayatPasien', 'riwayatPasienController@index')->name('listRiwayat');
        Route::get('/riwayatPasien/create', 'riwayatPasienController@create');
        Route::post('/riwayatPasien/create', 'riwayatPasienController@store')->name('createRiwayat');
        Route::get('/riwayatPasien/{id}/edit', 'riwayatPasienController@edit')->name('ditRiwayat');
        Route::post('/riwayatPasien/{id}/update', 'riwayatPasienController@update')->name('updateRiwayat');
        Route::get('/riwayatPasien/{id}/destroy', 'riwayatPasienController@destroy')->name('deleteRiwayat');


        Route::get('/status', 'StatusController@index')->name('status.index');
        Route::post('/status/create', 'StatusController@create')->name('status.update');
        Route::get('/status/{id}/edit', 'StatusController@edit')->name('status.edit');
        Route::post('/status/{id}/update', 'StatusController@update')->name('status.update');
        Route::get('/status/{id}/destroy', 'StatusController@destroy')->name('status.index');


        Route::get('/rawatInap', 'rawatInapController@index')->name('listRawat');
        Route::get('/rawatInap/create', 'rawatInapController@create');
        Route::post('/rawatInap/create', 'rawatInapController@store')->name('createRawat');
        Route::get('/rawatInap/{id}/edit', 'rawatInapController@edit')->name('editRawat');
        Route::post('/rawatInap/{id}/update', 'rawatInapController@update')->name('updateRawat');
        Route::get('/rawatInap/{id}/destroy', 'rawatInapController@destroy')->name('deleteRawat');

    });








});
