<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CekPasien extends Model
{
    //
    protected $table = 'cek_pasien';

    protected $fillable = [
        "id_uniq","result_pasien", "pasien_id", "tekanan_darah_sistolik",	"tekanan_darah_diastolik",	"suhu_tubuh",	"berat_badan",	"tinggi_badan",	"kolesterol", "asam_urat", "z"
    ];

    public function pasiens(){
        return $this->belongsTo('App\Pasien', 'pasien_id');
    }
}
