<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMsOpenCloseWebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ms_open_close_webs', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_maweb');
            $table->dateTime('dari_tgl');
            $table->dateTime('sampai_tgl');
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
        Schema::dropIfExists('ms_open_close_webs');
    }
}
