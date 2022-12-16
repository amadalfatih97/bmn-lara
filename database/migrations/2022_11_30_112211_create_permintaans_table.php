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
            $table->string('user_fk',12);
            $table->text('kegunaan');
            $table->date('keluar');
            $table->date('jadwal_pakai');
            $table->integer('lama')->lenght(3)->nullable();
            $table->date('masuk')->nullable();
            $table->integer('status')->lenght(1)->default(1)->unsigned();
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
        Schema::dropIfExists('permintaans');
    }
}
