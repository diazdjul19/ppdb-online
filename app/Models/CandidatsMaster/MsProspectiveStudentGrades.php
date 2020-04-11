<?php

namespace App\Models\CandidatsMaster;

use Illuminate\Database\Eloquent\Model;

class MsProspectiveStudentGrades extends Model
{
    protected $guarded = [];

    public function data_siswa()
    {
        return $this->belongsTo(MsProspectiveStudents::class, 'id_table_ms_prospective_students', 'id');
    }
}
