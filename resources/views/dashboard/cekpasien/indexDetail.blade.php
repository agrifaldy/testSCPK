@extends('dashboard.layouts.index')

@section('content')
    <h1>Catatan Pemeriksaan<a href="{{route('dashboard.cekpasien.index')}}" class="btn btn-primary a-btn-slide-text" style="margin-left: 90%;">
            <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
            <span><strong>Kembali</strong></span>
        </a></h1>
    <br>
    <ul class="list-group">
        <h3>&nbsp;&nbsp;&nbsp;{{$cekPasien->pasiens->nama}}</h3>
        <li class="list-group-item">Tekanan darah sistolik : {{$cekPasien->tekanan_darah_sistolik}} mmHg</li>
        <li class="list-group-item">Tekanan darah diastolik: {{$cekPasien->tekanan_darah_diastolik}} mmHg</li>
        <li class="list-group-item">Suhu tubuh : {{$cekPasien->suhu_tubuh}} Celcius</li>
        <li class="list-group-item">Berat badan : {{$cekPasien->berat_badan}} kg</li>
        <li class="list-group-item">Tinggi badan : {{$cekPasien->tinggi_badan}} cm</li>
        <li class="list-group-item">Kolesterol : {{$cekPasien->kolesterol}} mg/dL</li>
        <li class="list-group-item">Asam urat : {{$cekPasien->asam_urat}} mg</li>
    </ul>
    <br>
    <label>&nbsp;&nbsp;&nbsp;Riwayat Penyakit</label>
    @foreach($riwayat_penyakit as $rp)
    <ul class="list-group">
        <li class="list-group-item">- {{$rp->penyakits->nama_penyakit}}</li>
    </ul>
    @endforeach
    <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Data Variable Fuzzy</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Tekanan darah sistolik</th>
                            <th>Tekanan darah diastolik</th>
                            <th>Suhu tubuh</th>
                            <th>Berat badan</th>
                            <th>Tinggi badan</th>
                            <th>Kolesterol</th>
                            <th>Asam urat</th>
                            <th>Hasil Perhitungan Fuzzy</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{$cekPasien->pasiens->nama}}</td>
                                <td>{{$tekanan_darah_sistolik}}</td>
                                <td>{{$tekanan_darah_diastolik}}</td>
                                <td>{{$suhu_tubuh}}</td>
                                <td>{{$berat_badan}}</td>
                                <td>{{$tinggi_badan}}</td>
                                <td>{{$kolesterol}}</td>
                                <td>{{$asam_urat}}</td>
                                <td>{{$z}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

@stop
