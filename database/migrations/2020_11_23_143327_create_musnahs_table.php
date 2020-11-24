<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMusnahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('musnahs', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('musnahs');
    }
}
