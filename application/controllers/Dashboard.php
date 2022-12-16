<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('session');
        $this->load->model(array('general_mod'));
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['aktif'] = 'dashboard';

        $data['profil'] = $this->general_mod->profil_akun($this->session->userdata('kd_pegawai'));
        if ($this->session->userdata('kd_level') == 2 || $this->session->userdata('kd_level') == 3) {
            $data['jml_paket'] = $this->general_mod->jml_paket_opd($this->session->userdata('kd_satker'));
            $data['jml_ppkom'] = $this->general_mod->jml_ppkom_opd($this->session->userdata('kd_satker'));
            $data['jml_penyedia'] = $this->general_mod->jml_penyedia();
            $data['jml_kinerja'] = $this->general_mod->jml_kinerja_opd($this->session->userdata('kd_satker'));
            $data['grafik_jenis'] = $this->general_mod->jml_barang_opd($this->session->userdata('kd_satker')) . "," . $this->general_mod->jml_konstruksi_opd($this->session->userdata('kd_satker')) . "," . $this->general_mod->jml_konsultansi_opd($this->session->userdata('kd_satker')) . "," . $this->general_mod->jml_lainnya_opd($this->session->userdata('kd_satker'));
            $data['grafik_metode'] = $this->general_mod->jml_1_opd($this->session->userdata('kd_satker')) . "," . $this->general_mod->jml_2_opd($this->session->userdata('kd_satker')) . "," . $this->general_mod->jml_3_opd($this->session->userdata('kd_satker')) . "," . $this->general_mod->jml_4_opd($this->session->userdata('kd_satker')) . "," . $this->general_mod->jml_5_opd($this->session->userdata('kd_satker')) . "," . $this->general_mod->jml_6_opd($this->session->userdata('kd_satker')) . "," . $this->general_mod->jml_7_opd($this->session->userdata('kd_satker'));
        } elseif ($this->session->userdata('kd_level') == 1 || $this->session->userdata('kd_level') == 4) {
            $data['jml_paket'] = $this->general_mod->jml_paket();
            $data['jml_ppkom'] = $this->general_mod->jml_ppkom();
            $data['jml_penyedia'] = $this->general_mod->jml_penyedia();
            $data['jml_kinerja'] = $this->general_mod->jml_kinerja();
            $data['grafik_jenis'] = $this->general_mod->jml_barang() . "," . $this->general_mod->jml_konstruksi() . "," . $this->general_mod->jml_konsultansi() . "," . $this->general_mod->jml_lainnya();
            $data['grafik_metode'] = $this->general_mod->jml_1() . "," . $this->general_mod->jml_2() . "," . $this->general_mod->jml_3() . "," . $this->general_mod->jml_4() . "," . $this->general_mod->jml_5() . "," . $this->general_mod->jml_6() . "," . $this->general_mod->jml_7();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('dashboard/main', $data);
        $this->load->view('dashboard/footer', $data);
    }
}
