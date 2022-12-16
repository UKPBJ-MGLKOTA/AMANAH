<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta12
* @link https://tabler.io
* Copyright 2018-2022 The Tabler Authors
* Copyright 2018-2022 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>AMANAH - Aplikasi Manajemen Kinerja Pelaku Usaha - Vendor Management System</title>

    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/assets/static/logo-small.svg">
    <!-- CSS files -->
    <link href="<?= base_url(); ?>/assets/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/dist/css/demo.min.css" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
    </style>
</head>

<body class=" border-top-wide border-primary">
    <script src="<?= base_url(); ?>/dist/js/demo-theme.min.js"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="<?= base_url(); ?>/assets/static/logo.svg" height="150" alt=""></a>
            </div>
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="h2 text-center mb-4">Masuk ke Aplikasi</h2>
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" placeholder="Username Anda" id="username" autocomplete="off">
                    </div>
                    <div class="mb-2">
                        <label class="form-label">
                            Password
                        </label>
                        <div class="input-group input-group-flat">
                            <input type="password" class="form-control" placeholder="Password Anda" id="password" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-login btn-primary w-100"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-login" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                                <path d="M20 12h-13l3 -3m0 6l-3 -3"></path>
                            </svg>Sign in</button>
                    </div>
                </div>
                <div class="hr-text">atau</div>
                <div class="card-body">
                    <div class="row">
                        <a href="<?= base_url("verifikasi") ?>" class="btn btn-white w-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="10" cy="10" r="7"></circle>
                                <path d="M21 21l-6 -6"></path>
                                <path d="M7 10l2 2l4 -4"></path>
                            </svg>
                            Cek Keaslian Dokumen
                        </a>
                    </div>
                    <div class="row mt-3">
                        <a href="<?= base_url("download/panduan") ?>" class="btn btn-youtube">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/brand-dribbble -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-book-download" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 20h-6a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12v5"></path>
                                                <path d="M13 16h-7a2 2 0 0 0 -2 2"></path>
                                                <path d="M15 19l3 3l3 -3"></path>
                                                <path d="M18 22v-9"></path>
                                            </svg>
                                            Download Panduan
                                        </a>
                    </div>
                </div>
            </div>
            <div class="text-center text-muted mt-3">
                &copy; <?= date("Y"); ?> <br> Bagian Pengadaan Barang/Jasa Sekretariat Daerah Kota Magelang
            </div>
        </div>
    </div>

</html>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {

        $(".btn-login").click(function() {

            var username = $("#username").val();
            var password = $("#password").val();

            if (username.length == "") {

                toastr.warning("Username Wajib diisi !");
            } else if (password.length == "") {
                toastr.warning("Password Wajib diisi !");
            } else {
                $.ajax({
                    url: "<?= base_url(); ?>auth/cek_login",
                    type: "POST",
                    data: {
                        "username": username,
                        "password": password
                    },
                    success: function(response) {
                        if (response == "success") {
                            toastr.success("Anda akan di arahkan dalam 5 Detik", "Login Berhasil ! ", {
                                onHidden: function() {
                                    window.location.href = "<?= base_url(); ?>dashboard";
                                }
                            });
                        } else {
                            toastr.error("Silahkan coba lagi !", "Login Gagal !");
                        }
                        console.log(response);
                    },
                    error: function(response) {
                        toastr.error("Silahkan coba lagi !", "Login Gagal !");
                        console.log(response);
                    }
                });
            }
        });
    });

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-full-width",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }
</script>