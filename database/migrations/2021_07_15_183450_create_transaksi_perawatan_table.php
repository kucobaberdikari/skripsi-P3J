<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPerawatanTable extends Migration
{
   
    public function up()
    {
        Schema::create('transaksi_perawatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_transaksi');
            $table->integer('id_pelanggan');
            $table->string('nama');
            $table->string('alamat');
            $table->string('kodepos');
            $table->integer('telepon');
            $table->string('email');
            $table->longText('perawatan');
            $table->longText('deskripsi');
            $table->integer('biaya');
            $table->dateTime('tanggal_diproses');
            $table->string('teknisi');
            $table->enum('status', ['terkonfirmasi','gagal','selesai']);

            $table->softDeletes();
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('transaksi_perawatans');
    }
}
