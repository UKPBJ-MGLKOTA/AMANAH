<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class General_mod extends CI_Model
{

    function daftar_opd()
    {
        $sql = "SELECT * FROM satker";
        return $this->db->query($sql)->result();
    }

    function profil_akun($kd_pegawai)
    {
        $sql = "SELECT * FROM pegawai 
        LEFT JOIN satker ON pegawai.kd_satker=satker.kd_satker
        LEFT JOIN level ON pegawai.kd_level=level.kd_level 
        WHERE pegawai.kd_pegawai=$kd_pegawai";
        return $this->db->query($sql)->row();
    }

    function jml_paket()
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        //$this->db->where("status", "1");
        return $this->db->count_all_results();
    }

    function jml_paket_opd($kd_satker)
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("kd_satker", $kd_satker);
        return $this->db->count_all_results();
    }

    function jml_barang()
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("jenis_pengadaan", "Pengadaan Barang");
        return $this->db->count_all_results();
    }

    function jml_barang_opd($kd_satker)
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("jenis_pengadaan", "Pengadaan Barang");
        $this->db->where("kd_satker", $kd_satker);
        return $this->db->count_all_results();
    }

    function jml_konstruksi()
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("jenis_pengadaan", "Pekerjaan Konstruksi");
        return $this->db->count_all_results();
    }

    function jml_konstruksi_opd($kd_satker)
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("jenis_pengadaan", "Pekerjaan Konstruksi");
        $this->db->where("kd_satker", $kd_satker);
        return $this->db->count_all_results();
    }

    function jml_konsultansi()
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("jenis_pengadaan", "Jasa Konsultansi");
        return $this->db->count_all_results();
    }

    function jml_konsultansi_opd($kd_satker)
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("jenis_pengadaan", "Jasa Konsultansi");
        $this->db->where("kd_satker", $kd_satker);
        return $this->db->count_all_results();
    }

    function jml_lainnya()
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("jenis_pengadaan", "Jasa Lainnya");
        return $this->db->count_all_results();
    }

    function jml_lainnya_opd($kd_satker)
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("jenis_pengadaan", "Jasa Lainnya");
        $this->db->where("kd_satker", $kd_satker);
        return $this->db->count_all_results();
    }

    function jml_1_opd($kd_satker)
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("metode_pengadaan", "E-purchasing");
        $this->db->where("kd_satker", $kd_satker);
        return $this->db->count_all_results();
    }

    function jml_2_opd($kd_satker)
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("metode_pengadaan", "Pengadaan Langsung");
        $this->db->where("kd_satker", $kd_satker);
        return $this->db->count_all_results();
    }

    function jml_3_opd($kd_satker)
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("metode_pengadaan", "Penunjukan Langsung");
        $this->db->where("kd_satker", $kd_satker);
        return $this->db->count_all_results();
    }

    function jml_4_opd($kd_satker)
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("metode_pengadaan", "Tender Cepat");
        $this->db->where("kd_satker", $kd_satker);
        return $this->db->count_all_results();
    }

    function jml_5_opd($kd_satker)
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("metode_pengadaan", "Tender");
        $this->db->where("kd_satker", $kd_satker);
        return $this->db->count_all_results();
    }

    function jml_6_opd($kd_satker)
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("metode_pengadaan", "e-Lelang Cepat");
        $this->db->where("kd_satker", $kd_satker);
        return $this->db->count_all_results();
    }

    function jml_7_opd($kd_satker)
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("metode_pengadaan", "Seleksi");
        $this->db->where("kd_satker", $kd_satker);
        return $this->db->count_all_results();
    }

    function jml_1()
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("metode_pengadaan", "E-purchasing");
        return $this->db->count_all_results();
    }

    function jml_2()
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("metode_pengadaan", "Pengadaan Langsung");
        return $this->db->count_all_results();
    }

    function jml_3()
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("metode_pengadaan", "Penunjukan Langsung");
        return $this->db->count_all_results();
    }

    function jml_4()
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("metode_pengadaan", "Tender Cepat");
        return $this->db->count_all_results();
    }

    function jml_5()
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("metode_pengadaan", "Tender");
        return $this->db->count_all_results();
    }

    function jml_6()
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("metode_pengadaan", "e-Lelang Cepat");
        return $this->db->count_all_results();
    }

    function jml_7()
    {
        $this->db->select('kd_paket');
        $this->db->from('paket');
        $this->db->where("metode_pengadaan", "Seleksi");
        return $this->db->count_all_results();
    }

    function jml_ppkom()
    {
        $this->db->select('kd_pegawai');
        $this->db->from('pegawai');
        $this->db->where("kd_level", "2");
        return $this->db->count_all_results();
    }

    function jml_ppkom_opd($kd_satker)
    {
        $this->db->select('kd_pegawai');
        $this->db->from('pegawai');
        $this->db->where("kd_satker", $kd_satker);
        $this->db->where("kd_level", "2");
        return $this->db->count_all_results();
    }

    function jml_penyedia()
    {
        $this->db->select('kd_penyedia');
        $this->db->from('penyedia');
        //$this->db->where("kd_level", "2");
        return $this->db->count_all_results();
    }

    function jml_penyedia_opd($kd_satker)
    {
        $this->db->select('kd_penyedia');
        $this->db->from('penyedia');
        $this->db->where("kd_satker", $kd_satker);
        return $this->db->count_all_results();
    }

    function jml_kinerja()
    {
        $this->db->select('kd_penilaian');
        $this->db->from('penilaian_kinerja');
        //$this->db->where("kd_level", "2");
        return $this->db->count_all_results();
    }

    function jml_kinerja_opd($kd_satker)
    {
        $this->db->select('kd_penilaian');
        $this->db->from('penilaian_kinerja');
        $this->db->where("kd_satker", $kd_satker);
        return $this->db->count_all_results();
    }
}
