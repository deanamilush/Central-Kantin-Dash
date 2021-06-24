<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_all_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_katering');
            $table->string('hari');
            $table->string('menu_utama');
            $table->string('menu_add_on');
            $table->string('harga_add_on');
            $table->string('nama');
            $table->integer('nrp');
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
        Schema::dropIfExists('master_all_menu');
    }
}
