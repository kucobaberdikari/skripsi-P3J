<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePerbaikan extends Migration
{
    
    public function up()
    {
        Schema::create('perbaikans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_pelanggan');
            $table->string('nama');
            $table->string('alamat');
            $table->integer('kodepos');
            $table->string('telepon');
            $table->longText('description');
            $table->enum('status', ['PENDING','PROCESSED'])->default('PENDING');
            $table->string('operator');
            $table->dateTime('tenggat');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('perbaikans');
    }
}
