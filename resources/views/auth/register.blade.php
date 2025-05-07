<!DOCTYPE html>
<html lang="en">
    @section('css')
    @endsection
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css"
        rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body>
    {{-- <?php
        dump(session()->all()); // Debugging session flash
    ?> --}}
    <div class="container">
        {{-- <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                                                <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4"><strong> Create an Account!</strong></h1>
                            </div>
                            <form class="user" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleFullName"
                                        placeholder="Full Name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="email" value="{{ old('email') }}">
                                    @error('email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleInputPassword" placeholder="Password" name="password">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            id="exampleRepeatPassword" placeholder="Repeat Password"
                                            name="password_confirmation">
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Register Account
                                </button>
                            </form>

                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <div class="registration-form">
            <form class="user" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-icon">
                    <span><i class="icon icon-user"></i></span>
                </div>
                <div class="login-page text-center mb-4">
                    <h6><strong>REGISTRASI AKUN</strong></h6>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control item" id="exampleFullName"
                        placeholder="Full Name" name="name" value="{{ old('name') }}">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="email" class="form-control item" id="exampleInputEmail"
                        placeholder="Email Address" name="email" value="{{ old('email') }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="form-group row">
                    <div class="col-sm-6 mb-3 mb-sm-0">
                        <input type="password" class="form-control item"
                            id="exampleInputPassword" placeholder="Password" name="password">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control item"
                            id="exampleRepeatPassword" placeholder="Repeat Password"
                            name="password_confirmation">
                    </div>
                </div>

                <button type="submit" class="btn btn-block create-account">
                    Register
                </button>
            </form>

            <div class="social-media">
                {{-- <div class="text-center">
                <a class="small text-red" href="forgot-password.html">Forgot Password?</a>
            </div> --}}
            <div class="text-center">
                <a>Sudah punya akun?</a><br>
                <a href="login">Login</a>
            </div>

    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js">
    </script>
    <script src="assets/js/script.js"></script>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>
    <!-- Tambahkan SweetAlert2 -->
</body>

</html>
