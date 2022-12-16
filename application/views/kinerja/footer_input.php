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

<!-- modal paket -->
<div class="modal modal-blur fade" id="modal-paket" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Pencarian Paket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-striped tabel-paket">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 10px;">No.</th>
                            <th class="text-center" style="width: 350px;">Nama Paket</th>
                            <th class="text-center" style="width: 100px;">Pagu (Rp.)</th>
                            <th class="text-center" style="width: 100px;">HPS (Rp.)</th>
                            <th class="text-center" style="width: 100px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($paket as $data) :
                        ?>
                            <tr>
                                <td class="text-center"><?= $no; ?></td>
                                <td><?= $data->nama_paket; ?></td>
                                <td style="text-align: right;"><?= number_format($data->pagu, 2); ?></td>
                                <td style="text-align: right;"><?= number_format($data->hps, 2); ?></td>
                                <td class="text-center"><button class="btn btn-primary" id="pilih-paket" data-id="<?= $data->kd_paket; ?>" data-nama="<?= $data->nama_paket; ?>" data-idopd="<?= $data->kd_satker; ?>" data-namaopd="<?= $data->nama_satker; ?>" data-lokasi="<?= $data->lokasi_pekerjaan; ?>" data-jenis="<?= $data->jenis_pengadaan; ?>" data-metode="<?= $data->metode_pengadaan; ?>" data-namappkom="<?= $data->nama_pegawai; ?>" data-idppkom="<?= $data->kd_pegawai; ?>" data-namapenyedia="<?= $data->nama_penyedia; ?>" data-idpenyedia="<?= $data->kd_penyedia; ?>" data-alamat="<?= $data->alamat; ?>" data-nokontrak="<?= $data->no_kontrak; ?>" data-nilaikontrak="<?= $data->nilai_kontrak; ?>" data-tglkontrak="<?= $data->tgl_kontrak; ?>" data-tahun="<?= $data->tahun; ?>" data-jangka="<?= $data->jangka_waktu; ?>">
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

