<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode',12)->unique();;
            $table->string('nama_barang',100);
            $table->string('satuan_fk',10);
            $table->integer('stok')->lenght(4)->unsigned();
            $table->string('lokasi_fk',10);
            $table->string('kondisi',30);//baik/rusak ringan/ rusak berat
            $table->string('status',30);//sedia/tidak sedia
            $table->text('ket')->nullable();
            $table->integer('aktif')->lenght(1)->default(1)->unsigned();//1=aktif/nonaktif
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
        Schema::dropIfExists('barangs');
    }
}
