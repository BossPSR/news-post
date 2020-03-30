<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dynamic_dependent_model');
    }

    public function index()
    {
    
        // if ($this->session->userdata('code_student') != '') {
         
            $this->load->view('option/header');
            $this->load->view('home');
            $this->load->view('option/footer'); 
        // } else {
            // $this->load->view('login');
        // }
          
        
    }

  
}
