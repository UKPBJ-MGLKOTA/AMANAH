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
                        Paket Pengadaan
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

                        <?php $attributes = array('id' => 'FormEditPaket', 'method' => "post", "autocomplete" => "off");
                        echo form_open('', $attributes); ?>
                        <div class="card-header card-header-light">
                            <h4 class="card-title">Validasi Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label required">OPD</label>
                                                <input type="text" class="form-control" name="nama_satker" value="<?= $paket->nama_satker; ?>" disabled>
                                                <input type="hidden" id="kd_satker" name="kd_satker" value="<?= $paket->kd_satker; ?>">
                                                <input type="hidden" id="kd_paket" name="kd_paket" value="<?= $paket->kd_paket; ?>">
                                                <input type="hidden" id="aktif" name="aktif" value="<?= $aktif; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Tahun Anggaran <?= $paket->tahun; ?></label>
                                                <select class="form-select <?= form_error('tahun') ? 'is-invalid' : '' ?>" id="tahun" name="tahun">
                                                    <option value="0">Pilih Tahun Anggaran</option>
                                                    <option value="2022" <?php if ($paket->tahun == "2022") {
                                                                                echo "selected";
                                                                            } ?>>2022</option>
                                                    <option value="2023" <?php if ($paket->tahun == "2023") {
                                                                                echo "selected";
                                                                            } ?>>2023</option>
                                                </select>
                                                <div class="invalid-feedback"><?= form_error('tahun') ?></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Nama Paket</label>
                                                <input type="text" id="nama_paket" class="form-control <?= form_error('nama_paket') ? 'is-invalid' : '' ?>" name="nama_paket" value="<?= $paket->nama_paket; ?>">
                                                <div class="invalid-feedback"><?= form_error('nama_paket') ?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label required">Pagu</label>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text">
                                                                Rp.
                                                            </span>
                                                            <input type="text" id="pagu" onkeyup="getnumeric(this)" class=" form-control <?= form_error('pagu') ? 'is-invalid' : '' ?>" name="pagu" autocomplete="off" value="<?= number_format($paket->pagu, 2); ?>">
                                                            <div class="invalid-feedback"><?= form_error('pagu') ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="mb-3">
                                                        <label class="form-label required">HPS</label>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text">
                                                                Rp.
                                                            </span>
                                                            <input type="text" id="hps" onkeyup="getnumeric(this)" class=" form-control <?= form_error('hps') ? 'is-invalid' : '' ?>" name="hps" autocomplete="off" value="<?= number_format($paket->hps, 2); ?>">
                                                            <div class="invalid-feedback"><?= form_error('hps') ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label required">Jenis Pengadaan</label>
                                                <select class="form-select <?= form_error('jenis_pengadaan') ? 'is-invalid' : '' ?>" id="jenis_pengadaan" name="jenis_pengadaan">
                                                    <option value="0">Pilih Jenis Pengadaan</option>
                                                    <option value="Pengadaan Barang" <?php if ($paket->jenis_pengadaan == "Pengadaan Barang") {
                                                                                            echo "selected";
                                                                                        } ?>>Pengadaan Barang</option>
                                                    <option value="Pekerjaan Konstruksi" <?php if ($paket->jenis_pengadaan == "Pekerjaan Konstruksi") {
                                                                                                echo "selected";
                                                                                            } ?>>Pekerjaan Konstruksi</option>
                                                    <option value="Jasa Konsultansi" <?php if ($paket->jenis_pengadaan == "Jasa Konsultansi") {
                                                                                            echo "selected";
                                                                                        } ?>>Jasa Konsultansi</option>
                                                    <option value="Jasa Lainnya" <?php if ($paket->jenis_pengadaan == "Jasa Lainnya") {
                                                                                        echo "selected";
                                                                                    } ?>>Jasa Lainnya</option>
                                                </select>
                                                <div class="invalid-feedback"><?= form_error('jenis_pengadaan') ?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label required">Metode Pengadaan</label>
                                                <select class="form-select <?= form_error('metode_pengadaan') ? 'is-invalid' : '' ?>" id="metode_pengadaan" name="metode_pengadaan">
                                                    <option value="0">Pilih Metode Pengadaan</option>
                                                    <option value="E-purchasing" <?php if ($paket->metode_pengadaan == "E-purchasing") {
                                                                                        echo "selected";
                                                                                    } ?>>E-purchasing</option>
                                                    <option value="Pengadaan Langsung" <?php if ($paket->metode_pengadaan == "Pengadaan Langsung") {
                                                                                            echo "selected";
                                                                                        } ?>>Pengadaan Langsung</option>
                                                    <option value="Penunjukan Langsung" <?php if ($paket->metode_pengadaan == "Penunjukan Langsung") {
                                                                                            echo "selected";
                                                                                        } ?>>Penunjukan Langsung</option>
                                                    <option value="Tender" <?php if ($paket->metode_pengadaan == "Tender") {
                                                                                echo "selected";
                                                                            } ?>>Tender</option>
                                                    <option value="e-Lelang Cepat" <?php if ($paket->metode_pengadaan == "e-Lelang Cepat") {
                                                                                        echo "selected";
                                                                                    } ?>>e-Lelang Cepat</option>
                                                    <option value="Seleksi" <?php if ($paket->metode_pengadaan == "Seleksi") {
                                                                                echo "selected";
                                                                            } ?>>Seleksi</option>
                                                </select>
                                                <div class="invalid-feedback"><?= form_error('metode_pengadaan') ?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label">Lokasi Pekerjaan</label>
                                                <textarea class="form-control" id="lokasi" rows="2" name="lokasi"><?= $paket->lokasi_pekerjaan; ?></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3 ppkom">
                                                <label class="form-label required">Nama Pejabat Pembuat Komitmen</label>
                                                <div class="row g-2">
                                                    <?php if ($this->session->userdata('kd_level') == 2 || $paket->status == 3) { ?>
                                                        <div class="col">
                                                            <input type="text" class="form-control <?= form_error('nama_pegawai') ? 'is-invalid' : '' ?>" id="nama_pegawai" name="nama_pegawai" placeholder="Pilih PPKom" value="<?= $paket->nama_pegawai; ?>" disabled>
                                                            <div class="invalid-feedback"><?= form_error('nama_pegawai') ?></div>
                                                            <input type="hidden" id="kd_pegawai" name="kd_pegawai" value="<?= $paket->kd_pegawai; ?>">
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="col">
                                                            <input type="text" class="form-control <?= form_error('nama_pegawai') ? 'is-invalid' : '' ?>" id="nama_pegawai" name="nama_pegawai" placeholder="Pilih PPKom" value="<?= $paket->nama_pegawai; ?>" disabled>
                                                            <div class="invalid-feedback"><?= form_error('nama_pegawai') ?></div>
                                                            <input type="hidden" id="kd_pegawai" name="kd_pegawai" value="<?= $paket->kd_pegawai; ?>">
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="button" data-toggle="modal" data-target="#modal-ppkom" class="btn btn-danger btn-icon btn-ppkom" aria-label="Button">
                                                                <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <circle cx="10" cy="10" r="7" />
                                                                    <line x1="21" y1="21" x2="15" y2="15" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="form-label">Data Kontrak</label>
                                            <fieldset class="form-fieldset">
                                                <div class="mb-3 penyedia">
                                                    <label class="form-label required">Penyedia Barang/Jasa</label>
                                                    <div class="row g-2">
                                                        <?php if ($paket->status == 3) { ?>
                                                            <div class="col">
                                                                <input type="text" class="form-control <?= form_error('nama_penyedia') ? 'is-invalid' : '' ?>" id="nama_penyedia" name="nama_penyedia" placeholder="Pilih Penyedia" value="<?= $paket->nama_penyedia; ?>" disabled>
                                                                <div class="invalid-feedback"><?= form_error('nama_penyedia') ?></div>
                                                                <input type="hidden" name="kd_penyedia" id="kd_penyedia" value="<?= $paket->kd_penyedia; ?>">
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="col">
                                                                <input type="text" class="form-control <?= form_error('nama_penyedia') ? 'is-invalid' : '' ?>" id="nama_penyedia" name="nama_penyedia" placeholder="Pilih Penyedia" value="<?= $paket->nama_penyedia; ?>" disabled>
                                                                <div class="invalid-feedback"><?= form_error('nama_penyedia') ?></div>
                                                                <input type="hidden" name="kd_penyedia" id="kd_penyedia" value="<?= $paket->kd_penyedia; ?>">
                                                            </div>
                                                            <div class="col-auto">
                                                                <button type="button" data-toggle="modal" data-target="#modal-penyedia" class="btn btn-danger btn-icon btn-penyedia" aria-label="Button">
                                                                    <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                        <circle cx="10" cy="10" r="7" />
                                                                        <line x1="21" y1="21" x2="15" y2="15" />
                                                                    </svg>
                                                                </button>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Nomor Kontrak</label>
                                                    <input type="text" class="form-control <?= form_error('no_kontrak') ? 'is-invalid' : '' ?>" id="no_kontrak" name="no_kontrak" value="<?= $paket->no_kontrak; ?>">
                                                    <div class="invalid-feedback"><?= form_error('no_kontrak') ?></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Nilai Kontrak</label>
                                                    <div class="input-group mb-2">
                                                        <span class="input-group-text">
                                                            Rp.
                                                        </span>
                                                        <input type="text" onkeyup="getnumeric(this)" class=" form-control <?= form_error('nilai_kontrak') ? 'is-invalid' : '' ?>" id="nilai_kontrak" name="nilai_kontrak" autocomplete="off" value="<?= number_format($paket->nilai_kontrak, 2); ?>">
                                                        <div class="invalid-feedback"><?= form_error('nilai_kontrak') ?></div>
                                                    </div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Tanggal Kontrak</label>
                                                    <input type="date" class="form-control <?= form_error('tanggal_kontrak') ? 'is-invalid' : '' ?>" id="tanggal_kontrak" name="tanggal_kontrak" value="<?= $paket->tgl_kontrak; ?>">
                                                    <div class="invalid-feedback"><?= form_error('tanggal_kontrak') ?></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Jangka Waktu Pelaksanaan</label>
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control <?= form_error('jangka_waktu') ? 'is-invalid' : '' ?>" id="jangka_waktu" name="jangka_waktu" autocomplete="off" value="<?= $paket->jangka_waktu; ?>">
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
                        <div class="card-footer text-end">
                            <div class="d-flex">
                                <button onclick="window.history.go(-1); return false;" class="btn btn-azure"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chevrons-left" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <polyline points="11 7 6 12 11 17"></polyline>
                                        <polyline points="17 7 12 12 17 17"></polyline>
                                    </svg> Kembali ke Rekapitulasi Data Penyedia</button>
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