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

<!-- Modal Delete -->
<div class="modal modal-blur fade" id="modal-hapus" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-status bg-danger"></div>
            <div class="modal-body text-center py-4">
                <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon mb-2 text-danger icon-lg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M12 9v2m0 4v.01" />
                    <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
                </svg>
                <h3>Apakah anda yakin?</h3>
                <div class="text-muted">Anda akan menghapus Data Pegawai ini.</div>
            </div>
            <div class="modal-footer">
                <div class="w-100">
                    <div class="row">
                        <div class="col"><a href="#" class="btn w-100" data-bs-dismiss="modal">
                                Batal
                            </a></div>
                        <div class="col"><a href="#" class="btn btn-danger w-100" id="btn-delete" data-bs-dismiss="modal">
                                Hapus
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Libs JS -->
<script src="<?= base_url(); ?>/assets/dist/libs/apexcharts/dist/apexcharts.min.js" defer></script>
<script src="<?= base_url(); ?>/assets/dist/libs/jsvectormap/dist/js/jsvectormap.min.js" defer></script>
<script src="<?= base_url(); ?>/assets/dist/libs/jsvectormap/dist/maps/world.js" defer></script>
<script src="<?= base_url(); ?>/assets/dist/libs/jsvectormap/dist/maps/world-merc.js" defer></script>
<!-- Tabler Core -->
<script src="<?= base_url(); ?>/assets/dist/js/tabler.min.js" defer></script>
<script src="<?= base_url(); ?>/assets/dist/js/demo.min.js" defer></script>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables.net-bs5/1.12.1/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>

<script type="text/javascript">
    var table;
    //datatables
    table = $('.tabel-pegawai').DataTable({
        scrollCollapse: true,
        scroller: true,
        responsive: true,
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('pegawai/ajax_list') ?>",
            "type": "POST",
            "data": function(data) {
                data.satker = $('#satker').val();
            }

        },
        //Set column definition initialisation properties.
        "columnDefs": [{
            "targets": [0], //first column / numbering column
            "orderable": false, //set not orderable
        }, ],
    });

    $('#btn-filter').click(function() { //button filter event click
        table.ajax.reload(); //just reload table
    });
    $('#btn-reset').click(function() { //button reset event click
        $('#form-filter')[0].reset();
        table.ajax.reload(); //just reload table
    });

    //menampilkan modal dialog saat tombol hapus ditekan
    $('.tabel-pegawai').on('click', '.btn-hapus', function() {
        //ambil data dari atribute data 
        var id = $(this).attr('data');
        $('#modal-hapus').modal('show');
        //ketika tombol lanjutkan ditekan, data id akan dikirim ke method delete 
        //pada controller mahasiswa
        $('#btn-delete').unbind().click(function() {
            $.ajax({
                type: 'ajax',
                method: 'get',
                async: false,
                url: '<?php echo base_url() ?>pegawai/delete/',
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(response) {
                    $('#modal-hapus').modal('hide');
                    toastr.success("Anda akan di arahkan dalam 5 Detik", "Hapus data berhasil ! ", {
                        onHidden: function() {
                            location.reload();
                        }
                    });
                }
            });
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