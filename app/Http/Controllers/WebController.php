<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidatsMaster\MsProspectiveStudents;
use App\Models\CandidatsMaster\MsProspectiveStudentGrades;
use App\Models\CandidatsMaster\MsFatherData;
use App\Models\CandidatsMaster\MsMotherData;
use App\Models\CandidatsMaster\MsGuardiansData;
use App\Models\MaWebMaster\MsOpenCloseWeb;
use App\Models\MaContMaster\MsTextCont;
use App\Models\ReportBugsMaster\ReportBugs;




use Illuminate\Support\Facades\Crypt;
use Webpatser\Uuid\Uuid;
use Alert;
use Mail;



class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('menu-web.home_web');
    }


    // Create Data Calon Siswa
    public function create_pendaftaran()
    {
        // + Tambah Kode Pendaftaran
        $length = 10;
        $char = '0123456789';
        $char_length = strlen($char);
        $random_string = 'CS-';
        for($i=0; $i < $length; $i++){
            $random_string .= $char[rand(0,$char_length-1)];
        }
        // $random_string = 'CS-4686857542';
        // - Tambah Kode Pendaftaran
        

        $check_code = MsProspectiveStudents::where('code_pendaftaran' , $random_string)->first();

        if ($check_code) {
            return abort(404);
        }
        
        
        // Start Open Close Web
        $dt = date('Y-m-d H:i:s');
        $open_close = MsOpenCloseWeb::where('jenis_maweb', 'maweb_pendaftaran')        
                                ->where('dari_tgl','<=',$dt)
                                ->where('sampai_tgl','>=',$dt)
                                ->orderBy('id', 'desc')
                                ->first();

        if ($open_close != null) {
            return view('menu-web.create_pendaftaran', compact('random_string', 'open_close'));
        }
        else {

            $get_date = MsOpenCloseWeb::where('jenis_maweb', 'maweb_pendaftaran')->orderBy('id', 'desc')->first();

            if ($get_date == null) {
                \Session::flash('not_access_not_date', "Informasi Pendaftaran Peserta Didik Baru akan terus kami UPDATE pada website Ini.");
                return redirect(route('home-web'));
            }
            elseif($dt >= $get_date->sampai_tgl) {
                $get_date_sampai = date('d/m/Y - H:i', strtotime($get_date->sampai_tgl));
                \Session::flash('not_access_use_date', "Pendaftaran Peserta Didik Baru jalur $get_date->nama_gelombang_table_ms_gelpends telah di TUTUP pada tanggal $get_date_sampai.");
                return redirect(route('home-web'));
            }

            
        }
        // End Open Close Web

    }



    public function pendaftaran_store(Request $request)
    {
        $data_cs = request()->validate([
            'nik' => 'required|digits_between:16,17|numeric',
            'nisn' => 'required|digits_between:10,10|numeric',
            'code_pendaftaran' => 'required',
            'nama_calon_siswa' => 'required',
            'jenis_kelamin' => 'required',
            'jenis_kelamin' => 'required',
            'kewarganegaraan' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',


            'alamat_rt' => 'digits_between:0,3',
            'alamat_rw' => 'digits_between:0,3',
            'alamat_kode_pos' => 'digits_between:0,8',
        ]);

        $data_cs = new MsProspectiveStudents();
        $data_cs->code_pendaftaran = $request->code_pendaftaran;
        $data_cs->enter_code = Uuid::generate()->string;
        $data_cs->nik = $request->nik;
        $data_cs->nisn = $request->nisn;
        $data_cs->no_register_akte = $request->no_register_akte;
        $data_cs->nama_calon_siswa = $request->nama_calon_siswa;
        $data_cs->jenis_kelamin = $request->jenis_kelamin;
        $data_cs->agama = $request->agama;
        $data_cs->kewarganegaraan = $request->kewarganegaraan;
        $data_cs->tempat_lahir = $request->tempat_lahir;
        $data_cs->tanggal_lahir = $request->tanggal_lahir;
        $data_cs->tinggal_bersama = $request->tinggal_bersama;
        $data_cs->no_hp = $request->no_hp;
        $data_cs->alamat_jalan = $request->alamat_jalan;
        $data_cs->alamat_dusun = $request->alamat_dusun;
        $data_cs->alamat_rt = $request->alamat_rt;
        $data_cs->alamat_rw = $request->alamat_rw;
        $data_cs->alamat_kode_pos = $request->alamat_kode_pos;
        $data_cs->alamat_kelurahan = $request->alamat_kelurahan;
        $data_cs->alamat_kecamatan = $request->alamat_kecamatan;
        $data_cs->alamat_kota_kabupaten = $request->alamat_kota_kabupaten;
        $data_cs->alamat_provinsi = $request->alamat_provinsi;
        $data_cs->status= 'process';

        if(isset($request->foto_siswa)){
            $imageFile = $request->nama_calon_siswa.'/'.\Str::random(60).'.'.$request->foto_siswa->getClientOriginalExtension();
            $image_path = $request->file('foto_siswa')->move(storage_path('app/public/foto_siswa/'.$request->nama_calon_siswa), $imageFile);

            $data_cs->foto_siswa = $imageFile;
        }

        // Mendapatkan Maweb Pendaftaran Yang Sedang Aktif
        $dt = date('Y-m-d H:i:s');
        $open_close = MsOpenCloseWeb::where('jenis_maweb', 'maweb_pendaftaran')        
                                ->where('dari_tgl','<=',$dt)
                                ->where('sampai_tgl','>=',$dt)
                                ->orderBy('id', 'desc')
                                ->first();
        $data_cs->gelombang_pendaftaran = $open_close->nama_gelombang_table_ms_gelpends;


        // Cek NISN For Enter
        $check_nisn = MsProspectiveStudents::where('nisn', $request->nisn)->first();
        
        if ($check_nisn) {
            \Session::flash('gagal_daftar', "Hallo '$request->nama_calon_siswa', Maaf Anda Sudah Pernah Mendaftar Menggunakan Nomer NISN : '$check_nisn->nisn' Silahkan Hubungi Admin Jika Memilki Masalah Dalam Mendaftar.");
            return redirect(route('create-pendaftaran'));
        }
        else {
            $data_cs->save();
        }


        // Data Ayah
        $data_ayah = new MsFatherData();
        $data_ayah->id_table_ms_prospective_students = $request->id_table_ms_prospective_students;
        $data_ayah->nama_ayah = $request->nama_ayah;
        $data_ayah->nik_ayah = $request->nik_ayah;
        $data_ayah->tempat_lahir_ayah = $request->tempat_lahir_ayah;
        $data_ayah->tanggal_lahir_ayah = $request->tanggal_lahir_ayah;
        $data_ayah->pekerjaan_ayah = $request->pekerjaan_ayah;
        $data_ayah->pendidikan_terakhir_ayah = $request->pendidikan_terakhir_ayah;
        $data_ayah->no_hp_ayah = $request->no_hp_ayah;
        $data_ayah->alamat_ayah = $request->alamat_ayah;

        $data_ayah->id_table_ms_prospective_students = $data_cs->id;
        $data_ayah->save();

        // SCRIPT Update id_table_ms_prospective_father
        $ids = MsProspectiveStudents::where('id',$data_ayah->id_table_ms_prospective_students)->first();
        $ids_akhir = $data_ayah->id;
        $ids->update(['id_table_ms_father_data' => $ids_akhir]);


        // Data Ibu
        $data_ibu = new MsMotherData();
        $data_ibu->id_table_ms_prospective_students = $request->id_table_ms_prospective_students;
        $data_ibu->nama_ibu = $request->nama_ibu;
        $data_ibu->nik_ibu = $request->nik_ibu;
        $data_ibu->tempat_lahir_ibu = $request->tempat_lahir_ibu;
        $data_ibu->tanggal_lahir_ibu = $request->tanggal_lahir_ibu;
        $data_ibu->pekerjaan_ibu = $request->pekerjaan_ibu;
        $data_ibu->pendidikan_terakhir_ibu = $request->pendidikan_terakhir_ibu;
        $data_ibu->no_hp_ibu = $request->no_hp_ibu;
        $data_ibu->alamat_ibu = $request->alamat_ibu;

        $data_ibu->id_table_ms_prospective_students = $data_cs->id;
        $data_ibu->save();

        // SCRIPT Update id_table_ms_prospective_mother
        $ids = MsProspectiveStudents::where('id',$data_ibu->id_table_ms_prospective_students)->first();
        $ids_akhir = $data_ibu->id;
        $ids->update(['id_table_ms_mother_data' => $ids_akhir]);



        // Data Wali
        $data_wali = new MsGuardiansData();
        $data_wali->id_table_ms_prospective_students = $data_cs->id_table_ms_prospective_students;
        $data_wali->nama_wali = $request->nama_wali;
        $data_wali->nik_wali = $request->nik_wali;
        $data_wali->tempat_lahir_wali = $request->tempat_lahir_wali;
        $data_wali->tanggal_lahir_wali = $request->tanggal_lahir_wali;
        $data_wali->pekerjaan_wali = $request->pekerjaan_wali;
        $data_wali->jenis_kelamin_wali = $request->jenis_kelamin_wali;
        $data_wali->pendidikan_terakhir_wali = $request->pendidikan_terakhir_wali;
        $data_wali->no_hp_wali = $request->no_hp_wali;
        $data_wali->alamat_wali = $request->alamat_wali;

        $data_wali->id_table_ms_prospective_students = $data_cs->id;
        $data_wali->save();

        // SCRIPT Update id_table_ms_prosective_guardians
        $ids = MsProspectiveStudents::where('id',$data_wali->id_table_ms_prospective_students)->first();
        $ids_akhir = $data_wali->id;
        $ids->update(['id_table_ms_guardians_data' => $ids_akhir]);


        return redirect(route('laman-confirm', [$data_cs->enter_code ]));

    }


    
    public function laman_confirm($enter_code)
    {

        $data = MsProspectiveStudents::where('enter_code' , $enter_code)->first();
        
        if ($data == true) {
            return view('menu-web.create_password_account', compact('data'));
        }
        elseif($data == false) {
            return abort(404);
        }
        
    }


    public function laman_store(Request $request)
    {    
        $data = MsProspectiveStudents::where('nisn',$request->nisn)->first();
        

        if ($request->password_pendaftaran != $request->password_confirm) {

            
            \Session::flash('error', 'Password Tidak Sama');

            return redirect(route('laman-confirm', [$data->enter_code ]));
            
        }

        // Kondisi jika siswa sudah pernah membuat password untuk login
        elseif ($data->password_pendaftaran != null) {
            \Session::flash('pass_true', "Maaf '$data->nama_calon_siswa', Anda sudah pernah membuat Password untuk Login pada NISN '$data->nisn' ,Silahkan hubungi admin jika ada memiliki masalah dalam mendaftar.");
            return redirect(route('home-web'));
            
        }


        $data_pass = new MsProspectiveStudents();
        $data_pass->nisn = $request->nisn;
        $data_pass->password_pendaftaran = \Hash::make($request->password_pendaftaran);
        $data_pass->password_confirm = $request->password_confirm;

        
        $data_akhir = $data_pass->password_pendaftaran;
        $data->update(['password_pendaftaran' => $data_akhir]);

        // Alert::success('Berhasil',"Silahkan login menggunakan NIK dan Password yang telah anda buat");
        // toast('Silahkan login menggunakan NIK dan Password yang telah anda buat','success');
        \Session::flash('success', 'Sukses Registrasi');
        return redirect(route('home-web'));

    }


    public function laman_login_cs(Request $request)
    {
        $nisn_cs = MsProspectiveStudents::where('nisn', $request->nisn)->first();


        if ($nisn_cs) {
            if (\Hash::check($request->password_pendaftaran, $nisn_cs->password_pendaftaran)) {

                \Session::put('siswa', $nisn_cs);
                return redirect(route('home-db-siswa'));
            }else {
                \Session::flash('gagal_login1', 'NISN atau Password anda tidak cocok !');
                return redirect(route('home-web'));
            }
        }
        else{
            \Session::flash('gagal_login2', 'NISN anda belum terdaftar, silahkan daftar pada bagian form pendaftaran !');
                return redirect(route('home-web'));
        }

    }


    public function hasil_seleksi()
    {
        // $data = MsProspectiveStudents::with('data_sekolah_nilai')->get();
        $data = MsProspectiveStudents::all();

        // Start Open Close Web
        $dt = date('Y-m-d H:i:s');
        $open_close = MsOpenCloseWeb::where('jenis_maweb', 'maweb_hasil_seleksi')        
                                ->where('dari_tgl','<=',$dt)
                                ->where('sampai_tgl','>=',$dt)
                                ->orderBy('id', 'desc')
                                ->first();

        if ($open_close != null) {
            return view('menu-web.hasil_seleksi', compact('data'));
        }
        else {
            \Session::flash('gagal_masuk_hasil_seleksi', "Maaf Halaman Hasil Seleksi Saat Ini Sedang Di Tutup.");
            return redirect(route('home-web'));
        }
        // End Open Close Web
    }

    public function contact_us()
    {   
        // Start Open Close Web
        $dt = date('Y-m-d H:i:s');
        $open_close = MsOpenCloseWeb::where('jenis_maweb', 'maweb_contact_us')        
                                ->where('dari_tgl','<=',$dt)
                                ->where('sampai_tgl','>=',$dt)
                                ->orderBy('id', 'desc')
                                ->first();

        if ($open_close != null) {
            return view('menu-web.contact_us');
        }
        else {
            \Session::flash('gagal_masuk_contact_us', "Maaf Halaman Contact Saat Ini Sedang Tidak Bisa Di Akses.");
            return redirect(route('home-web'));
        }
        // End Open Close Web
    }








    // Start Read Informasi Pendaftaran
        public function read_prosedur_syarat()
        {
            $data_code = MsTextCont::where('code_unik', 'ea385809eefed48c3c3abb6dc680945e')->first();
            return view('menu-web.read_prosedur_syarat', compact('data_code'));
        }

        public function read_agenda()
        {
            $data_code = MsTextCont::where('code_unik', 'd0dbdfd8edf8dd1608405055c26adc94')->first();
            return view('menu-web.read_agenda', compact('data_code'));
        }
        
        public function read_daftar_ulang()
        {
            $data_code = MsTextCont::where('code_unik', '86397b70d3bfde246082defe4d67288a')->first();
            return view('menu-web.read_daftar_ulang', compact('data_code'));
        }

        public function read_profil_sekolah()
        {
            $data_code = MsTextCont::where('code_unik', 'c9c9aa4b06eb1592459070c357743a63')->first();
            return view('menu-web.read_profil_sekolah', compact('data_code'));
        }
    // End Read Informasi Pendaftaran 

    


    // Start Report Bugs
        public function report_bugs()
        {
            return view('menu-web.report_bugs');
        }

        public function report_bugs_store(Request $request)
        {
            $data = new ReportBugs();
            $data->subject = $request->subject;
            $data->name = $request->name;
            $data->email = $request->email;
            $data->text_report = $request->text_report;
            $data->status = "not complete";
            $data->save();

            if ($data) {
                
                Mail::send('sand_to_email.report_bugs_to_admin', ['data' => $data], function($data) {
                    $data->to('diazdjul19@gmail.com', 'Lapor Bugs')->subject('Report Bugs PPDB');
                    $data->from(env('MAIL_USERNAME', 'diazdjul19@gmail.com'), 'PPDB Online SMKN 4 Kota Bekasi');
                });

                Mail::send('sand_to_email.report_bugs_to_pelapor', ['data' => $data], function($data) use($request){
                $data->to($request->email, 'Lapor Bugs')->subject('Report Bugs PPDB');
                $data->from(env('MAIL_USERNAME', 'diazdjul19@gmail.com'), 'PPDB Online SMKN 4 Kota Bekasi');
            });

                \Session::flash('success_report', "Bantuan Anda Akan Sangat Kami Hargai.");
                return redirect(route('report-bugs'));
            }else{
                return "Gagal";
            }
        }
    // End Report Bugs
    





    // Start Form Create Yang TELAH DI GANTIKAN OLEH FORM WIARD 

    // public function pendaftaran_store(Request $request)
    // {

    //     $data_cs = request()->validate([
    //         'nik' => 'required|digits_between:16,17|numeric',
    //         'nisn' => 'required|digits_between:10,10|numeric',
    //         'code_pendaftaran' => 'required',
    //         'jenis_kelamin' => 'required',
    //         'kewarganegaraan' => 'required',

    //         'alamat_rt' => 'digits_between:0,3',
    //         'alamat_rw' => 'digits_between:0,3',
    //         'alamat_kode_pos' => 'digits_between:0,8',

    //     ]);

    //     $data_cs = new MsProspectiveStudents();
    //     $data_cs->code_pendaftaran = $request->code_pendaftaran;
    //     $data_cs->enter_code = Uuid::generate()->string;
    //     $data_cs->nik = $request->nik;
    //     $data_cs->nisn = $request->nisn;
    //     $data_cs->no_register_akte = $request->no_register_akte;
    //     $data_cs->nama_calon_siswa = $request->nama_calon_siswa;
    //     $data_cs->jenis_kelamin = $request->jenis_kelamin;
    //     $data_cs->agama = $request->agama;
    //     $data_cs->kewarganegaraan = $request->kewarganegaraan;
    //     $data_cs->tempat_lahir = $request->tempat_lahir;
    //     $data_cs->tanggal_lahir = $request->tanggal_lahir;
    //     $data_cs->tinggal_bersama = $request->tinggal_bersama;
    //     $data_cs->no_hp = $request->no_hp;
    //     $data_cs->alamat_jalan = $request->alamat_jalan;
    //     $data_cs->alamat_dusun = $request->alamat_dusun;
    //     $data_cs->alamat_rt = $request->alamat_rt;
    //     $data_cs->alamat_rw = $request->alamat_rw;
    //     $data_cs->alamat_kode_pos = $request->alamat_kode_pos;
    //     $data_cs->alamat_kelurahan = $request->alamat_kelurahan;
    //     $data_cs->alamat_kecamatan = $request->alamat_kecamatan;
    //     $data_cs->alamat_kota_kabupaten = $request->alamat_kota_kabupaten;
    //     $data_cs->alamat_provinsi = $request->alamat_provinsi;
    //     $data_cs->status= 'process';
        
    //     if(isset($request->foto_siswa)){
    //         $imageFile = $request->nama_calon_siswa.'/'.\Str::random(60).'.'.$request->foto_siswa->getClientOriginalExtension();
    //         $image_path = $request->file('foto_siswa')->move(storage_path('app/public/foto_siswa/'.$request->nama_calon_siswa), $imageFile);

    //         $data_cs->foto_siswa = $imageFile;
    //     }

    //     // Cek NISN For Enter
    //     $check_nisn = MsProspectiveStudents::where('nisn', $request->nisn)->first();
        
    //     if ($check_nisn) {
    //         \Session::flash('gagal_daftar', "Hallo '$request->nama_calon_siswa', Maaf Anda Sudah Pernah Mendaftar Menggunakan Nomer NISN : '$check_nisn->nisn' Silahkan Hubungi Admin Jika Memilki Masalah Dalam Mendaftar.");
    //         return redirect(route('create-pendaftaran'));
    //     }
    //     else {
    //         $data_cs->save();
    //         return redirect(route('create-data-ayah', [$data_cs->enter_code]));
    //     }
    // }

    // public function create_data_ayah($enter_code)
    // {

    //     $data = MsProspectiveStudents::where('enter_code' , $enter_code)->first();
        
    //     if ($data == true) {
    //         return view('menu-web.create_data_ayah', compact('data'));
    //     }
    //     elseif($data == false) {
    //         return abort(404);
    //     }
        
    // }

    // public function data_ayah_store(Request $request)
    // {
    //     $data_ayah = new MsFatherData();
    //     $data_ayah->id_table_ms_prospective_students = $request->id_table_ms_prospective_students;
    //     $data_ayah->nama_ayah = $request->nama_ayah;
    //     $data_ayah->nik_ayah = $request->nik_ayah;
    //     $data_ayah->tempat_lahir_ayah = $request->tempat_lahir_ayah;
    //     $data_ayah->tanggal_lahir_ayah = $request->tanggal_lahir_ayah;
    //     $data_ayah->pekerjaan_ayah = $request->pekerjaan_ayah;
    //     $data_ayah->pendidikan_terakhir_ayah = $request->pendidikan_terakhir_ayah;
    //     $data_ayah->no_hp_ayah = $request->no_hp_ayah;
    //     $data_ayah->alamat_ayah = $request->alamat_ayah;
    //     $data_ayah->save();


        
    //     // SCRIPT Update id_table_ms_prospective_grades
    //     $ids = MsProspectiveStudents::where('id',$request->id_table_ms_prospective_students)->first();
    //     $ids_akhir = $data_ayah->id;
    //     $ids->update(['id_table_ms_father_data' => $ids_akhir]);



    //     return redirect(route('create-data-ibu', [$ids->enter_code ]));

    // }
    // public function create_data_ibu($enter_code)
    // {
    //     $data = MsProspectiveStudents::where('enter_code' , $enter_code)->first();
        
    //     if ($data == true) {
    //         return view('menu-web.create_data_ibu', compact('data'));
    //     }
    //     elseif($data == false) {
    //         return abort(404);
    //     }
    // }
    // public function data_ibu_store(Request $request)
    // {
    //     $data_ibu = new MsMotherData();
    //     $data_ibu->id_table_ms_prospective_students = $request->id_table_ms_prospective_students;
    //     $data_ibu->nama_ibu = $request->nama_ibu;
    //     $data_ibu->nik_ibu = $request->nik_ibu;
    //     $data_ibu->tempat_lahir_ibu = $request->tempat_lahir_ibu;
    //     $data_ibu->tanggal_lahir_ibu = $request->tanggal_lahir_ibu;
    //     $data_ibu->pekerjaan_ibu = $request->pekerjaan_ibu;
    //     $data_ibu->pendidikan_terakhir_ibu = $request->pendidikan_terakhir_ibu;
    //     $data_ibu->no_hp_ibu = $request->no_hp_ibu;
    //     $data_ibu->alamat_ibu = $request->alamat_ibu;
    //     $data_ibu->save();
        

    //     // SCRIPT Update id_table_ms_prospective_grades
    //     $ids = MsProspectiveStudents::where('id',$request->id_table_ms_prospective_students)->first();
    //     $ids_akhir = $data_ibu->id;
    //     $ids->update(['id_table_ms_mother_data' => $ids_akhir]);



    //     return redirect(route('create-data-wali', [$ids->enter_code ]));

    // }
    // public function create_data_wali($enter_code)
    // {
    //     $data = MsProspectiveStudents::where('enter_code' , $enter_code)->first();
        
    //     if ($data == true) {
    //         return view('menu-web.create_data_wali', compact('data'));
    //     }
    //     elseif($data == false) {
    //         return abort(404);
    //     }
    // }

    // public function data_wali_store(Request $request)
    // {
    //     $data_wali = new MsGuardiansData();
    //     $data_wali->id_table_ms_prospective_students = $request->id_table_ms_prospective_students;
    //     $data_wali->nama_wali = $request->nama_wali;
    //     $data_wali->nik_wali = $request->nik_wali;
    //     $data_wali->tempat_lahir_wali = $request->tempat_lahir_wali;
    //     $data_wali->tanggal_lahir_wali = $request->tanggal_lahir_wali;
    //     $data_wali->pekerjaan_wali = $request->pekerjaan_wali;
    //     $data_wali->jenis_kelamin_wali = $request->jenis_kelamin_wali;
    //     $data_wali->pendidikan_terakhir_wali = $request->pendidikan_terakhir_wali;
    //     $data_wali->no_hp_wali = $request->no_hp_wali;
    //     $data_wali->alamat_wali = $request->alamat_wali;
    //     $data_wali->save();
        

    //     // SCRIPT Update id_table_ms_guardians_data
    //     $ids = MsProspectiveStudents::where('id',$request->id_table_ms_prospective_students)->first();
    //     $ids_akhir = $data_wali->id;
    //     $ids->update(['id_table_ms_guardians_data' => $ids_akhir]);



    //     return redirect(route('laman-confirm', [$ids->enter_code ]));

    // }

    // public function create_data_nilai($enter_code)
    // {

    //     $data = MsProspectiveStudents::where('enter_code' , $enter_code)->first();

    //     if ($data == true) {
    //         return view('menu-web.create_data_nilai', compact('data'));
    //     }
    //     elseif($data == false) {
    //         return abort(404);
    //     }
        

    // }

    // public function data_nilai_store(Request $request)
    // {

    //     $data_nilai = new MsProspectiveStudentGrades();
    //     $data_nilai->id_table_ms_prospective_students = $request->id_table_ms_prospective_students;
    //     $data_nilai->no_skhun = $request->no_skhun;
    //     $data_nilai->asal_sekolah_nama = $request->asal_sekolah_nama;
    //     $data_nilai->asal_sekolah_kota = $request->asal_sekolah_kota;
    //     $data_nilai->asal_sekolah_provinsi = $request->asal_sekolah_provinsi;

    //     $data_nilai->nilai_bahasa_indonesia = $request->de_indo .'.'. $request->be_indo;
    //     $data_nilai->nilai_mtk = $request->de_mtk .'.'. $request->be_mtk;
    //     $data_nilai->nilai_ipa = $request->de_ipa .'.'. $request->be_ipa;
        

    //     if(isset($request->foto_scan_surat_skhun)){
    //         $imageFile = $request->no_skhun.'/'.\Str::random(60).'.'.$request->foto_scan_surat_skhun->getClientOriginalExtension();
    //         $image_path = $request->file('foto_scan_surat_skhun')->move(storage_path('app/public/foto_scan_surat_skhun/'.$request->no_skhun), $imageFile);

    //         $data_nilai->foto_scan_surat_skhun = $imageFile;
    //     }

    //     $data_nilai->save();


        
        
    //     $ids = MsProspectiveStudents::where('id',$request->id_table_ms_prospective_students)->first();
    //     $ids_awal = $ids->id_table_ms_prospective_grades;
    //     $ids_akhir = $data_nilai->id;
    //     $ids->update(['id_table_ms_prospective_grades' => $ids_akhir]);


    //     return redirect(route('laman-confirm', [$ids->enter_code ]));

        
        
    // }

    // END TELAH DI GANTIKAN OLEH FORM WIARD 
    









    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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


    private function createPassword($length = 8)
    {
        $char = '0123456789';
        $char_length = strlen($char);
        $random_string = '';
        for($i=0; $i < $length; $i++){
            $random_string .= $char[rand(0,$char_length-1)];
        }
        return $random_string;
    }

}
