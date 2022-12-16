<footer class="footer footer-transparent d-print-none">
    <div class="container-xl">
        <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        <img src="<?= base_url(); ?>assets/static/Logo_BerAKHLAK.png" height="30px">
                        <img src="<?= base_url(); ?>assets/static/Logo_EVP.png" height="30px">
                    </li>
                </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        Copyright &copy; 2022
                        <a href="#" class="link-secondary">Bagian Pengadaan Barang/Jasa Sekretariat Daerah Kota Magelang</a>.
                        All rights reserved.
                    </li>
                    <li class="list-inline-item">
                        <a href="./changelog.html" class="link-secondary" rel="noopener">
                            v1.0.0
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
</div>
</div>

<!-- modal ppkom -->
<div class="modal modal-blur fade" id="modal-ppkom" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pencarian Pejabat Pembuat Komitmen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="table-default" class="table-responsive">
                    <table class="table table-striped tabel-ppkom">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px;">No.</th>
                                <th class="text-center" style="width: 200px;">Nama Pegawai</th>
                                <th class="text-center" style="width: 150px;">NIP</th>
                                <th class="text-center" style="width: 200px;">Satker</th>
                                <th class="text-center">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($ppkom as $pegawai) :
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $pegawai->nama_pegawai; ?></td>
                                    <td class="text-center"><?= $pegawai->nip; ?></td>
                                    <td><?= $pegawai->nama_satker; ?></td>
                                    <td class="text-center"><button class="btn btn-primary" id="pilih" data-id="<?= $pegawai->kd_pegawai; ?>" data-nama="<?= $pegawai->nama_pegawai; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg>
                                            Pilih
                                        </button></td>
                                </tr>
                            <?php
                                $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <a href="#" class="btn btn-red ms-auto" data-bs-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg> Cancel
                </a>
            </div>
        </div>
    </div>
</div>

<!-- modal penyedia -->
<div class="modal modal-blur fade" id="modal-penyedia" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pencarian Penyedia</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="table-default" class="table-responsive">
                    <table class="table table-striped tabel-ppkom">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px;">No.</th>
                                <th class="text-center" style="width:350px;">Nama Penyedia</th>
                                <th class="text-center" style="width:100px;">NPWP</th>
                                <th class="text-center" style="width:300px;">Alamat</th>
                                <th class="text-center" style="width: 110px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($penyedia as $data) :
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no; ?></td>
                                    <td><?= $data->nama_penyedia; ?></td>
                                    <td class="text-center"><?= $data->npwp; ?></td>
                                    <td><?= $data->alamat; ?></td>
                                    <td class="text-center"><button class="btn btn-primary" id="pilih-penyedia" data-id="<?= $data->kd_penyedia; ?>" data-nama="<?= $data->nama_penyedia; ?>">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg>
                                            Pilih
                                        </button></td>
                                </tr>
                            <?php
                                $no++;
                            endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="modal-footer">
                <a href="#" class="btn btn-red ms-auto" data-bs-dismiss="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="18" y1="6" x2="6" y2="18"></line>
                        <line x1="6" y1="6" x2="18" y2="18"></line>
                    </svg> Cancel
                </a>
            </div>

        </div>
    </div>
</div>

<!-- Tabler Core -->
<script src="<?= base_url(); ?>/assets/dist/js/tabler.min.js" defer></script>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.12.1/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script type="text/javascript">
    function getnumeric(elem) {
        var getelem = $(elem).attr("id");
        getval = $("#" + getelem).val().replace(/,/ig, '');
        currancy = getval.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        getval = $("#" + getelem).val(currancy);
        //$("#"+getelem).val(currancy);
        //calculates();
    }

    $(document).ready(function() {
        $('.ppkom').on('click', '.btn-ppkom', function() {
            $('#modal-ppkom').modal('show');
        });

        $('.penyedia').on('click', '.btn-penyedia', function() {
            $('#modal-penyedia').modal('show');
        });

        $(function() {
            $(".tabel-ppkom").DataTable({

                scrollCollapse: true,
                scroller: true,
                responsive: true
            });
        });

        $(function() {
            $(".tabel-penyedia").DataTable({

                scrollCollapse: true,
                scroller: true,
                responsive: true
            });
        });

        $(document).on('click', '#pilih',
            function() {
                var kd_pegawai = $(this).data('id');
                var nama_pegawai = $(this).data('nama');
                $('#nama_pegawai').val(nama_pegawai);
                $('#kd_pegawai').val(kd_pegawai);
                $('#modal-ppkom').modal('hide');
            })

        $(document).on('click', '#pilih-penyedia',
            function() {
                var kd_penyedia = $(this).data('id');
                var nama_penyedia = $(this).data('nama');
                $('#nama_penyedia').val(nama_penyedia);
                $('#kd_penyedia').val(kd_penyedia);
                $('#modal-penyedia').modal('hide');
            })

    });
</script>

<script>
    $(document).ready(function() {

        $('#FormEditPaket').on('submit', function(e) {
            $.ajax({
                url: '<?= base_url('paket/simpan') ?>', //nama action script php sobat
                data: $(this).serialize(),
                type: 'POST',
                success: function(response) {
                    if (response == "success") {
                        toastr.success("Anda akan di arahkan dalam 5 Detik", "Update data berhasil ! ", {
                            onHidden: function() {
                                window.location.href = "<?= base_url(); ?>paket";
                            }
                        });
                    } else {
                        toastr.error("Silahkan cek kembali !", "Isian belum lengkap/tidak sesuai");
                    }
                    console.log(response);
                },
                error: function(response) {
                    toastr.error("Silahkan cek kembali !", "Isian belum lengkap/tidak sesuai");
                    console.log(response);
                }
            });
            e.preventDefault();
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
    };
</script>

</body>

</html>