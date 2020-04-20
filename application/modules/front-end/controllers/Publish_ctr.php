<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publish_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('History_model');
    }

    public function index()
    {
        $session                    = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $userId                     = $session['id_user'];
        $data['show_ppdf']          = $this->History_model->pdf_history($userId);
        $data['show_template']      = $this->History_model->tem_history($userId);

        if (empty($session)) {
            redirect('index');
        } else {
            $this->load->view('option/header');
            $this->load->view('publish_me', $data);
            $this->load->view('option/footer');
        }
    }
}
