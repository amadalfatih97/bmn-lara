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
            $table->text('merek')->nullable();
            $table->string('kode_bmn',50)->nullable();
            $table->string('kode_item',50)->unique();
            $table->string('kategori_fk',100);
            $table->text('keyword');
            $table->string('satuan_fk',10);
            $table->string('lokasi_fk',10);
            $table->date('tgl_perolehan');
            $table->string('kondisi',30);//baik/rusak ringan/ rusak berat
            $table->string('status',30)->default('sedia');//sedia/tidak sedia
            $table->boolean('type')->default(0)->change();//chek berkala?
            $table->date('pemeliharaan_terakhir');
            $table->string('jadwal_service',100)->nullable();
            $table->text('ket')->nullable();
            $table->text('img')->nullable();
            $table->integer('aktif')->lenght(1)->default(1)->unsigned();//1=aktif/0=nonaktif
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
