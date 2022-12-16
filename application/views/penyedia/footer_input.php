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

<!-- Tabler Core -->
<script src="<?= base_url(); ?>/assets/dist/js/tabler.min.js" defer></script>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.12.1/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    $(document).ready(function() {

        $('#FormTambahPenyedia').on('submit', function(e) {
            $.ajax({
                url: '<?= base_url('penyedia/simpan_baru') ?>', //nama action script php sobat
                data: $(this).serialize(),
                type: 'POST',
                success: function(response) {
                    if (response == "success") {
                        toastr.success("Anda akan di arahkan dalam 5 Detik", "Tambah data berhasil ! ", {
                            onHidden: function() {
                                window.location.href = "<?= base_url(); ?>penyedia";
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