<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKaryawansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Nip')->unique();
            $table->string('Nama_karyawan');
            $table->unsignedInteger('jabatan_id');
            $table->foreign('jabatan_id')->references('id')->on('jabatans')->onUpdate('cascade')->onDelete('cascade');
            $table->string('Alamat');
            $table->string('JK');
            $table->string('No_hp');            
            $table->string('Tpt_lahir');
            $table->date('Tgl_lahir');
            $table->string('Photo');
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
        Schema::dropIfExists('karyawans');
    }
}
