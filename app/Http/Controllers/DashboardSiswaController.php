<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidatsMaster\MsProspectiveStudents;
use App\Models\CandidatsMaster\MsProspectiveStudentGrades;
use App\Models\CandidatsMaster\MsFatherData;
use App\Models\CandidatsMaster\MsMotherData;
use App\Models\CandidatsMaster\MsGuardiansData;
use App\Models\MaWebMaster\MsOpenCloseWeb;

use PDF;

use JD\Cloudder\Facades\Cloudder;


class DashboardSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_cs = \Session::get('siswa');
        $data = MsProspectiveStudents::where('id', $data_cs->id)->with('data_ayah', 'data_ibu', 'data_wali','data_sekolah_nilai')->first();
        
        $dt = date('Y-m-d H:i:s');
        // Start Auto Reject Siswa
            $open_close = MsOpenCloseWeb::where('jenis_maweb', 'maweb_pendaftaran')        
                                    ->where('dari_tgl','<=',$dt)
                                    ->where('sampai_tgl','>=',$dt)
                                    ->orderBy('id', 'desc')
                                    ->first();

            if ($open_close != null) {

                if ($dt >= $open_close->sampai_tgl) {
                    $data->update(['status' => 'rejected']);
                } 
                elseif ($dt >= $open_close->dari_tgl) {
                    # code...
                }

            }
        // End Auto Reject Siswa

        // Create Rata Rata Nilai
        if ($data->data_sekolah_nilai != true) {

            return view('dashboard_siswa.home_db_siswa', compact('data'));
            
        } elseif($data) {

            $rata_nilai =   $data->data_sekolah_nilai->nilai_bahasa_indonesia +
                            $data->data_sekolah_nilai->nilai_mtk +
                            $data->data_sekolah_nilai->nilai_ipa +
                            $data->data_sekolah_nilai->nilai_bahasa_inggris;
            return view('dashboard_siswa.home_db_siswa', compact('data', 'rata_nilai'));
            
        }


        



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function datadiri_db_siswa()
    {
        $data_cs = \Session::get('siswa');
        $data = MsProspectiveStudents::where('id', $data_cs->id)->with('data_ayah', 'data_ibu', 'data_wali','data_sekolah_nilai')->first();
        return view('dashboard_siswa.datadiri_db_siswa', compact('data'));
    }


    public function update_datadiri_db_siswa(Request $request, $enter_code)
    {
        $data = request()->validate([
            'alamat_rt' => 'digits_between:0,3',
            'alamat_rw' => 'digits_between:0,3',
            'alamat_kode_pos' => 'digits_between:0,8',

        ]);


        $data = MsProspectiveStudents::where('enter_code', $enter_code)->first();
        $data->no_register_akte = $request->get('no_register_akte');
        $data->jenis_kelamin = $request->get('jenis_kelamin');
        $data->agama = $request->get('agama');
        $data->tempat_lahir = $request->get('tempat_lahir');
        $data->tanggal_lahir = $request->get('tanggal_lahir');
        $data->kewarganegaraan = $request->get('kewarganegaraan');
        $data->tinggal_bersama = $request->get('tinggal_bersama');
        $data->no_hp = $request->get('no_hp');
        $data->alamat_jalan = $request->get('alamat_jalan');
        $data->alamat_dusun = $request->get('alamat_dusun');
        $data->alamat_kode_pos = $request->get('alamat_kode_pos');
        $data->alamat_rt = $request->get('alamat_rt');
        $data->alamat_rw = $request->get('alamat_rw');
        $data->alamat_kelurahan = $request->get('alamat_kelurahan');
        $data->alamat_kecamatan = $request->get('alamat_kecamatan');
        $data->alamat_kota_kabupaten = $request->get('alamat_kota_kabupaten');
        $data->alamat_provinsi = $request->get('alamat_provinsi');
    
        // MENGUPLOAD KE STORAGE BAWAAN LARAVEL
        // if(isset($request->foto_siswa)){
        //     $imageFile = $data->nama_calon_siswa.'/'.\Str::random(60).'.'.$request->foto_siswa->getClientOriginalExtension();
        //     $image_path = $request->file('foto_siswa')->move(storage_path('app/public/foto_siswa/'.$data->nama_calon_siswa), $imageFile);

        //     $data->foto_siswa = $imageFile;
        // }

        // MENGHAPUS IMAGE LAMA, JIKA DI TEMUKAN DATA YANG BARU DI EDIT

        if(isset($request->foto_siswa)){
            if ($data->foto_siswa_public_id) {
                Cloudder::destroyImage($data->foto_siswa_public_id);
            }
        }

        // MENGUPLOAD IMAGE KE STORAGE CLOUDINARY
        if ($image = $request->file('foto_siswa')) {
            $image_path = $image->getRealPath();
            Cloudder::upload($image_path, null, array("folder" => "ppdb-online-storage/tb_prospective_students_storage", "overwrite" => TRUE, "resource_type" => "image"));

            //直前にアップロードされた画像のpublicIdを取得する。
            $publicId = Cloudder::getPublicId();
            $logoUrl = Cloudder::secureShow($publicId);

            $data->foto_siswa_public_id = $publicId;
            $data->foto_siswa = $logoUrl;
        }


        $data->save();
        return redirect(route('home-db-siswa'));

    }


    public function data_db_orangtua_wali()
    {
        $data_cs = \Session::get('siswa');
        $data = MsProspectiveStudents::where('id', $data_cs->id)->with('data_ayah', 'data_ibu', 'data_wali','data_sekolah_nilai')->first();

        return view('dashboard_siswa.data_db_orangtua_wali', compact('data'));
    }

    public function update_db_orangtua_ayah(Request $request, $id)
    {
        $data = MsFatherData::find($id);
        
        $data->nama_ayah = $request->get('nama_ayah');
        $data->nik_ayah = $request->get('nik_ayah');
        $data->tempat_lahir_ayah = $request->get('tempat_lahir_ayah');
        $data->tanggal_lahir_ayah = $request->get('tanggal_lahir_ayah');
        $data->pekerjaan_ayah = $request->get('pekerjaan_ayah');
        $data->pendidikan_terakhir_ayah = $request->get('pendidikan_terakhir_ayah');
        $data->no_hp_ayah = $request->get('no_hp_ayah');
        $data->alamat_ayah = $request->get('alamat_ayah');

        $data->save();
        return redirect(route('data-db-orangtua-wali'));
    }

    public function update_db_orangtua_ibu(Request $request, $id)
    {
        $data = MsMotherData::find($id);
        
        $data->nama_ibu = $request->get('nama_ibu');
        $data->nik_ibu = $request->get('nik_ibu');
        $data->tempat_lahir_ibu = $request->get('tempat_lahir_ibu');
        $data->tanggal_lahir_ibu = $request->get('tanggal_lahir_ibu');
        $data->pekerjaan_ibu = $request->get('pekerjaan_ibu');
        $data->pendidikan_terakhir_ibu = $request->get('pendidikan_terakhir_ibu');
        $data->no_hp_ibu = $request->get('no_hp_ibu');
        $data->alamat_ibu = $request->get('alamat_ibu');

        $data->save();
        return redirect(route('data-db-orangtua-wali'));
    }

    public function update_db_orangtua_wali(Request $request, $id)
    {
        $data = MsGuardiansData::find($id);
        
        $data->nama_wali = $request->get('nama_wali');
        $data->nik_wali = $request->get('nik_wali');
        $data->tempat_lahir_wali = $request->get('tempat_lahir_wali');
        $data->tanggal_lahir_wali = $request->get('tanggal_lahir_wali');
        $data->pekerjaan_wali = $request->get('pekerjaan_wali');
        $data->jenis_kelamin_wali = $request->get('jenis_kelamin_wali');
        $data->pendidikan_terakhir_wali = $request->get('pendidikan_terakhir_wali');
        $data->no_hp_wali = $request->get('no_hp_wali');
        $data->alamat_wali = $request->get('alamat_wali');

        $data->save();
        return redirect(route('data-db-orangtua-wali'));
    }


    public function download_formulir_db_siswa($enter_code)
    {
        $data = MsProspectiveStudents::where('enter_code', $enter_code)->with('data_ayah', 'data_ibu', 'data_wali','data_sekolah_nilai')->first();

        // Create Rata Rata Nilai
        if ($data->data_sekolah_nilai != true) {

            \Session::flash('gagal_download', "Hallo '$data->nama_calon_siswa', Maaf Anda Harus Mengupload Data Nilai Anda Terlebih Dahulu.");
            return redirect(route('home-db-siswa'));

        } elseif($data) {

             // Create Rata Rata Nilai
            $rata_nilai =   $data->data_sekolah_nilai->nilai_bahasa_indonesia + 
                            $data->data_sekolah_nilai->nilai_mtk + 
                            $data->data_sekolah_nilai->nilai_ipa +
                            $data->data_sekolah_nilai->nilai_bahasa_inggris;


            $pdf = \PDF::loadView('pdf.download_formulir_db_siswa', compact('data', 'rata_nilai'))->setPaper('a4');
            return $pdf->download('Formulir Sekolah - '.$data->nisn.'.pdf');
            
        }



    }


    // Upload Data Nilai Berlaku Untuk Sekali Upload
    public function upload_data_nilai()
    {
        $data_cs = \Session::get('siswa');
        $data = MsProspectiveStudents::where('enter_code', $data_cs->enter_code)->first();

        if ($data->id_table_ms_prospective_grades == true) {

            \Session::flash('gagal_masuk', 'Maaf Anda Sudah Pernah Menginputkan Data Nilai Sebelumnya');
            return redirect(route('home-db-siswa'));
        } 
        
        else {

            if ($data == true) {
            return view('dashboard_siswa.upload_db_data_nilai', compact('data'));

            }
            elseif($data == false) {
                return abort(404);

            }
        
        }
        


        

        // PROGRES SELANJUTNYA
        // Gimana Caranya jika ID yang di kirim sama dengan id yang di find() => Baru Bisa Langkah selanjutnya
        // Gimana Caranya jika ID yang di kirim Tidak sama dengan id yang di find() => Maka Munculkan Alert lalu kembalikan
        // Gimana Caranya jika ID yang di kirim Sudah pernah ada dalam Database  => Maka Munculkan Alert lalu kembalikan
    }

    public function upload_data_nilai_store(Request $request)
    {

        $data_nilai = new MsProspectiveStudentGrades();
        $data_nilai->id_table_ms_prospective_students = $request->id_table_ms_prospective_students;
        $data_nilai->no_skhun = $request->no_skhun;
        $data_nilai->asal_sekolah_nama = $request->asal_sekolah_nama;
        $data_nilai->asal_sekolah_kota = $request->asal_sekolah_kota;
        $data_nilai->asal_sekolah_provinsi = $request->asal_sekolah_provinsi;

        $data_nilai->nilai_bahasa_indonesia = $request->de_indo .'.'. $request->be_indo;
        $data_nilai->nilai_mtk = $request->de_mtk .'.'. $request->be_mtk;
        $data_nilai->nilai_ipa = $request->de_ipa .'.'. $request->be_ipa;
        $data_nilai->nilai_bahasa_inggris = $request->de_ing .'.'. $request->be_ing;


        $data_nilai->rata_nilai =   $data_nilai->nilai_bahasa_indonesia + 
                                    $data_nilai->nilai_mtk + 
                                    $data_nilai->nilai_ipa +
                                    $data_nilai->nilai_bahasa_inggris;
        

        if(isset($request->foto_scan_surat_skhun)){
            $imageFile = $request->no_skhun.'/'.\Str::random(60).'.'.$request->foto_scan_surat_skhun->getClientOriginalExtension();
            $image_path = $request->file('foto_scan_surat_skhun')->move(storage_path('app/public/foto_scan_surat_skhun/'.$request->no_skhun), $imageFile);

            $data_nilai->foto_scan_surat_skhun = $imageFile;
        }

        $data_nilai->save();


        
        // SCRIPT Update id_table_ms_prospective_grades
        $ids = MsProspectiveStudents::where('id',$request->id_table_ms_prospective_students)->first();
        $ids_awal = $ids->id_table_ms_prospective_grades;
        $ids_akhir = $data_nilai->id;
        $ids->update(['id_table_ms_prospective_grades' => $ids_akhir]);

        // // SCRIPT Update relation_rata_nilai
        // $data_relasi = MsProspectiveStudents::where('id',$data_nilai->id_table_ms_prospective_students)->first();
        // $data_relasi_akhir = $data_nilai->id_table_ms_prospective_students;
        // $data_relasi->update(['relation_rata_nilai' => $data_relasi_akhir]);



        return redirect(route('home-db-siswa', [$ids->enter_code ]));

        
        
    }


    public function edit_password()
    {

        $data_session = \Session::get('siswa');
        $data = MsProspectiveStudents::where('enter_code', $data_session->enter_code)->first();


        if ($data == true) {
            return view('dashboard_siswa.laman_edit_password', compact('data'));
        }
        elseif($data == false) {
            return abort(404);
        }
        
    }

    public function edit_password_store(Request $request)
    {    
        
        $data_session = \Session::get('siswa');

        $data = MsProspectiveStudents::where('nisn',$data_session->nisn)->first();


        // Check Old Password
        if (\Hash::check($request->old_password, $data->password_pendaftaran)) {


            // Check Confirm Password
            if ($request->password_pendaftaran != $request->password_confirm) {
                \Session::flash('error', 'Password Tidak Sama !');
                return redirect(route('edit-password'));
            }
            elseif ($request->password_pendaftaran == false) {
                \Session::flash('non_new_pass', 'Password Baru Belum Di Isi !');
                return redirect(route('edit-password'));
            }

            // Make Hash Password
            if (isset($request->password_pendaftaran)) {
                $data->password_pendaftaran = \Hash::make($request->password_pendaftaran);

                // Update Password Siswa
                $data_akhir = $data->password_pendaftaran;
                $data->update(['password_pendaftaran' => $data_akhir]);


                \Session::flash('success', 'Sukses Update Password');
                return redirect(route('home-db-siswa'));
            }

        }else {
            \Session::flash('error_old_password', 'Password Lama Tidak Sesuai !');
            return redirect(route('edit-password'));
        }

        


    }




    public function logout_db_siswa()
    {
        \Session::flush();
        return redirect(route('home-web'));
    }



    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
