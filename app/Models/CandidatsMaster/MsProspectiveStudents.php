<?php

namespace App\Models\CandidatsMaster;

use Illuminate\Database\Eloquent\Model;
use App\Models\CandidatsMaster\MsProspectiveStudents;
use App\Models\CandidatsMaster\MsProspectiveStudentGrades;
use App\Models\CandidatsMaster\MsFatherData;
use App\Models\CandidatsMaster\MsMotherData;
use App\Models\CandidatsMaster\MsGuardiansData;

class MsProspectiveStudents extends Model
{
    protected $guarded = [];

    public function data_ayah()
    {
        return $this->belongsTo(MsFatherData::class, 'id_table_ms_father_data', 'id');
    }

    public function data_ibu()
    {
        return $this->belongsTo(MsMotherData::class, 'id_table_ms_mother_data', 'id');
    }

    public function data_wali()
    {
        return $this->belongsTo(MsGuardiansData::class, 'id_table_ms_guardians_data', 'id');
    }

    public function data_sekolah_nilai()
    {
        return $this->belongsTo(MsProspectiveStudentGrades::class, 'id_table_ms_prospective_grades', 'id');
    }


}
