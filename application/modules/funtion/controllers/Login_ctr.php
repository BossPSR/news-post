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
        $this->load->library('form_validation');
        $this->form_validation->set_rules('code_student', 'code_student', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        if ($this->form_validation->run()) {
            $code_student = $this->input->post('code_student');
            $password = md5($this->input->post('password'));
            $this->load->model('Login_model');

            if ($this->Login_model->login($code_student, $password)) {
                $user_data = array(
                    'code_student' => $code_student
                );

                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('save_ss2', 'ล็อกอินเรียบร้อยแล้ว');
                redirect('dashboard');
            } elseif ($this->Login_model->login_student($code_student, $password)) {
                $user_data = array(
                    'code_student' => $code_student
                );

                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('save_ss2', 'ล็อกอินเรียบร้อยแล้ว');
                redirect('index');
            } elseif ($this->Login_model->login_teacher($code_student, $password)) {
                $user_data = array(
                    'code_student' => $code_student
                );

                $this->session->set_userdata($user_data);
                $this->session->set_flashdata('save_ss2', 'ล็อกอินเรียบร้อยแล้ว');
                redirect('index');
            } else {
                $this->session->set_flashdata('del_ss2', 'รหัสผ่านผิดกรุณา ตรวจสอบ!!');
                redirect('Login', 'refresh');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy(); //ล้างsession

        redirect('Login'); //กลับไปหน้า Login
    }
}
