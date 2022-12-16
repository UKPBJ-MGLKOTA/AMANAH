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
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/rowreorder/1.2.8/js/dataTables.rowReorder.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>


<script type="text/javascript">
    $(document).ready(function() {
        var table = $('.tabel-penyedia').DataTable({
            dom: 'Bfrtip',
            buttons: ['excel', 'pdf', 'print'],
            rowReorder: {
                selector: 'td:nth-child(2)'
            },
            responsive: true
        });
    });
</script>

</body>

</html>