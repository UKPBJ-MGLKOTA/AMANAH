<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'download'));
    }

    public function panduan()
    {
        force_download('assets/files/Buku Panduan AMANAH.pdf', NULL);
    }
}
