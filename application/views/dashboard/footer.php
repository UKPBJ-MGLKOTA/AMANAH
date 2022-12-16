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
<!-- Tabler Core -->
<script src="<?= base_url(); ?>/assets/dist/js/tabler.min.js" defer></script>
<script src="<?= base_url(); ?>/assets/dist/js/demo.min.js" defer></script>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/js/bootstrap.min.js"></script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-jenis-pengadaan'), {
            chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 240,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
            },
            plotOptions: {
                bar: {
                    barHeight: '50%',
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "Jumlah Paket",
                data: [<?= $grafik_jenis; ?>]
            }],
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: [
                'Pengadaan Barang', 'Pekerjaan Konstruksi', 'Jasa Konsultansi', 'Jasa Lainnya'
            ],
            colors: [tabler.getColor("primary")],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-metode-pengadaan'), {
            chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 240,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
            },
            plotOptions: {
                bar: {
                    barHeight: '50%',
                    horizontal: true,
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "Jumlah Paket",
                data: [<?= $grafik_metode; ?>]
            }],
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0,
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            labels: [
                'E-purchasing', 'Pengadaan Langsung', 'Penunjukan Langsung', 'Tender Cepat', 'Tender', 'e-Lelang Cepat', 'Seleksi'
            ],
            colors: [tabler.getColor("primary")],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>
</body>

</html>