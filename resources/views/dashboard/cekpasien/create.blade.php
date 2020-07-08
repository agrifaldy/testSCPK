@extends('dashboard.layouts.index')

@section('content')
    <div class="row">
        <div class="col-sm" style="align-items: flex-start;">
            <h1>Cek Pasien</h1>
        </div>
        <div class="col-sm-1">
            <a href="{{route('dashboard.cekpasien.index', $pasien -> id)}}" class="btn btn-info a-btn-slide-text" style="align-items: flex-end;">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                <span><strong>Kembali</strong></span>
            </a>

        </div>
    </div>

    <div class="container-fluid">
        <form action="{{route('dashboard.cekpasien.update', $pasien -> id)}}" method="post" class="was-validated" enctype="multipart/form-data">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
            <input type="text" class="form-control" id="uname" value="{{$pasien -> id}}" name="pasien_id" hidden>
            <input type="text" class="form-control" id="uname" value="{{$number}}" name="id_uniq" hidden>

            <div class="form-group">
                <label for="tekanan_darah_sistolik">Tekanan Darah Sistolik (mmHg) :</label>
                <input type="number" step="any" class="form-control" id="tekanan_darah_sistolik" placeholder="Masukan Nilai" name="tekanan_darah_sistolik" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="tekanan_darah_diastolik">Tekanan Darah Diastolik (mmHg) :</label>
                <input type="number" step="any" class="form-control" id="tekanan_darah_diastolik" placeholder="Masukan Nilai" name="tekanan_darah_diastolik"  required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="suhu_tubuh">Suhu Tubuh (Celcius) :</label>
                <input type="number" step="any" class="form-control" id="suhu_tubuh" placeholder="Masukan Nilai" name="suhu_tubuh" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="berat_badan">Berat Badan (kg) :</label>
                <input type="number" class="form-control" id="berat_badan" placeholder="Masukan Nilai" name="berat_badan" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="tinggi_badan">Tinggi Badan (cm) :</label>
                <input type="number" class="form-control" id="tinggi_badan" placeholder="Masukan Nilai" name="tinggi_badan" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="kolesterol">Kolesterol (mg/dL) :</label>
                <input type="number" step="any" class="form-control" id="kolesterol" placeholder="Masukan Nilai" name="kolesterol" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="asam_urat">Asam urat (mg) :</label>
                <input type="number" step="any" class="form-control" id="asam_urat" placeholder="Masukan Nilai" name="asam_urat" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="card" style="margin:50px 0;" >
                <div class="card-header">Riwayat Penyakit (Ceklist jika memiliki riwayat penyakit)</div>
                <ul class="list-group list-group-flush">
                    @foreach($penyakits as $penyakit)
                        <li class="list-group-item">
                            {{$penyakit -> nama_penyakit}}
                            <label class="checkbox">
                                <input type="checkbox" name="penyakit_id[]" value="{{$penyakit -> id}}">
                                <span class="default"></span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
{{--            <div class="card" style="margin:50px 0;" >--}}
{{--                <div class="card-header">Riwayat Penyakit</div>--}}
{{--                <ul class="list-group list-group-flush">--}}
{{--                    @foreach($penyakits as $penyakit)--}}
{{--                        <li class="list-group-item">--}}
{{--                            {{$penyakit -> nama_penyakit}}--}}
{{--                            <label class="checkbox">--}}
{{--                                <input type="checkbox" name="nilai_penyakit[]" value="{{$penyakit -> nilai_penyakit}}">--}}
{{--                                <span class="default"></span>--}}
{{--                            </label>--}}
{{--                        </li>--}}
{{--                    @endforeach--}}
{{--                </ul>--}}
{{--            </div>--}}


            <br>
            <br>
            <div class="container" style="margin-top: 20px;">
                <div class="row">
                    <div class="col-sm">
                        <button type="submit" class="btn btn-primary" style="height: 100%; width: 100%;">Periksa</button>
                    </div>
                </div>
            </div>

        </form>


    </div>



@stop
