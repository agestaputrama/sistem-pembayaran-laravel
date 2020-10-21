<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('mahasiswa_id')->unsigned();
            $table->date('tanggal');
            $table->string('jenis_tagihan');
            $table->integer('jumlah');
            $table->string('status_pembayaran');
            $table->timestamps();
       
         $table->foreign('mahasiswa_id')->references('id')->on('mahasiswas')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagihans');
    }
}
