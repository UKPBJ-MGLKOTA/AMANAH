<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Paket extends CI_Controller
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
        $data['title'] = 'Paket Penyedia';
        $data['aktif'] = 'paket';

        $data['satker'] = $this->general_mod->daftar_opd();
        $data['profil'] = $this->general_mod->profil_akun($this->session->userdata('kd_pegawai'));

        //var_dump($this->opd_mod->daftar_opd());
        //$data['menu'] = $this->setting_mod->role_menu($this->session->userdata('role'));

        $this->load->view('templates/header', $data);
        $this->load->view('paket/paket', $data);
        $this->load->view('paket/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Paket Penyedia';
        $data['aktif'] = 'tambah';

        $data['profil'] = $this->general_mod->profil_akun($this->session->userdata('kd_pegawai'));
        $data['ppkom'] = $this->paket_mod->data_ppkom();
        $data['penyedia'] = $this->paket_mod->data_penyedia();
        $data['opd'] = $this->paket_mod->data_satker();

        $this->load->view('templates/header', $data);
        $this->load->view('paket/form_input', $data);
        $this->load->view('paket/footer_input', $data);
    }

    public function validasi($kd_paket)
    {
        $data['title'] = 'Paket Penyedia';
        $data['aktif'] = 'validasi';

        $data['paket'] = $this->paket_mod->data_paket($kd_paket);
        $data['profil'] = $this->general_mod->profil_akun($this->session->userdata('kd_pegawai'));
        $data['ppkom'] = $this->paket_mod->data_ppkom();
        $data['penyedia'] = $this->paket_mod->data_penyedia();

        $this->load->view('templates/header', $data);
        $this->load->view('paket/form_validasi', $data);
        $this->load->view('paket/footer_validasi', $data);
    }

    public function ubah($kd_paket)
    {
        $data['title'] = 'Paket Penyedia';
        $data['aktif'] = 'ubah';

        $data['paket'] = $this->paket_mod->data_paket($kd_paket);
        $data['profil'] = $this->general_mod->profil_akun($this->session->userdata('kd_pegawai'));
        $data['ppkom'] = $this->paket_mod->data_ppkom();
        $data['penyedia'] = $this->paket_mod->data_penyedia();

        $this->load->view('templates/header', $data);
        $this->load->view('paket/form_validasi', $data);
        $this->load->view('paket/footer_validasi', $data);
    }

    public function delete()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->paket_mod->delete_paket($id);
        $msg['success'] = true;
        $this->output->set_output(json_encode($msg));
    }

    public function simpan_baru()
    {
        $this->form_validation->set_rules('kd_satker', 'Nama OPD', 'required', array('required' => 'Nama OPD harus diisi'));
        $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required', array('required' => 'Nama Paket harus diisi'));
        $this->form_validation->set_rules('pagu', 'Pagu', 'required', array('required' => 'Pagu harus diisi'));
        $this->form_validation->set_rules('hps', 'HPS', 'required', array('required' => 'HPS harus diisi'));
        $this->form_validation->set_rules('jenis_pengadaan', 'Jenis Pengadaan', 'required', array('required' => 'Jenis Pengadaan harus diisi'));
        $this->form_validation->set_rules('metode_pengadaan', 'Metode Pengadaan', 'required', array('required' => 'Metode Pengadaan harus diisi'));
        $this->form_validation->set_rules('kd_pegawai', 'Nama PPkom', 'required', array('required' => 'Nama PPKom harus diisi'));
        $this->form_validation->set_rules('kd_penyedia', 'Nama Penyedia', 'required', array('required' => 'Nama Penyedia harus diisi'));
        $this->form_validation->set_rules('tahun', 'Tahun Anggaran', 'required', array('required' => 'Tahun Anggaran harus diisi'));
        $this->form_validation->set_rules('no_kontrak', 'Nomor Kontrak', 'required', array('required' => 'Nomor Kontrak harus diisi'));
        $this->form_validation->set_rules('nilai_kontrak', 'Nilai Kontrak', 'required', array('required' => 'Nilai Kontrak harus diisi'));
        $this->form_validation->set_rules('tanggal_kontrak', 'Tanggal Kontrak', 'required', array('required' => 'Tanggal Kontrak harus diisi'));
        $this->form_validation->set_rules('lokasi', 'Lokasi Pekerjaan', 'required', array('required' => 'Lokasi Pekerjaan harus diisi'));
        $this->form_validation->set_rules('jangka_waktu', 'Jangka Waktu', 'required|numeric', array('required' => 'Jangka Waktu Pelaksanaan harus diisi', 'numeric' => 'Jangka Waktu Pelaksanaan hanya bisa diisi angka'));

        if ($this->form_validation->run()) {
            $data = array(
                'kd_satker' => $this->input->post('kd_satker'),
                'nama_paket' => $this->input->post('nama_paket'),
                'pagu' => str_replace(",", "", $this->input->post('pagu')),
                'hps' => str_replace(",", "", $this->input->post('hps')),
                'jenis_pengadaan' => $this->input->post('jenis_pengadaan'),
                'metode_pengadaan' => $this->input->post('metode_pengadaan'),
                'lokasi_pekerjaan' => htmlspecialchars($this->input->post('lokasi')),
                'kd_pegawai' => $this->input->post('kd_pegawai'),
                'kd_penyedia' => $this->input->post('kd_penyedia'),
                'no_kontrak' => htmlspecialchars($this->input->post('no_kontrak')),
                'nilai_kontrak' => str_replace(",", "", $this->input->post('nilai_kontrak')),
                'tgl_kontrak' => $this->input->post('tanggal_kontrak'),
                'jangka_waktu' => htmlspecialchars($this->input->post('jangka_waktu')),
                'status' => '2',
                'tahun' => $this->input->post('tahun')
            );

            $data2 = array(
                'status' => '2'
            );

            $data3 = array(
                'status' => '2'
            );

            //var_dump($data);
            $this->paket_mod->save_paket($data);
            $this->paket_mod->update_status_pegawai($this->input->post('kd_pegawai'), $data2);
            //$this->paket_mod->update_status_penyedia($this->input->post('kd_penyedia'), $data3);
            echo "success";
        } else {

            echo "error";
        }
    }

    public function simpan()
    {
        $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required', array('required' => 'Nama Paket harus diisi'));
        $this->form_validation->set_rules('pagu', 'Pagu', 'required', array('required' => 'Pagu harus diisi'));
        $this->form_validation->set_rules('hps', 'HPS', 'required', array('required' => 'HPS harus diisi'));
        $this->form_validation->set_rules('jenis_pengadaan', 'Jenis Pengadaan', 'required', array('required' => 'Jenis Pengadaan harus diisi'));
        $this->form_validation->set_rules('metode_pengadaan', 'Metode Pengadaan', 'required', array('required' => 'Metode Pengadaan harus diisi'));
        $this->form_validation->set_rules('kd_pegawai', 'Nama PPkom', 'required', array('required' => 'Nama PPKom harus diisi'));
        $this->form_validation->set_rules('kd_penyedia', 'Nama Penyedia', 'required', array('required' => 'Nama Penyedia harus diisi'));
        $this->form_validation->set_rules('no_kontrak', 'Nomor Kontrak', 'required', array('required' => 'Nomor Kontrak harus diisi'));
        $this->form_validation->set_rules('nilai_kontrak', 'Nilai Kontrak', 'required', array('required' => 'Nilai Kontrak harus diisi'));
        $this->form_validation->set_rules('tanggal_kontrak', 'Tanggal Kontrak', 'required', array('required' => 'Tanggal Kontrak harus diisi'));
        $this->form_validation->set_rules('tahun', 'Tahun Anggaran', 'required', array('required' => 'Tahun Anggaran harus diisi'));
        $this->form_validation->set_rules('lokasi', 'Lokasi Pekerjaan', 'required', array('required' => 'Lokasi Pekerjaan harus diisi'));
        $this->form_validation->set_rules('jangka_waktu', 'Jangka Waktu', 'required|numeric', array('required' => 'Jangka Waktu Pelaksanaan harus diisi', 'numeric' => 'Jangka Waktu Pelaksanaan hanya bisa diisi angka'));

        if ($this->form_validation->run()) {
            if ($this->input->post('aktif') == "ubah") {
                $data = array(
                    'nama_paket' => $this->input->post('nama_paket'),
                    'pagu' => str_replace(",", "", $this->input->post('pagu')),
                    'hps' => str_replace(",", "", $this->input->post('hps')),
                    'jenis_pengadaan' => $this->input->post('jenis_pengadaan'),
                    'metode_pengadaan' => $this->input->post('metode_pengadaan'),
                    'lokasi_pekerjaan' => htmlspecialchars($this->input->post('lokasi')),
                    'kd_pegawai' => $this->input->post('kd_pegawai'),
                    'kd_penyedia' => $this->input->post('kd_penyedia'),
                    'no_kontrak' => htmlspecialchars($this->input->post('no_kontrak')),
                    'nilai_kontrak' => str_replace(",", "", $this->input->post('nilai_kontrak')),
                    'tgl_kontrak' => $this->input->post('tanggal_kontrak'),
                    'jangka_waktu' => htmlspecialchars($this->input->post('jangka_waktu')),
                    'tahun' => $this->input->post('tahun')
                );
            } else {
                $data = array(
                    'nama_paket' => $this->input->post('nama_paket'),
                    'pagu' => str_replace(",", "", $this->input->post('pagu')),
                    'hps' => str_replace(",", "", $this->input->post('hps')),
                    'jenis_pengadaan' => $this->input->post('jenis_pengadaan'),
                    'metode_pengadaan' => $this->input->post('metode_pengadaan'),
                    'lokasi_pekerjaan' => htmlspecialchars($this->input->post('lokasi')),
                    'kd_pegawai' => $this->input->post('kd_pegawai'),
                    'kd_penyedia' => $this->input->post('kd_penyedia'),
                    'no_kontrak' => htmlspecialchars($this->input->post('no_kontrak')),
                    'nilai_kontrak' => str_replace(",", "", $this->input->post('nilai_kontrak')),
                    'tgl_kontrak' => $this->input->post('tanggal_kontrak'),
                    'jangka_waktu' => htmlspecialchars($this->input->post('jangka_waktu')),
                    'tahun' => $this->input->post('tahun'),
                    'status' => '2'
                );
            }

            $data2 = array(
                'status' => '2'
            );

            $data3 = array(
                'status' => '2'
            );

            //var_dump($data);
            $this->paket_mod->update_paket($this->input->post('kd_paket'), $data);
            $this->paket_mod->update_status_pegawai($this->input->post('kd_pegawai'), $data2);
            //$this->paket_mod->update_status_penyedia($this->input->post('kd_penyedia'), $data3);
            echo "success";
        } else {

            echo "error";
        }
    }

    public function ajax_list()
    {
        $list = $this->paket_mod->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $paket) {
            $no++;
            if ($paket->status == 1) {
                $aksi = "<div class='row g-2 align-items-center'>
                <div class='col-6 col-sm-4 col-md-2 col-xl-auto'>
                <a href='" . base_url() . "paket/validasi/" . $paket->kd_paket . "' class='btn btn-azure w-100 btn-icon btn-validasi' data='" . $paket->kd_paket . "' data-toggle='tooltip' data-placement='top' title='Lengkapi Data Paket'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-file-check' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <path d='M14 3v4a1 1 0 0 0 1 1h4'></path>
                <path d='M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z'></path>
                <path d='M9 15l2 2l4 -4'></path></svg></a></div>
                
                <div class='col-6 col-sm-4 col-md-2 col-xl-auto'>
                <a href='javascript:;' class='btn btn-red w-100 btn-icon btn-hapus' data='" . $paket->kd_paket . "' data-toggle='tooltip' data-placement='top' title='Hapus Data Paket'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-trash' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <line x1='4' y1='7' x2='20' y2='7'></line>
                <line x1='10' y1='11' x2='10' y2='17'></line>
                <line x1='14' y1='11' x2='14' y2='17'></line>
                <path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12'></path>
                <path d='M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3'></path></svg></a></div></div>
                ";
            } elseif ($paket->status == 2) {
                $aksi = "<div class='row g-2 align-items-center'><div class='col-6 col-sm-4 col-md-2 col-xl-auto'>
                <a href='" . base_url() . "paket/ubah/" . $paket->kd_paket . "' class='btn btn-lime w-100 btn-icon btn-ubah' data='" . $paket->kd_paket . "' data-toggle='tooltip' data-placement='top' title='Ubah Data Paket'>
                <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-edit' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <path d='M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1'></path>
                <path d='M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z'></path>
                <path d='M16 5l3 3'></path></svg></a></div>
                
                <div class='col-6 col-sm-4 col-md-2 col-xl-auto'>
                <a href='javascript:;' class='btn btn-red w-100 btn-icon btn-hapus' data='" . $paket->kd_paket . "'' data-toggle='tooltip' data-placement='top' title='Hapus Data Paket'><svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-trash' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <line x1='4' y1='7' x2='20' y2='7'></line>
                <line x1='10' y1='11' x2='10' y2='17'></line>
                <line x1='14' y1='11' x2='14' y2='17'></line>
                <path d='M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12'></path>
                <path d='M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3'></path></svg></a></div></div>
                ";
            } elseif ($paket->status == 3) {
                if ($this->session->userdata('kd_level') == 1) {
                    $aksi = "<div class='row g-2 align-items-center'><div class='col-6 col-sm-4 col-md-2 col-xl-auto'>
                    <a href='" . base_url() . "paket/ubah/" . $paket->kd_paket . "' class='btn btn-lime w-100 btn-icon btn-ubah' data='" . $paket->kd_paket . "' data-toggle='tooltip' data-placement='top' title='Ubah Data Paket'>
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
                } else {
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
                }
            }

            $row = array();
            $row[] = "<div align=center>" . $no . "</div>";
            $row[] = $paket->nama_paket;
            $row[] = "<div align=right>" . number_format($paket->pagu, 2) . "</div>";
            $row[] = "<div align=right>" . number_format($paket->hps, 2) . "</div>";
            $row[] = "<div align=center>" . $paket->jenis_pengadaan . "</div>";
            $row[] = "<div align=center>" . $paket->metode_pengadaan . "</div>";
            $row[] =  "" . $aksi . "";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->paket_mod->count_all(),
            "recordsFiltered" => $this->paket_mod->count_filtered(),
            "data" => $data,
        );
        //output to json format
        echo json_encode($output);
    }

    public function pegawai_ajax_list()
    {
        $list = $this->pegawai_mod->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $ppkom) {
            $no++;

            $row = array();
            $row[] = "<div align=center>" . $no . "</div>";
            $row[] = $ppkom->nama_pegawai;
            $row[] = "<div align=center>" . $ppkom->nip . "</div>";
            $row[] =  "pilih";

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
