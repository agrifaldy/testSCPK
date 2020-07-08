@extends('dashboard.layouts.index')

@section('content')
    <h1>Create User</h1>
    <div class="container-fluid">
        <form action="{{route('dashboard.penyakit.store')}}" method="post" class="was-validated" enctype="multipart/form-data">
            {{@csrf_field()}}
            <div class="form-group">
                <label for="nama_penyakit">Nama Penyakit :</label>
                <input type="text" class="form-control" id="nama_penyakit" placeholder="Masukan Nama Penyakit" name="nama_penyakit" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="nilai_penyakit">Nilai Penyakit :</label>
                <input type="number" step="any" class="form-control" id="nilai_penyakit" placeholder="Masukan Nilai Penyakit" name="nilai_penyakit" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label>Aturan Penyakit :</label>
                <p>1. Beri nilai tingkat kesulitan menangin penyakit tersebut dari 0.0 - 1.0 <br>
                    2. Penyakit yang nilainya kurang dari 0.5 dapat ditangani di Puskesmas</p>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
                    </div>
                    <div class="col">
                        <a href="{{route('dashboard.penyakit.index')}}" class="btn btn-primary" style="width: 100%;">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

@stop
