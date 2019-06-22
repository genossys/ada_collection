<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RelasiTransaksi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('tb_keranjang', function (Blueprint $table) {
            $table->foreign('noTrans', 'noTranskeranjang_ifk')->references('noTrans')->on('tb_belanja')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('tb_keranjang', function (Blueprint $table) {
            $table->foreign('kdCustomer', 'kdCustomerkeranjang_ifk')->references('kdCustomer')->on('tb_customer')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('tb_keranjang', function (Blueprint $table) {
            $table->foreign('kdSales', 'kdSaleskeranjang_ifk')->references('kdSales')->on('tb_sales')->onDelete('CASCADE')->onUpdate('CASCADE');
        });

        Schema::table('tb_keranjang', function (Blueprint $table) {
            $table->foreign('kdProduct', 'kdproductkeranjang_ifk')->references('kdProduct')->on('tb_product')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
        Schema::table('tb_belanja', function (Blueprint $table) {
            $table->foreign('kdCustomer', 'kdCustomerbelanja_ifk')->references('kdCustomer')->on('tb_customer')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
