@extends('dashboard.layouts.index')

@section('content')
    <h1>Create User</h1>
    <div class="container-fluid">
        <form action="{{route('dashboard.pasien.store')}}" method="post" class="was-validated" enctype="multipart/form-data">
            {{@csrf_field()}}
            <div class="form-group">
                <label for="uname">Nama :</label>
                <input type="text" class="form-control" id="uname" placeholder="Masukan Nama" name="nama" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="nik">NIK :</label>
                <input type="text" class="form-control" id="nik" placeholder="Masukan NIK" name="nik" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="no_hp">Nomor HP :</label>
                <input type="number" class="form-control" id="no_hp" placeholder="Masukan Nomor" name="no_hp" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label >Tanggal lahir :</label>
                <input  id="datepicker" type="date" name="tanggal_lahir" max="3000-12-31"
                       min="1000-01-01" class="form-control">
            </div>
            <script>
                $( document ).ready(function() {
                    $("#datepicker").datepicker({
                        format: 'yyyy-mm-dd'
                    });
                    $("#datepicker").on("change", function () {
                        var fromdate = $(this).val();
                        alert(fromdate);
                    });
                });
            </script>
            <div class="form-group">
                <label for="JK">Jenis Kelamin :</label>
                <select class="form-control" id="JK" name="jenis_kelamin" required>
                    <option value="">Silahkan Pilih</option>
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                    <div class="valid-feedback"></div>
                    <div class="invalid-feedback">Harap diisi</div>
                </select>
            </div>
            <div class="form-group">
                <label for="sel1">Kota :</label>
                <select class="selectpicker form-control" data-live-search="true" id="sel1" name="kota_id">
                    <option value="">Silahkan Pilih</option>
                    <div class="valid-feedback"></div>
                    @foreach($kota as $k)
                        <option value="{{$k->id}}">{{$k->name}}</option>
                    @endforeach
                    <div class="invalid-feedback">Harap diisi</div>
                </select>


            </div>
            <div class="form-group">
                <label for="kota">Alamat :</label>
                <input type="text" class="form-control" id="alamat" placeholder="Masukan Nama" name="alamat" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
                    </div>
                    <div class="col">
                        <a href="{{route('dashboard.pasien.index')}}" class="btn btn-primary" style="width: 100%;">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

@stop
