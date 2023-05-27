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
        Schema::create('periksa', function (Blueprint $table) {
            $table->id();
            $table->string('idPerusahaan');
            $table->string('idKandang');
            $table->date('tglPeriksa');
            $table->unsignedBigInteger('mati');
            $table->unsignedBigInteger('culling');
            $table->float('bobot',8,2);
            $table->unsignedBigInteger('pakan');
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
        Schema::dropIfExists('periksa');
    }
};
