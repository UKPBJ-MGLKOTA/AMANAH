<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model(array("general_mod", "laporan_mod"));
    }

    public function index()
    {
        $data['title'] = 'Laporan Vendor Management System';
        $data['aktif'] = 'laporan';
        $data['sub-aktif'] = 'vms';

        //$data['satker'] = $this->general_mod->daftar_opd();
        $data['profil'] = $this->general_mod->profil_akun($this->session->userdata('kd_pegawai'));
        $data['penyedia'] = $this->laporan_mod->data_penyedia();

        $this->load->view('templates/header', $data);
        $this->load->view('laporan/laporan', $data);
        $this->load->view('laporan/footer', $data);
    }
}
