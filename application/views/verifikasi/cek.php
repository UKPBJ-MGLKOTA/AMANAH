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
    <title>Verifikasi- AMANAH - Aplikasi Manajemen Kinerja Pelaku Usaha - Vendor Management System</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/assets/static/logo-small.svg">
    <!-- CSS files -->
    <link href="<?= base_url(); ?>/assets/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>/assets/dist/css/demo.min.css" rel="stylesheet" />
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
            <form action="<?= base_url('verifikasi/check') ?>" class="card card-md" method="post" aenctype="multipart/form-data">
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Cek Dokumen</h2>
                    <p class="text-muted mb-4">Masukkan kode verifikasi untuk memastikan keaslian dokumen</p>
                    <div class="mb-3">
                        <label class="form-label">Kode Verifikasi</label>
                        <input type="text" class="form-control" name="kd_verifikasi" id="kd_verifikasi">
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-submit btn-primary ms-auto w-100">
                            <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-zoom-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="10" cy="10" r="7"></circle>
                                <path d="M21 21l-6 -6"></path>
                                <path d="M7 10l2 2l4 -4"></path>
                            </svg>
                            Verifikasi
                        </button>
                    </div>
                </div>
            </form>
            <div class="text-center text-muted mt-3">
                &copy; <?= date("Y"); ?> <br> Bagian Pengadaan Barang/Jasa Sekretariat Daerah Kota Magelang
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./dist/js/tabler.min.js" defer></script>
    <script src="./dist/js/demo.min.js" defer></script>
</body>

</html>