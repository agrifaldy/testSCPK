@extends('dashboard.layouts.index')

@section('content')
    <h1>Create User</h1>
    <div class="container-fluid">
        <form action="{{route('dashboard.petugas.store')}}" method="post" class="was-validated" enctype="multipart/form-data">
            {{@csrf_field()}}
            <div class="form-group">
                <label for="uname">Nama :</label>
                <input type="text" class="form-control" id="uname" placeholder="Masukan Nama" name="name" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" placeholder="Masukan Email" name="email" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="pwd">Kata Sandi :</label>
                <input type="password" class="form-control" id="pwd" placeholder="Masukan password" name="password" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>



            <div class="container">
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">Submit</button>
                    </div>
                    <div class="col">
                        <a href="{{route('dashboard.petugas.index')}}" class="btn btn-primary" style="width: 100%;">Kembali</a>
                    </div>
                </div>
            </div>
        </form>
    </div>

@stop
