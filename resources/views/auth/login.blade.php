<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        /* Make the image fully responsive */
        .carousel-inner img {
            width: 100%;
            height: 1030px;
        }
    </style>
</head>
<body>

<section>
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-top">
        <a class="navbar-brand" href="#">Posyandu</a>
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home</a>
            </li>
            <!-- <li class="nav-item">
              <a class="nav-link" href="#">Monitor Posyandu</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Cek pasien</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"></a>
            </li> -->
        </ul>
    </nav>
</section>

<section>
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <!-- Indicators -->
        <ul class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ul>

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{asset('image/1.jpg')}}" alt="Los Angeles" width="1100" height="100">
            </div>
            <div class="carousel-item">
                <img src="{{url('image/2.jpg')}}" alt="Chicago" width="1100" height="100">
            </div>
            <div class="carousel-item">
                <img src="{{url('image/3.jpg')}}" alt="New York" width="1100" height="100">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</section>

<section>
    <div class="container fixed-top" style="margin-top: 15%; opacity: 0.5; margin-left: 800px;">
        <div class="card bg-dark" style="width:400px; height: 280px;">

        </div>
    </div>

    <div class="fixed-top" style="margin-top: 15%; margin-left: 800px; width:420px; height: 500px; color: white;">
        <h5 style="margin-left: 20px; text-align-last: center;">Login</h5>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label for="email">Email address:</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div style="margin-left: 80%;">
                    <button type="submit" class="btn  bg-dark text-white"> {{ __('Login') }}</button>
                </div>
            </form>
        </div>
    </div>

    <button type="button" class="btn bg-dark text-white fixed-top" data-toggle="modal" data-target="#myModal" style="margin-top: 26%; margin-left: 830px;">
        Daftar
    </button>

    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <h1>Daftar</h1>
                    <div class="container-fluid">
                        <form action="{{route('daftar.store')}}" method="post" class="was-validated" enctype="multipart/form-data">
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
                                </div>
                            </div>
                        </form>
                    </div>
                </div>


            </div>
        </div>
    </div>

</section>

</body>
</html>
