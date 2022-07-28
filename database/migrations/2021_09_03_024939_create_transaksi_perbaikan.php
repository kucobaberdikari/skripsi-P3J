<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiPerbaikan extends Migration
{

    public function up()
    {
        Schema::create('transaksi_perbaikan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_transaksi');
            $table->integer('id_pelanggan');
            $table->string('nama');
            $table->string('alamat');
            $table->string('kodepos');
            $table->integer('telepon');
            $table->string('email');
            $table->longText('deskripsi');
            $table->dateTime('tanggal_diproses');
            $table->string('teknisi');
            $table->enum('status', ['terkonfirmasi','gagal','selesai']);

            $table->softDeletes();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('transaksi_perbaikan');
    }
}
