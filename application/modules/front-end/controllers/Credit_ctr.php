<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Credit_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('option/header');
        $this->load->view('credit');
        $this->load->view('option/footer'); 
    }

    public function paypal_success()
    {
        $data = [];
        $data['name'] = $this->input->post('name');
        $data['create_time'] = $this->input->post('create_time');
        $data['amount'] = $this->input->post('amount');
        $data['currency_code'] = $this->input->post('currency_code');
        $data['orderID'] = $this->input->post('orderId');
        $data['payerId'] = $this->input->post('payerId');
        echo json_encode($data);
    }
  
}
