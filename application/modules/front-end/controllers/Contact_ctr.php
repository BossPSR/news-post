<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dynamic_dependent_model');
    }

    public function index()
    {
        $this->load->view('option/header');
        $this->load->view('contact');
        $this->load->view('option/footer');
    }

    public function contact_add()
    {
        $data = array(
            'name'          => $this->input->post('name'),
            'email'         => $this->input->post('email'),
            'phone'         => $this->input->post('phone'),
            'message'       => $this->input->post('message'),
            'create_times'  => date("Y-m-d H:i:s")
        );

        $success = $this->db->insert('tbl_contact', $data);

        echo $success ;
    }
}
