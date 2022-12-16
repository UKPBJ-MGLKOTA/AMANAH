<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kinerja_mod extends CI_Model
{

    var $table = 'penilaian_kinerja';
    var $table2 = 'satker';
    var $table3 = 'penyedia';
    var $table4 = 'paket';
    var $column_order = array(null, 'nama_paket', 'nama_penyedia', 'nilai_akhir'); //set column field database for datatable orderable
    var $column_search = array('nama_paket', 'nama_penyedia', 'nilai_akhir'); //set column field database for datatable searchable 
    var $order = array('kd_penyedia' => 'desc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {


        $this->db->select('satker.kd_satker,
        satker.nama_satker,
        penyedia.kd_penyedia,
        penyedia.nama_penyedia,
        paket.kd_paket,
        paket.nama_paket,
        paket.lokasi_pekerjaan,
        paket.nilai_kontrak,
        paket.no_kontrak,
        paket.tgl_kontrak,
        paket.jangka_waktu,
        paket.jenis_pengadaan,
        paket.metode_pengadaan,
        penilaian_kinerja.kd_penilaian,
        penilaian_kinerja.aspek_1,
        penilaian_kinerja.aspek_2,
        penilaian_kinerja.aspek_3,
        penilaian_kinerja.aspek_4,
        penilaian_kinerja.nilai_kinerja');
        $this->db->from($this->table);
        $this->db->join('satker', 'satker.kd_satker = penilaian_kinerja.kd_satker', 'left');
        $this->db->join('penyedia', 'penyedia.kd_penyedia = penilaian_kinerja.kd_penyedia', 'left');
        $this->db->join('paket', 'paket.kd_paket = penilaian_kinerja.kd_paket', 'left');

        if ($this->session->userdata('kd_level') == 2) {
            $this->db->where('paket.kd_pegawai', $this->session->userdata('kd_pegawai'));
        }

        //add custom filter here
        if ($this->input->post('satker')) {
            $this->db->where('satker.kd_satker', $this->input->post('satker'));
        }

        if ($this->input->post('jenis_pengadaan')) {
            $this->db->where('paket.jenis_pengadaan', $this->input->post('jenis_pengadaan'));
        }

        if ($this->input->post('metode_pengadaan')) {
            $this->db->where('paket.metode_pengadaan', $this->input->post('metode_pengadaan'));
        }
        $i = 0;

        foreach ($this->column_search as $item) // loop column 
        {
            if ($_POST['search']['value']) // if datatable send POST for search
            {

                if ($i === 0) // first loop
                {
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }

        if (isset($_POST['order'])) // here order processing
        {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    public function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    public function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    function data_kinerja($kd_kinerja)
    {
        $sql = "SELECT 
        satker.kd_satker,
        satker.nama_satker,
        penyedia.kd_penyedia,
        penyedia.nama_penyedia,
        penyedia.alamat,
        paket.kd_paket,
        paket.nama_paket,
        paket.lokasi_pekerjaan,
        paket.nilai_kontrak,
        paket.no_kontrak,
        paket.tgl_kontrak,
        paket.jangka_waktu,
        paket.jenis_pengadaan,
        paket.metode_pengadaan,
        paket.tahun,
        penilaian_kinerja.kd_penilaian,
        penilaian_kinerja.aspek_1,
        penilaian_kinerja.aspek_2,
        penilaian_kinerja.aspek_3,
        penilaian_kinerja.aspek_4,
        penilaian_kinerja.nilai_1,
        penilaian_kinerja.nilai_2,
        penilaian_kinerja.nilai_3,
        penilaian_kinerja.nilai_4,
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
        WHERE penilaian_kinerja.kd_penilaian=$kd_kinerja";
        return $this->db->query($sql)->row();
    }

    public function save_kinerja($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update_kinerja($id, $data)
    {
        return $this->db->update($this->table, $data, array('kd_penilaian' => $id));
    }

    public function update_status_paket($id, $data)
    {
        return $this->db->update($this->table4, $data, array('kd_paket' => $id));
    }

    public function update_status_penyedia($id, $data)
    {
        return $this->db->update($this->table3, $data, array('kd_penyedia' => $id));
    }

    //hapus data mahasiswa
    public function delete_kinerja($id)
    {
        return $this->db->delete($this->table, array('kd_penilaian' => $id));
    }
}
