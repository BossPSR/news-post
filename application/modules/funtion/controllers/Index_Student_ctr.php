<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_Student_ctr extends CI_Controller {

	public function __construct()
  	{
		parent::__construct();
		
	}

	public function index_student()
	{
		if ($this->session->userdata('email') != '')
        {
			$data['user'] = $this->db->get_where('tbl_student',['email' => $this->session->userdata('email')])->row();
			if(empty($data['user'])){
				$this->load->view('login');
			}
			$data['rooms'] = $this->db->order_by('id', 'DESC')->get('tbl_rooms')->result_array();

			$this->load->view('option_student/header_student');
			$this->load->view('index_student',$data);
			$this->load->view('option_student/footer_student');
        }else{
            $this->load->view('login');
        }
		
	}

	public function detail_room_student()
	{
		if ($this->session->userdata('email') != '')
        {
			$data['room'] = $this->db->get_where('tbl_rooms',['id'=>$this->input->get('id')])->row();
			$data['type'] = $this->input->get('type');
			$this->load->view('option_student/header_student');
			$this->load->view('detail_room_student',$data);
			$this->load->view('option_student/footer_student');
        }else{
            $this->load->view('login');
        }
	}

	public function student_my_room()
	{
		if ($this->session->userdata('email') != '')
        {
			$data['user'] = $this->db->get_where('tbl_student',['email' => $this->session->userdata('email')])->row();
			if(empty($data['user'])){
				$this->load->view('login');
			}
			$data['rooms'] = $this->db->order_by('id', 'DESC')->get('tbl_rooms')->result_array();

			$this->load->view('option_student/header_student');
			$this->load->view('student_my_room',$data);
			$this->load->view('option_student/footer_student');
        }else{
            $this->load->view('login');
        }
	}

	public function profile_student()
	{
		if ($this->session->userdata('email') != '')
        {
			$data['user'] = $this->db->get_where('tbl_student',['email' => $this->session->userdata('email')])->row_array();
			$this->load->view('option_student/header_student');
			$this->load->view('profile_student',$data);
			$this->load->view('option_student/footer_student');
        }else{
            $this->load->view('login');
        }
	}

	public function edit_profile_student()
	{
		if ($this->session->userdata('email') != '')
        {
			$student = $this->db->get_where('tbl_student',['email' => $this->session->userdata('email')])->row();
            $data = array(
              'Frist_name'        => $this->input->post('first_name'),
              'last_name'         => $this->input->post('last_name'),
              'email'  => $this->input->post('email'),
			  'Public_code'  => $this->input->post('public_code'),
			  'codes'  => $this->input->post('codes')
            );
            $this->db->where('id',$student->id);
            $success = $this->db->update('tbl_student',$data);
    
            if($success > 0)
            {
              $this->session->set_flashdata('response','แก้ไขโปรไฟล์เรียบร้อยแล้ว');
            }else{
    
              $this->session->set_flashdata('msg','แก้ไขโปรไฟล์ไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
            }

			redirect('profile_student');
			
        }else{
            $this->load->view('login');
        }
	}

	public function edit_password_student()
    {
        if ($this->session->userdata('email') != '')
        {
            $password = $this->input->post('password');
            $newpassword = $this->input->post('newpassword');
            $confirmpassword = $this->input->post('confirmpassword');

            $student = $this->db->get_where('tbl_student',['email' => $this->session->userdata('email')])->row();
            $password = md5($password);
            if ($password != $student->password) {
                $this->session->set_flashdata('msg','รหัสผ่านเก่าของคุณไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง !!.');
                redirect('profile_student');
            }

            if ($newpassword != $confirmpassword) {
                $this->session->set_flashdata('msg','รหัสผ่านใหม่กับยืนยันรหัสผ่านใหม่ของคุณไม่ตรงกัน กรุณากรอกให้ตรงกัน !!.');
                redirect('profile_student');
            }

            $confirmpassword = md5($confirmpassword);

            $data = array(
              'password'        => $confirmpassword
            );
            $this->db->where('id',$student->id);
            $success = $this->db->update('tbl_student',$data);
    
            if($success > 0)
            {
              $this->session->set_flashdata('response','แก้ไขรหัสผ่านเรียบร้อยแล้ว');
            }else{
    
              $this->session->set_flashdata('msg','แก้ไขรหัสผ่านไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
            }

            redirect('profile_student');

        }else{
            $this->load->view('login');
        }
	}
	
	public function class_room_student()
	{
		if ($this->session->userdata('email') != '')
        {
			$id = $this->input->post('id');
			$password = $this->input->post('password');
			$student = $this->db->get_where('tbl_student',['email' => $this->session->userdata('email')])->row_array();
			$room = $this->db->get_where('tbl_rooms',['id' => $id])->row_array();

			//หาห้องเรียนไม่เจอ
			if (empty($room)) {
				$this->session->set_flashdata('msg','ไม่พบห้องเรียนนี้ กรุณาลองใหม่อีกครั้ง !!.');
				redirect('index_student');
			}

			//รหัสห้องเรียนผิด
			$room = $this->db->get_where('tbl_rooms',['id' => $id,'generate' => $password])->row_array();
			if (empty($room)) {
				$this->session->set_flashdata('msg','รหัสผ่านการเข้าห้องเรียนไม่ถูกต้อง กรุณาลองใหม่อีกครั้ง !!.');
				redirect('index_student');
			}

			//เข็คว่านักเรียนคนนี้เข้าไปแล้ว
			$student_room = $this->db->get_where('tbl_student_room',['room_id' => $id,'student_id' => $student['id']])->row_array();
			if (!empty($student_room)) {
				$this->session->set_flashdata('msg','คุณได้เข้าห้องเรียนไปแล้ว.');
				redirect('index_student');
			}

			//เช็คห้องเรียนว่าเต็มหรือยัง
			$student_roomAll = $this->db->get_where('tbl_student_room',['room_id' => $id])->result_array();
			$student_roomNum = count($student_roomAll);
			if ($student_roomNum >= $room['limit_room']) {
				$this->session->set_flashdata('msg','ห้องเรียนนี้เต็มแล้วค่ะ.');
				redirect('index_student');
			}

			//เข้าห้องเรียนสำเร็จ
			$data = [
				'student_id' => $student['id'],
				'room_id' => $id,
				'create_date' => date('Y-m-d'),
				'created_at' => date('Y-m-d H:i:s'),
				'updated_at' => date('Y-m-d H:i:s')
			];
			$success = $this->db->insert('tbl_student_room',$data);
			
			if($success > 0)
            {
              $this->session->set_flashdata('response','ยินดีด้วยคุณสามารถเข้าเรียนนี้ได้แล้วไปที่เมนู My Room ได้เลยค่ะ');
            }else{
    
              $this->session->set_flashdata('msg','เข้าเรียนนี้ไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
            }

            redirect('index_student');
			
        }else{
            $this->load->view('login');
        }
	}

	public function file_teacher_student()
	{
		if ($this->session->userdata('email') != '')
        {
			$student = $this->db->get_where('tbl_student',['email' => $this->session->userdata('email')])->row();
			$room = $this->db->get_where('tbl_rooms',['id'=> $this->input->get('id')])->row_array();
			if (empty($room)) {
				redirect('index_student');
			}
			$file = $this->db->get_where('tbl_file_teacher',['room_id' => $room['id']])->result_array();
			$data['room'] = $room;
			$data['file'] = $file;

			$this->load->view('option_student/header_student');
			$this->load->view('file_teacher_student',$data);
			$this->load->view('option_student/footer_student');
        }else{
            $this->load->view('login');
        }
	}

	public function downloadDocument()
    {

      if($this->session->userdata('email') != '')
      {
        $id = $this->input->get('id');
        
        if (!empty($id)) {
		  $myFile = $this->db->get_where('tbl_file_teacher',['id' => $id])->row();
          if (isset($myFile)) {
            $this->load->helper('download');
            force_download(FCPATH.$myFile->path.'/'.$myFile->file_name, null);
          }
        }
        redirect('file_teacher_student');
			
      }
      else
      {
      redirect('login');
      }

	}
	
	public function learning_student()
	{
		if ($this->session->userdata('email') != '')
        {
			$data['room'] = $this->db->get_where('tbl_rooms',['id'=>$this->input->get('id')])->row();
			$this->load->view('option_student/header_student');
			$this->load->view('learning',$data);
			$this->load->view('option_student/footer_student');
        }else{
            $this->load->view('login');
        }
	}

	public function home_work_student()
	{
		if ($this->session->userdata('email') != '')
        {
			$student = $this->db->get_where('tbl_student',['email' => $this->session->userdata('email')])->row();
			$data['student'] = $student;
			$data['room'] = $this->db->get_where('tbl_rooms',['id'=>$this->input->get('id')])->row();
			$data['box_home_work'] = $this->db->get_where('tbl_box_home_work',['room_id' => $this->input->get('id')])->result_array();
			$this->load->view('option_student/header_student');
			$this->load->view('home_work_student',$data);
			$this->load->view('option_student/footer_student');
        }else{
            $this->load->view('login');
        }
	}

	public function home_work_process()
	{
		if ($this->session->userdata('email') != '')
        {
				$student = $this->db->get_where('tbl_student',['email' => $this->session->userdata('email')])->row();
				$room = $this->db->get_where('tbl_rooms',['id'=> $this->input->post('room_id')])->row();
				$home_work_id = $this->input->post('home_work_id');

				if (empty($room)) {
					redirect('student_my_room');
				}
		
				$this->load->library('upload');
				$path = 'uploads/file/student/'.$student->id.'/room/'.$room->id.'/'.strtotime(date('Y-m-d H:i:s'));
				$config['upload_path'] = $path;
				$config['allowed_types'] = '*';
				$config['max_size']     = '200480';
				$config['max_width'] = '50000';
				$config['max_height'] = '50000';
		
				if(!is_dir($config['upload_path']))
				{
						mkdir($config['upload_path'],0777,true);
				}

			
				$this->upload->initialize($config);
			
					if ($_FILES['file_name']['name']) {
						if ($this->upload->do_upload('file_name')) {
							$gamber     = $this->upload->data();
							$data = array(
							'student_id'   => $student->id,
							'room_id'     => $this->input->post('room_id'),
							'file_name'   => $gamber['file_name'],
							'path'        => $path,
							'description' => $this->input->post('description'),
							'send_on'     => date('Y-m-d H:i:s'),
							'box_home_work_id' => $home_work_id,
							'create_date' => date('Y-m-d'),
							'created_at'  => date('Y-m-d H:i:s'),
							'updated_at'  => date('Y-m-d H:i:s')
							);				
							$success = $this->db->insert('tbl_home_work',$data);		
						}
					
					}
		
				
		
				
		
				if($success > 0)
				{
				$this->session->set_flashdata('response','ส่งการบ้านเรียบร้อยแล้ว');
				}else{
		
				$this->session->set_flashdata('msg','ส่งการบ้านไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
				}
				redirect('home_work_student?id='.$this->input->post('room_id'));
			
			

        }else{
            $this->load->view('login');
        }
	}

	public function delete_home_work()
	{
		if ($this->session->userdata('email') != '')
      {
        $student = $this->db->get_where('tbl_student',['email' => $this->session->userdata('email')])->row();
        $room = $this->db->get_where('tbl_rooms',['id'=> $this->input->get('room_id')])->row();

        if (empty($room)) {
            redirect('index');
        }

        $deletePath = $this->db->get_where('tbl_home_work',['id'=> $this->input->get('id')])->row_array();
        if (!empty($deletePath['path'])) {
          unlink('./'.$deletePath['path'].'/'.$deletePath['file_name']);
        }

        $this->db->where('id',$this->input->get('id'));
        $success = $this->db->delete('tbl_home_work');

        if($success > 0)
        {
          $this->session->set_flashdata('response','ลบการบ้านเรียนเรียบร้อยแล้ว');
        }else{

          $this->session->set_flashdata('msg','ลบการบ้านเรียนไม่สำเร็จ กรุณาลองใหม่อีกครั้ง !!.');
        }
         
          redirect('home_work_student?id='.$this->input->get('room_id'));

      }else{
        $this->load->view('login');
      }
	}

	public function downloadHomework()
    {

      if($this->session->userdata('email') != '')
      {
        $id = $this->input->get('id');
        
        if (!empty($id)) {
		  $myFile = $this->db->get_where('tbl_home_work',['id' => $id])->row();
          if (isset($myFile)) {
            $this->load->helper('download');
            force_download(FCPATH.$myFile->path.'/'.$myFile->file_name, null);
          }
        }
        redirect('file_teacher_student');
			
      }
      else
      {
      redirect('login');
      }

	}

}
