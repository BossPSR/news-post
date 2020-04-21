<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_controller extends CI_Controller
{

    public function dashboard()
    {
        $admin = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username'), 'status' => 1])->row_array();
        $data['admin'] = $admin;
        if ($admin == true) {

        $this->load->view('dashboard',$data);
        } else {
            $this->session->set_flashdata('dont_click', TRUE);
            redirect('Login');
        }
    }
}
