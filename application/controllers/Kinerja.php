<?php

defined('BASEPATH') or exit('No direct script access allowed');
class Kinerja extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('ciqrcode');
        $this->load->model(array("general_mod", "paket_mod", "pegawai_mod", "kinerja_mod"));
    }

    public function index()
    {
        $data['title'] = 'Penilaian Kinerja';
        $data['aktif'] = 'kinerja';

        $data['satker'] = $this->general_mod->daftar_opd();
        $data['profil'] = $this->general_mod->profil_akun($this->session->userdata('kd_pegawai'));

        // $data['kinerja'] = $this->kinerja_mod->rekap_kinerja();

        $this->load->view('templates/header', $data);
        $this->load->view('kinerja/main', $data);
        $this->load->view('kinerja/footer', $data);
    }

    public function tambah()
    {
        $data['title'] = 'Penilaian Kinerja';
        $data['aktif'] = 'kinerja';

        $data['profil'] = $this->general_mod->profil_akun($this->session->userdata('kd_pegawai'));
        if ($this->session->userdata('kd_level') == 2) {
            $data['paket'] = $this->paket_mod->data_paket_all_ppk($this->session->userdata('kd_pegawai'));
        } else {
            $data['paket'] = $this->paket_mod->data_paket_all();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('kinerja/form_input', $data);
        $this->load->view('kinerja/footer_input', $data);
    }

    public function ubah($kd_kinerja)
    {
        $data['title'] = 'Penilaian Kinerja';
        $data['aktif'] = 'kinerja';

        $data['paket'] = $this->kinerja_mod->data_kinerja($kd_kinerja);
        $data['profil'] = $this->general_mod->profil_akun($this->session->userdata('kd_pegawai'));

        $this->load->view('templates/header', $data);
        $this->load->view('kinerja/form_ubah', $data);
        $this->load->view('kinerja/footer_ubah', $data);
    }

    public function cetak($kd_kinerja)
    {
        $data['title'] = 'Penilaian Kinerja';
        $data['aktif'] = 'kinerja';

        $data['kinerja'] = $this->kinerja_mod->data_kinerja($kd_kinerja);
        $data['profil'] = $this->general_mod->profil_akun($this->session->userdata('kd_pegawai'));

        $this->load->view('templates/header', $data);
        $this->load->view('kinerja/main_cetak', $data);
        $this->load->view('kinerja/footer', $data);
    }

    public function batal()
    {
        $id = $this->input->get('id');
        if (!isset($id)) show_404();
        $this->kinerja_mod->delete_kinerja($id);
        $msg['success'] = true;
        $this->output->set_output(json_encode($msg));
    }

    public function simpan_baru()
    {
        $this->form_validation->set_rules('kd_paket', 'Nama Paket', 'required', array('required' => 'Nama Paket harus diisi'));

        if ($this->form_validation->run()) {
            $this->load->library('ciqrcode'); //pemanggilan library QR CODE

            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './assets/'; //string, the default is application/cache/
            $config['errorlog']     = './assets/'; //string, the default is application/logs/
            $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
            $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
            $kd_cek = "AMN" . $this->input->post('kd_paket');
            $image_name = $kd_cek . '.png'; //buat name dari qr code sesuai dengan nim
            $url_cek = "https://amanah.online/verifikasi/cek/" . $kd_cek;
            $params['data'] = $url_cek; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

            $data = array(
                'kd_satker' => $this->input->post('kd_satker'),
                'kd_paket' => $this->input->post('kd_paket'),
                'kd_penyedia' => $this->input->post('kd_penyedia'),
                'nilai_1' => $this->input->post('aspek_1'),
                'nilai_2' => $this->input->post('aspek_2'),
                'nilai_3' => $this->input->post('aspek_3'),
                'nilai_4' => $this->input->post('aspek_4'),
                'aspek_1' => $this->input->post('poin_1'),
                'aspek_2' => $this->input->post('poin_2'),
                'aspek_3' => $this->input->post('poin_3'),
                'aspek_4' => $this->input->post('poin_4'),
                'nilai_kinerja' => $this->input->post('poin_akhir'),
                'kategori_nilai' => $this->input->post('kat'),
                'status' => '1',
                'qrcode' => $image_name,
                'kd_verifikasi' => $kd_cek
            );

            $data2 = array(
                'status' => '3'
            );

            $data3 = array(
                'status' => '2'
            );

            $this->kinerja_mod->save_kinerja($data);
            $this->kinerja_mod->update_status_paket($this->input->post('kd_paket'), $data2);
            $this->kinerja_mod->update_status_penyedia($this->input->post('kd_penyedia'), $data2);
            echo "success";
        } else {

            echo "error";
        }
    }

    public function simpan()
    {
        $this->form_validation->set_rules('kd_paket', 'Nama Paket', 'required', array('required' => 'Nama Paket harus diisi'));

        if ($this->form_validation->run()) {
            $this->load->library('ciqrcode'); //pemanggilan library QR CODE

            $config['cacheable']    = true; //boolean, the default is true
            $config['cachedir']     = './assets/'; //string, the default is application/cache/
            $config['errorlog']     = './assets/'; //string, the default is application/logs/
            $config['imagedir']     = './assets/images/'; //direktori penyimpanan qr code
            $config['quality']      = true; //boolean, the default is true
            $config['size']         = '1024'; //interger, the default is 1024
            $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
            $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
            $this->ciqrcode->initialize($config);
            $kd_cek = "AMN" . $this->input->post('kd_paket');
            $image_name = $kd_cek . '.png'; //buat name dari qr code sesuai dengan nim
            $url_cek = "https://amanah.online/verifikasi/cek/" . $kd_cek;
            $params['data'] = $url_cek; //data yang akan di jadikan QR CODE
            $params['level'] = 'H'; //H=High
            $params['size'] = 10;
            $params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
            $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

            $data = array(
                'kd_satker' => $this->input->post('kd_satker'),
                'kd_paket' => $this->input->post('kd_paket'),
                'kd_penyedia' => $this->input->post('kd_penyedia'),
                'nilai_1' => $this->input->post('aspek_1'),
                'nilai_2' => $this->input->post('aspek_2'),
                'nilai_3' => $this->input->post('aspek_3'),
                'nilai_4' => $this->input->post('aspek_4'),
                'aspek_1' => $this->input->post('poin_1'),
                'aspek_2' => $this->input->post('poin_2'),
                'aspek_3' => $this->input->post('poin_3'),
                'aspek_4' => $this->input->post('poin_4'),
                'nilai_kinerja' => $this->input->post('poin_akhir'),
                'kategori_nilai' => $this->input->post('kat'),
                'status' => '1',
                'qrcode' => $image_name,
                'kd_verifikasi' => $kd_cek
            );

            $this->kinerja_mod->update_kinerja($this->input->post('kd_kinerja'), $data);

            echo "success";
        } else {

            echo "error";
        }
    }

    public function ajax_list()
    {
        $list = $this->kinerja_mod->get_datatables();
        $data = array();
        $no = $_POST['start'];
        foreach ($list as $kinerja) {
            $no++;

            if ($this->session->userdata('kd_level') == 4) {
                $aksi = "
                <a href='" . base_url() . "kinerja/cetak/" . $kinerja->kd_penilaian . "' class='btn btn-green btn-icon btn-validasi' data='" .  $kinerja->kd_penilaian . "' data-toggle='tooltip' data-placement='top' title='Cetak Penilaian Kinerja'>
                <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-checklist' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <path d='M9.615 20h-2.615a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8'></path>
                <path d='M14 19l2 2l4 -4'></path>
                <path d='M9 8h4'></path>
                <path d='M9 12h2'></path>
                </svg></a>
                ";
            } else {
                $aksi = "
                <a href='" . base_url() . "kinerja/ubah/" . $kinerja->kd_penilaian . "' class='btn btn-azure btn-icon btn-validasi' data='" .  $kinerja->kd_penilaian . "' data-toggle='tooltip' data-placement='top' title='Ubah Penilaian'>
                <svg xmlns=;http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-checkbox' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <polyline points='9 11 12 14 20 6'></polyline>
                <path d='M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9'></path>
                </svg></a>

                <a href='" . base_url() . "kinerja/cetak/" . $kinerja->kd_penilaian . "' class='btn btn-success btn-icon btn-validasi' data='" .  $kinerja->kd_penilaian . "' data-toggle='tooltip' data-placement='top' title='Cetak Penilaian Kinerja'>
                <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-printer' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <path d='M17 17h2a2 2 0 0 0 2 -2v-4a2 2 0 0 0 -2 -2h-14a2 2 0 0 0 -2 2v4a2 2 0 0 0 2 2h2'></path>
                <path d='M17 9v-4a2 2 0 0 0 -2 -2h-6a2 2 0 0 0 -2 2v4'></path>
                <rect x='7' y='13' width='10' height='8' rx='2'></rect>
                </svg></a>

                <a href='javascript:;' class='btn btn-red btn-icon btn-hapus' data='" . $kinerja->kd_penilaian . "'' data-toggle='tooltip' data-placement='top' title='Batalkan Penilaian Kinerja'>
                <svg xmlns='http://www.w3.org/2000/svg' class='icon icon-tabler icon-tabler-edit-off' width='24' height='24' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' fill='none' stroke-linecap='round' stroke-linejoin='round'>
                <path stroke='none' d='M0 0h24v24H0z' fill='none'></path>
                <path d='M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1'></path>
                <path d='M10.507 10.498l-1.507 1.502v3h3l1.493 -1.498m2.002 -2.01l4.89 -4.907a2.1 2.1 0 0 0 -2.97 -2.97l-4.913 4.896'></path>
                <path d='M16 5l3 3'></path>
                <path d='M3 3l18 18'></path>
                </svg></a>
                ";
            }

            if ($kinerja->nilai_kinerja == 0) {
                $kin = "<span class='badge  bg-danger-lt '>Buruk</span>";
            } elseif ($kinerja->nilai_kinerja == 1 || $kinerja->nilai_kinerja < 2) {
                $kin = "<span class='badge  bg-yellow-lt '>Cukup</span>";
            } elseif ($kinerja->nilai_kinerja == 2 || $kinerja->nilai_kinerja < 3) {
                $kin = "<span class='badge  bg-primary-lt '>Baik</span>";
            } elseif ($kinerja->nilai_kinerja == 3) {
                $kin = "<span class='badge  bg-green-lt '>Sangat Baik</span>";
            }

            $row = array();
            $row[] = "<div align=center>" . $no . "</div>";
            $row[] = $kinerja->nama_paket;
            $row[] = $kinerja->nama_penyedia;
            $row[] = "<div align=center>" . $kin . "</div>";
            $row[] =  "<div align=center>" . $aksi . "</div>";

            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->kinerja_mod->count_all(),
            "recordsFiltered" => $this->kinerja_mod->count_filtered(),
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
