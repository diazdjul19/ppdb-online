<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsProspectiveStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_prospective_students', function (Blueprint $table) {
            $table->Increments("id");
            $table->string("code_pendaftaran");
            $table->string("enter_code");
            $table->string("password_pendaftaran")->nullable();
            $table->string("nik");
            $table->string("nisn");
            $table->string("no_register_akte")->nullable();
            $table->string("nama_calon_siswa");
            $table->string("jenis_kelamin");
            $table->string("agama")->nullable();
            $table->string("kewarganegaraan");
            $table->string("tempat_lahir");
            $table->date("tanggal_lahir");
            $table->string("no_hp")->nullable();
            $table->string("foto_siswa")->nullable();
            $table->string("alamat_jalan")->nullable();
            $table->string("alamat_dusun")->nullable();
            $table->string("alamat_rt")->nullable();
            $table->string("alamat_rw")->nullable();
            $table->string("alamat_kode_pos")->nullable();
            $table->string("alamat_kelurahan")->nullable();
            $table->string("alamat_kecamatan")->nullable();
            $table->string("alamat_kota_kabupaten")->nullable();
            $table->string("alamat_provinsi")->nullable();
            $table->string("tinggal_bersama")->nullable();
            $table->string("status");
            $table->integer('id_table_ms_father_data')->nullable();
            $table->integer('id_table_ms_mother_data')->nullable();
            $table->integer('id_table_ms_guardians_data')->nullable();
            $table->integer('id_table_ms_prospective_grades')->nullable();
            $table->string("gelombang_pendaftaran")->nullable();
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
        Schema::dropIfExists('ms_prospective_students');
    }
}
