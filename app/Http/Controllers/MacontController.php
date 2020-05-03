<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MaContMaster\MsTextCont;


class MacontController extends Controller
{
    
    // PROSEDUR & SYARAT
    public function macont_prosedur_syarat()
    {
        $data_code = MsTextCont::where('code_unik', 'ea385809eefed48c3c3abb6dc680945e')->first();
        return view('dashboard_admin.macont_prosedur_syarat', compact('data_code'));
    }

    public function macont_prosedur_syarat_store(Request $request)
    {
        $data = new MsTextCont();
        $data->code_unik = $request->code_unik;
        $data->nama_content = $request->nama_content;
        $data->text_information = $request->text_information;
        $data->save();

        \Session::flash('success_create', "Macont Product & Syarat Berhasil Di Publish");
        return redirect(route('macont-prosedur-syarat'));
    }

    public function macont_prosedur_syarat_update(Request $request, $id)
    {
        $data = MsTextCont::find($id);
        $data->text_information = $request->get('text_information');
        $data->save();

        \Session::flash('success_update', "Macont Product & Syarat Berhasil Di Publish");
        return redirect(route('macont-prosedur-syarat'));
        
    }


    // AGENDA
    public function macont_agenda()
    {
        $data_code = MsTextCont::where('code_unik', 'd0dbdfd8edf8dd1608405055c26adc94')->first();
        return view('dashboard_admin.macont_agenda', compact('data_code'));
    }

    public function macont_agenda_store(Request $request)
    {
        $data = new MsTextCont();
        $data->code_unik = $request->code_unik;
        $data->nama_content = $request->nama_content;
        $data->text_information = $request->text_information;
        $data->save();

        \Session::flash('success_create', "Macont Agenda Berhasil Di Publish");
        return redirect(route('macont-agenda'));
    }

    public function macont_agenda_update(Request $request, $id)
    {
        $data = MsTextCont::find($id);
        $data->text_information = $request->get('text_information');
        $data->save();

        \Session::flash('success_update', "Macont Agenda Berhasil Di Publish");
        return redirect(route('macont-agenda'));
        
    }


    // DAFTAR ULANG
    public function macont_daftar_ulang()
    {
        $data_code = MsTextCont::where('code_unik', '86397b70d3bfde246082defe4d67288a')->first();
        return view('dashboard_admin.macont_daftar_ulang', compact('data_code'));

    }

    public function macont_daftar_ulang_store(Request $request)
    {
        $data = new MsTextCont();
        $data->code_unik = $request->code_unik;
        $data->nama_content = $request->nama_content;
        $data->text_information = $request->text_information;
        $data->save();

        \Session::flash('success_create', "Macont Daftar Ulang Berhasil Di Publish");
        return redirect(route('macont-daftar-ulang'));
    }

    public function macont_daftar_ulang_update(Request $request, $id)
    {
        $data = MsTextCont::find($id);
        $data->text_information = $request->get('text_information');
        $data->save();

        \Session::flash('success_update', "Macont Daftar Ulang Berhasil Di Publish");
        return redirect(route('macont-daftar-ulang'));
        
    }



}

