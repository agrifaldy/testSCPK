<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCekPasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cek_pasien', function (Blueprint $table) {
            $table->id();
            $table->integer('pasien_id');
            $table->double('tekanan_darah_sistolik');
            $table->double('tekanan_darah_diastolik');
            $table->double('suhu_tubuh');
            $table->double('berat_badan');
            $table->double('tinggi_badan');
            $table->double('kolesterol')->nullable();
            $table->double('asam_urat')->nullable();
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
        Schema::dropIfExists('cek_pasien');
    }
}
