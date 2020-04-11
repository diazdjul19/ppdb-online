<?php

namespace App\Exports;

use App\Models\CandidatsMaster\MsProspectiveStudents;
use Maatwebsite\Excel\Concerns\FromCollection;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SiswaReceivedExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $get_recived = 'received';
        $data = MsProspectiveStudents::where('status', $get_recived)->with('data_sekolah_nilai')->get();
        return view('export_excel.export_all_siswa_received', compact('data'));

    }
}
