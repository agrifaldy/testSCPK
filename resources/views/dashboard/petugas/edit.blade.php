@extends('dashboard.layouts.index')

@section('content')
    <div class="row">
        <div class="col-sm" style="align-items: flex-start;">
            <h1>Edit Users</h1>
        </div>
        <div class="col-sm-1">
            <a href="{{route('dashboard.petugas.index', $user -> id)}}" class="btn btn-info a-btn-slide-text" style="align-items: flex-end;">
                <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                <span><strong>Kembali</strong></span>
            </a>
        </div>
    </div>

    <div class="container-fluid">
        <form action="{{route('dashboard.petugas.update', $user -> id)}}" method="post" class="was-validated" enctype="multipart/form-data">
            {{csrf_field()}}
            {{ method_field('PATCH') }}
            <div class="form-group">
                <label for="uname">Nama :</label>
                <input type="text" class="form-control" id="uname" value="{{$user -> name}}" name="name" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="email">Email address:</label>
                <input type="email" class="form-control" id="email" value="{{$user -> email}}" name="email">
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <div class="form-group">
                <label for="pwd">Kata Sandi :</label>
                <input type="password" class="form-control" id="pwd" placeholder="" name="password" required>
                <div class="valid-feedback"></div>
                <div class="invalid-feedback">Harap diisi</div>
            </div>
            <br>
            <br>
            <div class="container" style="margin-top: 20px;">
                <div class="row">
                    <div class="col-sm">
                        <button type="submit" class="btn btn-primary" style="height: 100%; width: 100%;">Submit</button>
                    </div>
                </div>
            </div>

        </form>

        <form action="{{route('dashboard.petugas.destroy', $user -> id)}}" method="post" class="was-validated" enctype="multipart/form-data" style="margin-top: 1%;">
            {{csrf_field()}}
            {{ method_field('DELETE') }}
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        <button type="submit" class="btn btn-danger" style="height: 100%; width: 100%;">Delete</button>
                    </div>
                </div>
            </div>
        </form>


    </div>



@stop
