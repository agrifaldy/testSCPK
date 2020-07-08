<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCekRiwayatPenyakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cek_riwayat_penyakit', function (Blueprint $table) {
            $table->id();
            $table->integer('cek_pasien_id');
            $table->integer('petugas_id');
            $table->integer('penyakit_id');
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
        Schema::dropIfExists('cek_riwayat_penyakit');
    }
}
