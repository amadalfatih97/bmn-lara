<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPinjamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_pinjams', function (Blueprint $table) {
            $table->increments('id');
            $table->string('pinjam_fk',50);
            $table->string('aset_fk',50);
            $table->integer('qty')->lenght(3)->unsigned();
            $table->date('waktu_pakai')->nullable();
            $table->date('waktu_kembali')->nullable();
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
        Schema::dropIfExists('detail_pinjams');
    }
}
