<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <!-- Custom fonts for this template-->
    <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slicknav.min.css')}}">
    <!-- others css -->
    <link rel="stylesheet" href="{{asset('assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/responsive.css')}}">
    <!-- modernizr css -->
    <script src="{{asset('assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
</head>

<body class="row justify-content-center">
    <form action="/register" method="POST" class="col-md-7">
        @csrf
        <div class="login-form-body">
            <div class="form-gp">
                <label for="nip">nip</label>
                <input type="text" class="rounded-top @error('nip') is-invalid @enderror" name="nip" id="nip" required value="{{ old('nip') }}">
                @error('nip')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-gp">
                <label for="namapegawai">namapegawai</label>
                <input type="text" class="rounded-top @error('namapegawai') is-invalid @enderror" name="namapegawai" id="namapegawai" required value="{{ old('namapegawai') }}">
                @error('namapegawai')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-gp">
                <label for="email">email</label>
                <input type="email" class="@error('email') is-invalid @enderror" name="email" id="email" required value="{{ old('email') }}">
                @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-gp">
                <label for="password">Password</label>
                <input type="password" class="rounded-bottom @error('password') is-invalid @enderror" name="password" id="password" required>
                @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="form-gp">
                <label for="level">Level</label>
                <input type="text" class="rounded-bottom @error('level') is-invalid @enderror" name="level" id="level" required>
            </div>

            <div class="form-gp">
                <label for="tgllahir">tgllahir</label>
                <input type="date" class="rounded-bottom @error('tgllahir') is-invalid @enderror" name="tgllahir" id="tgllahir" required>
            </div>

            <div class="form-gp">
                <label for="idpangkat">idpangkat</label>
                <input type="text" class="rounded-bottom @error('idpangkat') is-invalid @enderror" name="idpangkat" id="idpangkat" required>
            </div>

            <div class="form-gp">
                <label for="idjabatan">idjabatan</label>
                <input type="text" class="rounded-bottom @error('idjabatan') is-invalid @enderror" name="idjabatan" id="idjabatan" required>
            </div>

            <div class="form-gp">
                <label for="periodeawal">periodeawal</label>
                <input type="date" class="rounded-bottom @error('periodeawal') is-invalid @enderror" name="periodeawal" id="periodeawal">
            </div>

            <div class="form-gp">
                <label for="periodeakhir">periodeakhir</label>
                <input type="date" class="rounded-bottom @error('periodeakhir') is-invalid @enderror" name="periodeakhir" id="periodeakhir">
            </div>

            <div class="form-gp">
                <label for="statusaktif">statusaktif</label>
                <input type="text" class="rounded-bottom @error('statusaktif') is-invalid @enderror" name="statusaktif" id="statusaktif">
            </div>

            <div class="form-gp">
                <label for="idunit">idunit</label>
                <input type="text" class="rounded-bottom @error('idunit') is-invalid @enderror" name="idunit" id="idunit" required>
            </div>
        </div>

        <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">REGISTER</button>
    </form>
</body>
<!-- jquery latest version -->
<script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
<!-- bootstrap 4 js -->
<script src="{{asset('assets/js/popper.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>
<!-- all line chart activation -->
<script src="{{asset('assets/js/line-chart.js')}}"></script>
<!-- all pie chart -->
<script src="{{asset('assets/js/pie-chart.js')}}"></script>
<!-- others plugins -->
<script src="{{asset('assets/js/plugins.js')}}"></script>
<script src="{{asset('assets/js/scripts.js')}}"></script>

</html>