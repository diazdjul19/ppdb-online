<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidatsMaster\MsProspectiveStudents;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_all =  count(MsProspectiveStudents::all());

        $data_process = MsProspectiveStudents::where('status', 'process')->count();

        $data_received =  MsProspectiveStudents::where('status', 'received')->count();

        $data_rejected =  MsProspectiveStudents::where('status', 'rejected')->count();
        
        return view('dashboard_admin.home', compact('data_all', 'data_process', 'data_received', 'data_rejected'));
    }
}
