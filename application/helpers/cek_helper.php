<?php
function is_logged_in()
{
    $ci = get_instance();
    if (!$ci->session->userdata('nama_pengguna') and !$ci->session->userdata('kd_level')) {
        $ci->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Silahkan login terlebih dahulu.
        </div>');
        redirect('auth');
    } /*else {
        $role_id = $ci->session->userdata('kd_level');
        $menu = $ci->uri->segment(1);

        $query = $ci->db->get_where('menu', ['url' => $menu])->row_array();
        $menu_id = $query['kd_menu'];

        $userAccess = $ci->db->get_where('menu', [
            'kd_level' => $role_id,
            'kd_menu' => $menu_id
        ]);

        if ($userAccess->num_rows() < 1 and $menu <> "dashboard") {
            redirect('auth');
        }
    }*/
}
