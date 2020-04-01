<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsGuardiansDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_guardians_data', function (Blueprint $table) {
            $table->Increments("id");
            $table->integer('id_table_ms_prospective_students')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('nik_wali')->nullable();
            $table->string('tempat_lahir_wali')->nullable();
            $table->date('tanggal_lahir_wali')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('pekerjaan_wali')->nullable();
            $table->string('pendidikan_terakhir_wali')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('alamat_wali')->nullable();
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
        Schema::dropIfExists('ms_guardians_data');
    }
}
