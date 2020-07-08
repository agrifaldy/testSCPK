<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravolt\Indonesia\Models\City;

class Pasien extends Model
{
    //
    protected $table = 'pasien';

    protected $fillable = [
        'nama', 'tanggal_lahir', 'umur', 'jenis_kelamin', 'alamat', 'nik', 'no_hp', 'kota_id'
    ];

    public function kotaa() {
        return $this->belongsTo('Laravolt\Indonesia\Models\City', 'kota_id');
    }
}
