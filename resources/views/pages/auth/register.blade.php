<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="Halaman Registrasi Aplikasi Desa" />
    <meta name="author" content="" />

    <title>Registrasi - Aplikasi Desa</title>

    <!-- Fonts & Icons -->
    <link href="{{ asset('template/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet" />

    <!-- Styles -->
    <link href="{{ asset('template/css/sb-admin-2.min.css') }}" rel="stylesheet" />

    <style>
        body {
            background: linear-gradient(to right, #1e3c72, #2a5298);
            font-family: 'Nunito', sans-serif;
            overflow: hidden;
        }

        .card {
            border-radius: 1rem;
            backdrop-filter: blur(8px);
            background-color: rgba(255, 255, 255, 0.9);
            animation: fadeInUp 0.8s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-primary {
            background-color: #1e3c72;
            border: none;
            transition: 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #16335f;
        }

        .form-control:focus {
            box-shadow: 0 0 0 0.2rem rgba(30, 60, 114, 0.25);
            border-color: #1e3c72;
        }

        .input-group-text {
            background-color: #f8f9fc;
        }

        #toggle-icon {
            width: 1.25rem;
            text-align: center;
            cursor: pointer;
        }

        .form-control {
            transition: none !important;
        }

        /* Fade-in lembut seluruh halaman */
        .container {
            animation: fadePage 1s ease;
        }

        @keyframes fadePage {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
</head>

<body>
    <div class="container d-flex align-items-center justify-content-center min-vh-100">
        <div class="col-xl-5 col-lg-6 col-md-8">
            <div class="card border-0 shadow rounded-4">
                <div class="card-body p-5">
                    <div class="text-center mb-4">
                        <h1 class="h4 text-gray-900 font-weight-bold">Buat Akun Baru</h1>
                        <p class="text-muted small mb-0">Isi data berikut untuk registrasi</p>
                    </div>

                    <form class="user" action="/register" method="POST" onsubmit="showSpinner(event)">
                        @csrf
                        @method('POST')

                        <!-- Nama -->
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-end-0 rounded-start-pill">
                                        <i class="fas fa-user text-primary"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control border-start-0 rounded-end-pill px-4 py-2"
                                    id="name" name="name" placeholder="Nama Lengkap" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-end-0 rounded-start-pill">
                                        <i class="fas fa-envelope text-primary"></i>
                                    </span>
                                </div>
                                <input type="email" class="form-control border-start-0 rounded-end-pill px-4 py-2"
                                    id="email" name="email" placeholder="Alamat Email" required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-4">
                            <div class="input-group" id="show_hide_password">
                                <div class="input-group-prepend">
                                    <span class="input-group-text border-end-0 rounded-start-pill">
                                        <i class="fas fa-lock text-primary"></i>
                                    </span>
                                </div>
                                <input type="password" class="form-control border-start-0 px-4 py-2"
                                    id="password-field" name="password" placeholder="Kata Sandi" required>
                                <div class="input-group-append">
                                    <span class="input-group-text border-start-0 rounded-end-pill"
                                        onclick="togglePassword()" style="cursor: pointer;">
                                        <i class="fas fa-eye text-primary" id="toggle-icon"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Simpan -->
                        <button type="submit" id="register-btn"
                            class="btn btn-primary btn-block rounded-pill py-2">
                            <span id="register-text"><i class="fas fa-user-plus me-1"></i> Daftar</span>
                            <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status"
                                aria-hidden="true"></span>
                        </button>
                    </form>

                    <hr class="my-4">

                    <div class="text-center">
                        <a class="small text-primary" href="/">Sudah punya akun? Login di sini</a>
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
            event.preventDefault();
            const btn = document.getElementById("register-btn");
            document.getElementById("register-text").classList.add("d-none");
            document.getElementById("spinner").classList.remove("d-none");
            btn.disabled = true;
            setTimeout(() => {
                event.target.submit();
            }, 1000);
        }
    </script>
</body>

</html>
