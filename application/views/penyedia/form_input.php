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
                        Penyedia Jasa/Pelaku Usaha
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

                        <?php $attributes = array('id' => 'FormTambahPenyedia', 'method' => "post", "autocomplete" => "off");
                        echo form_open('', $attributes); ?>
                        <div class="card-header card-header-light">
                            <h4 class="card-title">Input Data</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-xl-6">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label class="form-label required">Nama Penyedia</label>
                                                <input type="text" id="nama_penyedia" class="form-control <?= form_error('nama_penyedia') ? 'is-invalid' : '' ?>" name="nama_penyedia" value="<?= set_value('nama_penyedia') ?>">
                                                <div class="invalid-feedback"><?= form_error('nama_penyedia') ?></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label required">NPWP</label>
                                                <input type="text" id="npwp" class="form-control <?= form_error('npwp') ? 'is-invalid' : '' ?>" name="npwp" value="<?= set_value('npwp') ?>">
                                                <div class="invalid-feedback"><?= form_error('npwp') ?></div>
                                            </div>
                                            <div class="mb-3 penyedia">
                                                <label class="form-label">Alamat</label>
                                                <textarea class="form-control" id="alamat" rows="3" name="alamat"><?= set_value('alamat'); ?></textarea>
                                                <div class="invalid-feedback"><?= form_error('alamat') ?></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nomor HP</label>
                                                <input type="text" id="telepon" class="form-control <?= form_error('telepon') ? 'is-invalid' : '' ?>" name="telepon" value="<?= set_value('telepon') ?>">
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
                                            <label class="form-label">Narahubung</label>
                                            <fieldset class="form-fieldset">
                                                <div class="mb-3">
                                                    <label class="form-label required">Nama</label>
                                                    <input type="text" id="nama_narahubung" class="form-control <?= form_error('nama_narahubung') ? 'is-invalid' : '' ?>" name="nama_narahubung" value="<?= set_value('nama_narahubung') ?>">
                                                    <div class="invalid-feedback"><?= form_error('nama_narahubung') ?></div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Nomor HP</label>
                                                            <input type="text" id="telepon_narahubung" class="form-control <?= form_error('telepon_narahubung') ? 'is-invalid' : '' ?>" name="telepon_narahubung" value="<?= set_value('telepon_narahubung') ?>">
                                                            <div class="invalid-feedback"><?= form_error('telepon'); ?></div>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">E-mail</label>
                                                            <input type="text" id="email_narahubung" class="form-control <?= form_error('email_narahubung') ? 'is-invalid' : '' ?>" name="email_narahubung" value="<?= set_value('email_narahubung') ?>">
                                                            <div class="invalid-feedback"><?= form_error('email') ?></div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-3 penyedia">
                                                    <label class="form-label">Alamat</label>
                                                    <textarea class="form-control" id="alamat_narahubung" rows="3" name="alamat_narahubung"><?= set_value('alamat_narahubung'); ?></textarea>
                                                    <div class="invalid-feedback"><?= form_error('alamat') ?></div>
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