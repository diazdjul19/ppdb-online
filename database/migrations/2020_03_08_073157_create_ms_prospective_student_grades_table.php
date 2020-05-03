<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsProspectiveStudentGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_prospective_student_grades', function (Blueprint $table) {
            $table->Increments("id");
            $table->integer("id_table_ms_prospective_students")->nullable();
            // $table->integer("id_table_ms_prospective_parents")->nullable();
            $table->string("no_skhun")->nullable();
            $table->string("asal_sekolah_nama")->nullable();
            $table->string("asal_sekolah_kota")->nullable();
            $table->string("asal_sekolah_provinsi")->nullable();
            $table->float("nilai_bahasa_indonesia")->nullable();
            $table->float("nilai_mtk")->nullable();
            $table->float("nilai_ipa")->nullable();
            $table->float("nilai_bahasa_inggris")->nullable();
            $table->float("rata_nilai")->nullable();
            $table->string("foto_scan_surat_skhun")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ms_prospective_student_grades');
    }
}
