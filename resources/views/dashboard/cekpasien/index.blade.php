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
{{--        <div class="card mb-3">--}}
{{--            <div class="card-header">--}}
{{--                <i class="fas fa-table"></i>--}}
{{--                Data Pasien</div>--}}
{{--            <div class="card-body">--}}
{{--                <div class="table-responsive">--}}
{{--                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">--}}
{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <th>id</th>--}}
{{--                            <th>Nama</th>--}}
{{--                            <th>Action</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($pasiens as $pasien)--}}
{{--                            <tr>--}}
{{--                                <td>{{$pasien -> id}}</td>--}}
{{--                                <td>{{$pasien -> nama}}</td>--}}
{{--                                <td>--}}
{{--                                    <a href="{{route('dashboard.cekpasien.edit', $pasien -> id)}}" class="btn btn-primary a-btn-slide-text">--}}
{{--                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>--}}
{{--                                        <span><strong>Cek Pasien</strong></span>--}}
{{--                                    </a>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}

{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>--}}
{{--        </div>--}}


        <div class="card mb-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Data Cek Pasien</div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>id</th>
                            <th>Nama</th>
                            <th>Tindakan hasil pemeriksaan</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($cekpasien as $cekpasiens)
                            <tr>
                                <td>{{$cekpasiens -> id}}</td>
                                <td>{{$cekpasiens -> pasiens -> nama}}</td>
                                <td>{{$cekpasiens -> result_pasien}}</td>
                                <td><a href="{{route('cekpasien.indexDetail', $cekpasiens -> id)}}" class="btn btn-primary a-btn-slide-text">
                                        <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                        <span><strong>Catatan Pemeriksaan</strong></span>
                                    </a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>





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
