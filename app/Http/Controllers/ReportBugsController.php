<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ReportBugsMaster\ReportBugs;


class ReportBugsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = ReportBugs::orderBy('id', 'desc')->get();
        return view('dashboard_admin.report_bugs', compact('data'));
    }

    public function complete($id)
    {
        $data = ReportBugs::find($id);
        $data->update(['status' => 'complete']);

        return redirect(route('report-bugs-admin.index'));
    }

    public function not_complete($id)
    {
        $data = ReportBugs::find($id);
        $data->update(['status' => 'not complete']);

        return redirect(route('report-bugs-admin.index'));
    }

    public function spam($id)
    {
        $data = ReportBugs::find($id);
        $data->update(['status' => 'spam']);

        return redirect(route('report-bugs-admin.index'));
    }

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
        $data = ReportBugs::find($id);
        return view('dashboard_admin.report_bugs_detail', compact('data'));
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
        $data = ReportBugs::find($id)->delete();
        return redirect(route('report-bugs-admin.index'));
    }
}
