<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Verifikasi_mod extends CI_Model
{

    // fungsi cek login
    function cek_data($kd_verifikasi)
    {
        $sql = "SELECT 
        satker.kd_satker,
        satker.nama_satker,
        penyedia.kd_penyedia,
        penyedia.nama_penyedia,
        paket.kd_paket,
        paket.nama_paket,
        paket.jenis_pengadaan,
        paket.metode_pengadaan,
        paket.tahun,
        penilaian_kinerja.kd_penilaian,
        penilaian_kinerja.nilai_kinerja,
        penilaian_kinerja.kategori_nilai,
        penilaian_kinerja.qrcode,
        penilaian_kinerja.kd_verifikasi,
        pegawai.kd_pegawai,
        pegawai.nama_pegawai,
        pegawai.nip
        FROM penilaian_kinerja 
        LEFT JOIN satker ON satker.kd_satker=penilaian_kinerja.kd_satker 
        LEFT JOIN penyedia ON penyedia.kd_penyedia=penilaian_kinerja.kd_penyedia
        LEFT JOIN paket ON paket.kd_paket=penilaian_kinerja.kd_paket
        LEFT JOIN pegawai ON paket.kd_pegawai=pegawai.kd_pegawai
        WHERE penilaian_kinerja.kd_verifikasi='$kd_verifikasi'";
        return $this->db->query($sql)->row();
    }
}
