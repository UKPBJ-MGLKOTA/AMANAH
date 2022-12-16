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
    <title><?= $title; ?> AMANAH - Aplikasi Manajemen Kinerja Pelaku Usaha - Vendor Management System</title>

    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>/assets/static/logo-small.svg">
    <!-- CSS files -->
    <link href="<?= base_url(); ?>assets/dist/css/tabler.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/dist/css/tabler-flags.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/dist/css/tabler-payments.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/dist/css/tabler-vendors.min.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/dist/css/demo.min.css" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.12.1/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
    <!--<link href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" rel="stylesheet">-->
    <link href="https://cdn.datatables.net/rowreorder/1.2.8/css/rowReorder.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.dataTables.min.css" rel="stylesheet">

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: Inter, -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }
    </style>
</head>

<body>
    <script src="<?= base_url(); ?>assets/dist/js/demo-theme.min.js"></script>
    <div class="page">
        <!-- Navbar -->
        <header class="navbar navbar-expand-md navbar-light d-print-none">
            <div class="container-xl">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
                    <a href=".">
                        <img src="<?= base_url(); ?>assets/static/logo-fit.svg" width="150" height="40" alt="AMANAH">
                    </a>
                </h1>
                <div class="navbar-nav flex-row order-md-last">

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                            <span class="avatar avatar-sm" style="background-image: url(<?= base_url(); ?>assets/static/avatars/000m.jpg)"></span>
                            <div class="d-none d-xl-block ps-2">
                                <div><strong><?= $profil->nama_pegawai; ?></strong> (<?= $profil->nama_level; ?>) </div>
                                <div class="mt-1 small text-muted"><?= $profil->nama_satker; ?></div>
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                            <a href="#" class="dropdown-item">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a href="<?= base_url(); ?>auth/logout" class="dropdown-item">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="navbar-expand-md">
            <div class="collapse navbar-collapse" id="navbar-menu">
                <div class="navbar navbar-light">
                    <div class="container-xl">
                        <ul class="navbar-nav">
                            <?php if ($this->session->userdata('kd_level') == 1) { ?>
                                <li class="nav-item <?php if ($aktif == "dashboard") {
                                                        echo "active";
                                                    } ?>">
                                    <a class="nav-link" href="<?= base_url(); ?>dashboard">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Home
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown <?php if ($aktif == "paket") {
                                                                    echo "active";
                                                                } ?>">
                                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                                                <line x1="12" y1="12" x2="20" y2="7.5" />
                                                <line x1="12" y1="12" x2="12" y2="21" />
                                                <line x1="12" y1="12" x2="4" y2="7.5" />
                                                <line x1="16" y1="5.25" x2="8" y2="9.75" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Data Pengadaan Barang/Jasa
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-menu-columns">
                                            <div class="dropdown-menu-column">
                                                <a class="dropdown-item" href="<?= base_url(); ?>penyedia">
                                                    Penyedia/Pelaku Usaha
                                                </a>
                                                <a class="dropdown-item" href="<?= base_url(); ?>pegawai">
                                                    <?php if ($this->session->userdata('kd_level') == 1) {
                                                        echo "Pegawai";
                                                    } else {
                                                        echo "Pejabat Pembuat Komitmen";
                                                    } ?>
                                                </a>
                                                <a class="dropdown-item" href="<?= base_url(); ?>paket">
                                                    Paket Pengadaan Barang/Jasa
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item <?php if ($aktif == "kinerja") {
                                                        echo "active";
                                                    } ?>">
                                    <a class="nav-link" href="<?= base_url(); ?>kinerja">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="9 11 12 14 20 6" />
                                                <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Penilaian Kinerja
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php if ($aktif == "laporan") {
                                                        echo "active";
                                                    } ?>">
                                    <a class="nav-link" href="<?= base_url(); ?>laporan">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <rect x="4" y="4" width="6" height="5" rx="2" />
                                                <rect x="4" y="13" width="6" height="7" rx="2" />
                                                <rect x="14" y="4" width="6" height="7" rx="2" />
                                                <rect x="14" y="15" width="6" height="5" rx="2" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Laporan <i>Vendor Management System</i>
                                        </span>
                                    </a>
                                </li>
                            <?php } elseif ($this->session->userdata('kd_level') == 2) { ?>
                                <li class="nav-item <?php if ($aktif == "dashboard") {
                                                        echo "active";
                                                    } ?>">
                                    <a class="nav-link" href="<?= base_url(); ?>dashboard">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Home
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown <?php if ($aktif == "paket") {
                                                                    echo "active";
                                                                } ?>">
                                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                                                <line x1="12" y1="12" x2="20" y2="7.5" />
                                                <line x1="12" y1="12" x2="12" y2="21" />
                                                <line x1="12" y1="12" x2="4" y2="7.5" />
                                                <line x1="16" y1="5.25" x2="8" y2="9.75" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Data Pengadaan Barang/Jasa
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-menu-columns">
                                            <div class="dropdown-menu-column">
                                                <a class="dropdown-item" href="<?= base_url(); ?>penyedia">
                                                    Penyedia/Pelaku Usaha
                                                </a>
                                                <a class="dropdown-item" href="<?= base_url(); ?>paket">
                                                    Paket Pengadaan Barang/Jasa
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item <?php if ($aktif == "kinerja") {
                                                        echo "active";
                                                    } ?>">
                                    <a class="nav-link" href="<?= base_url(); ?>kinerja">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="9 11 12 14 20 6" />
                                                <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Penilaian Kinerja
                                        </span>
                                    </a>
                                </li>
                            <?php } elseif ($this->session->userdata('kd_level') == 3) {  ?>
                                <li class="nav-item <?php if ($aktif == "dashboard") {
                                                        echo "active";
                                                    } ?>">
                                    <a class="nav-link" href="<?= base_url(); ?>dashboard">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Home
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item dropdown <?php if ($aktif == "paket") {
                                                                    echo "active";
                                                                } ?>">
                                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/package -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                                                <line x1="12" y1="12" x2="20" y2="7.5" />
                                                <line x1="12" y1="12" x2="12" y2="21" />
                                                <line x1="12" y1="12" x2="4" y2="7.5" />
                                                <line x1="16" y1="5.25" x2="8" y2="9.75" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Data Pengadaan Barang/Jasa
                                        </span>
                                    </a>
                                    <div class="dropdown-menu">
                                        <div class="dropdown-menu-columns">
                                            <div class="dropdown-menu-column">
                                                <a class="dropdown-item" href="<?= base_url(); ?>penyedia">
                                                    Penyedia/Pelaku Usaha
                                                </a>
                                                <a class="dropdown-item" href="<?= base_url(); ?>pegawai">
                                                    <?php if ($this->session->userdata('kd_level') == 1) {
                                                        echo "Pegawai";
                                                    } else {
                                                        echo "Pejabat Pembuat Komitmen";
                                                    } ?>
                                                </a>
                                                <a class="dropdown-item" href="<?= base_url(); ?>paket">
                                                    Paket Pengadaan Barang/Jasa
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php } elseif ($this->session->userdata('kd_level') == 4) { ?>
                                <li class="nav-item <?php if ($aktif == "dashboard") {
                                                        echo "active";
                                                    } ?>">
                                    <a class="nav-link" href="<?= base_url(); ?>dashboard">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="5 12 3 12 12 3 21 12 19 12" />
                                                <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                                                <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Home
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php if ($aktif == "kinerja") {
                                                        echo "active";
                                                    } ?>">
                                    <a class="nav-link" href="<?= base_url(); ?>kinerja">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <polyline points="9 11 12 14 20 6" />
                                                <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Penilaian Kinerja
                                        </span>
                                    </a>
                                </li>
                                <li class="nav-item <?php if ($aktif == "laporan") {
                                                        echo "active";
                                                    } ?>">
                                    <a class="nav-link" href="<?= base_url(); ?>laporan">
                                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                                            <!-- Download SVG icon from http://tabler-icons.io/i/layout-2 -->
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                <rect x="4" y="4" width="6" height="5" rx="2" />
                                                <rect x="4" y="13" width="6" height="7" rx="2" />
                                                <rect x="14" y="4" width="6" height="7" rx="2" />
                                                <rect x="14" y="15" width="6" height="5" rx="2" />
                                            </svg>
                                        </span>
                                        <span class="nav-link-title">
                                            Laporan <i>Vendor Management System</i>
                                        </span>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                        <div class="my-2 my-md-0 flex-grow-1 flex-md-grow-0 order-first order-md-last">
                            <form action="./" method="get" autocomplete="off" novalidate>
                                <div class="input-icon">
                                    <span class="input-icon-addon">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <circle cx="10" cy="10" r="7" />
                                            <line x1="21" y1="21" x2="15" y2="15" />
                                        </svg>
                                    </span>
                                    <input type="text" value="" class="form-control" placeholder="Search…" aria-label="Search in website">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>