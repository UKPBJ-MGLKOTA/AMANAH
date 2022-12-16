<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Penyedia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model(array("general_mod", "penyedia_mod"));
    }

    public function index()
    {
        $data['title'] = 'Penyedia/Pelaku Usaha';
        $data['aktif'] = 'paket';
        $data['sub-aktif'] = 'penyedia';

        $data['satker'] = $this->general_mod->daftar_opd();
        $data['profil'] = $this->general_mod->profil_akun($this->session->userdata('kd_pegawai'));

        $this->load->view('templates/header', $data);
        $this->load->view('penyedia/main', $data);
        $this->load->view('penyedia/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Penyedia/Pelaku Usaha';
        $data['aktif'] = 'paket';
        $data['sub-aktif'] = 'penyedia';

        $data['profil'] = $this->general_mod->profil_akun($this->session->userdata('kd_pegawai'));

        $this->load->view('templates/header', $data);
        $this->load->view('penyedia/form_input', $data);
        $this->load->view('penyedia/footer_input', $data);
    }

    public function ubah($kd_penyedia)
    {
        $data['title'] = 'Penyedia/Pelaku Usaha';
        $data['aktif'] = 'paket';
        $data['sub-aktif'] = 'penyedia';

        $data['penyedia'] = $this->penyedia_mod->data_penyedia($kd_penyedia);
        $data['profil'] = $this->general_mod->profil_akun($this->session->userdata('kd_pegawai'));

        $this->load->view('templates/header', $data);
        $this->load->view('penyedia/form_ubah', $data);
        $this->load->view('penyedia/footer_ubah', $data);
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->penyedia_mod->delete_penyedia($id);
        $msg['success'] = true;
        $this->output->set_output(json_encode($msg));
    }

    public function simpan_baru()
    {
        $this->form_validation->set_rules('nama_penyedia', 'Nama Penyedia', 'required', array('required' => 'Nama Penyedia harus diisi'));
        $this->form_validation->set_rules('npwp', 'NPWP', 'required', array('required' => 'Nama penyedia harus diisi'));
        $this->form_validation->set_rules('nama_narahubung', 'Nama', 'required', array('required' => 'Nama harus diisi'));

        if ($this->form_validation->run()) {
            $data = array(
                'nama_penyedia' => htmlspecialchars($this->input->post('nama_penyedia')),
                'npwp' => htmlspecialchars($this->input->post('npwp')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'telepon' => $this->input->post('telepon'),
                'email' => htmlspecialchars($this->input->post('email')),
                'nama_narahubung' => htmlspecialchars($this->input->post('nama_narahubung')),
                'alamat_narahubung' => htmlspecialchars($this->input->post('alamat_narahubung')),
                'telepon_narahubung' => $this->input->post('telepon_narahubung'),
                'email_narahubung' => htmlspecialchars($this->input->post('email_narahubung')),
                'status' => '1'
            );

            //var_dump($data);
            $this->penyedia_mod->save_penyedia($data);
            echo "success";
        } else {

            echo "error";
        }
    }

    public function simpan()
    {

        $this->form_validation->set_rules('nama_penyedia', 'Nama Penyedia', 'required', array('required' => 'Nama Penyedia harus diisi'));
        $this->form_validation->set_rules('npwp', 'NPWP', 'required', array('required' => 'Nama penyedia harus diisi'));
        $this->form_validation->set_rules('nama_narahubung', 'Nama', 'required', array('required' => 'Nama harus diisi'));

        if ($this->form_validation->run()) {

            $data = array(
                'nama_penyedia' => htmlspecialchars($this->input->post('nama_penyedia')),
                'npwp' => htmlspecialchars($this->input->post('npwp')),
                'alamat' => htmlspecialchars($this->input->post('alamat')),
                'telepon' => $this->input->post('telepon'),
                'email' => htmlspecialchars($this->input->post('email')),
                'nama_narahubung' => htmlspecialchars($this->input->post('nama_narahubung')),
                'alamat_narahubung' => htmlspecialchars($this->input->post('alamat_narahubung')),
                'telepon_narahubung' => $this->input->post('telepon_narahubung'),
                'email_narahubung' => htmlspecialchars($this->input->post('email_narahubung')),
            );

            //var_dump($data);
            $this->penyedia_mod->update_penyedia($this->input->post('kd_penyedia'), $data);
            echo "success";
        } else {

            echo "error";
        }
    }

    public function ajax_list()
    {
        $list = $this->penyedia_mod->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $penyedia) {
            $no++;
            if ($penyedia->status == 1) {
                $aksi = "<div class='row g-2 align-items-center'><div class='col-6 col-sm-4 col-md-2 col-xl-auto'>
                <a href='" . base_url() . "penyedia/ubah/" . $penyedia->kd_penyedia . "' class='btn btn-lime w-100 btn-icon btn-ubah' data='" . $penyedia->kd_penyedia . "' data-toggle='tooltip' data-placement='top' title='Ubah Data penyedia'>
                <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-edit' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <path d='M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1'></path>
                <path d='M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z'></path>
                <path d='M16 5l3 3'></path></svg></a></div>
                
                <div class='col-6 col-sm-4 col-md-2 col-xl-auto'>
                <a href='javascript:;' class='btn btn-red w-100 btn-icon btn-hapus' data='" . $penyedia->kd_penyedia . "'' data-toggle='tooltip' data-placement='top' title='Hapus Data penyedia'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-trash' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <line x1='4' y1='7' x2='20' y2='7'></line>
                <line x1='10' y1='11' x2='10' y2='17'></line>
                <line x1='14' y1='11' x2='14' y2='17'></line>
                <path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12'></path>
                <path d='M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3'></path></svg></a></div></div>
                ";
            } elseif ($penyedia->status == 2) {
                $aksi = "<div class='row g-2 align-items-center'>
                <div class='col-6 col-sm-4 col-md-2 col-xl-auto'>
                <a href='" . base_url() . "penyedia/ubah/" . $penyedia->kd_penyedia . "' class='btn btn-lime w-100 btn-icon btn-ubah' data='" . $penyedia->kd_penyedia . "' data-toggle='tooltip' data-placement='top' title='Ubah Data penyedia'>
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
            }

            $row = array();
            $row[] = "<div align=center>" . $no . "</div>";
            $row[] = $penyedia->nama_penyedia;
            $row[] = $penyedia->npwp;
            $row[] = $penyedia->alamat;
            $row[] =  "" . $aksi . "";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->penyedia_mod->count_all(),
            "recordsFiltered" => $this->penyedia_mod->count_filtered(),
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
