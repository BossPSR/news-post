<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Omise_controller extends CI_Controller
{

    public function list_omise()
    {
        $admin = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username'), 'status' => 1])->row_array();
        $data['admin'] = $admin;
        if ($admin == true) {
            $data['omise'] = $this->db->get('tbl_omise')->result_array();
            $this->load->view('list_omise', $data);
        } else {
            $this->session->set_flashdata('dont_click', TRUE);
            redirect('Login');
        }
    }

    





    






    
}