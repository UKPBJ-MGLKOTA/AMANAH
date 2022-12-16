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
                        <a href="#" class="link-secondary" rel="noopener">
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

<!-- modal satker -->
<div class="modal modal-blur fade" id="modal-satker" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-l modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pencarian OPD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <table class="table table-striped tabel-satker">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 10px;">No.</th>
                            <th class="text-center" style="width:350px;">Nama OPD</th>
                            <th class="text-center" style="width: 110px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($opd as $data) :
                        ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $data->nama_satker; ?></td>
                                <td class="text-center"><button class="btn btn-primary" id="pilih-satker" data-id="<?= $data->kd_satker; ?>" data-nama="<?= $data->nama_satker; ?>">
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

<script>
    function ubah_pwd() {
        // Get the checkbox
        var checkBox = document.getElementById("ubah_password");
        // Get the output text
        var text = document.getElementById("ubah_pass");

        // If the checkbox is checked, display the output text
        if (checkBox.checked == true) {
            //text.style.display = "block";
            $('.ubah_pass').show('');
        } else {
            //text.style.display = "none";
            $('.ubah_pass').hide('');
        }
    }

    $(document).ready(function() {

        $('.satker').on('click', '.btn-satker', function() {
            $('#modal-satker').modal('show');
        });

        $(function() {
            $(".tabel-satker").DataTable({

                scrollCollapse: true,
                scroller: true,
                responsive: true
            });
        });

        $(document).on('click', '#pilih-satker',
            function() {
                var kd_satker = $(this).data('id');
                var nama_satker = $(this).data('nama');
                $('#nama_satker').val(nama_satker);
                $('#kd_satker').val(kd_satker);
                $('#modal-satker').modal('hide');
            });

        $('#FormUbahPegawai').on('submit', function(e) {
            $.ajax({
                url: '<?= base_url('pegawai/simpan') ?>', //nama action script php sobat
                data: $(this).serialize(),
                type: 'POST',
                success: function(response) {
                    if (response == "success") {
                        toastr.success("Anda akan di arahkan dalam 5 Detik", "Ubah data berhasil ! ", {
                            onHidden: function() {
                                window.location.href = "<?= base_url(); ?>pegawai";
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
    }
</script>

</body>

</html>