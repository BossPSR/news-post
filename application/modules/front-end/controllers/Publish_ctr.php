<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Publish_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('option/header');
        $this->load->view('publish_me');
        $this->load->view('option/footer');
    }
}
