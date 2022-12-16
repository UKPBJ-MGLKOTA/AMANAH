<div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Laporan
                    </div>
                    <h2 class="page-title">
                        Vendor Management System
                    </h2>
                </div>
                <!-- Page title actions -->
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
                            <h3 class="card-title">Penyedia/Pelaku Usaha</h3>
                        </div>
                        <div class="card-body">
                            <table class="table datatable tabel-penyedia display">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th class="text-center">Penyedia</th>
                                        <th class="text-center">Alamat</th>
                                        <th class="text-center">Direktur</th>
                                        <th class="text-center">Nilai Kinerja Vendor</th>
                                        <th class="text-center">Kategori</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    function singkat_angka($n, $presisi = 1)
                                    {
                                        if ($n < 900) {
                                            $format_angka = number_format($n, $presisi);
                                            $simbol = '';
                                        } else if ($n < 900000) {
                                            $format_angka = number_format($n / 1000, $presisi);
                                            $simbol = ' Rb';
                                        } else if ($n < 900000000) {
                                            $format_angka = number_format($n / 1000000, $presisi);
                                            $simbol = ' Jt';
                                        } else if ($n < 900000000000) {
                                            $format_angka = number_format($n / 1000000000, $presisi);
                                            $simbol = ' M';
                                        } else {
                                            $format_angka = number_format($n / 1000000000000, $presisi);
                                            $simbol = ' T';
                                        }

                                        if ($presisi > 0) {
                                            $pisah = '.' . str_repeat('0', $presisi);
                                            $format_angka = str_replace($pisah, '', $format_angka);
                                        }

                                        return "Rp. " . $format_angka . $simbol;
                                    }

                                    $no = 1;
                                    foreach ($penyedia as $data) :
                                        $sql = "SELECT 
                                        penyedia.kd_penyedia,
                                        penyedia.nama_penyedia,
                                        paket.kd_paket,
                                        paket.nama_paket,
                                        paket.tahun,
                                        paket.nilai_kontrak,
                                        satker.nama_satker,
                                        penilaian_kinerja.kd_penilaian,
                                        penilaian_kinerja.aspek_1,
                                        penilaian_kinerja.aspek_2,
                                        penilaian_kinerja.aspek_3,
                                        penilaian_kinerja.aspek_4,
                                        penilaian_kinerja.nilai_1,
                                        penilaian_kinerja.nilai_2,
                                        penilaian_kinerja.nilai_3,
                                        penilaian_kinerja.nilai_4,
                                        penilaian_kinerja.nilai_kinerja,
                                        penilaian_kinerja.kategori_nilai
                                        FROM penilaian_kinerja 
                                        LEFT JOIN penyedia ON penyedia.kd_penyedia=penilaian_kinerja.kd_penyedia
                                        LEFT JOIN paket ON paket.kd_paket=penilaian_kinerja.kd_paket
                                        LEFT JOIN satker ON satker.kd_satker=penilaian_kinerja.kd_satker
                                        WHERE penilaian_kinerja.kd_penyedia='$data->kd_penyedia' 
                                        ORDER BY paket.kd_paket ASC";
                                        $kinerja = $this->db->query($sql)->result_array();
                                        $nomor = 1;
                                        $nom = 1;
                                        $total = 0;
                                        $kontrak = 0;

                                        $sql2 = "SELECT AVG(penilaian_kinerja.nilai_kinerja) AS rata_kin FROM penilaian_kinerja WHERE kd_penyedia='$data->kd_penyedia'";
                                        $nilai = $this->db->query($sql2)->row();

                                        $persenta = $nilai->rata_kin;

                                        if ($persenta == 0) {
                                            $kin = "<span class='badge bg-danger-lt '>Buruk</span>";
                                        } elseif ($persenta == 1 || $persenta < 2) {
                                            $kin = "<span class='badge bg-yellow-lt '>Cukup</span>";
                                        } elseif ($persenta == 2 || $persenta < 3) {
                                            $kin = "<span class='badge bg-primary-lt '>Baik</span>";
                                        } elseif ($persenta == 3) {
                                            $kin = "<span class='badge bg-green-lt '>Sangat Baik</span>";
                                        }
                                    ?>
                                        <tr class="bg-muted-lt strong">
                                            <td><?= $no; ?></td>
                                            <td><?= $data->nama_penyedia; ?></td>
                                            <td><?= $data->alamat; ?></td>
                                            <td><?= $data->nama_narahubung; ?></td>
                                            <td class="text-center"><?= number_format($persenta, 2); ?></td>
                                            <td class="text-center"><?= $kin; ?></td>
                                        </tr>
                                        <?php
                                        foreach ($kinerja as $data_kinerja) :
                                        ?>
                                            <tr>
                                                <td>
                                                    <div class="datagrid-title"><?= $no . "." . $nomor; ?></div>
                                                </td>
                                                <td>
                                                    <div class="datagrid-title">OPD</div>
                                                    <div class="datagrid-content small"><?= $data_kinerja['nama_satker']; ?></div>
                                                </td>
                                                <td>
                                                    <div class="datagrid-title">Nama Paket</div>
                                                    <div class="datagrid-content small"><?= $data_kinerja['nama_paket']; ?></div>
                                                </td>
                                                <td>
                                                    <div class="datagrid-title">Nilai Kontrak</div>
                                                    <div class="datagrid-content small"><?= singkat_angka($data_kinerja['nilai_kontrak']); ?></div>
                                                </td>
                                                <td>
                                                    <div class="datagrid-title">Tahun Anggaran</div>
                                                    <div class="datagrid-content small"><?= $data_kinerja['tahun']; ?></div>
                                                </td>
                                                <td>
                                                    <div class="datagrid-title">Nilai Kinerja</div>
                                                    <div class="datagrid-content small"><?= $data_kinerja['nilai_kinerja']; ?>
                                                    </div>
                                                </td>

                                                <td></td>
                                            </tr>
                                        <?php
                                            $kontrak = $kontrak + $data_kinerja['nilai_kontrak'];
                                            $nomor++;
                                        endforeach; ?>
                                    <?php
                                        $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col">
                                    <div class="datagrid-title">Keterangan:</div>
                                    <div class="row">
                                        <div class="col-3">Nilai Kinerja 0 : <span class='badge bg-danger-lt '>Buruk</span></div>
                                        <div class="col-3">Nilai Kinerja 1 s.d < 2 : <span class='badge bg-yellow-lt '>Cukup</span></div>
                                        <div class="col-3">Nilai Kinerja 2 s.d < 3 : <span class='badge bg-primary-lt '>Baik</span></div>
                                        <div class="col-3">Nilai Kinerja 3 : <span class='badge bg-green-lt '>Sangat Baik</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>