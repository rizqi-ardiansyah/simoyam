<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posko', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('detail');
            $table->unsignedBigInteger('kapasitas');
            $table->unsignedBigInteger('trc_id')->nullable();
            $table->unsignedBigInteger('bencana_id')->nullable();
            // $table->unsignedBigInteger('pengungsi_id')->nullable();
            // $table->foreign('trc_id')->references('id')->on('users');
            // $table->foreign('bencana_id')->references('id')->on('bencana');
            // $table->foreign('pengungsi_id')->references('id')->on('pengungsi');
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
        Schema::dropIfExists('posko');
    }
};
