<?php

namespace App\Http\Controllers;

use App\Pasien;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Laravolt\Indonesia\Models\City;

class AdminPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pasiens = Pasien::all();
        return view('dashboard.pasien.index', compact('pasiens'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $kota = City::all();
        return view('dashboard.pasien.create', compact('kota'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $today = \Carbon\Carbon::now();
        $umur = Carbon::createFromFormat('Y-m-d', $request->tanggal_lahir);
        $count = $umur -> diffInYears($today);
        Pasien::create([
            'nama' => $request->nama,
            'nik' => $request->nik,
            'no_hp' => $request->no_hp,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'kota_id' => $request->kota_id,
            'alamat' => $request->alamat,
            'umur' => $count
        ]);
        return redirect()->route('dashboard.pasien.index')->withSuccess('saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
