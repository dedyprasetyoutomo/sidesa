<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Halaman Login Aplikasi Desa" />
    <meta name="author" content="" />

    <title>Login - Aplikasi Desa</title>

    <!-- Fonts & Icons -->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <style>
        body {
            background: linear-gradient(to right, #1e3c72, #2a5298);
        }
        .card {
            border-radius: 1rem;
        }
        .btn-primary {
            background-color: #1e3c72;
            border-color: #1e3c72;
        }
        .btn-primary:hover {
            background-color: #16335f;
            border-color: #16335f;
        }
        .form-control-user {
            border-radius: 10rem;
        }
        .bg-login-image {
            background: url('/img/desa.jpg');
            background-position: center;
            background-size: cover;
        }
    </style>
</head>

<body>
    @if ($errors->any())
         <script>
        Swal.fire({
            title: "Terjadi Kesalahan!",
            text: "@foreach($errors->all() as $error){{ $error }} {{ $loop->last ? '.' : ',' }}  @endforeach",
            icon: "error"
        });
    </script>
    @endif
    <div class="container">
        <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-8 mt-5">

        <div class="card shadow-lg my-5">
            <div class="card-body p-0">
                <div class="row">
                    <!-- Hapus bagian gambar -->
                    
                    <!-- Full-width form login -->
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center mb-4">
                                <h1 class="h4 text-gray-900 font-weight-bold">Selamat Datang di Aplikasi Desa</h1>
                                <p class="text-muted small">Silakan login untuk melanjutkan</p>
                            </div>
                           <form class="user" action="/login" method="post" onsubmit="showSpinner(event)">
                                    @csrf
                                    @method('post')

                                    <!-- Email -->
                                    <div class="form-group mb-3">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-light border-end-0 rounded-start-pill">
                                                    <i class="fas fa-envelope text-primary"></i>
                                                </span>
                                            </div>
                                            <input type="email" name="email" class="form-control border-start-0 rounded-end-pill px-4 py-2"
                                                placeholder="Email">
                                        </div>
                                    </div>

                                    <!-- Password dengan toggle -->
                                    <div class="form-group mb-4">
                                        <div class="input-group" id="show_hide_password">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text bg-light border-end-0 rounded-start-pill">
                                                    <i class="fas fa-lock text-primary"></i>
                                                </span>
                                            </div>
                                            <input type="password" name="password" class="form-control border-start-0 px-4 py-2"
                                                id="password-field" placeholder="Password">
                                            <div class="input-group-append">
                                                <span class="input-group-text bg-light border-start-0 rounded-end-pill" onclick="togglePassword()" style="cursor: pointer;">
                                                    <i class="fas fa-eye text-primary" id="toggle-icon"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Tombol Login -->
                                    <button type="submit" id="login-btn" class="btn btn-primary btn-block rounded-pill py-2">
                                        <span id="login-text"><i class="fas fa-sign-in-alt me-1"></i> Masuk</span>
                                        <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                    </button>
                                </form>

                            <hr />
                            <div class="text-center">
                                <a class="small" href="/register">Belum punya akun? Daftar di sini</a>
                            </div>
                        </div>
                    </div>
                    <!-- End login -->
                </div>
            </div>
        </div>
    </div>
</div>

    </div>

    <!-- JS Scripts -->
    <script src="{{ asset('template/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('template/js/sb-admin-2.min.js') }}"></script>

    <script>
    function togglePassword() {
        const passwordField = document.getElementById("password-field");
        const toggleIcon = document.getElementById("toggle-icon");
        if (passwordField.type === "password") {
            passwordField.type = "text";
            toggleIcon.classList.remove("fa-eye");
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";
            toggleIcon.classList.remove("fa-eye-slash");
            toggleIcon.classList.add("fa-eye");
        }
    }

    function showSpinner(event) {
        event.preventDefault(); // Hentikan submit sebentar
        const btn = document.getElementById("login-btn");
        document.getElementById("login-text").classList.add("d-none");
        document.getElementById("spinner").classList.remove("d-none");
        btn.disabled = true;

        // Submit ulang setelah sedikit delay (misal simulasi login)
        setTimeout(() => {
            event.target.submit(); // submit form-nya
        }, 1000); // bisa diganti lebih cepat
    }
</script>

</body>

</html>
