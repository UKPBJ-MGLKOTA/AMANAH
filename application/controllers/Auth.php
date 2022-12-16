<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('auth_mod');
    }

    public function index()
    {
        //load view form login
        $this->load->view('auth/login');
    }

    public function cek_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //cek login via model
        $cek = $this->auth_mod->cek_login($username, $password);

        if (!empty($cek)) {

            foreach ($cek as $user) {

                //looping data user
                $session_data = array(
                    'kd_pegawai'   => $user->kd_pegawai,
                    'nama_pengguna'  => $user->nama_pengguna,
                    'kd_satker' => $user->kd_satker,
                    'kd_level' => $user->kd_level,
                    'status' => $user->status
                );
                //buat session berdasarkan user yang login
                $this->session->set_userdata($session_data);
            }

            echo "success";
        } else {

            echo "error";
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nama_pengguna');
        $this->session->unset_userdata('kd_pegawai');
        $this->session->unset_userdata('kd_satker');
        $this->session->unset_userdata('kd_level');
        $this->session->unset_userdata('status');

        //$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        //Anda berhasil keluar dari aplikasi <strong>SIMBANGDA</strong>
        //</div>');
        redirect('auth');
    }

    public function blok()
    {
        $data['title'] = 'Akses ditolak';
        $this->load->view('errors/403', $data);
    }
}
