<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_product', function (Blueprint $table) {
            $table->foreign('kdSatuan', 'kdsatuanproduk_ifk')->references('kdSatuan')->on('tb_satuan')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('tb_product', function (Blueprint $table) {
            $table->foreign('kdkategori', 'kdkategoriproduk_ifk')->references('kdKategori')->on('tb_kategori')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_product', function (Blueprint $table) {
            //
        });
    }
}
