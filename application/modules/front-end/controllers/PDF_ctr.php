<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PDF_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->library('Pdf');
        $this->load->view('PDF_view');
    }

  
}
