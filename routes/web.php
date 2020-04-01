<?php

use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


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
    return view('menu-web.home_web');
});

Auth::routes();


// Start Routing Web
    // Route::resource('user', 'UserController');

    Route::get('/home-web', 'WebController@index')->name('home-web');
    
    // Start Dashboard Siswa

    Route::group(['middleware' => ['logoutdbsiswa']], function () {
        // Start Menu Pendaftaran
        Route::get('/create-pendaftaran', 'WebController@create_pendaftaran')->name('create-pendaftaran');
        Route::post('/pendaftaran-store', 'WebController@pendaftaran_store')->name('pendaftaran-store');

        Route::get('/create-data-ayah/{enter_code}', 'WebController@create_data_ayah')->name('create-data-ayah');
        Route::post('/data-ayah-store', 'WebController@data_ayah_store')->name('data-ayah-store');


        Route::get('/create-data-ibu/{enter_code}', 'WebController@create_data_ibu')->name('create-data-ibu');
        Route::post('/data-ibu-store', 'WebController@data_ibu_store')->name('data-ibu-store');
        

        Route::get('/create-data-wali/{enter_code}', 'WebController@create_data_wali')->name('create-data-wali');
        Route::post('/data-wali-store', 'WebController@data_wali_store')->name('data-wali-store');


        // Route::get('/create-data-nilai/{enter_code}', 'WebController@create_data_nilai')->name('create-data-nilai');
        // Route::post('/data-nilai-store', 'WebController@data_nilai_store')->name('data-nilai-store');


        Route::get('/laman-confirm/{enter_code}', 'WebController@laman_confirm')->name('laman-confirm');
        Route::post('/laman-store', 'WebController@laman_store')->name('laman-store');

        Route::post('/laman-login-cs', 'WebController@laman_login_cs')->name('laman-login-cs');
        // End Menu Pendaftaran

         // Start Menu Hasil Seleksi
        Route::get('/hasil-seleksi', 'WebController@hasil_seleksi')->name('hasil-seleksi');
        // End Routing Web

    });

    Route::group(['middleware' => ['firewalldbsiswa']], function () {

        Route::get('/home-db-siswa', 'DashboardSiswaController@index')->name('home-db-siswa');

        // Update Datadiri
        Route::get('/datadiri-db-siswa', 'DashboardSiswaController@datadiri_db_siswa')->name('datadiri-db-siswa');
        Route::put('/update-datadiri-db-siswa/{enter_code}', 'DashboardSiswaController@update_datadiri_db_siswa')->name('update-datadiri-db-siswa');

        // Update Data Oranftua & Wali
        Route::get('/data-db-orangtua-wali', 'DashboardSiswaController@data_db_orangtua_wali')->name('data-db-orangtua-wali');
        Route::put('/update-db-orangtua-ayah/{id}', 'DashboardSiswaController@update_db_orangtua_ayah')->name('update-db-orangtua-ayah');
        Route::put('/update-db-orangtua-ibu/{id}', 'DashboardSiswaController@update_db_orangtua_ibu')->name('update-db-orangtua-ibu');
        Route::put('/update-db-orangtua-wali/{id}', 'DashboardSiswaController@update_db_orangtua_wali')->name('update-db-orangtua-wali');

        // Dowanload pdf formulir siswa
        Route::get('/download-formulir-db-siswa/{enter_code}', 'DashboardSiswaController@download_formulir_db_siswa')->name('download-formulir-db-siswa');


        // 
        Route::get('/upload-data-nilai', 'DashboardSiswaController@upload_data_nilai')->name('upload-data-nilai');
        Route::post('/upload-data-nilai-store', 'DashboardSiswaController@upload_data_nilai_store')->name('upload-data-nilai-store');

        // logout dashboard
        Route::get('/logout-db-siswa', 'DashboardSiswaController@logout_db_siswa')->name('logout-db-siswa');
        // End Dashboard Siswa

    });
    

    // START Routing Dashboard Admin
    Route::get('/home', 'HomeController@index')->name('home');
    
    Route::resource('user', 'UserController');
    Route::get('user/delete/{id}',"UserController@destroy")->name("user.destroy");



    // End Routing Dashboard Admin