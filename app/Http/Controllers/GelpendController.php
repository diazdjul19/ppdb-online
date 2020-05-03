<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gelpend\MsGelpend;


class GelpendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = MsGelpend::all();
        return view('dashboard_admin.gelpend', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard_admin.gelpend_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new MsGelpend();
        $data->nama_gelombang = $request->nama_gelombang;
        $data->text_description = $request->text_description;

        $data->save();

        if ($data) {
            return redirect(route('gelpend.index'));
        } else {
            # code...
        }
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
        $data = MsGelpend::find($id);
        return view('dashboard_admin.gelpend_edit', compact('data'));
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
        $data = MsGelpend::find($id);
        $data->text_description = $request->get('text_description');
        $data->save();
        return redirect(route('gelpend.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MsGelpend::find($id)->delete();
        return redirect(route('gelpend.index'));
    }
}
