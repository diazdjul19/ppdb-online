<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidatsMaster\MsProspectiveStudents;
use App\Models\CandidatsMaster\MsProspectiveStudentGrades;
use App\Models\CandidatsMaster\MsFatherData;
use App\Models\CandidatsMaster\MsMotherData;
use App\Models\CandidatsMaster\MsGuardiansData;

use App\Exports\SiswaReceivedExport;
use Maatwebsite\Excel\Facades\Excel;

use Webpatser\Uuid\Uuid;
use Auth;
use PDF;
class ManagementSiswaController extends Controller
{











    public function siswa_process()
    {   
        $get_process = 'process';
        // $data = MsProspectiveStudents::where('status', $get_process)->with('data_sekolah_nilai')->get();
        $order = 'desc';
        $data = MsProspectiveStudents::where('status', $get_process)
                ->join('ms_prospective_student_grades', 'ms_prospective_students.id_table_ms_prospective_grades', '=', 'ms_prospective_student_grades.id')
                ->orderBy('ms_prospective_student_grades.rata_nilai', $order)->select('ms_prospective_students.*')->get();
        
        return view('dashboard_admin.management_siswa_process', compact('data'));
    }




    public function siswa_process_create_siswa()
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

        return view('dashboard_admin.management_siswa_process_create_siswa', compact('random_string'));
    }

    public function siswa_process_store(Request $request)
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

        // Cek NISN For Enter
        $check_nisn = MsProspectiveStudents::where('nisn', $request->nisn)->first();
        
        if ($check_nisn) {
            \Session::flash('gagal_daftar', "Hallo Admin Calon Siswa Bernama '$request->nama_calon_siswa',  Sudah Pernah Menggunakan Nomer NISN '$check_nisn->nisn'.");
            return redirect(route('siswa-process-create-siswa'));
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



        // Data Nilai
        $data_nilai = new MsProspectiveStudentGrades();
        $data_nilai->id_table_ms_prospective_students = $data_cs->id_table_ms_prospective_students;
        $data_nilai->no_skhun = $request->no_skhun;
        $data_nilai->asal_sekolah_nama = $request->asal_sekolah_nama;
        $data_nilai->asal_sekolah_kota = $request->asal_sekolah_kota;
        $data_nilai->asal_sekolah_provinsi = $request->asal_sekolah_provinsi;

        $data_nilai->nilai_bahasa_indonesia = $request->de_indo .'.'. $request->be_indo;
        $data_nilai->nilai_mtk = $request->de_mtk .'.'. $request->be_mtk;
        $data_nilai->nilai_ipa = $request->de_ipa .'.'. $request->be_ipa;

        $data_nilai->rata_nilai = $data_nilai->nilai_bahasa_indonesia + $data_nilai->nilai_mtk + $data_nilai->nilai_ipa;
        

        if(isset($request->foto_scan_surat_skhun)){
            $imageFile = $request->no_skhun.'/'.\Str::random(60).'.'.$request->foto_scan_surat_skhun->getClientOriginalExtension();
            $image_path = $request->file('foto_scan_surat_skhun')->move(storage_path('app/public/foto_scan_surat_skhun/'.$request->no_skhun), $imageFile);

            $data_nilai->foto_scan_surat_skhun = $imageFile;
        }

        $data_nilai->id_table_ms_prospective_students = $data_cs->id;
        $data_nilai->save();

         // SCRIPT Update id_table_ms_prospective_grades
        $ids = MsProspectiveStudents::where('id',$data_nilai->id_table_ms_prospective_students)->first();
        $ids_akhir = $data_nilai->id;
        $ids->update(['id_table_ms_prospective_grades' => $ids_akhir]);



        return redirect(route('siswa-process-laman-confirm', [$data_cs->enter_code ]));

    }




    public function siswa_process_laman_confirm($enter_code)
    {

        $data = MsProspectiveStudents::where('enter_code' , $enter_code)->first();
        if ($data == true) {
            return view('dashboard_admin.management_siswa_process_create_password_account', compact('data'));
        }
        elseif($data == false) {
            return abort(404);
        }
        
    }


    public function siswa_process_laman_store(Request $request)
    {    
        $data = MsProspectiveStudents::where('nisn',$request->nisn)->first();

        if ($request->password_pendaftaran != $request->password_confirm) {

            
            \Session::flash('error', 'Password Tidak Sama');

            return redirect(route('siswa-process-laman-confirm', [$data->enter_code ]));
            
        }

        // Kondisi jika siswa sudah pernah membuat password untuk login
        elseif ($data->password_pendaftaran != null) {
            \Session::flash('pass_true', "Maaf calon siswa bernama '$data->nama_calon_siswa', Sudah pernah membuat Password untuk Login pada NISN '$data->nisn'.");
            return redirect(route('siswa-process'));
            
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
        return redirect(route('siswa-process'));

    }



    
    public function siswa_detail($id)
    {
        $data = MsProspectiveStudents::where('id', $id)->with('data_ayah', 'data_ibu', 'data_wali','data_sekolah_nilai')->first();


        // Create Rata Rata Nilai
        if ($data->data_sekolah_nilai != true) {

            return view('dashboard_admin.management_siswa_detail', compact('data'));
            

        } elseif($data) {

           // Menjumlahkan Nilai
            $rata_nilai = $data->data_sekolah_nilai->nilai_bahasa_indonesia + $data->data_sekolah_nilai->nilai_mtk + $data->data_sekolah_nilai->nilai_ipa;
            return view('dashboard_admin.management_siswa_detail', compact('data', 'rata_nilai'));

                
        }
        
        
    }

    public function received($id){
        $data = MsProspectiveStudents::find($id);
        $data->update(['status' => 'received']);

        return redirect(route('siswa-process'));
    }

    public function rejected($id){
        $data = MsProspectiveStudents::find($id);
        $data->update(['status' => 'rejected']);

        return redirect(route('siswa-process'));
    }
    

    public function siswa_edit($id)
    {
        $data = MsProspectiveStudents::where('id', $id)->with('data_ayah', 'data_ibu', 'data_wali','data_sekolah_nilai')->first();
        
        // Create Rata Rata Nilai
        if ($data->data_sekolah_nilai != true) {

            return view('dashboard_admin.management_siswa_edit', compact('data'));


        } elseif($data) {

            $rata_nilai = $data->data_sekolah_nilai->nilai_bahasa_indonesia + $data->data_sekolah_nilai->nilai_mtk + $data->data_sekolah_nilai->nilai_ipa;
            return view('dashboard_admin.management_siswa_edit', compact('data', 'rata_nilai'));
        
            
        }

    }

    public function siswa_update_datadiri(Request $request, $id)
    {
        $data = request()->validate([
            'alamat_rt' => 'digits_between:0,3',
            'alamat_rw' => 'digits_between:0,3',
            'alamat_kode_pos' => 'digits_between:0,8',

        ]);


        $data = MsProspectiveStudents::find($id);
        $data->nama_calon_siswa = $request->get('nama_calon_siswa');
        $data->nisn = $request->get('nisn');
        $data->nik = $request->get('nik');
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
        $data->status = $request->get('status');

    
        
        if(isset($request->foto_siswa)){
            $imageFile = $data->nama_calon_siswa.'/'.\Str::random(60).'.'.$request->foto_siswa->getClientOriginalExtension();
            $image_path = $request->file('foto_siswa')->move(storage_path('app/public/foto_siswa/'.$data->nama_calon_siswa), $imageFile);

            $data->foto_siswa = $imageFile;
        }

        $data->save();
        return redirect(route('siswa-edit', $data->id));
    }


    public function siswa_update_data_nilai(Request $request, $id)
    {
        $data_nilai = MsProspectiveStudentGrades::find($id);
        $data_nilai->id_table_ms_prospective_students = $request->get('id_table_ms_prospective_students');
        $data_nilai->no_skhun = $request->get('no_skhun');
        $data_nilai->asal_sekolah_nama = $request->get('asal_sekolah_nama');
        $data_nilai->asal_sekolah_kota = $request->get('asal_sekolah_kota');
        $data_nilai->asal_sekolah_provinsi = $request->get('asal_sekolah_provinsi');

        if(isset($request->de_indo)){
            $data_nilai->nilai_bahasa_indonesia = $request->get('de_indo') .'.'. $request->get('be_indo');
        }
        elseif(isset($request->be_indo)){
            \Session::flash('dedu_bindo', 'Isikan nilai depan terlebih dulu.');
            return redirect(route('siswa-edit', [$data_nilai->id_table_ms_prospective_students ]));
        }

        if(isset($request->de_mtk)){
            $data_nilai->nilai_mtk = $request->get('de_mtk') .'.'. $request->get('be_mtk');
        }
        elseif(isset($request->be_mtk)){
            \Session::flash('dedu_mtk', 'Isikan nilai depan terlebih dulu.');
            return redirect(route('siswa-edit', [$data_nilai->id_table_ms_prospective_students ]));
        }

        if(isset($request->de_ipa)){
            $data_nilai->nilai_ipa = $request->get('de_ipa') .'.'. $request->get('be_ipa');
        }
        elseif(isset($request->be_ipa)){
            \Session::flash('dedu_ipa', 'Isikan nilai depan terlebih dulu.');
            return redirect(route('siswa-edit', [$data_nilai->id_table_ms_prospective_students ]));
        }


        $data_nilai->rata_nilai = $data_nilai->nilai_bahasa_indonesia + $data_nilai->nilai_mtk + $data_nilai->nilai_ipa;
        
        
        
        if(isset($request->foto_scan_surat_skhun)){
            $imageFile = $request->no_skhun.'/'.\Str::random(60).'.'.$request->foto_scan_surat_skhun->getClientOriginalExtension();
            $image_path = $request->file('foto_scan_surat_skhun')->move(storage_path('app/public/foto_scan_surat_skhun/'.$request->no_skhun), $imageFile);

            $data_nilai->foto_scan_surat_skhun = $imageFile;
        }

        $data_nilai->save();
        return redirect(route('siswa-edit', $data_nilai->id));



    }


    public function siswa_update_data_orangtua_wali(Request $request, $id_table_ms_prospective_students)
    {
        $data = MsProspectiveStudents::where('id', $id_table_ms_prospective_students)->first();

        $data_ayah = MsFatherData::where('id_table_ms_prospective_students', $id_table_ms_prospective_students)->first();
        $data_ayah->nama_ayah = $request->get('nama_ayah');
        $data_ayah->nik_ayah = $request->get('nik_ayah');
        $data_ayah->tempat_lahir_ayah = $request->get('tempat_lahir_ayah');
        $data_ayah->tanggal_lahir_ayah = $request->get('tanggal_lahir_ayah');
        $data_ayah->pekerjaan_ayah = $request->get('pekerjaan_ayah');
        $data_ayah->pendidikan_terakhir_ayah = $request->get('pendidikan_terakhir_ayah');
        $data_ayah->no_hp_ayah = $request->get('no_hp_ayah');
        $data_ayah->alamat_ayah = $request->get('alamat_ayah');
        $data_ayah->save();

        $data_ibu = MsMotherData::where('id_table_ms_prospective_students', $id_table_ms_prospective_students)->first();
        $data_ibu->nama_ibu = $request->get('nama_ibu');
        $data_ibu->nik_ibu = $request->get('nik_ibu');
        $data_ibu->tempat_lahir_ibu = $request->get('tempat_lahir_ibu');
        $data_ibu->tanggal_lahir_ibu = $request->get('tanggal_lahir_ibu');
        $data_ibu->pekerjaan_ibu = $request->get('pekerjaan_ibu');
        $data_ibu->pendidikan_terakhir_ibu = $request->get('pendidikan_terakhir_ibu');
        $data_ibu->no_hp_ibu = $request->get('no_hp_ibu');
        $data_ibu->alamat_ibu = $request->get('alamat_ibu');
        $data_ibu->save();

        $data_wali = MsGuardiansData::where('id_table_ms_prospective_students', $id_table_ms_prospective_students)->first();
        $data_wali->nama_wali = $request->get('nama_wali');
        $data_wali->nik_wali = $request->get('nik_wali');
        $data_wali->jenis_kelamin_wali = $request->get('jenis_kelamin_wali');
        $data_wali->tempat_lahir_wali = $request->get('tempat_lahir_wali');
        $data_wali->tanggal_lahir_wali = $request->get('tanggal_lahir_wali');
        $data_wali->pekerjaan_wali = $request->get('pekerjaan_wali');
        $data_wali->pendidikan_terakhir_wali = $request->get('pendidikan_terakhir_wali');
        $data_wali->no_hp_wali = $request->get('no_hp_wali');
        $data_wali->alamat_wali = $request->get('alamat_wali');
        $data_wali->save();

        return redirect(route('siswa-edit', $data->id));


    }

    public function edit_password_siswa_store(Request $request)
    {    
        
        $data = MsProspectiveStudents::where('nisn',$request->nisn)->first();

        if ($request->password_pendaftaran != $request->password_confirm) {

            
            \Session::flash('error', 'Password & Confirm Password Tidak Sama !');

            return redirect(route('siswa-edit', $data->id ));
            
        }


        if (isset($request->password_pendaftaran)) {
            $data->password_pendaftaran = \Hash::make($request->password_pendaftaran);
        }


        
        $data_akhir = $data->password_pendaftaran;
        $data->update(['password_pendaftaran' => $data_akhir]);


        \Session::flash('success', 'Sukses Update Password');
        return redirect(route('siswa-edit', $data->id ));

    }


    public function siswa_delete($id)
    {
        $data = MsProspectiveStudents::find($id);

        $data1 = MsProspectiveStudents::where('id', $id)->first()->delete();
        $data1 = MsFatherData::where('id', $data->id_table_ms_father_data)->first()->delete();
        $data2 = MsMotherData::where('id', $data->id_table_ms_mother_data)->first()->delete();
        $data3 = MsGuardiansData::where('id', $data->id_table_ms_guardians_data)->first()->delete();

        $data4 = MsProspectiveStudentGrades::where('id', $data->id_table_ms_prospective_grades)->first();
        if ($data4 == true) {

            $data4 = MsProspectiveStudentGrades::where('id', $data->id_table_ms_prospective_grades)->first()->delete();
            
        } else {
                
        }

        if ($data->status == 'process') {
            return redirect(route('siswa-process'));
        }
        elseif ($data->status == 'received') {
            return redirect(route('siswa-received'));
        }
        elseif ($data->status == 'rejected') {
            return redirect(route('siswa-rejected'));
            
        }


        


        

    }





    public function siswa_received()
    {
        $get_received = 'received';

        // $data = MsProspectiveStudents::where('status', $get_received)->with('data_ayah', 'data_ibu', 'data_wali','data_sekolah_nilai')->get();

        $order = 'desc';
        $data = MsProspectiveStudents::where('status', $get_received)
                ->join('ms_prospective_student_grades', 'ms_prospective_students.id_table_ms_prospective_grades', '=', 'ms_prospective_student_grades.id')
                ->orderBy('ms_prospective_student_grades.rata_nilai', $order)->select('ms_prospective_students.*')->get();

        return view('dashboard_admin.management_siswa_received', compact('data'));

    }

    public function downloadall_received_pdf()
    {
        $get_recived = 'received';
        // $data = MsProspectiveStudents::where('status', $get_recived)->with('data_sekolah_nilai')->get();
        $order = 'desc';
        $data = MsProspectiveStudents::where('status', $get_recived)
                ->join('ms_prospective_student_grades', 'ms_prospective_students.id_table_ms_prospective_grades', '=', 'ms_prospective_student_grades.id')
                ->orderBy('ms_prospective_student_grades.rata_nilai', $order)->select('ms_prospective_students.*')->get();
                
        $pdf = \PDF::loadView('pdf.download_all_siswa_received_pdf' , compact('data'))->setPaper('a4')->setOrientation('landscape');
        return $pdf->download('All_Siswa_Received.pdf');
    }

    public function export_received_excel() 
    {
        return Excel::download(new SiswaReceivedExport, 'SiswaReceivedExport.xlsx');
    }




    public function siswa_rejected()
    {
        $get_rejected = 'rejected';
        // $data = MsProspectiveStudents::where('status', $get_rejected)->with('data_ayah', 'data_ibu', 'data_wali','data_sekolah_nilai')->get();
        $order = 'desc';
        $data = MsProspectiveStudents::where('status', $get_rejected)
                ->join('ms_prospective_student_grades', 'ms_prospective_students.id_table_ms_prospective_grades', '=', 'ms_prospective_student_grades.id')
                ->orderBy('ms_prospective_student_grades.rata_nilai', $order)->select('ms_prospective_students.*')->get();

        return view('dashboard_admin.management_siswa_rejected', compact('data'));
    }









        // Create Rata Rata Nilai
        // if ($data->data_sekolah_nilai != true) {

        //     return view('dashboard_admin.management_siswa_detail', compact('data'));
            

        // } elseif($data) {

        //    // Menjumlahkan Nilai
        //     $rata_nilai = $data->data_sekolah_nilai->nilai_bahasa_indonesia + $data->data_sekolah_nilai->nilai_mtk + $data->data_sekolah_nilai->nilai_ipa;
        //     return view('dashboard_admin.management_siswa_detail', compact('data', 'rata_nilai'));

                
        // }



























    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }
}
