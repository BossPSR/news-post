<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('Login_model');
    }

    public function login()
    {
        if (!empty($this->session->userdata('username'))) {
            redirect('Dashboard');
        } else {
            $this->load->view('login');
        }
    }

    public function loginMe()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        if ($this->Login_model->login_admin($username, $password)) {
            $user_data = array(
                'username' => $username
            );

            $this->session->set_userdata($user_data);
            $c_session = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username')])->row_array();
            $checkSession = array(
                'username'                  => $c_session['username'],
                'Ip_address'                => $this->input->ip_address(),
                'create_times'              => date('Y-m-d H:i:s'),
            );
            $this->db->insert('tbl_session', $checkSession);
            $this->session->set_flashdata('success_login', TRUE);
            redirect('Dashboard');
        } else {
            $this->session->set_flashdata('fail_login', TRUE);
            redirect('Login');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy(); //ล้างsession

        redirect('Login'); //กลับไปหน้า Login
    }
}
