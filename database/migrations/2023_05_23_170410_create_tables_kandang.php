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
        Schema::create('kandang', function (Blueprint $table) {
            $table->id();
            $table->string('idPerusahaan');
            $table->unsignedBigInteger('noKandang');
            $table->date('tglMasuk');
            $table->string('asalPeternak');
            $table->unsignedBigInteger('jnsAyam');
            $table->string('jmlAyam');
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
        Schema::dropIfExists('kandang');
    }
};
