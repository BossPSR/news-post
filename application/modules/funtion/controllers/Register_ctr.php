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

        $this->load->view('register_student');
    }


    function regist_complete()
    {
           
          $username          = $this->input->post('Frist_name').' '.$this->input->post('last_name');
          $tel               = $this->input->post('tel');
          $email             = $this->input->post('email');
          $password          = $this->input->post('password');
          $cpassword         = $this->input->post('cpassword');
          $board             = $this->input->post('board');
          $subject           = $this->input->post('subject');
          $branch            = $this->input->post('branch');
          $code_student      = $this->input->post('code_student');

        
           //เช็ครหัสนักศึกษาว่าซ้ำกันมั้ย
           $codes = $this->db->get_where('tbl_user',['code_student'=>$code_student])->row_array();
           if (!empty($codes)) {
            $this->session->set_flashdata('del_ss2', 'รหัสนักศึกษานี้มีผู้ใช้ไปแล้ว กรุณาลองใหม่อีกครั้ง !!.');
          
               redirect('Register');   
           }

            //เช็คอีเมลว่าซ้ำกันมั้ย
            $emailCheck = $this->db->get_where('tbl_user',['email'=>$email])->row_array();
            if (!empty($emailCheck)) {
              $this->session->set_flashdata('del_ss2', 'อีเมลนี้มีผู้ใช้ไปแล้ว กรุณาลองใหม่อีกครั้ง !!.');
                redirect('Register');   
            }
        
          if ($password != $cpassword) 
          {
            $this->session->set_flashdata('del_ss2', 'รหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง!!.');
              redirect('Register');   
          }
          else
          {
              $data = array
              (
                'username'        => $username,
                'phone'           => $tel,
                'email'           => $email,
                'code_student'    => $code_student,
                'is_admin'        =>  3 ,
                'board'           => $board,
                'subject'         => $subject,
                'branch'          => $branch,
                'password'        => md5($cpassword),
                'created_at'      => date('Y-m-d H:i:s')
              );
              
  
              $succeed =  $this->db->insert('tbl_user',$data);
  
              if($succeed > 0)
              {
                $this->session->set_flashdata('save_ss2', 'Successfully บันทึกข้อมูลนักศึกษาเรียบร้อยแล้ว !!.');
              }
              else
              {
                $this->session->set_flashdata('del_ss2', 'Not Successfully ไม่สามารถบันทึกข้อมูลนักศึกษาได้ !!.');
              }
              redirect('Login');
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

      function register_teacher_complete()
    {
          $title           = $this->input->post('title'); 
          $fname         = $this->input->post('Frist_name');
          $lname         = $this->input->post('last_name');
          $email         = $this->input->post('email');
          $username      = $this->input->post('username');
          $password      = $this->input->post('password');
          $cpassword     = $this->input->post('cpassword');
          

          //เช็ครหัสผู้ใช้ว่าซ้ำกันมั้ย
          $checkUsername = $this->db->get_where('tbl_teacher',['username'=>$username])->row_array();
          if (!empty($checkUsername)) {
              $this->session->set_flashdata('msg','รหัสผู้ใช้นี้มีผู้ใช้ไปแล้ว กรุณาลองใหม่อีกครั้ง!!');
              redirect('Register');   
          }

            //เช็คอีเมลว่าซ้ำกันมั้ย
            $emailCheck = $this->db->get_where('tbl_teacher',['email'=>$email])->row_array();
            if (!empty($emailCheck)) {
                $this->session->set_flashdata('msg','อีเมลนี้มีผู้ใช้ไปแล้ว กรุณาลองใหม่อีกครั้ง!!');
                redirect('Register');   
            }
        
          if ($password != $cpassword) 
          {
              $this->session->set_flashdata('msg','รหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง!!');
              redirect('Register');   
          }
          else
          {
              $data = array
              (
                'title'         => $title,
                'first_name'    => $fname,
                'last_name'     => $lname,
                'username'      => $username,
                'email'         => $email,
                'password'      => md5($cpassword),
                'create_date'   => date('Y-m-d'),
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s')
              );
              
  
              $succeed =  $this->db->insert('tbl_teacher',$data);
  
              if($succeed > 0)
              {
                $this->session->set_flashdata('response','บันทึกข้อมูลสมาชิกเรียบร้อยแล้ว/กรุณาเข้าสู่ระบบ!!');
              }
              else
              {
                $this->session->set_flashdata('msg','เกิดข้อผิดพลาดในการสมัคร กรุณาลองใหม่อีกครั้ง!!');
              }
              redirect('Login');
          }
           
      }
}
