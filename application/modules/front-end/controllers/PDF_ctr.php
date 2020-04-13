<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PDF_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
		$this->pdf->fontpath = 'fonts/'; // Create folder fonts at Codeigniter
    }

    public function index()
    {
        $this->load->view('PDF_view');
    }

  
}
