<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_mod extends CI_Model
{

    var $table = 'pegawai';
    var $column_order = array(null, 'nama_pegawai', 'nip', 'nama_pengguna'); //set column field database for datatable orderable
    var $column_search = array('nama_pegawai', 'nip', 'nama_pengguna'); //set column field database for datatable searchable 
    var $order = array('kd_pegawai' => 'asc'); // default order 

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

        if ($this->input->post('level')) {
            $this->db->where('kd_level', $this->input->post('level'));
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

    function data_pegawai($kd_pegawai)
    {
        $sql = "SELECT pegawai.*,
                level.nama_level,
                satker.nama_satker
                FROM pegawai 
                LEFT JOIN level ON pegawai.kd_level=level.kd_level
                LEFT JOIN satker ON pegawai.kd_satker=satker.kd_satker
                WHERE pegawai.kd_pegawai=$kd_pegawai";
        return $this->db->query($sql)->row();
    }

    public function save_pegawai($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function update_pegawai($id, $data)
    {
        return $this->db->update($this->table, $data, array('kd_pegawai' => $id));
    }

    //hapus data mahasiswa
    public function delete_pegawai($id)
    {
        return $this->db->delete($this->table, array('kd_pegawai' => $id));
    }
}
