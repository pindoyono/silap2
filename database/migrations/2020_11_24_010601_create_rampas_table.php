<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRampasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rampas', function (Blueprint $table) {
            $table->id();
            $table->string('no_terdakwa')->nullable();
            $table->string('terdakwa')->nullable();
            $table->string('no_bb')->nullable();
            $table->string('nama_bb')->nullable();
            $table->string('pp_no')->nullable();
            $table->date('tgl_pp')->nullable();
            $table->string('ppp_no')->nullable();
            $table->date('tgl_ppp')->nullable();
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
        Schema::dropIfExists('rampas');
    }
}
