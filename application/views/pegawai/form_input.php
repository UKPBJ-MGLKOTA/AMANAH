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
                        <?php if ($this->session->userdata('kd_level') == 1) {
                            echo "Pegawai";
                        } else {
                            echo "Pejabat Pembuat Komitmen";
                        } ?>
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

                        <?php $attributes = array('id' => 'FormTambahPegawai', 'method' => "post", "autocomplete" => "off");
                        echo form_open('', $attributes); ?>
                        <div class="card-header card-header-light">
                            <h4 class="card-title">Input Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3 satker">
                                                <label class="form-label required">OPD</label>
                                                <div class="row g-2">
                                                    <?php if ($this->session->userdata('kd_level') == 1 || $this->session->userdata('kd_level') == 2) { ?>
                                                        <div class="col">
                                                            <input type="text" class="form-control <?= form_error('nama_satker') ? 'is-invalid' : '' ?>" id="nama_satker" name="nama_satker" placeholder="Pilih OPD" value="<?= set_value('nama_satker'); ?>" disabled>
                                                            <div class="invalid-feedback"><?= form_error('nama_satker') ?></div>
                                                            <input type="hidden" id="kd_satker" name="kd_satker" value="<?= set_value('kd_satker') ?>">
                                                        </div>
                                                        <div class="col-auto">
                                                            <button type="button" data-toggle="modal" data-target="#modal-satker" class="btn btn-danger btn-icon btn-satker" aria-label="Button">
                                                                <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <circle cx="10" cy="10" r="7" />
                                                                    <line x1="21" y1="21" x2="15" y2="15" />
                                                                </svg>
                                                            </button>
                                                        </div>
                                                    <?php } else { ?>
                                                        <div class="col">
                                                            <input type="text" class="form-control <?= form_error('nama_satker') ? 'is-invalid' : '' ?>" id="nama_satker" name="nama_satker" placeholder="Pilih OPD" value="<?= $profil->nama_satker; ?>" disabled>
                                                            <div class="invalid-feedback"><?= form_error('nama_satker') ?></div>
                                                            <input type="hidden" id="kd_satker" name="kd_satker" value="<?= $profil->kd_satker; ?>">
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label required">Nama Pegawai</label>
                                                <input type="text" id="nama_pegawai" class="form-control <?= form_error('nama_pegawai') ? 'is-invalid' : '' ?>" name="nama_pegawai" value="<?= set_value('nama_pegawai') ?>">
                                                <div class="invalid-feedback"><?= form_error('nama_pegawai') ?></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">NIP</label>
                                                <input type="text" id="nip" class="form-control <?= form_error('nip') ? 'is-invalid' : '' ?>" name="nip" data-mask="00000000 000000 0 000" data-mask-visible="true" placeholder="00000000 000000 0 000" value="<?= set_value('nip') ?>">
                                                <div class="invalid-feedback"><?= form_error('nip') ?></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">Jabatan</label>
                                                <input type="text" id="jabatan" class="form-control <?= form_error('jabatan') ? 'is-invalid' : '' ?>" name="jabatan" value="<?= set_value('jabatan') ?>">
                                                <div class="invalid-feedback"><?= form_error('jabatan') ?></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="mb-3">
                                                        <label class="form-label required">Pangkat/Golongan</label>
                                                        <select class="form-select <?= form_error('pangkat') ? 'is-invalid' : '' ?>" id="pangkat" name="pangkat">
                                                            <optgroup>Penata</optgroup>
                                                            <option value="Penata Muda/III A" <?php if (set_value('pangkat') == "Penata Muda") {
                                                                                                    echo "selected";
                                                                                                } ?>>Penata Muda/III A</option>
                                                            <option value="Penata Muda Tingkat I/III B" <?php if (set_value('pangkat') == "Penata Muda Tingkat I") {
                                                                                                            echo "selected";
                                                                                                        } ?>>Penata Muda Tingkat I/III B</option>
                                                            <option value="Penata/III C" <?php if (set_value('pangkat') == "Penata") {
                                                                                                echo "selected";
                                                                                            } ?>>Penata/III C</option>
                                                            <option value="Penata Tingkat I/III D" <?php if (set_value('pangkat') == "Penata Tingkat I") {
                                                                                                        echo "selected";
                                                                                                    } ?>>Penata Tingkat I/III D</option>
                                                            <optgroup>Pembina</optgroup>
                                                            <option value="Pembina/IV A" <?php if (set_value('pangkat') == "Pembina") {
                                                                                                echo "selected";
                                                                                            } ?>>Pembina/IV A</option>
                                                            <option value="Pembina Tingkat I/IV B" <?php if (set_value('pangkat') == "Pembina Tingkat I") {
                                                                                                        echo "selected";
                                                                                                    } ?>>Pembina Tingkat I/IV B</option>
                                                            <option value="Pembina Utama Muda/IV C" <?php if (set_value('pangkat') == "Pembina Utama Muda") {
                                                                                                        echo "selected";
                                                                                                    } ?>>Pembina Utama Muda/IV C</option>
                                                            <option value="Pembina Utama Madya/IV D" <?php if (set_value('pangkat') == "Pembina Utama Madya") {
                                                                                                            echo "selected";
                                                                                                        } ?>>Pembina Utama Madya/IV D</option>
                                                            <option value="Pembina Utama/IV E" <?php if (set_value('pangkat') == "Pembina Utama") {
                                                                                                    echo "selected";
                                                                                                } ?>>Pembina Utama/IV E</option>
                                                        </select>
                                                        <div class="invalid-feedback"><?= form_error('pangkat') ?></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nomor HP</label>
                                                <input type="text" id="telepon" class="form-control <?= form_error('telepon') ? 'is-invalid' : '' ?>" name="telepon" data-mask="0000-0000-0000" data-mask-visible="true" placeholder="0000-0000-0000" value="<?= set_value('telepon') ?>">
                                                <div class="invalid-feedback"><?= form_error('telepon'); ?></div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">E-mail</label>
                                                <input type="text" id="email" class="form-control <?= form_error('email') ? 'is-invalid' : '' ?>" name="email" value="<?= set_value('email') ?>">
                                                <div class="invalid-feedback"><?= form_error('email') ?></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <label class="form-label">Data Akun</label>
                                            <fieldset class="form-fieldset">
                                                <div class="mb-3">
                                                    <label class="form-label required">Level Pegawai</label>
                                                    <?php if ($this->session->userdata('kd_level') == 1) { ?>
                                                        <select class="form-select <?= form_error('nama_level') ? 'is-invalid' : '' ?>" id="nama_level" name="nama_level">
                                                            <option value="0">Pilih Level Pegawai</option>
                                                            <option value="2">Pejabat Pembuat Komitmen</option>
                                                            <option value="3">Admin OPD</option>
                                                            <option value="4">Pengawas</option>
                                                        </select>
                                                    <?php } else { ?>
                                                        <input type="text" class="form-control" id="kd_level" name="kd_level" value="Pejabat Pembuat Komitmen" disabled>
                                                        <input type="hidden" class="form-control" id="nama_level" name="nama_level" value="2">
                                                    <?php } ?>
                                                </div>
                                                <div class="mb-3 penyedia">
                                                    <label class="form-label required">Username</label>
                                                    <input type="text" class="form-control <?= form_error('username') ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= set_value('username'); ?>">
                                                    <div class="invalid-feedback"><?= form_error('username') ?></div>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label required">Password</label>
                                                    <input type="password" class="form-control <?= form_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" value="<?= set_value('password'); ?>">
                                                    <div class="invalid-feedback"><?= form_error('password') ?></div>
                                                    <small class="form-hint">
                                                        Password minimal 8 karakter
                                                    </small>
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
                                    </svg> Kembali ke Rekapitulasi Data <?php if ($this->session->userdata('kd_level') == 1) {
                                                                            echo "Pegawai";
                                                                        } else {
                                                                            echo "PPKom";
                                                                        } ?></button>
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