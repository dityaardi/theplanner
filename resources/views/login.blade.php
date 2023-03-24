<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <link rel="icon" href="{{asset('/images/lgoo.png')}}">
    <title>LogIn</title>

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

<body class="bg-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block">
                                <img src="{{asset('images/loginn.jpg')}}" style="width:100%; height:100%">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-4">
                                    <div class="text-center">
                                        <img src="{{ asset('images/logo.png') }}" style="width:40%;">
                                        <h5 class="text-gray-900 mb-4">Web Based for Activity Planning</h5>
                                        <h6 class="text-gray-900 mb-3">LOGIN</h6>
                                    </div>
                                    @if(session()->has('failed'))
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="alert">
                                        <i class="bi bi-x-square-fill"></i>{{ session('failed') }}
                                        <button type="button" class="close btn-sm" data-dismiss="alert" aria-label="Close">
                                            <span class="fa fa-times"></span>
                                        </button>
                                    </div>
                                    @endif
                                    <form action="/" method="POST">
                                        @csrf
                                        <div class="form-floating">
                                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="Email" autofocus required>
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <p>
                                        <div class="form-floating pt-3">
                                            <input type="password" class="form-control rounded-bottom" name="password" id="password" required placeholder="Password">
                                        </div>

                                        <button class="w-100 btn btn-lg btn-success mt-3" type="SUBMIT">LOGIN</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- jquery latest version -->
    <script src="{{asset('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{asset('assets/js/popper.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slimscroll.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- others plugins -->
    <script src="{{asset('assets/js/plugins.js')}}"></script>
    <script src="{{asset('assets/js/scripts.js')}}"></script>

</body>

</html>