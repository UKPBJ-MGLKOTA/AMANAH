<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Paket_mod extends CI_Model
{

    var $table = 'paket';
    var $table2 = 'pegawai';
    var $table3 = 'penyedia';
    var $column_order = array(null, 'nama_paket', 'pagu', 'hps', 'jenis_pengadaan', 'metode_pengadaan'); //set column field database for datatable orderable
    var $column_search = array('nama_paket', 'pagu', 'hps', 'jenis_pengadaan', 'metode_pengadaan'); //set column field database for datatable searchable 
    var $order = array('kd_paket' => 'desc'); // default order 

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    private function _get_datatables_query()
    {

        //add custom filter here
        if ($this->input->post('satker')) {
            $this->db->where('kd_satker', $this->input->post('satker'));
        }

        if ($this->input->post('jenis_pengadaan')) {
            $this->db->where('jenis_pengadaan', $this->input->post('jenis_pengadaan'));
        }

        if ($this->input->post('metode_pengadaan')) {
            $this->db->where('metode_pengadaan', $this->input->post('metode_pengadaan'));
        }

        if ($this->session->userdata('kd_level') == 2) {
            $this->db->where('kd_pegawai', $this->session->userdata('kd_pegawai'));
        }

        $this->db->from($this->table);
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

    function data_ppkom()
    {
        $sql = "SELECT 
        pegawai.kd_pegawai,
        pegawai.nama_pegawai,
        pegawai.nip,
        satker.nama_satker,
        satker.kd_satker FROM pegawai LEFT JOIN satker ON satker.kd_satker=pegawai.kd_satker WHERE pegawai.kd_level=2 ORDER BY pegawai.kd_pegawai ASC";
        return $this->db->query($sql)->result();
    }

    function data_penyedia()
    {
        $sql = "SELECT * FROM penyedia ORDER BY kd_penyedia ASC";
        return $this->db->query($sql)->result();
    }

    function data_satker()
    {
        $sql = "SELECT * FROM satker ORDER BY kd_satker ASC";
        return $this->db->query($sql)->result();
    }

    function data_paket($kd_paket)
    {
        $sql = "SELECT paket.kd_paket,
                paket.nama_paket,
                paket.pagu,
                paket.hps,
                paket.jenis_pengadaan,
                paket.metode_pengadaan,
                paket.lokasi_pekerjaan,
                paket.kd_satker,
                paket.kd_pegawai,
                paket.no_kontrak,
                paket.nilai_kontrak,
                paket.tgl_kontrak,
                paket.jangka_waktu,
                paket.status,
                paket.tahun,
                satker.nama_satker,
                pegawai.nama_pegawai,
                penyedia.nama_penyedia,
                penyedia.kd_penyedia FROM paket 
                LEFT JOIN satker ON paket.kd_satker=satker.kd_satker
                LEFT JOIN pegawai ON paket.kd_pegawai=pegawai.kd_pegawai
                LEFT JOIN penyedia  ON paket.kd_penyedia=penyedia.kd_penyedia 
                WHERE paket.kd_paket=$kd_paket";
        return $this->db->query($sql)->row();
    }

    function data_paket_all()
    {
        $sql = "SELECT paket.kd_paket,
                paket.nama_paket,
                paket.pagu,
                paket.hps,
                paket.jenis_pengadaan,
                paket.metode_pengadaan,
                paket.lokasi_pekerjaan,
                paket.kd_satker,
                paket.kd_pegawai,
                paket.no_kontrak,
                paket.nilai_kontrak,
                paket.tgl_kontrak,
                paket.jangka_waktu,
                paket.status,
                paket.tahun,
                satker.nama_satker,
                pegawai.nama_pegawai,
                penyedia.nama_penyedia,
                penyedia.kd_penyedia,
                penyedia.alamat FROM paket 
                LEFT JOIN satker ON paket.kd_satker=satker.kd_satker
                LEFT JOIN pegawai ON paket.kd_pegawai=pegawai.kd_pegawai
                LEFT JOIN penyedia  ON paket.kd_penyedia=penyedia.kd_penyedia 
                WHERE paket.status = '2'
                ORDER BY paket.kd_paket DESC";
        return $this->db->query($sql)->result();
    }

    function data_paket_all_ppk($kd_pegawai)
    {
        $sql = "SELECT paket.kd_paket,
                paket.nama_paket,
                paket.pagu,
                paket.hps,
                paket.jenis_pengadaan,
                paket.metode_pengadaan,
                paket.lokasi_pekerjaan,
                paket.kd_satker,
                paket.kd_pegawai,
                paket.no_kontrak,
                paket.nilai_kontrak,
                paket.tgl_kontrak,
                paket.jangka_waktu,
                paket.status,
                paket.tahun,
                satker.nama_satker,
                pegawai.nama_pegawai,
                penyedia.nama_penyedia,
                penyedia.kd_penyedia,
                penyedia.alamat FROM paket 
                LEFT JOIN satker ON paket.kd_satker=satker.kd_satker
                LEFT JOIN pegawai ON paket.kd_pegawai=pegawai.kd_pegawai
                LEFT JOIN penyedia  ON paket.kd_penyedia=penyedia.kd_penyedia 
                WHERE paket.status = '2' AND paket.kd_pegawai=$kd_pegawai
                ORDER BY paket.kd_paket DESC";
        return $this->db->query($sql)->result();
    }

    public function save_paket($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update_paket($id, $data)
    {
        return $this->db->update($this->table, $data, array('kd_paket' => $id));
    }

    public function update_status_pegawai($id, $data)
    {
        return $this->db->update($this->table2, $data, array('kd_pegawai' => $id));
    }

    public function update_status_penyedia($id, $data)
    {
        return $this->db->update($this->table3, $data, array('kd_penyedia' => $id));
    }

    //hapus data mahasiswa
    public function delete_paket($id)
    {
        return $this->db->delete($this->table, array('kd_paket' => $id));
    }
}
