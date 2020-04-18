<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('option/header');
        $this->load->view('home');
        $this->load->view('option/footer');    
    }

    public function textarea()
    {
        
        echo mb_ereg_replace('\n','<br>',$this->input->get('data'));
        

    }
  
}
