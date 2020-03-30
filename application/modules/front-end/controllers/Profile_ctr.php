<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
	}

	public function profile()
    {
        $id   	= $this->input->post('id');
        $Password   = $this->input->post('Password');
        $CPassword  = $this->input->post('CPassword');

        if (empty($Password) || empty($CPassword)) 
        {
        	$data = array
		        (
		          
		        );
		  
		        $this->db->where('id',$id );
		        $succeed = $this->db->update('tbl_admin', $data);
		        if($succeed > 0)
		        {
		            $this->session->set_flashdata('response','แก้ไขข้อมูลเรียบรร้อย !!');
		            redirect('Account');
		        }
		        else
		        {
		            $this->session->set_flashdata('msg','เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง !!');
		            redirect('Account');
		        }
        }
        else
        {

        	 if ($Password != $CPassword) 
	        {
	        	$this->session->set_flashdata('msg','รหัสผ่านไม่ตรงกัน กรุณาลองใหม่อีกครั้ง !!');
		        redirect('Myuser');
	        }
	        else
	        {

	        	$data = array
		        (
		          
		          'password'        => md5($Password) 
		        );
		  
				$id   	= $this->input->post('id');
		        $succeed = $this->db->update('tbl_admin', $data);
		        if($succeed > 0)
		        {
		            $this->session->set_flashdata('response','แก้ไขข้อมูลเรียบรร้อย !!');
		            redirect('Account');
		        }
		        else
		        {
		            $this->session->set_flashdata('msg','เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง !!');
		            redirect('Account');
		        }

	        }


        }

	}
	
	public function profile_all()
	{
		if ($this->session->userdata('code_student') != '') {

			$data['user'] = $this->db->get_where('tbl_user', ['code_student' => $this->session->userdata('code_student')])->row_array();

            $this->load->view('option/header');
            $this->load->view('profile',$data);
            $this->load->view('option/footer'); 
        } else {
            $this->load->view('login');
        }
	}

}
