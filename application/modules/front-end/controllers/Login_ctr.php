<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        if ($this->session->userdata('email') != '') {
            redirect('index');
        } else {
            $this->load->view('login');
        }
    }

    public function loginMe()
    {
        $email = $this->input->post('email');
        $password = md5($this->input->post('password'));
        $this->load->model('Login_model');

        if ($this->Login_model->login($email, $password)) {
            $user_data = array(
                'email' => $email
            );

            $this->session->set_userdata($user_data);
            $this->session->set_flashdata('success_login', TRUE);
            redirect('index');
        } else {
            $this->session->set_flashdata('fail_login', TRUE);
            redirect('index', 'refresh');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy(); //ล้างsession

        redirect('index'); //กลับไปหน้า Login
    }
}
