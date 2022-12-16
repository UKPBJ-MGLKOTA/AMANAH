<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_mod extends CI_Model
{
    function data_penyedia()
    {
        $sql = "SELECT *
                FROM penyedia 
                WHERE penyedia.status='2'";
        return $this->db->query($sql)->result();
    }

    function data_kinerja($kd_penyedia)
    {
        $sql = "SELECT 
        satker.kd_satker,
        satker.nama_satker,
        penyedia.kd_penyedia,
        penyedia.nama_penyedia,
        penyedia.alamat,
        paket.kd_paket,
        paket.nama_paket,
        paket.lokasi_pekerjaan,
        paket.nilai_kontrak,
        paket.no_kontrak,
        paket.tgl_kontrak,
        paket.jangka_waktu,
        paket.jenis_pengadaan,
        paket.metode_pengadaan,
        paket.tahun,
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
        penilaian_kinerja.kategori_nilai,
        pegawai.kd_pegawai,
        pegawai.nama_pegawai,
        pegawai.nip
        FROM penilaian_kinerja 
        LEFT JOIN satker ON satker.kd_satker=penilaian_kinerja.kd_satker 
        LEFT JOIN penyedia ON penyedia.kd_penyedia=penilaian_kinerja.kd_penyedia
        LEFT JOIN paket ON paket.kd_paket=penilaian_kinerja.kd_paket
        LEFT JOIN pegawai ON paket.kd_pegawai=pegawai.kd_pegawai
        WHERE penilaian_kinerja.kd_penyedia=$kd_penyedia";
        return $this->db->query($sql)->result();
    }
}
