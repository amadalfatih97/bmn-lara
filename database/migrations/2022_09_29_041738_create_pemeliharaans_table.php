<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemeliharaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemeliharaans', function (Blueprint $table) {
            $table->id();
            $table->string('aset_fk', 50);
            $table->string('kode', 100)->nullable();
            $table->date('waktu_pelaksanaan');
            $table->text('keluhan')->nullable();
            $table->string('hasil', 100);
            $table->text('tindak_lanjut')->nullable();
            $table->text('ket')->nullable();
            $table->text('img')->nullable();
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
        Schema::dropIfExists('pemeliharaans');
    }
}
