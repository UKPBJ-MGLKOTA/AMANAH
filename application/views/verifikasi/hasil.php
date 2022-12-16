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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css">
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
            <form class="card card-md" method="post" autocomplete="off">
                <div class="card-body">
                    <?php
                    if ($sukses == 1) {
                    ?>
                        <div class="text-center mb-4"><img src="<?= base_url(); ?>/assets/static/discount-check.png" height="80" alt=""></div>
                        <p class="text-muted mb-4">Dokumen dengan kode verifikasi <b><?= $kinerja->kd_verifikasi; ?></b> sesuai, berikut ini detail informasi penilaian kinerja</p>
                        <div class="datagrid">
                            <div class="datagrid-item">
                                <div class="datagrid-title">Nama Paket</div>
                                <div class="datagrid-content"><?= $kinerja->nama_paket; ?></div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">OPD</div>
                                <div class="datagrid-content"><?= $kinerja->nama_satker; ?></div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Nama Pejabat Pembuat Komitmen</div>
                                <div class="datagrid-content"><?= $kinerja->nama_pegawai; ?></div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Jenis Pengadaan</div>
                                <div class="datagrid-content"><?= $kinerja->jenis_pengadaan; ?></div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Metode Pemilihan</div>
                                <div class="datagrid-content"><?= $kinerja->metode_pengadaan; ?></div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Nama Penyedia</div>
                                <div class="datagrid-content"><?= $kinerja->nama_penyedia; ?></div>
                            </div>
                            <div class="datagrid-item">
                                <div class="datagrid-title">Hasil Penilaian Kinerja</div>
                                <div class="datagrid-content"><?= $kinerja->nilai_kinerja; ?>
                                    <?php
                                    if ($kinerja->nilai_kinerja == 0) {
                                        echo "<span class='badge  bg-danger-lt '>Buruk</span>";
                                    } elseif ($kinerja->nilai_kinerja == 1 || $kinerja->nilai_kinerja < 2) {
                                        echo "<span class='badge  bg-yellow-lt '>Cukup</span>";
                                    } elseif ($kinerja->nilai_kinerja == 2 || $kinerja->nilai_kinerja < 3) {
                                        echo "<span class='badge  bg-primary-lt '>Baik</span>";
                                    } elseif ($kinerja->nilai_kinerja == 3) {
                                        echo "<span class='badge  bg-green-lt '>Sangat Baik</span>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer">
                            <a href="<?= base_url("verifikasi") ?>" class="btn btn-submit btn-primary ms-auto w-100">
                                <!-- Download SVG icon from http://tabler-icons.io/i/mail -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevrons-left" width="40" height="40" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="11 7 6 12 11 17"></polyline>
                                    <polyline points="17 7 12 12 17 17"></polyline>
                                </svg>
                                Kembali
                            </a>
                        </div>
                    <?php
                    } else {
                    ?>
                        <div class="text-center mb-4"><img src="<?= base_url(); ?>/assets/static/delete-button.png" height="80" alt=""></div>
                        <p class="text-muted mb-4">Data tidak ditemukan, Silahkan masukkan kembali kode verifikasi yang tertera pada dokumen</p>
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
                    <?php }
                    ?>

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