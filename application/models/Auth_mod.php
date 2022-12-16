<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Auth_mod extends CI_Model
{

    // fungsi cek login
    function cek_login($username, $password)
    {
        $this->db->select("*");
        $this->db->from("pegawai");
        $this->db->where("nama_pengguna", $username);
        $query = $this->db->get();
        $user = $query->row();
        /**
         * Check password
         */
        if (!empty($user)) {
            if (password_verify($password, $user->password_pengguna)) {
                return $query->result();
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }
}
