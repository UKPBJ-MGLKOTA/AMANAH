<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Pegawai extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model(array("general_mod", "paket_mod", "pegawai_mod"));
    }

    public function index()
    {
        if ($this->session->userdata('kd_level') == 1) {
            $data['title'] = 'Pegawai';
        } else {
            $data['title'] = 'Pejabat Pembuat Komitmen';
        }
        $data['aktif'] = 'paket';
        $data['sub-aktif'] = 'pegawai';

        $data['satker'] = $this->general_mod->daftar_opd();
        $data['profil'] = $this->general_mod->profil_akun($this->session->userdata('kd_pegawai'));

        $this->load->view('templates/header', $data);
        $this->load->view('pegawai/pegawai', $data);
        $this->load->view('pegawai/footer', $data);
    }

    public function tambah()
    {
        if ($this->session->userdata('kd_level') == 1) {
            $data['title'] = 'Pegawai';
        } else {
            $data['title'] = 'Pejabat Pembuat Komitmen';
        }

        $data['aktif'] = 'paket';

        $data['profil'] = $this->general_mod->profil_akun($this->session->userdata('kd_pegawai'));

        $data['opd'] = $this->paket_mod->data_satker();

        $this->load->view('templates/header', $data);
        $this->load->view('pegawai/form_input', $data);
        $this->load->view('pegawai/footer_input', $data);
    }

    public function ubah($kd_pegawai)
    {
        if ($this->session->userdata('kd_level') == 1) {
            $data['title'] = 'Pegawai';
        } else {
            $data['title'] = 'Pejabat Pembuat Komitmen';
        }

        $data['aktif'] = 'ubah';

        $data['pegawai'] = $this->pegawai_mod->data_pegawai($kd_pegawai);

        $data['profil'] = $this->general_mod->profil_akun($this->session->userdata('kd_pegawai'));

        $data['opd'] = $this->paket_mod->data_satker();

        $this->load->view('templates/header', $data);
        $this->load->view('pegawai/form_ubah', $data);
        $this->load->view('pegawai/footer_ubah', $data);
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->pegawai_mod->delete_pegawai($id);
        $msg['success'] = true;
        $this->output->set_output(json_encode($msg));
    }

    public function simpan_baru()
    {
        $this->form_validation->set_rules('kd_satker', 'Nama OPD', 'required', array('required' => 'Nama OPD harus diisi'));
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required', array('required' => 'Nama Pegawai harus diisi'));
        $this->form_validation->set_rules('nip', 'NIP', 'required', array('required' => 'NIP harus diisi'));
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', array('required' => 'Jabatan harus diisi'));
        $this->form_validation->set_rules('pangkat', 'Pangkat/Golongan', 'required', array('required' => 'Pangkat/Golongan harus diisi'));
        $this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Username harus diisi'));
        $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password harus diisi'));

        if ($this->form_validation->run()) {
            $gol = explode("/", $this->input->post('pangkat'));
            if ($this->input->post('nama_level') == 3) {
                $status = "3";
            } else {
                $status = '1';
            }
            $data = array(
                'kd_satker' => $this->input->post('kd_satker'),
                'nama_pegawai' => htmlspecialchars($this->input->post('nama_pegawai')),
                'nip' => htmlspecialchars($this->input->post('nip')),
                'jabatan' => htmlspecialchars($this->input->post('jabatan')),
                'pangkat' => $gol[0],
                'golongan' => $gol[1],
                'telepon' => $this->input->post('telepon'),
                'email' => htmlspecialchars($this->input->post('email')),
                'kd_level' => $this->input->post('nama_level'),
                'nama_pengguna' => htmlspecialchars($this->input->post('username')),
                'password_pengguna' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'status' => $status
            );

            //var_dump($data);
            $this->pegawai_mod->save_pegawai($data);
            echo "success";
        } else {

            echo "error";
        }
    }

    public function simpan()
    {
        if ($this->input->post('ubah_password') == "ubah") {
            $this->form_validation->set_rules('kd_satker', 'Nama OPD', 'required', array('required' => 'Nama OPD harus diisi'));
            $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required', array('required' => 'Nama Pegawai harus diisi'));
            $this->form_validation->set_rules('nip', 'NIP', 'required', array('required' => 'NIP harus diisi'));
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', array('required' => 'Jabatan harus diisi'));
            $this->form_validation->set_rules('pangkat', 'Pangkat/Golongan', 'required', array('required' => 'Pangkat/Golongan harus diisi'));
            $this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Username harus diisi'));
            $this->form_validation->set_rules('password', 'Password', 'required', array('required' => 'Password harus diisi'));
        } else {
            $this->form_validation->set_rules('kd_satker', 'Nama OPD', 'required', array('required' => 'Nama OPD harus diisi'));
            $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required', array('required' => 'Nama Pegawai harus diisi'));
            $this->form_validation->set_rules('nip', 'NIP', 'required', array('required' => 'NIP harus diisi'));
            $this->form_validation->set_rules('jabatan', 'Jabatan', 'required', array('required' => 'Jabatan harus diisi'));
            $this->form_validation->set_rules('pangkat', 'Pangkat/Golongan', 'required', array('required' => 'Pangkat/Golongan harus diisi'));
            $this->form_validation->set_rules('username', 'Username', 'required', array('required' => 'Username harus diisi'));
        }

        if ($this->form_validation->run()) {
            $gol = explode("/", $this->input->post('pangkat'));

            if ($this->input->post('ubah_password') == "ubah") {
                $data = array(
                    'kd_satker' => $this->input->post('kd_satker'),
                    'nama_pegawai' => htmlspecialchars($this->input->post('nama_pegawai')),
                    'nip' => htmlspecialchars($this->input->post('nip')),
                    'jabatan' => htmlspecialchars($this->input->post('jabatan')),
                    'pangkat' => $gol[0],
                    'golongan' => $gol[1],
                    'telepon' => $this->input->post('telepon'),
                    'kd_level' => $this->input->post('nama_level'),
                    'email' => htmlspecialchars($this->input->post('email')),
                    'nama_pengguna' => htmlspecialchars($this->input->post('username')),
                    'password_pengguna' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                );
            } else {
                $data = array(
                    'kd_satker' => $this->input->post('kd_satker'),
                    'nama_pegawai' => htmlspecialchars($this->input->post('nama_pegawai')),
                    'nip' => htmlspecialchars($this->input->post('nip')),
                    'jabatan' => htmlspecialchars($this->input->post('jabatan')),
                    'pangkat' => $gol[0],
                    'golongan' => $gol[1],
                    'telepon' => $this->input->post('telepon'),
                    'kd_level' => $this->input->post('nama_level'),
                    'email' => htmlspecialchars($this->input->post('email')),
                    'nama_pengguna' => htmlspecialchars($this->input->post('username')),
                );
            }
            //var_dump($data);
            $this->pegawai_mod->update_pegawai($this->input->post('kd_pegawai'), $data);
            echo "success";
        } else {

            echo "error";
        }
    }

    public function ajax_list()
    {
        $list = $this->pegawai_mod->get_datatables();

        $data = array();
        $no = $_POST['start'];
        foreach ($list as $pegawai) {
            if ($pegawai->kd_level == 2) {
                $level = "<span class='badge bg-green-lt'>PPKom</span>";
            } elseif ($pegawai->kd_level == 3) {
                $level = "<span class='badge bg-purple-lt'>Admin OPD</span>";
            } elseif ($pegawai->kd_level == 1) {
                $level = "<span class='badge bg-dark-lt'>SA</span>";
            } elseif ($pegawai->kd_level == 4) {
                $level = "<span class='badge bg-danger-lt'>Pengawas</span>";
            }
            $no++;
            if ($pegawai->status == 1) {
                $aksi = "<div class='row g-2 align-items-center'><div class='col-6 col-sm-4 col-md-2 col-xl-auto'>
                <a href='" . base_url() . "pegawai/ubah/" . $pegawai->kd_pegawai . "' class='btn btn-lime w-100 btn-icon btn-ubah' data='" . $pegawai->kd_pegawai . "' data-toggle='tooltip' data-placement='top' title='Ubah Data Pegawai'>
                <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-edit' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <path d='M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1'></path>
                <path d='M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z'></path>
                <path d='M16 5l3 3'></path></svg></a></div>
                
                <div class='col-6 col-sm-4 col-md-2 col-xl-auto'>
                <a href='javascript:;' class='btn btn-red w-100 btn-icon btn-hapus' data='" . $pegawai->kd_pegawai . "'' data-toggle='tooltip' data-placement='top' title='Hapus Data Pegawai'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-trash' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <line x1='4' y1='7' x2='20' y2='7'></line>
                <line x1='10' y1='11' x2='10' y2='17'></line>
                <line x1='14' y1='11' x2='14' y2='17'></line>
                <path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12'></path>
                <path d='M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3'></path></svg></a></div></div>
                ";
            } elseif ($pegawai->status == 2) {
                $aksi = "<div class='row g-2 align-items-center'>
                <div class='col-6 col-sm-4 col-md-2 col-xl-auto'>
                <a href='" . base_url() . "pegawai/ubah/" . $pegawai->kd_pegawai . "' class='btn btn-lime w-100 btn-icon btn-ubah' data='" . $pegawai->kd_pegawai . "' data-toggle='tooltip' data-placement='top' title='Ubah Data Pegawai'>
                <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-edit' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <path d='M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1'></path>
                <path d='M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z'></path>
                <path d='M16 5l3 3'></path></svg></a></div>
                
                <div class='col-6 col-sm-4 col-md-2 col-xl-auto'><a href='#' class='btn btn-red w-100 btn-icon disabled' data-toggle='tooltip' data-placement='top' title='Hapus Data Paket'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-trash-off' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <line x1='3' y1='3' x2='21' y2='21'></line>
                <path d='M4 7h3m4 0h9'></path>
                <line x1='10' y1='11' x2='10' y2='17'></line>
                <line x1='14' y1='14' x2='14' y2='17'></line>
                <path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l.077 -.923'></path>
                <line x1='18.384' y1='14.373' x2='19' y2='7'></line>
                <path d='M9 5v-1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3'></path></svg></a></div></div>
                ";
            } elseif ($pegawai->status == 0) {
                $aksi = "<div class='row g-2 align-items-center'>
                <div class='col-6 col-sm-4 col-md-2 col-xl-auto'>
                <a href='" . base_url() . "pegawai/ubah/" . $pegawai->kd_pegawai . "' class='btn btn-lime w-100 btn-icon btn-ubah' data='" . $pegawai->kd_pegawai . "' data-toggle='tooltip' data-placement='top' title='Ubah Data Pegawai'>
                <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-edit' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <path d='M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1'></path>
                <path d='M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z'></path>
                <path d='M16 5l3 3'></path></svg></a></div>
                
                <div class='col-6 col-sm-4 col-md-2 col-xl-auto'><a href='#' class='btn btn-red w-100 btn-icon disabled' data-toggle='tooltip' data-placement='top' title='Hapus Data Paket'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-trash-off' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <line x1='3' y1='3' x2='21' y2='21'></line>
                <path d='M4 7h3m4 0h9'></path>
                <line x1='10' y1='11' x2='10' y2='17'></line>
                <line x1='14' y1='14' x2='14' y2='17'></line>
                <path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l.077 -.923'></path>
                <line x1='18.384' y1='14.373' x2='19' y2='7'></line>
                <path d='M9 5v-1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3'></path></svg></a></div></div>
                ";
            } elseif ($pegawai->status == 3 &&  $this->session->userdata('kd_level') == 3) {
                $aksi = "<div class='row g-2 align-items-center'>
                <div class='col-6 col-sm-4 col-md-2 col-xl-auto'>
                <a href='#' class='btn btn-lime w-100 btn-icon btn-ubah disabled' data-toggle='tooltip' data-placement='top' title='Ubah Data Paket'>
                <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-edit-off' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <path d='M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1'></path>
                <path d='M10.507 10.498l-1.507 1.502v3h3l1.493 -1.498m2.002 -2.01l4.89 -4.907a2.1 2.1 0 0 0 -2.97 -2.97l-4.913 4.896'></path>
                <path d='M16 5l3 3'></path>
                <path d='M3 3l18 18'></path>
                </svg></a></div>
                
                <div class='col-6 col-sm-4 col-md-2 col-xl-auto'><a href='#' class='btn btn-red w-100 btn-icon disabled' data-toggle='tooltip' data-placement='top' title='Hapus Data Paket'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-trash-off' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <line x1='3' y1='3' x2='21' y2='21'></line>
                <path d='M4 7h3m4 0h9'></path>
                <line x1='10' y1='11' x2='10' y2='17'></line>
                <line x1='14' y1='14' x2='14' y2='17'></line>
                <path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l.077 -.923'></path>
                <line x1='18.384' y1='14.373' x2='19' y2='7'></line>
                <path d='M9 5v-1a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3'></path></svg></a></div></div>
                ";
            } else {
                $aksi = "<div class='row g-2 align-items-center'><div class='col-6 col-sm-4 col-md-2 col-xl-auto'>
                <a href='" . base_url() . "pegawai/ubah/" . $pegawai->kd_pegawai . "' class='btn btn-lime w-100 btn-icon btn-ubah' data='" . $pegawai->kd_pegawai . "' data-toggle='tooltip' data-placement='top' title='Ubah Data Pegawai'>
                <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-edit' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <path d='M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1'></path>
                <path d='M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z'></path>
                <path d='M16 5l3 3'></path></svg></a></div>
                
                <div class='col-6 col-sm-4 col-md-2 col-xl-auto'>
                <a href='javascript:;' class='btn btn-red w-100 btn-icon btn-hapus' data='" . $pegawai->kd_pegawai . "'' data-toggle='tooltip' data-placement='top' title='Hapus Data Pegawai'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-trash' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <line x1='4' y1='7' x2='20' y2='7'></line>
                <line x1='10' y1='11' x2='10' y2='17'></line>
                <line x1='14' y1='11' x2='14' y2='17'></line>
                <path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12'></path>
                <path d='M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3'></path></svg></a></div></div>
                ";
            }

            $row = array();
            $row[] = "<div align=center>" . $no . "</div>";
            $row[] = $pegawai->nama_pegawai;
            $row[] = $pegawai->nip;
            $row[] = $pegawai->nama_pengguna;
            $row[] = "<div class='text-center'>" . $level . "</div>";
            $row[] =  "" . $aksi . "";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pegawai_mod->count_all(),
            "recordsFiltered" => $this->pegawai_mod->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    function get_realisasi()
    {
        $kd_paket = $this->input->get('id');
        $data = $this->paket_mod->get_paket($kd_paket);
        echo json_encode($data);
    }
}
