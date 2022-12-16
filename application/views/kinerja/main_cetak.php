<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Lembar Evaluasi Kinerja Penyedia/Pelaku Usaha
                    </h2>
                    <div class="text-muted mt-1">PerLKPP Nomor 4 Tahun 2021</div>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <button type="button" class="btn btn-primary" onclick="javascript:window.print();">
                        <!-- Download SVG icon from http://tabler-icons.io/i/printer -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2" />
                            <path d="M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4" />
                            <rect x="7" y="13" width="10" height="8" rx="2" />
                        </svg>
                        Cetak Penilaian
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card card-lg">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="card-title text-center strong">FORMULIR PENILAIAN KINERJA PENYEDIA <br>
                                TAHUN ANGGARAN <?= $kinerja->tahun; ?></h3>
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <td style="width: 30px;">1.</td>
                                    <td style="width: 300px;">Perangkat Daerah</td>
                                    <td style="width: 10px;" class="text-center">:</td>
                                    <td colspan="4"><?= $kinerja->nama_satker; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30px;">2.</td>
                                    <td style="width: 300px;">Nama Penyedia</td>
                                    <td style="width: 10px;" class="text-center">:</td>
                                    <td colspan="4"><?= $kinerja->nama_penyedia; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30px;">3.</td>
                                    <td style="width: 300px;">Alamat Penyedia</td>
                                    <td style="width: 10px;" class="text-center">:</td>
                                    <td colspan="4"><?= $kinerja->alamat; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30px;">4.</td>
                                    <td style="width: 300px;">Nama Paket Pekerjaan</td>
                                    <td style="width: 10px;" class="text-center">:</td>
                                    <td colspan="4"><?= $kinerja->nama_paket; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30px;">5.</td>
                                    <td style="width: 300px;">Lokasi Pekerjaan</td>
                                    <td style="width: 10px;" class="text-center">:</td>
                                    <td colspan="4"><?= $kinerja->lokasi_pekerjaan; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30px;">6.</td>
                                    <td style="width: 300px;">Nilai Kontrak</td>
                                    <td style="width: 10px;" class="text-center">:</td>
                                    <td colspan="4">Rp. <?= number_format($kinerja->nilai_kontrak, 2); ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30px;">7.</td>
                                    <td style="width: 300px;">Nomor Kontrak</td>
                                    <td style="width: 10px;" class="text-center">:</td>
                                    <td style="width: 300px;"><?= $kinerja->no_kontrak; ?></td>
                                    <td>Tanggal</td>
                                    <td style="width: 10px;" class="text-center">:</td>
                                    <td style="width: 300px;"><?= $kinerja->tgl_kontrak; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30px;">8.</td>
                                    <td style="width: 300px;">Jangka Waktu Pelaksanaan</td>
                                    <td style="width: 10px;" class="text-center">:</td>
                                    <td colspan="4"><?= $kinerja->jangka_waktu; ?> hari</td>
                                </tr>
                                <tr>
                                    <td style="width: 30px;">9.</td>
                                    <td style="width: 300px;">Jenis Pengadaan</td>
                                    <td style="width: 10px;" class="text-center">:</td>
                                    <td colspan="4"><?= $kinerja->jenis_pengadaan; ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 30px;">10.</td>
                                    <td style="width: 300px;">Metode Pemilihan</td>
                                    <td style="width: 10px;" class="text-center">:</td>
                                    <td colspan="4"><?= $kinerja->metode_pengadaan; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <table class="table table-transparent table-responsive">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width: 1%">No.</th>
                                        <th>Aspek Kinerja</th>
                                        <th class="text-center" style="width: 1%">Bobot (%)</th>
                                        <th class="text-center">Penilaian</th>
                                        <th class="text-center" style="width: 1%">Nilai Akhir</th>
                                    </tr>
                                </thead>
                                <tr>
                                    <td class="text-center">1.</td>
                                    <td>Kualitas dan Kuantitas</td>
                                    <td class="text-center">
                                        30
                                    </td>
                                    <td class="text-center">
                                        <p class="strong mb-1"><?= $kinerja->nilai_1; ?></p>
                                        <div class="text-muted">
                                            <?php
                                            if ($kinerja->nilai_1 == 1) {
                                                echo "Cukup";
                                            } elseif ($kinerja->nilai_1 == 2) {
                                                echo "Baik";
                                            } else {
                                                echo "Sangat Baik";
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td class="text-center"><?= $kinerja->aspek_1; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">2.</td>
                                    <td>Biaya</td>
                                    <td class="text-center">
                                        20
                                    </td>
                                    <td class="text-center">
                                        <p class="strong mb-1"><?= $kinerja->nilai_2; ?></p>
                                        <div class="text-muted">
                                            <?php
                                            if ($kinerja->nilai_2 == 1) {
                                                echo "Cukup";
                                            } elseif ($kinerja->nilai_2 == 2) {
                                                echo "Baik";
                                            } else {
                                                echo "Sangat Baik";
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td class="text-center"><?= $kinerja->aspek_2; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">3.</td>
                                    <td>Waktu</td>
                                    <td class="text-center">
                                        30
                                    </td>
                                    <td class="text-center">
                                        <p class="strong mb-1"><?= $kinerja->nilai_3; ?></p>
                                        <div class="text-muted">
                                            <?php
                                            if ($kinerja->nilai_3 == 1) {
                                                echo "Cukup";
                                            } elseif ($kinerja->nilai_3 == 2) {
                                                echo "Baik";
                                            } else {
                                                echo "Sangat Baik";
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td class="text-center"><?= $kinerja->aspek_3; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center">4.</td>
                                    <td>Layanan</td>
                                    <td class="text-center">
                                        20
                                    </td>
                                    <td class="text-center">
                                        <p class="strong mb-1"><?= $kinerja->nilai_4; ?></p>
                                        <div class="text-muted">
                                            <?php
                                            if ($kinerja->nilai_4 == 1) {
                                                echo "Cukup";
                                            } elseif ($kinerja->nilai_4 == 2) {
                                                echo "Baik";
                                            } else {
                                                echo "Sangat Baik";
                                            }
                                            ?>
                                        </div>
                                    </td>
                                    <td class="text-center"><?= $kinerja->aspek_4; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center"></td>
                                    <td class="strong text-center">NILAI KINERJA</td>
                                    <td class="strong text-center">
                                        100
                                    </td>
                                    <td class="text-center">

                                    </td>
                                    <td class="strong text-center">
                                        <p class="strong mb-1"><?= $kinerja->nilai_kinerja; ?></p>
                                        <div class="text-muted">
                                            <?= $kinerja->kategori_nilai; ?>
                                        </div>
                                    </td>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <table class="table table-sm table-borderless mt-3">
                                <tr>
                                    <td>
                                        <p class="strong mb-1">Keterangan :</p>
                                    </td>
                                    <td rowspan="2" class="text-center">
                                        Magelang, <?= date('d F Y'); ?>
                                        <br>
                                        <p class="strong mt-3">Penilai,<br>
                                            PEJABAT PEMBUAT KOMITMEN
                                        </p>
                                        <p class="strong mt-5"><u><?= $kinerja->nama_pegawai; ?></u>
                                            <br>
                                            NIP. <?= $kinerja->nip; ?>
                                        </p>

                                    </td>
                                </tr>
                                <tr>
                                    <td>Nilai Kinerja 0 : <span class="strong">Buruk</span><br>
                                        Nilai Kinerja 1 s.d < 2 : <span class="strong">Cukup</span><br>
                                            Nilai Kinerja 2 s.d < 3 : <span class="strong">Baik</span><br>
                                                Nilai Kinerja 3 : <span class="strong">Sangat Baik</span><br>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr class="mt-0 mb-2">
                    <div class="row">
                        <div class="col-6">
                            <table>
                                <tr>
                                    <td style="width:60px"> <img src="<?= base_url(); ?>assets/images/<?= $kinerja->qrcode; ?>" width="50"></td>
                                    <td>
                                        <h4 class="mb-0"><?= $kinerja->kd_verifikasi; ?></h4>
                                        <span class="text-muted small">Silahkan scan <b>QR-Code</b> disamping untuk mengecek keaslian surat</span>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-6 text-end">
                            <img src="<?= base_url(); ?>assets/static/logo-fit.svg" width="150" height="40" alt="AMANAH" class="navbar-brand-image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>