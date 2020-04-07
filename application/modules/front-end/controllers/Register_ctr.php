<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_ctr extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Dynamic_dependent_model');
  }

  public function index()
  {
    $this->load->view('option/header');
    $this->load->view('register');
    $this->load->view('option/footer');
  }


  function regist_complete()
  {
    if (empty($this->session->userdata('email'))) {
      $email        = $this->input->post('email');
      $password     = $this->input->post('password');
      $id_tax       = $this->input->post('id_tax');
      $company      = $this->input->post('company');
      $address      = $this->input->post('address');

      $data = array(
        'email'           => $email,
        'password'        => md5($password),
        'id_taxs'         => $id_tax,
        'company'         => $company,
        'address'         => $address,
        'create_times'    => date('Y-m-d H:i:s'),
      );

      $this->db->insert('tbl_user', $data);
      $this->session->set_flashdata('success_register', TRUE);
      redirect('index');
    } else {
      $this->session->set_flashdata('fail_register', TRUE);
      redirect('index');
    }
  }

  function fetch_state()
  {
    if ($this->input->post('PROVINCE_ID')) {
      echo $this->Dynamic_dependent_model->fetch_state($this->input->post('PROVINCE_ID'));
    }
  }

  function fetch_city()
  {
    if ($this->input->post('AMPHUR_ID')) {
      echo $this->Dynamic_dependent_model->fetch_city($this->input->post('AMPHUR_ID'));
    }
  }
}
