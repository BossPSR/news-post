<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Credit_history_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('option/header');
        $this->load->view('credit-history');
        $this->load->view('option/footer');
    }
}
