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


    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body>

    <div class="container">

        {{-- <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="p-5">
                            <div class="text-center">
                                <img src="{{ asset('images/ff-merah.png') }}" class="Welcome Image mb-2"
                                    style="width:auto; height:100px">
                            </div>
                            <form class="user" action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email"
                                        class="form-control form-control-user"placeholder="Enter Email Address...">
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user"
                                        placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn grey text-white btn-user btn-block">Login</button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small text-red" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small  text-red" href="register">Create an Account!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="registration-form">
            <form class="user" action="{{ route('login') }}" method="POST">
                @csrf
                <div class="form-icon">
                    <span><i class="icon icon-user"></i></span>
                </div>
                <div class="login-page text-center mb-4">
                    <h6><strong>LOGIN USER</strong></h6>
                </div>
                {{-- <div class="form-group">
                <input type="text" class="form-control item" id="namalengkap" placeholder="Username">
            </div> --}}

                <div class="form-group">
                    <input type="email" class="form-control item" name="email" id="email" placeholder="Email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control item" name="password" id="password"
                        placeholder="Password">
                </div>

                {{-- <div class="form-group">
                <input type="text" class="form-control item" id="phone-number" placeholder="Phone Number">
            </div> --}}
                {{-- <div class="form-group">
                <input type="text" class="form-control item" id="birth-date" placeholder="Birth Date">
            </div> --}}
                <div class="form-group">
                    <button type="submit" class="btn btn-block create-account">Login</button>
                </div>
            </form>
            <div class="social-media">
                {{-- <div class="text-center">
                <a class="small text-red" href="forgot-password.html">Forgot Password?</a>
            </div> --}}
                <div class="text-center">
                    <a>Belum Punya Akun?</a><br>
                    <a class="" href="register">Registrasi Akun!</a>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js">
    </script>
    <script src="assets/js/script.js"></script>


    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                title: "Berhasil!",
                text: "{{ session('success') }}",
                icon: "success",
                confirmButtonText: "OK"
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: "Gagal!",
                text: "{{ session('error') }}",
                icon: "error",
                confirmButtonText: "Coba Lagi"
            });
        </script>
    @endif
</body>

</html>
