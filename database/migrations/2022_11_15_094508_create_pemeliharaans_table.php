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
            $table->increments('id');
            $table->string('barang_fk');
            $table->date('tgl_pemeliharaan');
            $table->text('kondisi_sebelum')->nullable();
            $table->text('tindakan');
            $table->string('pelaksana');
            $table->text('src_bukti')->nullable();
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
