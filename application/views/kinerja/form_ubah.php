<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <h2 class="page-title">
                        Penilaian Kinerja Penyedia Jasa/Pelaku Usaha
                    </h2>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-cards">
                <div class="col-12">
                    <div class="card">

                        <?php $attributes = array('id' => 'FormUbahKinerja', 'method' => "post", "autocomplete" => "off");
                        echo form_open('', $attributes); ?>
                        <div class="card-header card-header-light">
                            <h4 class="card-title">Input Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3 paket">
                                                <label class="form-label required">Nama Paket</label>
                                                <input type="text" class="form-control <?= form_error('nama_paket') ? 'is-invalid' : '' ?>" id="nama_paket" name="nama_paket" value="<?= $paket->nama_paket; ?>" disabled>
                                                <div class="invalid-feedback"><?= form_error('nama_paket') ?></div>
                                                <input type="hidden" id="kd_paket" name="kd_paket" value="<?= $paket->kd_paket; ?>">
                                                <input type="hidden" id="kd_kinerja" name="kd_kinerja" value="<?= $paket->kd_penilaian; ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="row">
                                                <div class="mb-3">
                                                    <label class="form-label required">OPD</label>
                                                    <input type="text" class="form-control" id="nama_satker" rows="2" name="nama_satker" value="<?= $paket->nama_satker; ?>" disabled>
                                                    <input type="hidden" class="kd_satker" id="kd_satker" name="kd_satker" value="<?= $paket->kd_satker; ?>">
                                                    <div class="invalid-feedback"><?= form_error('nama_satker') ?></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Lokasi Pekerjaan</label>
                                                    <textarea class="form-control" id="lokasi" rows="3" name="lokasi" disabled><?= $paket->lokasi_pekerjaan; ?></textarea>
                                                    <div class="invalid-feedback"><?= form_error('lokasi') ?></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label required">Jenis Pengadaan</label>
                                                <input type="text" class="form-control <?= form_error('jenis_pengadaan') ? 'is-invalid' : '' ?>" id="jenis_pengadaan" name="jenis_pengadaan" value="<?= $paket->jenis_pengadaan; ?>" disabled>
                                                <div class="invalid-feedback"><?= form_error('jenis_pengadaan'); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label required">Metode Pengadaan</label>
                                                <input type="text" class="form-control <?= form_error('metode_pengadaan') ? 'is-invalid' : '' ?>" id="metode_pengadaan" name="metode_pengadaan" value="<?= $paket->metode_pengadaan; ?>" disabled>
                                                <div class="invalid-feedback"><?= form_error('metode_pengadaan') ?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3 ppkom">
                                                <label class="form-label required">Nama Pejabat Pembuat Komitmen</label>
                                                <input type="text" class="form-control <?= form_error('nama_pegawai') ? 'is-invalid' : '' ?>" id="nama_pegawai" name="nama_pegawai" value="<?= $paket->nama_pegawai; ?>" disabled>
                                                <input type="hidden" name="kd_pegawai" id="kd_pegawai" class="kd_pegawai" value="<?= $paket->kd_pegawai; ?>">
                                                <div class="invalid-feedback"><?= form_error('nama_pegawai') ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="form-label">Data Kontrak</label>
                                            <fieldset class="form-fieldset">
                                                <div class="mb-3">
                                                    <label class="form-label required">Nama Penyedia</label>
                                                    <input type="text" id="nama_penyedia" class="form-control <?= form_error('nama_penyedia') ? 'is-invalid' : '' ?>" name="nama_penyedia" value="<?= $paket->nama_penyedia; ?>" disabled>
                                                    <input type="hidden" id="kd_penyedia" name="kd_penyedia" value="<?= $paket->kd_penyedia; ?>">
                                                    <div class="invalid-feedback"><?= form_error('nama_penyedia') ?></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Alamat Penyedia</label>
                                                    <input type="text" id="alamat_penyedia" class="form-control <?= form_error('alamat_penyedia') ? 'is-invalid' : '' ?>" name="alamat_penyedia" value="<?= $paket->alamat; ?>" disabled>
                                                    <div class="invalid-feedback"><?= form_error('alamat_penyedia') ?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label required">Nomor Kontrak</label>
                                                            <input type="text" class="form-control <?= form_error('no_kontrak') ? 'is-invalid' : '' ?>" id="no_kontrak" name="no_kontrak" value="<?= $paket->no_kontrak; ?>" disabled>
                                                            <div class="invalid-feedback"><?= form_error('no_kontrak') ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label required">Tanggal Kontrak</label>
                                                            <input type="date" class="form-control <?= form_error('tanggal_kontrak') ? 'is-invalid' : '' ?>" id="tanggal_kontrak" name="tanggal_kontrak" value="<?= $paket->tgl_kontrak; ?>" disabled>
                                                            <div class="invalid-feedback"><?= form_error('tanggal_kontrak') ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Nilai Kontrak</label>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text">
                                                            Rp.
                                                        </span>
                                                        <input type="text" onkeyup="getnumeric(this)" class=" form-control <?= form_error('nilai_kontrak') ? 'is-invalid' : '' ?>" id="nilai_kontrak" name="nilai_kontrak" autocomplete="off" value="<?= number_format($paket->nilai_kontrak, 2); ?>" disabled>
                                                        <div class="invalid-feedback"><?= form_error('nilai_kontrak') ?></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Jangka Waktu Pelaksanaan</label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control <?= form_error('jangka_waktu') ? 'is-invalid' : '' ?>" id="jangka_waktu" name="jangka_waktu" autocomplete="off" value="<?= $paket->jangka_waktu; ?>" disabled>
                                                        <span class="input-group-text">
                                                            hari
                                                        </span>
                                                        <div class="invalid-feedback"><?= form_error('jangka_waktu') ?></div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="page-body">
                            <div class="card-header card-header-light mb-3">
                                <h4 class="card-title">Form Penilaian Kinerja Penyedia/Pelaku Usaha</h4>
                            </div>
                            <div class="container-xl">
                                <div class="card">
                                    <div class="table-responsive">
                                        <table class="table table-vcenter table-bordered table-nowrap card-table">
                                            <thead>
                                                <tr>
                                                    <td class="w-60 text-uppercase">
                                                        <h4>Aspek Kinerja dan Indikator</h4>
                                                    </td>
                                                    <td class="text-center text-uppercase">
                                                        <h4>Bobot</h4>
                                                    </td>
                                                    <td class="text-center text-uppercase">
                                                        <h4>Penilaian</h4>
                                                    </td>
                                                    <td class="text-center text-uppercase">
                                                        <h4>Nilai Akhir</h4>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr class="bg-light">
                                                    <th colspan="4" class="subheader">Kualitas dan Kuantitas</th>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify text-wrap">> 50% hasil pekerjaan memerlukan perbaikan/ penggantian agar sesuai dengan ketentuan dalam kontrak. </td>
                                                    <td class="text-center" rowspan="3">
                                                        30%
                                                    </td>
                                                    <td>
                                                        <label class="form-check form-switch ">
                                                            <input class="form-check-input" type="radio" name="aspek_1" id="aspek_1" value="1" onclick="skor_1()" <?php if ($paket->nilai_1 == 1) {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } ?>>
                                                            Cukup
                                                        </label>
                                                    </td>
                                                    <td class="text-center" rowspan="3">
                                                        <div id="hasil_1"><?= $paket->aspek_1; ?></div>
                                                        <input type="hidden" name="poin_1" id="poin_1" value="<?= $paket->aspek_1; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify text-wrap">≤ 50% hasil pekerjaan memerlukan perbaikan/ penggantian agar sesuai dengan ketentuan dalam kontrak.
                                                    </td>
                                                    <td>
                                                        <label class="form-check form-switch ">
                                                            <input class="form-check-input" type="radio" name="aspek_1" id="aspek_1" value="2" onclick="skor_1()" <?php if ($paket->nilai_1 == 2) {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } ?>>
                                                            Baik
                                                        </label>
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td class="text-justify text-wrap">100% hasil pekerjaan sesuai dengan ketentuan dalam kontrak.</td>
                                                    <td>
                                                        <label class="form-check form-switch ">
                                                            <input class="form-check-input" type="radio" name="aspek_1" id="aspek_1" value="3" onclick="skor_1()" <?php if ($paket->nilai_1 == 3) {
                                                                                                                                                                        echo "checked";
                                                                                                                                                                    } ?>>
                                                            Sangat Baik
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr class="bg-light">
                                                    <th colspan="4" class="subheader">Biaya</th>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify text-wrap">
                                                        <ol type="a" class="mb-0 pb-0">
                                                            <li>Tidak menginformasikan sejak awal atas kondisi/ kejadian yang berpotensi menambah biaya; dan</li>
                                                            <li>Mengajukan perubahan kontrak yang akan berdampak pada penambahan total biaya tanpa alasan yang memadai sehingga
                                                                ditolak oleh PPK.</li>
                                                        </ol>
                                                    </td>
                                                    <td class="text-center" rowspan="3">
                                                        20%
                                                    </td>
                                                    <td>
                                                        <label class="form-check form-switch ">
                                                            <input class="form-check-input" type="radio" name="aspek_2" value="1" onclick="skor_2()" <?php if ($paket->nilai_2 == 1) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                                            Cukup
                                                        </label>
                                                    </td>
                                                    <td class="text-center" rowspan="3">
                                                        <div id="hasil_2"><?= $paket->aspek_2; ?></div>
                                                        <input type="hidden" name="poin_2" id="poin_2" value="<?= $paket->aspek_2; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify text-wrap">Melakukan salah satu kondisi pada kriteria Cukup.</td>
                                                    <td>
                                                        <label class="form-check form-switch ">
                                                            <input class="form-check-input" type="radio" name="aspek_2" value="2" onclick="skor_2()" <?php if ($paket->nilai_2 == 2) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                                            Baik
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify text-wrap">
                                                        Telah melakukan pengendalian biaya dengan baik dengan menginformasikan sejak awal atas kondisi yang berpotensi menambah biaya dan perubahan kontrak yang diajukan sudah didasari dengan alasan yang dapat dipertanggungjawabkan, sehingga
                                                        penambahan biaya dapat diantisipasi.
                                                    </td>
                                                    <td>
                                                        <label class="form-check form-switch ">
                                                            <input class="form-check-input" type="radio" name="aspek_2" value="3" onclick="skor_2()" <?php if ($paket->nilai_2 == 3) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                                            Sangat Baik
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr class="bg-light">
                                                    <th colspan="4" class="subheader">Waktu</th>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify text-wrap">Penyelesaian pekerjaan terlambat melebihi 50 (lima puluh) hari kalender dari waktu yang ditetapkan dalam kontrak karena kesalahan Penyedia.</td>
                                                    <td class="text-center" rowspan="3">
                                                        30%
                                                    </td>
                                                    <td>
                                                        <label class="form-check form-switch ">
                                                            <input class="form-check-input" type="radio" name="aspek_3" value="1" onclick="skor_3()" <?php if ($paket->nilai_3 == 1) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                                            Cukup
                                                        </label>
                                                    </td>
                                                    <td class="text-center" rowspan="3">
                                                        <div id="hasil_3"><?= $paket->aspek_3; ?></div>
                                                        <input type="hidden" name="poin_3" id="poin_3" value="<?= $paket->aspek_3; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify text-wrap">Penyelesaian pekerjaan terlambat sampai dengan 50 (lima puluh) hari kalender dari waktu yang ditetapkan dalam kontrak karena kesalahan Penyedia.</td>
                                                    <td>
                                                        <label class="form-check form-switch ">
                                                            <input class="form-check-input" type="radio" name="aspek_3" value="2" onclick="skor_3()" <?php if ($paket->nilai_3 == 2) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                                            Baik
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify text-wrap">Penyelesaian pekerjaan sesuai dengan waktu yang ditetapkan dalam kontrak atau lebih cepat sesuai dengan kebutuhan PPK.</td>
                                                    <td>
                                                        <label class="form-check form-switch ">
                                                            <input class="form-check-input" type="radio" name="aspek_3" value="3" onclick="skor_3()" <?php if ($paket->nilai_3 == 3) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                                            Sangat Baik
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr class="bg-light">
                                                    <th colspan="4" class="subheader">Layanan</th>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify text-wrap">
                                                        <ol type="a" class="mb-0 pb-0">
                                                            <li>Penyedia lambat memberi tanggapan positif atas permintaan PPK; dan</li>
                                                            <li>Penyedia sulit diajak berdiskusi dalam penyelesaian pelaksanaan pekerjaan.</li>
                                                        </ol>
                                                    </td>
                                                    <td class="text-center" rowspan="3">
                                                        20%
                                                    </td>
                                                    <td>
                                                        <label class="form-check form-switch ">
                                                            <input class="form-check-input" type="radio" name="aspek_4" value="1" onclick="skor_4()" <?php if ($paket->nilai_4 == 1) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                                            Cukup
                                                        </label>
                                                    </td>
                                                    <td class="text-center" rowspan="3">
                                                        <div id="hasil_4"><?= $paket->aspek_4; ?></div>
                                                        <input type="hidden" name="poin_4" id="poin_4" value="<?= $paket->aspek_4; ?>">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify text-wrap">
                                                        <ol type="a" class="mb-0 pb-o">
                                                            <li>Merespon permintaan dengan penyelesaian sesuai dengan yang diminta; atau</li>
                                                            <li>Penyedia mudah dihubungi dan berdiskusi dalam penyelesaian pelaksanaan pekerjaan.</li>
                                                        </ol>
                                                    </td>
                                                    <td>
                                                        <label class="form-check form-switch ">
                                                            <input class="form-check-input" type="radio" name="aspek_4" value="2" onclick="skor_4()" <?php if ($paket->nilai_4 == 2) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                                            Baik
                                                        </label>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-justify text-wrap">
                                                        <ol type="a" class="mb-0 pb-0">
                                                            <li>Merespon permintaan dengan penyelesaian sesuai dengan yang diminta; dan</li>
                                                            <li>mudah dihubungi dan berdiskusi dalam penyelesaian pelaksanaan pekerjaan.</li>
                                                        </ol>
                                                    </td>
                                                    <td>
                                                        <label class="form-check form-switch ">
                                                            <input class="form-check-input" type="radio" name="aspek_4" value="3" onclick="skor_4()" <?php if ($paket->nilai_4 == 3) {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } ?>>
                                                            Sangat Baik
                                                        </label>
                                                    </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td class="text-center text-uppercase">
                                                        <h4>Nilai Kinerja</h4>
                                                    </td>
                                                    <td class="text-center">
                                                        <h4>100%</h4>
                                                    </td>
                                                    <td class="text-center">
                                                        <h4 id="kategori"><?= $paket->kategori_nilai; ?></h4>
                                                        <input type="hidden" name="kat" id="kat" value="<?= $paket->kategori_nilai; ?>">
                                                    </td>
                                                    <td class="text-center">
                                                        <h4 id="hasil_akhir"><?= $paket->nilai_kinerja; ?></h4>
                                                        <input type="hidden" name="poin_akhir" id="poin_akhir" value="<?= $paket->nilai_kinerja; ?>">
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <button onclick="window.history.go(-1); return false;" class="btn btn-azure"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevrons-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="11 7 6 12 11 17"></polyline>
                                        <polyline points="17 7 12 12 17 17"></polyline>
                                    </svg> Kembali ke Rekapitulasi Data Kinerja</button>
                                <button type="submit" class="btn btn-submit btn-primary ms-auto"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                        <circle cx="12" cy="14" r="2"></circle>
                                        <polyline points="14 4 14 8 8 8 8 4"></polyline>
                                    </svg> Simpan</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>