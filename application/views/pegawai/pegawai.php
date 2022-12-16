<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Rekapitulasi
                    </div>
                    <h2 class="page-title">
                        <?php if ($this->session->userdata('kd_level') == 1) {
                            echo "Pegawai";
                        } else {
                            echo "Pejabat Pembuat Komitmen";
                        } ?>
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="<?= base_url('pegawai/tambah'); ?>" class="btn btn-primary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                            Tambah <?php if ($this->session->userdata('kd_level') == 1) {
                                        echo "Pegawai";
                                    } else {
                                        echo "PPKom";
                                    } ?>
                        </a>
                        <a href="<?= base_url('pegawai/tambah'); ?>" class="btn btn-primary d-sm-none btn-icon" data-bs-toggle="modal" data-bs-target="#modal-report" aria-label="Create new report">
                            <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                        </a>
                    </div>
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
                        <div class="card-header card-header-light">
                            <h3 class="card-title">
                                <?php if ($this->session->userdata('kd_level') == 1) {
                                    echo "Pegawai";
                                } else {
                                    echo "Pejabat Pembuat Komitmen";
                                } ?></h3>
                        </div>
                        <div class="card-body">
                            <form id="form-filter">
                                <div class="form-group mb-3 row">
                                    <label class="col-3 col-form-label">Pemerintah Daerah</label>
                                    <div class="col">
                                        <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Pemerintah Daerah" value="Kota Magelang" disabled>
                                    </div>
                                </div>
                                <div class="form-group mb-3 row">
                                    <label class="col-3 col-form-label">OPD</label>
                                    <div class="col">
                                        <?php if ($profil->kd_level == 3) { ?>
                                            <select class="form-select" id="satker" disabled>
                                                <option value="<?= $profil->kd_satker; ?>" selected><?= $profil->nama_satker; ?></option>;
                                            </select>
                                        <?php } else { ?>
                                            <select class="form-select" id="satker">
                                                <option value="0">Semua OPD</option>
                                                <?php foreach ($satker as $opd) : ?>
                                                    <option value="<?= $opd->kd_satker; ?>"><?= $opd->nama_satker; ?></option>;
                                                <?php endforeach; ?>
                                            </select>
                                        <?php }
                                        ?>

                                    </div>
                                </div>
                                <div class="form-footer">
                                    <button type="button" id="btn-filter" class="btn btn-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file-description" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                            <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                            <path d="M9 17h6"></path>
                                            <path d="M9 13h6"></path>
                                        </svg>Lihat Data <?php if ($this->session->userdata('kd_level') == 1) {
                                                                echo "Pegawai";
                                                            } else {
                                                                echo "PPKom";
                                                            } ?>
                                    </button>
                                    <button type="button" id="btn-reset" class="btn btn-azure">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                            <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                            <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                        </svg>Reset Data <?php if ($this->session->userdata('kd_level') == 1) {
                                                                echo "Pegawai";
                                                            } else {
                                                                echo "PPKom";
                                                            } ?>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table class="table datatable tabel-pegawai table-striped display" id="tabel-pegawai">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</button></th>
                                        <th class="text-center">Nama Pegawai</button></th>
                                        <th class="text-center">NIP</button></th>
                                        <th class="text-center">Username</button></th>
                                        <th class="text-center">Level</button></th>
                                        <th class="text-center" style="width: 70px;">Aksi</button></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>