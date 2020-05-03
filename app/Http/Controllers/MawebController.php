<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaWebMaster\MsOpenCloseWeb;
use App\Models\Gelpend\MsGelpend;

class MawebController extends Controller
{
    
    // Maweb Pendaftaran
    public function maweb_pendaftaran()
    {
        $data = MsOpenCloseWeb::where('jenis_maweb', 'maweb_pendaftaran')->orderBy('id', 'desc')->get();
        $dt = date('Y-m-d H:i:s');
        return view('dashboard_admin.maweb_pendaftaran', compact('data', 'dt'));
    }

    public function maweb_pendaftaran_create()
    {   
        $data_gelpend = MsGelpend::all();
        return view('dashboard_admin.maweb_all_create', compact('data_gelpend'));
    }

    public function maweb_pendaftaran_store(Request $request)
    {
        //  // Membuat Validasi Dulu
        // $this->validate($request, [
        //     'Jenis Gelombang Pendaftaran' => ['required', 'string', 'max:255'],
        // ]);

        if ($request->nama_gelombang_table_ms_gelpends == null) {
            \Session::flash('not_gelpend', "Kolom Jenis Gelombang Pendaftaran Wajib Di Isi.");
            return redirect(route('maweb-pendaftaran-create'));
        }

        $maweb_pendaftaran = new MsOpenCloseWeb();
        $maweb_pendaftaran->jenis_maweb = 'maweb_pendaftaran';
        $maweb_pendaftaran->nama_gelombang_table_ms_gelpends = $request->nama_gelombang_table_ms_gelpends;
        $maweb_pendaftaran->dari_tgl = date('Y-m-d H:i:s',strtotime($request->input('dari_tgl')));
        $maweb_pendaftaran->sampai_tgl = date('Y-m-d H:i:s',strtotime($request->input('sampai_tgl')));
        $maweb_pendaftaran->save();

        return redirect(route('maweb-pendaftaran'));
    }



    // Maweb Hasil Seleksi
    public function maweb_hasil_seleksi()
    {
        $data = MsOpenCloseWeb::where('jenis_maweb', 'maweb_hasil_seleksi')->orderBy('id', 'desc')->get();
        $dt = date('Y-m-d H:i:s');
        return view('dashboard_admin.maweb_hasil_seleksi', compact('data', 'dt'));
    }

    public function maweb_hasil_seleksi_create()
    {
        return view('dashboard_admin.maweb_all_create');
    }

    public function maweb_hasil_seleksi_store(Request $request)
    {
        $maweb_hasil_seleksi = new MsOpenCloseWeb();
        $maweb_hasil_seleksi->jenis_maweb = 'maweb_hasil_seleksi';
        $maweb_hasil_seleksi->dari_tgl = date('Y-m-d H:i:s',strtotime($request->input('dari_tgl')));
        $maweb_hasil_seleksi->sampai_tgl = date('Y-m-d H:i:s',strtotime($request->input('sampai_tgl')));
        $maweb_hasil_seleksi->save();

        return redirect(route('maweb-hasil-seleksi'));
    }



    // Maweb Contact Us
    public function maweb_contact_us()
    {
        $data = MsOpenCloseWeb::where('jenis_maweb', 'maweb_contact_us')->orderBy('id', 'desc')->get();
        $dt = date('Y-m-d H:i:s');
        return view('dashboard_admin.maweb_contact_us', compact('data', 'dt'));
    }

    public function maweb_contact_us_create()
    {
        return view('dashboard_admin.maweb_all_create');
    }

    public function maweb_contact_us_store(Request $request)
    {
        $maweb_contact_us = new MsOpenCloseWeb();
        $maweb_contact_us->jenis_maweb = 'maweb_contact_us';
        $maweb_contact_us->dari_tgl = date('Y-m-d H:i:s',strtotime($request->input('dari_tgl')));
        $maweb_contact_us->sampai_tgl = date('Y-m-d H:i:s',strtotime($request->input('sampai_tgl')));
        $maweb_contact_us->save();

        return redirect(route('maweb-contact-us'));
    }




    public function maweb_delete($id)
    {
        $data = MsOpenCloseWeb::find($id);

        $data1 = MsOpenCloseWeb::where('id', $id)->first()->delete();

        if ($data->jenis_maweb == 'maweb_pendaftaran') {
            return redirect(route('maweb-pendaftaran'));
        }
        elseif ($data->jenis_maweb == 'maweb_hasil_seleksi') {
            return redirect(route('maweb-hasil-seleksi'));
        }
        elseif ($data->jenis_maweb == 'maweb_contact_us') {
            return redirect(route('maweb-contact-us'));
            
        }

    }

}