<script type="text/javascript">
    function getnumeric(elem) {
        var getelem = $(elem).attr("id");
        getval = $("#" + getelem).val().replace(/,/ig, '');
        currancy = getval.replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        getval = $("#" + getelem).val(currancy);
        //$("#"+getelem).val(currancy);
        //calculates();
    }

    function skor_1() {
        var nilai = $("input[name='aspek_1']:checked").val();
        var skor_2 = $("#hasil_2").text();
        var skor_3 = $("#hasil_3").text();
        var skor_4 = $("#hasil_4").text();

        var persen = (nilai * 30) / 100;

        var akhir = ((persen * 100) + (skor_2 * 100) + (skor_3 * 100) + (skor_4 * 100)) / 100;

        $("#hasil_1").text(persen.toFixed(2));
        $("#poin_1").val(persen.toFixed(2));
        $("#hasil_akhir").text(akhir);
        $("#poin_akhir").val(akhir);

        var kat;

        if (akhir == 0) {
            kat = "Buruk";
        } else if (akhir == 1 || akhir < 2) {
            kat = "Cukup";
        } else if (akhir == 2 || akhir < 3) {
            kat = "Baik";
        } else if (akhir == 3) {
            kat = "Sangat Baik";
        }

        $("#kategori").text(kat);
        $("#kat").val(kat);
    }

    function skor_2() {
        var nilai = $("input[name='aspek_2']:checked").val();
        var skor_1 = $("#hasil_1").text();
        var skor_3 = $("#hasil_3").text();
        var skor_4 = $("#hasil_4").text();

        var persen = (nilai * 20) / 100;

        var akhir = ((persen * 100) + (skor_1 * 100) + (skor_3 * 100) + (skor_4 * 100)) / 100;

        $("#hasil_2").text(persen.toFixed(2));
        $("#poin_2").val(persen.toFixed(2));
        $("#hasil_akhir").text(akhir);
        $("#poin_akhir").val(akhir);

        var kat;

        if (akhir == 0) {
            kat = "Buruk";
        } else if (akhir == 1 || akhir < 2) {
            kat = "Cukup";
        } else if (akhir == 2 || akhir < 3) {
            kat = "Baik";
        } else if (akhir == 3) {
            kat = "Sangat Baik";
        }

        $("#kategori").text(kat);
        $("#kat").val(kat);
    }

    function skor_3() {
        var nilai = $("input[name='aspek_3']:checked").val();
        var skor_1 = $("#hasil_1").text();
        var skor_2 = $("#hasil_2").text();
        var skor_4 = $("#hasil_4").text();

        var persen = (nilai * 30) / 100;

        var akhir = ((persen * 100) + (skor_1 * 100) + (skor_2 * 100) + (skor_4 * 100)) / 100;

        $("#hasil_3").text(persen.toFixed(2));
        $("#poin_3").val(persen.toFixed(2));
        $("#hasil_akhir").text(akhir);
        $("#poin_akhir").val(akhir);

        var kat;

        if (akhir == 0) {
            kat = "Buruk";
        } else if (akhir == 1 || akhir < 2) {
            kat = "Cukup";
        } else if (akhir == 2 || akhir < 3) {
            kat = "Baik";
        } else if (akhir == 3) {
            kat = "Sangat Baik";
        }

        $("#kategori").text(kat);
        $("#kat").val(kat);
    }

    function skor_4() {
        var nilai = $("input[name='aspek_4']:checked").val();
        var skor_1 = $("#hasil_1").text();
        var skor_2 = $("#hasil_2").text();
        var skor_3 = $("#hasil_3").text();

        var persen = (nilai * 20) / 100;

        var akhir = ((persen * 100) + (skor_1 * 100) + (skor_2 * 100) + (skor_3 * 100)) / 100;

        $("#hasil_4").text(persen.toFixed(2));
        $("#poin_4").val(persen.toFixed(2));
        $("#hasil_akhir").text(akhir);
        $("#poin_akhir").val(akhir);

        var kat;

        if (akhir == 0) {
            kat = "Buruk";
        } else if (akhir == 1 || akhir < 2) {
            kat = "Cukup";
        } else if (akhir == 2 || akhir < 3) {
            kat = "Baik";
        } else if (akhir == 3) {
            kat = "Sangat Baik";
        }

        $("#kategori").text(kat);
        $("#kat").val(kat);
    }


    $(document).ready(function() {

        $('.paket').on('click', '.btn-paket', function() {
            $('#modal-paket').modal('show');
        });

        $(function() {
            $(".tabel-paket").DataTable({

                scrollCollapse: true,
                scroller: true,
                responsive: true
            });
        });

        $(document).on('click', '#pilih-paket',
            function() {
                var kd_paket = $(this).data('id');
                var nama_paket = $(this).data('nama');
                var kd_satker = $(this).data('idopd');
                var nama_satker = $(this).data('namaopd');
                var lokasi_pekerjaan = $(this).data('lokasi');
                var jenis_pengadaan = $(this).data('jenis');
                var metode_pengadaan = $(this).data('metode');
                var nama_pegawai = $(this).data('namappkom');
                var kd_pegawai = $(this).data('idppkom');
                var nama_penyedia = $(this).data('namapenyedia');
                var kd_penyedia = $(this).data('idpenyedia');
                var alamat = $(this).data('alamat');
                var no_kontrak = $(this).data('nokontrak');
                var nilai_kontrak = $(this).data('nilaikontrak');
                var tgl_kontrak = $(this).data('tglkontrak');
                var jangka_waktu = $(this).data('jangka');
                var tahun = $(this).data('tahun');

                $('#kd_paket').val(kd_paket);
                $('#nama_paket').val(nama_paket);
                $('#kd_satker').val(kd_satker);
                $('#nama_satker').val(nama_satker);
                $('#lokasi').val(lokasi_pekerjaan);
                $('#jenis_pengadaan').val(jenis_pengadaan);
                $('#metode_pengadaan').val(metode_pengadaan);
                $('#nama_pegawai').val(nama_pegawai);
                $('#kd_pegawai').val(kd_pegawai);
                $('#nama_penyedia').val(nama_penyedia);
                $('#kd_penyedia').val(kd_penyedia);
                $('#alamat_penyedia').val(alamat);
                $('#no_kontrak').val(no_kontrak);
                $('#tanggal_kontrak').val(tgl_kontrak);
                $('#nilai_kontrak').val(nilai_kontrak);
                $('#jangka_waktu').val(jangka_waktu);
                $('#tahun').val(tahun);
                $('#modal-paket').modal('hide');
            })

    });
</script>

<script>
    $(document).ready(function() {

        $('#FormTambahKinerja').on('submit', function(e) {
            $.ajax({
                url: '<?= base_url('kinerja/simpan_baru') ?>', //nama action script php sobat
                data: $(this).serialize(),
                type: 'POST',
                success: function(response) {
                    if (response == "success") {
                        toastr.success("Anda akan di arahkan dalam 5 Detik", "Penilaian Kinerja berhasil ! ", {
                            onHidden: function() {
                                window.location.href = "<?= base_url(); ?>kinerja";
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