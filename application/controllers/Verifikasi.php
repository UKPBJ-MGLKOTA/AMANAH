<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verifikasi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('verifikasi_mod');
    }

    public function index()
    {
        //load view form login
        $this->load->view('verifikasi/cek');
    }

    public function cek($id)
    {

        $cek = $this->verifikasi_mod->cek_data($id);

        if (!empty($cek)) {
            $data['sukses'] = 1;
            $data["kinerja"] = $cek;
        } else {
            $data['sukses'] = 0;
        }

        $this->load->view("verifikasi/hasil", $data);
    }

    public function check()
    {
        if (!empty($this->input->post('kd_verifikasi'))) {
            $cek = $this->verifikasi_mod->cek_data($this->input->post('kd_verifikasi'));
            if (!empty($cek)) {
                $data['sukses'] = 1;
                $data["kinerja"] = $cek;
            } else {
                $data['sukses'] = 0;
            }
        } else {
            $data['sukses'] = 0;
        }
        $this->load->view("verifikasi/hasil", $data);
    }
}
