<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CandidatsMaster\MsProspectiveStudents;
use App\User;
use Auth;


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


    public function edit_password_ao()
    {
        $data_session = Auth::user();
        $data = User::where('email', $data_session->email)->first();

        if ($data == true) {
            return view('dashboard_admin.laman_edit_password_ao', compact('data'));
        }
        elseif($data == false) {
            return abort(404);
        }
    }

    public function edit_password_store_ao(Request $request)
    {
        $data_session = Auth::user();

        $data = User::where('email', $data_session->email)->first();

        // Check Old Password
        if (\Hash::check($request->old_password, $data->password)) {


            // Check Confirm Password
            if ($request->password != $request->password_confirm) {
                \Session::flash('error', 'Password Tidak Sama !');
                return redirect(route('edit-password-ao'));
            }
            elseif ($request->password == false) {
                \Session::flash('non_new_pass', 'Password Baru Belum Di Isi !');
                return redirect(route('edit-password-ao'));
            }

            // Make Hash Password
            if (isset($request->password)) {
                $data->password = \Hash::make($request->password);

                // Update Password Siswa
                $data_akhir = $data->password;
                $data->update(['password' => $data_akhir]);


                \Session::flash('success', 'Sukses Update Password');
                return redirect(route('home'));
            }

        }else {
            \Session::flash('error_old_password', 'Password Lama Tidak Sesuai !');
            return redirect(route('edit-password-ao'));
        }

        
    }
}
