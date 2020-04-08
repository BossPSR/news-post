<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register_ctr extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Dynamic_dependent_model');
    $this->load->model('Login_model');
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



  public function forgot_passwordProcess()
  {
    $email                  = $this->input->post('email');
    $username_check         = $this->Login_model->forgot_check_usre($email);
    if ($username_check) {

      $emailDetail = $this->db->get_where('tbl_user', ['email' => $email])->row_array();
      $token = md5(uniqid(rand(), true));
      $this->db->where('id_user', $emailDetail['id_user']);
      $this->db->update('tbl_user', ['forgot_password' => $token, 'time_forgot_password' => date('Y-m-d H:i:s')]);

      $this->sendEmail($email, $emailDetail, $token);
      $this->session->set_flashdata('save_ss2', 'ยืนยัน Email เรียบร้อยแล้ว.กรุณาตั้งค่ารหัสผ่านใหม่ของท่าน');
    } else {
      $this->session->set_flashdata('del_ss2', 'ไม่พบ E-mail ที่ท่านกรอกมา กรุณาตรวจสอบใหม่ค่ะ!!');
    }
  }


  private function sendEmail($userEmail, $emailDetail, $token)
  {

    $subject = 'ตั้งค่ารหัสผ่านใหม่ Report';

    $message = '<body style="background: #fff;">';
    $message .= '<h2 style="text-align:center; margin:15px 0; color:#000000;">ตั้งค่ารหัสผ่านใหม่เพื่อใช้บริการ Report</h2>';
    $message .= '<h4 style="text-align:center; color:#fe58a4; margin-bottom:15px;">กดลิงค์ด้านล่างเพื่อกดไปตั้งค่ารหัสผ่านของคุณคะ</h4>';
    $message .= '<div style="text-align:center; width: 50%; font-size:18px; margin:0 auto 15px"></div>';
    $message .= '<div style="text-align:center; font-size:18px; margin-bottom:15px; color:#000000;"><a href="https://ip-soft.co.th/ipsoft/forget_reset?id=' . $emailDetail['id_user'] . '&forgot_password=' . $token . '">ตั้งค่ารหัสผ่านใหม่</a></div>';
    $message .= '</body>';

    // $message = 'https://deejungdelivery.com/reset_password?id='.$emailDetail['id'].'&forgot_password='.$token;

    //config email settings
    $config['protocol'] = 'smtp';
    $config['smtp_host'] = 'smtp.gmail.com';
    $config['smtp_port'] = '2002';
    $config['smtp_user'] = 'infinityp.soft@gmail.com';
    $config['smtp_pass'] = 'P@Ssw0rd';  //sender's password
    $config['mailtype'] = 'html';
    $config['charset'] = 'utf-8';
    $config['wordwrap'] = 'TRUE';
    $config['smtp_crypto'] = 'tls';
    $config['newline'] = "\r\n";

    //$file_path = 'uploads/' . $file_name;
    $this->load->library('email', $config);
    $this->email->set_newline("\r\n");
    $this->email->from('infinityp.soft@gmail.com');
    $this->email->to($userEmail);
    $this->email->subject($subject);
    $this->email->message($message);
    $this->email->set_mailtype('html');

    if ($this->email->send() == true) {
      echo 'Done. Please confirm yourself in the email.';
    } else {
      echo 'There was an error confirming identity.';
    }
  }

  function forget_sendemail()
  {
    $this->load->view('options/header_login');
    $this->load->view('reset_mail');
    $this->load->view('options/footer');
  }

  public function reset_passwordProcess()
  {
    $id = $this->input->post('id');
    $forgot_password = $this->input->post('token');
    $new_password = $this->input->post('new_password');
    $confirm_new_password = $this->input->post('confirm_new_password');

    if ($id == "" || empty($id) || $forgot_password == "" || empty($forgot_password)) {
      echo "<script>";
      echo "alert('หมดเวลาสำหรับการกรอบรหัสผ่านใหม่แล้วค่ะ กรุณากลับไปกรอก E-mail ของท่านใหม่ที่หน้าลืมรหัสผ่านค่ะ');";
      echo "window.location='forget_step2?id=$id&forgot_password=$forgot_password';";
      echo "</script>";
    }

    if ($new_password != $confirm_new_password) {
      echo "<script>";
      echo "alert('New Password กับ Confirm New Password ไม่ตรงกันกรุณากรอกให้ตรงกันค่ะ');";
      echo "window.location='forget_step2?id=$id&forgot_password=$forgot_password';";
      echo "</script>";
    } else {
      $member = $this->db->get_where('tbl_user', ['id' => $id])->row_array();
      $dateTime_member = strtotime("+ 1 day", strtotime($member['time_forgot_password']));
      $dateTime_today = strtotime(date("Y-m-d H:i:s"));

      if ($dateTime_today >= $dateTime_member) {
        echo "<script>";
        echo "alert('หมดเวลาสำหรับการกรอบรหัสผ่านใหม่แล้วค่ะ กรุณากลับไปกรอก E-mail ของท่านใหม่ที่หน้าลืมรหัสผ่านค่ะ');";
        echo "window.location='forget_step2?id=$id&forgot_password=$forgot_password';";
        echo "</script>";
      }

      if ($member['forgot_password'] != $forgot_password) {
        echo "<script>";
        echo "alert('หมดเวลาสำหรับการกรอบรหัสผ่านใหม่แล้วค่ะ กรุณากลับไปกรอก E-mail ของท่านใหม่ที่หน้าลืมรหัสผ่านค่ะ');";
        echo "window.location='forget_step2?id=$id&forgot_password=$forgot_password';";
        echo "</script>";
      }
      $resultPassword = md5($confirm_new_password);

      $this->db->where('id', $id);
      $this->db->update('tbl_user', ['password' => $resultPassword]);

      echo "<script>";
      echo "alert('ยินดีด้วยค่ะ คุณตั้งค่ารหัสผ่านใหม่สำเร็จแล้วค่ะ');";
      echo "window.location='home';";
      echo "</script>";
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
