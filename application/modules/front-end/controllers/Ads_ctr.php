<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ads_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dynamic_dependent_model');
    }

    public function index()
    {
        $this->load->view('option/header');
        $this->load->view('ads');
        $this->load->view('option/footer'); 
    }

    public function insert_ads()
    {

        $data = array(
            'topic'             => $this->input->post('topic'),
            'agenda'            => $this->input->post('agendaA'),
            'company_name'      => $this->input->post('companyA'),
            'meeting'           => $this->input->post('meetingA'),
            'announcement_to'   => $this->input->post('announceA'),
            'meeting_date'      => $this->input->post('announcedateA'),
            'meeting_time'      => $this->input->post('timeA'),
            'meeting_place'     => $this->input->post('placeA'),
            'post_date'         => $this->input->post('advertisementA'),
            'name_surname'      => $this->input->post('signA'),
            'position'          => $this->input->post('positionA'),
            'created_at'        => date('Y-m-d H:i:s'),
        );
        $success = $this->db->insert('tbl_advertise', $data);
        if($success > 0)
        {
            $this->session->set_flashdata('responseA', TRUE);
            redirect('ads');

        }
        else
        {
            $this->session->set_flashdata('msgA', TRUE);
            redirect('ads');
        }

    }

  
}
