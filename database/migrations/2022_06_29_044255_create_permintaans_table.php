<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermintaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permintaans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode',50);
            $table->string('user_fk',12);
            $table->text('perihal');
            $table->date('waktu_proses');
            $table->date('waktu_pakai');
            $table->date('waktu_kembali')->nullable();
            $table->string('status',20);
            $table->text('ket');
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
        Schema::dropIfExists('permintaans');
    }
}
