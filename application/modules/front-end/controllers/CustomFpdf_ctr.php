<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CustomFpdf_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->library('CustomFpdf');
        $this->load->view('PDF_f_view');
    }

  
}
