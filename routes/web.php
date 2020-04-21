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


            // TELAH DI GANTIKAN DENGAN OLEN FORM WIZARD
            // Route::get('/create-data-ayah/{enter_code}', 'WebController@create_data_ayah')->name('create-data-ayah');
            // Route::post('/data-ayah-store', 'WebController@data_ayah_store')->name('data-ayah-store');


            // Route::get('/create-data-ibu/{enter_code}', 'WebController@create_data_ibu')->name('create-data-ibu');
            // Route::post('/data-ibu-store', 'WebController@data_ibu_store')->name('data-ibu-store');
            

            // Route::get('/create-data-wali/{enter_code}', 'WebController@create_data_wali')->name('create-data-wali');
            // Route::post('/data-wali-store', 'WebController@data_wali_store')->name('data-wali-store');


            // Route::get('/create-data-nilai/{enter_code}', 'WebController@create_data_nilai')->name('create-data-nilai');
            // Route::post('/data-nilai-store', 'WebController@data_nilai_store')->name('data-nilai-store');


            Route::get('/laman-confirm/{enter_code}', 'WebController@laman_confirm')->name('laman-confirm');
            Route::post('/laman-store', 'WebController@laman_store')->name('laman-store');

            Route::post('/laman-login-cs', 'WebController@laman_login_cs')->name('laman-login-cs');
        // End Menu Pendaftaran

        // Start Menu Hasil Seleksi
            Route::get('/hasil-seleksi', 'WebController@hasil_seleksi')->name('hasil-seleksi');
        // End Routing Web

        // Start contact us siswa
        Route::get('/contact-us', 'WebController@contact_us')->name('contact-us');
        // End contact us siswa



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

        // Upload Data Nilai Siswa
        Route::get('/upload-data-nilai', 'DashboardSiswaController@upload_data_nilai')->name('upload-data-nilai');
        Route::post('/upload-data-nilai-store', 'DashboardSiswaController@upload_data_nilai_store')->name('upload-data-nilai-store');

        // Edit Password Siswa
        Route::get('/edit-password/{enter_code}', 'DashboardSiswaController@edit_password')->name('edit-password');
        Route::post('/edit-password-store', 'DashboardSiswaController@edit_password_store')->name('edit-password-store');


        // logout dashboard
        Route::get('/logout-db-siswa', 'DashboardSiswaController@logout_db_siswa')->name('logout-db-siswa');
        // End Dashboard Siswa

    });
    





    Route::group(['middleware' => ['auth', 'checklevel:A']], function () {
        // START Routing Dashboard Admin

            // Start User
                Route::resource('user', 'UserController');
                Route::get('user/delete/{id}',"UserController@destroy")->name("user.destroy");
            // End User

            // Start Management Web (pendaftaran, hasil seleksi, contact_us)
                Route::get('/maweb-pendaftaran', 'MawebController@maweb_pendaftaran')->name('maweb-pendaftaran');
                Route::get('maweb-pendaftaran-create', 'MawebController@maweb_pendaftaran_create')->name('maweb-pendaftaran-create');
                Route::post('/maweb-pendaftaran-store', 'MawebController@maweb_pendaftaran_store')->name('maweb-pendaftaran-store');

                Route::get('/maweb-hasil-seleksi', 'MawebController@maweb_hasil_seleksi')->name('maweb-hasil-seleksi');
                Route::get('maweb-hasil-seleksi-create', 'MawebController@maweb_hasil_seleksi_create')->name('maweb-hasil-seleksi-create');
                Route::post('/maweb-hasil-seleksi-store', 'MawebController@maweb_hasil_seleksi_store')->name('maweb-hasil-seleksi-store');

                Route::get('/maweb-contact-us', 'MawebController@maweb_contact_us')->name('maweb-contact-us');
                Route::get('maweb-contact-us-create', 'MawebController@maweb_contact_us_create')->name('maweb-contact-us-create');
                Route::post('/maweb-contact-us-store', 'MawebController@maweb_contact_us_store')->name('maweb-contact-us-store');

                Route::get('/maweb-delete/{id}',"MawebController@maweb_delete")->name("maweb-delete");
            // End Management Web (pendaftaran, hasil seleksi, contact_us)

        // End Routing Dashboard Admin
    });


    Route::group(['middleware' => ['auth', 'checklevel:A,O']], function () {
        
             // Start Home
                Route::get('/home', 'HomeController@index')->name('home');
            // End Home


            // Start Management SISWA
                // Start Management Siswa (Edit, Delete, Detail)
                    Route::get('/siswa-edit/{id}', 'ManagementSiswaController@siswa_edit')->name('siswa-edit');
                    Route::put('/siswa-update-datadiri/{id}', 'ManagementSiswaController@siswa_update_datadiri')->name('siswa-update-datadiri');
                    Route::put('/siswa-update-data-nilai/{id}', 'ManagementSiswaController@siswa_update_data_nilai')->name('siswa-update-data-nilai');
                    Route::put('/siswa-update-data-orangtua-wali/{id_table_ms_prospective_students}', 'ManagementSiswaController@siswa_update_data_orangtua_wali')->name('siswa-update-data-orangtua-wali');

                    Route::get('/siswa-detail/{id}', 'ManagementSiswaController@siswa_detail')->name('siswa-detail');
                    Route::get('siswa-detail/received/{id}', "ManagementSiswaController@received")->name("siswa-detail.received");
                    Route::get('siswa-detail/rejected/{id}', "ManagementSiswaController@rejected")->name("siswa-detail.rejected");

                    Route::get('/siswa-delete/{id}',"ManagementSiswaController@siswa_delete")->name("siswa-delete");

                    // Edit Password Siswa
                    Route::post('/edit-password-siswa-store', 'ManagementSiswaController@edit_password_siswa_store')->name('edit-password-siswa-store');

                // End Management Siswa (Edit, Delete, Detail)


                //Start Management Siswa Process
                    Route::get('/siswa-process', 'ManagementSiswaController@siswa_process')->name('siswa-process');

                    Route::get('siswa-process-create-siswa', 'ManagementSiswaController@siswa_process_create_siswa')->name('siswa-process-create-siswa');
                    Route::post('/siswa-process-store', 'ManagementSiswaController@siswa_process_store')->name('siswa-process-store');

                    Route::get('/siswa-process-laman-confirm/{enter_code}', 'ManagementSiswaController@siswa_process_laman_confirm')->name('siswa-process-laman-confirm');
                    Route::post('/siswa-process-laman-store', 'ManagementSiswaController@siswa_process_laman_store')->name('siswa-process-laman-store');
                // End Management Siswa Process


                // Start Management Siswa Received
                    Route::get('/siswa-received', 'ManagementSiswaController@siswa_received')->name('siswa-received');
                    Route::get('/downloadall-received-pdf', 'ManagementSiswaController@downloadall_received_pdf')->name('downloadall-received-pdf');
                    Route::get('/export-received-excel', 'ManagementSiswaController@export_received_excel')->name('export-received-excel');
                    
                    // Dowanload pdf formulir siswa
                    Route::get('/download-formulir-db-siswa/{enter_code}', 'DashboardSiswaController@download_formulir_db_siswa')->name('download-formulir-db-siswa');
                // End Management Siswa Received

                
                // Start Management Siswa Rejected
                    Route::get('/siswa-rejected', 'ManagementSiswaController@siswa_rejected')->name('siswa-rejected');
                // End Management Siswa Rejected

            // End Management SISWA
    });


