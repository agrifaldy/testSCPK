<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResultPasienColoumToCekPasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cek_pasien', function (Blueprint $table) {
            //
            $table->string('result_pasien')->after('pasien_id')->nullable();
            $table->double('z')->after('asam_urat')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cek_pasien', function (Blueprint $table) {
            //
        });
    }
}
