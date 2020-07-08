<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNilaiPenyakitColoumnToCekPasienRiwayatPenyakitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cek_pasien_riwayat_penyakit', function (Blueprint $table) {
            //
            $table->integer('nilai_penyakit')->after('penyakit_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cek_pasien_riwayat_penyakit', function (Blueprint $table) {
            //
        });
    }
}
