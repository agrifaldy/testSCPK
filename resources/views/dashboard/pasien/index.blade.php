@extends('dashboard.layouts.index')

@section('content')
    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Data Table Example</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            <th>Nomor HP</th>
                            <th>Umur</th>
                            <th>Tanggal lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Kota</th>
                            <th>Alamat</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pasiens as $pasien)
                            <tr>
                                <td>{{$pasien -> id}}</td>
                                <td>{{$pasien -> nama}}</td>
                                <td>{{$pasien -> nik}}</td>
                                <td>{{$pasien -> no_hp}}</td>
                                <td>{{$pasien -> umur}}</td>
                                <td>{{$pasien -> tanggal_lahir}}</td>
                                <td>{{$pasien -> jenis_kelamin}}</td>
                                <td>{{$pasien -> kotaa -> name}}</td>
                                <td>{{$pasien -> alamat}}</td>
                                <td>
{{--                                    <a href="{{route('dashboard.pasien.edit', $pasien -> id)}}" class="btn btn-primary a-btn-slide-text">--}}
{{--                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>--}}
{{--                                        <span><strong>Edit</strong></span>--}}
{{--                                    </a>--}}
                                    <a href="{{route('dashboard.cekpasien.edit', $pasien -> id)}}" class="btn btn-primary a-btn-slide-text">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        <span><strong>Cek Pasien</strong></span>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

        <p class="small text-center text-muted my-5">
            <em>More table examples coming soon...</em>
        </p>

    </div>
    <!-- /.container-fluid -->

    <!-- Sticky Footer -->
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright © Your Website 2019</span>
            </div>
        </div>
    </footer>
@stop
