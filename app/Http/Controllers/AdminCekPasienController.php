<?php

namespace App\Http\Controllers;

use App\CekPasien;
use App\CekPasienRiwayatPenyakit;
use App\Homestay;
use App\HomestayDetail;
use App\Pasien;
use App\Penyakit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminCekPasienController extends Controller
{
    //
    public function index()
    {
        //
        $pasiens = Pasien::all();
        $cekpasien= CekPasien::all();
        return view('dashboard.cekpasien.index', compact('pasiens', 'cekpasien'));

    }

    public function edit($id)
    {
        //
        $pasien = Pasien::findOrFail($id);
        $penyakits = Penyakit::all();
        $number = mt_rand(1, 99999);
        return view('dashboard.cekpasien.create', compact('pasien', 'penyakits', 'number'));
    }

    public function update(Request $request, $id)
    {
        $unik = CekPasien::all();

        foreach($unik as $h) {
            if ($h -> id_uniq == $request -> id_uniq) {
                return redirect()->route('dashboard.cekpasien.create');
            }
        }

        if ($request->penyakit_id){
            foreach ($request->penyakit_id as $penyakit) {
                CekPasienRiwayatPenyakit::create(['cek_pasien_id' => $request->id_uniq, 'pasien_id' => $request->pasien_id, 'penyakit_id' => $penyakit ]);
            }
        }


        $riwayat_penyakit = CekPasienRiwayatPenyakit::all()->where('pasien_id' , $request->pasien_id);
        $jumlah = 0;

        foreach ($riwayat_penyakit as $penyakit) {
            $jumlah += $penyakit->penyakits->nilai_penyakit;
        }




       if ($request -> tekanan_darah_sistolik) {
           if ($request -> tekanan_darah_sistolik <= 80) {
               $tekanan_darah_sistolik = "Rendah";
           }
           if($request -> tekanan_darah_sistolik > 80 and $request -> tekanan_darah_sistolik <= 110) {
               $tekanan_darah_sistolik = "Sedang";
           }
           if($request -> tekanan_darah_sistolik > 110) {
               $tekanan_darah_sistolik = "Tinggi";
           }
           $x1 = $request->tekanan_darah_sistolik;
           $a1 = ($x1 - 160) / (180-160);
           $z1 = $x1 - (100*$a1);
           if ($z1 < 0) {
               $z1 = $z1 * -1;
           }
       }

        if ($request -> tekanan_darah_diastolik) {
            if ($request -> tekanan_darah_diastolik <= 80) {
                $tekanan_darah_diastolik = "Rendah";
            }
            if($request -> tekanan_darah_diastolik > 80 and $request -> tekanan_darah_diastolik <= 110) {
                $tekanan_darah_diastolik = "Sedang";
            }
            if($request -> tekanan_darah_diastolik > 110) {
                $tekanan_darah_diastolik = "Tinggi";
            }
            $x2 = $request->tekanan_darah_diastolik;
            $a2 = ($x2 - 100) / (110-100);
            $z2 = (($x2) - (100*$a2));
            if ($z2 < 0) {
                $z2 = $z2 * -1;
            }
        }

        if ($request -> suhu_tubuh) {
            if ($request -> suhu_tubuh < 36) {
                $suhu_tubuh = "Rendah";
            }
            if($request -> suhu_tubuh >= 36 and $request -> suhu_tubuh < 37.5) {
                $suhu_tubuh = "Sedang";
            }
            if($request -> suhu_tubuh >= 37.5) {
                $suhu_tubuh = "Tinggi";
            }
            $x3 = $request->suhu_tubuh;
            $a3 = ($x3 - 37) / (40-37);
            $z3 = $x3 - (100*$a3);
            if ($z3 < 0) {
                $z3 = $z3 * -1;
            }
        }

        if ($request -> berat_badan) {
            if ($request -> berat_badan < 30) {
                $berat_badan = "Ringan";
            }
            if($request -> berat_badan >= 30 and $request -> berat_badan < 80) {
                $berat_badan = "Biasa";
            }
            if($request -> berat_badan >= 80) {
                $berat_badan = "Berat";
            }
            $x4 = $request->berat_badan;
            $a4 = ($x4 - 60) / (80-60);
            $z4 = $x4 - (100*$a4);
            if ($z4 < 0) {
                $z4 = $z4 * -1;
            }
        }

        if ($request -> kolesterol) {
            if ($request -> kolesterol < 36) {
                $kolesterol = "Baik";
            }
            if($request -> kolesterol >= 36 and $request -> kolesterol < 37.5) {
                $kolesterol = "Perbatasan";
            }
            if($request -> kolesterol >= 37.5) {
                $kolesterol = "Bahaya";
            }
            $x5 = $request->kolesterol;
            $a5 = ($x5 - 220) / (240-220);
            $z5 = $x5 - (100*$a5);
            if ($z5 < 0) {
                $z5 = $z5 * -1;
            }
        }

        if ($request -> asam_urat) {
            if ($request -> asam_urat < 3.5) {
                $asam_urat = "Rendah";
            }
            if($request -> asam_urat >= 3.5 and $request -> asam_urat < 7) {
                $asam_urat = "Normal";
            }
            if($request -> asam_urat >= 7) {
                $asam_urat = "Tinggi";
            }
            $x6 = $request->asam_urat;
            $a6 = ($x6 - 7) / (8-7);
            $z6 = $x6 - (100*$a6);
            if ($z6 < 0) {
                $z6 = $z6 * -1;
            }
        }

//        if ($jumlah) {
//            if ($jumlah == 0) {
//                $riwayat_penyakit = "Sehat";
//            }
//            if($jumlah > 0 and $jumlah <= 0.4) {
//                $riwayat_penyakit = "Rendah";
//            }
//            if($jumlah > 0.4 and $jumlah < 0.5) {
//                $riwayat_penyakit = "Sedang";
//            }
//            if($jumlah >= 0.5 and $jumlah < 1) {
//                $riwayat_penyakit = "Tinggi";
//            }
//            if($jumlah >= 1) {
//                $riwayat_penyakit = "Sangat Tinggi";
//            }
//            $x7 = $jumlah;
//            $a7 = ($x7 - 0.4) / (1-0.4);
//            $z7 = $x7 - (100*$a7);
//            if ($z7 < 0) {
//                $z7 = $z7 * -1;
//            }
//        }

        $ztotal = ($a1*$z1 + $a2*$z2 + $a3*$z3 + $a4*$z4 + $a5*$z5 + $a6*$z6 /*+ $a7*$z7*/)/($a1 + $a2 + $a3 + $a4 + $a5 + $a6 /*+ $a7*/);

        if ($ztotal > 83.108734402853 ) {
            CekPasien::create(['result_pasien' => 'Diberi pengobatan',
                'pasien_id' => $request->pasien_id,
                'tekanan_darah_sistolik' => $request->tekanan_darah_sistolik,
                'tekanan_darah_diastolik' => $request->tekanan_darah_diastolik,
                'suhu_tubuh' => $request->suhu_tubuh,
                'berat_badan' => $request->berat_badan,
                'tinggi_badan' => $request->tinggi_badan,
                'kolesterol' => $request->kolesterol,
                'asam_urat' => $request->asam_urat,
                'id_uniq' => $request->id_uniq,
                'z' => $ztotal]);
        }else if ($ztotal == 83.108734402852 ) {
        CekPasien::create(['result_pasien' => 'Perlu dirujuk',
            'pasien_id' => $request->pasien_id,
            'tekanan_darah_sistolik' => $request->tekanan_darah_sistolik,
            'tekanan_darah_diastolik' => $request->tekanan_darah_diastolik,
            'suhu_tubuh' => $request->suhu_tubuh,
            'berat_badan' => $request->berat_badan,
            'tinggi_badan' => $request->tinggi_badan,
            'kolesterol' => $request->kolesterol,
            'asam_urat' => $request->asam_urat,
            'id_uniq' => $request->id_uniq,
            'z' => $ztotal]);
         }
        else  {
            CekPasien::create(['result_pasien' => 'Perlu dirujuk',
                'pasien_id' => $request->pasien_id,
                'tekanan_darah_sistolik' => $request->tekanan_darah_sistolik,
                'tekanan_darah_diastolik' => $request->tekanan_darah_diastolik,
                'suhu_tubuh' => $request->suhu_tubuh,
                'berat_badan' => $request->berat_badan,
                'tinggi_badan' => $request->tinggi_badan,
                'kolesterol' => $request->kolesterol,
                'asam_urat' => $request->asam_urat,
                'id_uniq' => $request->id_uniq,
                'z' => $ztotal]);
        }





        return redirect()->route('dashboard.cekpasien.index')->withSuccess('saved');
    }

    public function indexDetail($id) {

        $cek = CekPasien::all();
        $cekPasien = CekPasien::findOrFail($id);
        $id_unik = $cekPasien -> id_uniq;
        $riwayat_penyakit = CekPasienRiwayatPenyakit::all()->where('cek_pasien_id' ,'=', $id_unik);

        $sistolik = CekPasien::all()->where('id', '=', $id)->get('tekanan_darah_sistolik');
        $diastolik = CekPasien::all()->where('id', '=', $id)->get('tekanan_darah_diastolik');
        $suhu = CekPasien::all()->where('id', '=', $id)->get('suhu_tubuh');
        $berat = CekPasien::all()->where('id', '=', $id)->get('berat_badan');
        $tinggi = CekPasien::all()->where('id', '=', $id)->get('tinggi_badan');
        $koles = CekPasien::all()->where('id', '=', $id)->get('kolesterol');
        $asam = CekPasien::all()->where('id', '=', $id)->get('asam_urat');
        $z = CekPasien::all()->where('id', '=', $id)->get('z');
           
           if ($sistolik <= 80) {
               $tekanan_darah_sistolik = "Rendah";
           }
           if($sistolik > 80 and $sistolik <= 110) {
               $tekanan_darah_sistolik = "Sedang";
           }
           if($sistolik > 110) {
               $tekanan_darah_sistolik = "Tinggi";
           }
           $x1 = $sistolik;
           $a1 = ($x1 - 160) / (180-160);
           $z1 = $x1 - (100*$a1);
           if ($z1 < 0) {
               $z1 = $z1 * -1;
           }

           if ($diastolik <= 80) {
                $tekanan_darah_diastolik = "Rendah";
            }
           if($diastolik > 80 and $request -> $diastolik <= 110) {
                $tekanan_darah_diastolik = "Sedang";
            }
           if($diastolik > 110) {
                $tekanan_darah_diastolik = "Tinggi";
            }
            $x2 = $diastolik;
            $a2 = ($x2 - 100) / (110-100);
            $z2 = (($x2) - (100*$a2));
           if ($z2 < 0) {
                $z2 = $z2 * -1;
            }

        
            if ($suhu < 36) {
                $suhu_tubuh = "Rendah";
            }
            if($suhu >= 36 and $suhu < 37.5) {
                $suhu_tubuh = "Sedang";
            }
            if($suhu >= 37.5) {
                $suhu_tubuh = "Tinggi";
            }
            $x3 = $suhu;
            $a3 = ($x3 - 37) / (40-37);
            $z3 = $x3 - (100*$a3);
            if ($z3 < 0) {
                $z3 = $z3 * -1;
            }
        

        
            if ($berat < 30) {
                $berat_badan = "Ringan";
            }
            if($berat >= 30 and $berat < 80) {
                $berat_badan = "Biasa";
            }
            if($berat >= 80) {
                $berat_badan = "Berat";
            }
            $x4 = $berat;
            $a4 = ($x4 - 60) / (80-60);
            $z4 = $x4 - (100*$a4);
            if ($z4 < 0) {
                $z4 = $z4 * -1;
            }
            
            if ($tinggi < 130) {
                $tinggi_badan = "Pendek";
            }
            if($tinggi >= 130 and $berat < 170) {
                $tinggi_badan = "Sedang";
            }
            if($tinggi >= 170) {
                $tinggi_badan = "Tinggi";
            }

        
            if ($koles < 36) {
                $kolesterol = "Baik";
            }
            if($koles >= 36 and $kolesterol < 37.5) {
                $kolesterol = "Perbatasan";
            }
            if($koles >= 37.5) {
                $kolesterol = "Bahaya";
            }
            $x5 = $koles;
            $a5 = ($x5 - 220) / (240-220);
            $z5 = $x5 - (100*$a5);
            if ($z5 < 0) {
                $z5 = $z5 * -1;
            }
        

        
            if ($asam < 3.5) {
                $asam_urat = "Rendah";
            }
            if($asam >= 3.5 and $asam < 7) {
                $asam_urat = "Normal";
            }
            if($asam >= 7) {
                $asam_urat = "Tinggi";
            }
            $x6 = $asam;
            $a6 = ($x6 - 7) / (8-7);
            $z6 = $x6 - (100*$a6);
            if ($z6 < 0) {
                $z6 = $z6 * -1;
            }
        

        $ztotal = ($a1*$z1 + $a2*$z2 + $a3*$z3 + $a4*$z4 + $a5*$z5 + $a6*$z6 /*+ $a7*$z7*/)/($a1 + $a2 + $a3 + $a4 + $a5 + $a6 /*+ $a7*/);
        

        return view('dashboard.cekpasien.indexDetail', ['cekPasien' => $cekPasien, 
                                                        'riwayat_penyakit' => $riwayat_penyakit, 
                                                        'tekanan_darah_sistolik' => $tekanan_darah_sistolik,
                                                        'tekanan_darah_diastolik' => $tekanan_darah_diastolik,
                                                        'suhu_tubuh' => $suhu_tubuh,
                                                        'tinggi_badan' => $tinggi_badan,
                                                        'berat_badan' => $berat_badan,
                                                        'kolesterol' => $kolesterol,
                                                        'asam_urat' => $asam_urat,
                                                        'z' => $z]);
    }
}
