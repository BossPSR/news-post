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
        $data['date'] = $this->input->get('date');
        $this->load->library('CustomFpdf');
        $this->load->view('PDF_f_view',$data);
    }

    public function home_pdf()
    {
        $dataS = $this->input->get('date');

        $date_ex = explode('/',$dataS);

        $data['date'] =  $date_ex[2].'-'.$date_ex[1].'-'.$date_ex[0] ;

        $this->load->library('CustomFpdf');
        $this->load->view('PDF_f_view',$data);
    }

  
}
