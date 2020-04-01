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

  
}
