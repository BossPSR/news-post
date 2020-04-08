<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_controller extends CI_Controller
{

    public function list_Contact()
    {
        $admin = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username'), 'status' => 1])->row_array();
        $data['admin'] = $admin;
        if ($admin == true) {
            $data['contact'] = $this->db->get('tbl_contact')->result_array();
            $this->load->view('contact', $data);
        } else {
            $this->session->set_flashdata('dont_click', TRUE);
            redirect('Dashboard');
        }
    }






    
}