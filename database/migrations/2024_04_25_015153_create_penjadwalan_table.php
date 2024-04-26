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
        Schema::create('penjadwalan', function (Blueprint $table) {
            $table->id();
            $table->string('id_penjadwalan');
            $table->date('tanggal');
            $table->string('nama_alat');
            $table->unsignedBigInteger('id_nama_alat');
            $table->foreign('id_nama_alat')->references('id')->on('peralatan')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('id_point_check');
            $table->foreign('id_point_check')->references('id')->on('tbpoint_check')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ruangan');
            $table->date('tanggal_jadwal');
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
        Schema::dropIfExists('penjadwalan');
    }
};
