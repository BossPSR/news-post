<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dynamic_dependent_model');
    }

    public function index()
    {
      
        if ($this->session->userdata('code_student') != '') {
            $data['list'] = $this->Dynamic_dependent_model->list();
            $this->load->view('option/header');
            $this->load->view('index',$data);
            $this->load->view('option/footer'); 
        } else {
            $this->load->view('login');
        }
          
        
    }

    public function user()
    {
      
        if ($this->session->userdata('code_student') != '') {


            $data['user'] = $this->db->get_where('tbl_user',['is_admin'=> 4])->result_array();

            $this->load->view('option/header');
            $this->load->view('user',$data);
            $this->load->view('option/footer'); 
        } else {
            $this->load->view('login');
        }
          
        
    }
    public function user_student()
    {
      
        if ($this->session->userdata('code_student') != '') {


            $data['user'] = $this->db->get_where('tbl_user',['is_admin'=> 3])->result_array();

            $this->load->view('option/header');
            $this->load->view('user_student',$data);
            $this->load->view('option/footer'); 
        } else {
            $this->load->view('login');
        }
          
        
    }

    public function user_teacher()
    {
      
        if ($this->session->userdata('code_student') != '') {


            $data['user'] = $this->db->get_where('tbl_user',['is_admin'=> 2])->result_array();

            $this->load->view('option/header');
            $this->load->view('user_teacher',$data);
            $this->load->view('option/footer'); 
        } else {
            $this->load->view('login');
        }
          
        
    }


    public function user_edit()
    {
      
        if ($this->session->userdata('code_student') != '') {

            $data['user'] = $this->db->get('tbl_user')->result_array();

            $this->load->view('option/header');
            $this->load->view('user_edit',$data);
            $this->load->view('option/footer'); 
        } else {
            $this->load->view('login');
        }
          
        
    }

    
    public function user_student_edit()
    {
      
        if ($this->session->userdata('code_student') != '') {

            $data['user'] = $this->db->get('tbl_user')->result_array();

            $this->load->view('option/header');
            $this->load->view('user_student_edit',$data);
            $this->load->view('option/footer'); 
        } else {
            $this->load->view('login');
        }
          
        
    }

    public function user_teacher_edit()
    {
      
        if ($this->session->userdata('code_student') != '') {

            $data['user'] = $this->db->get('tbl_user')->result_array();

            $this->load->view('option/header');
            $this->load->view('user_teacher_edit',$data);
            $this->load->view('option/footer'); 
        } else {
            $this->load->view('login');
        }
          
        
    }


    public function user_student_edit_com()
    {

       $id = $this->input->post('id');

        $data = array(

            'email'         => $this->input->post('email'),
            'phone'   => $this->input->post('phone'),
            'username'   => $this->input->post('username'),
            'code_student'   => $this->input->post('code_student'),
            'board'   => $this->input->post('board'),
            'subject'   => $this->input->post('subject'),
            'branch'   => $this->input->post('branch'),
            'created_at'     => date('Y-m-d H:i:s')

        );
                        $this->db->where('id', $id);
        $resultsedit = $this->db->update('tbl_user', $data);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', 'Successfully แก้ไขข้อมูลผู้ใช้งานเรียบร้อยแล้ว !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully ไม่สามารถแก้ไขข้อมูลผู้ใช้งานได้ !!.');
        }
        return redirect('user_student');
    }

    public function user_teacher_edit_com()
    {

       $id = $this->input->post('id');

        $data = array(

            'email'         => $this->input->post('email'),
            'phone'   => $this->input->post('phone'),
            'username'   => $this->input->post('username'),
            'code_student'   => $this->input->post('code_student'),
            'board'   => $this->input->post('board'),
            'subject'   => $this->input->post('subject'),
            'branch'   => $this->input->post('branch'),
            'created_at'     => date('Y-m-d H:i:s')

        );
                        $this->db->where('id', $id);
        $resultsedit = $this->db->update('tbl_user', $data);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', 'Successfully แก้ไขข้อมูลผู้ใช้งานเรียบร้อยแล้ว !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully ไม่สามารถแก้ไขข้อมูลผู้ใช้งานได้ !!.');
        }
        return redirect('user_teacher');
    }

    public function user_edit_com()
    {

       $id = $this->input->post('id');

        $data = array(

            'email'         => $this->input->post('email'),
            'phone'   => $this->input->post('phone'),
            'username'   => $this->input->post('username'),
            'created_at'     => date('Y-m-d H:i:s')

        );
                        $this->db->where('id', $id);
        $resultsedit = $this->db->update('tbl_user', $data);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', 'Successfully แก้ไขข้อมูลผู้ใช้งานเรียบร้อยแล้ว !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully ไม่สามารถแก้ไขข้อมูลผู้ใช้งานได้ !!.');
        }
        return redirect('user');
    }


    public function status()
    {
        $id = $this->input->get('id');
        $status = $this->input->get('status');

        $this->db->where('id', $id);
        $resultsedit = $this->db->update('tbl_user', ['is_admin' => $status]);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', ' Successfully แก้ไขสถานะเรียบร้อยแล้ว !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully ไม่สามารถแก้ไขได้ !!.');
        }
        return redirect('user');
    }

    public function status_student()
    {
        $id = $this->input->get('id');
        $status = $this->input->get('status');

        $this->db->where('id', $id);
        $resultsedit = $this->db->update('tbl_user', ['is_admin' => $status]);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', ' Successfully แก้ไขสถานะเรียบร้อยแล้ว !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully ไม่สามารถแก้ไขได้ !!.');
        }
        return redirect('user_student');
    }

    public function status_teacher()
    {
        $id = $this->input->get('id');
        $status = $this->input->get('status');

        $this->db->where('id', $id);
        $resultsedit = $this->db->update('tbl_user', ['is_admin' => $status]);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', ' Successfully แก้ไขสถานะเรียบร้อยแล้ว !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully ไม่สามารถแก้ไขได้ !!.');
        }
        return redirect('user_teacher');
    }


    public function  delete_user()
    {
        $id = $this->input->get('id');
       

        $this->db->where('id', $id);
        $resultsedit = $this->db->delete('tbl_user', ['id' => $id]);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', ' Successfully  ลบข้อมูลเรียบร้อยแล้ว  !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully  ไม่สามารถลบข้อมูลได้ !!.');
        }
        return redirect('user');
    }

    public function  delete_user_student()
    {
        $id = $this->input->get('id');
       

        $this->db->where('id', $id);
        $resultsedit = $this->db->delete('tbl_user', ['id' => $id]);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', ' Successfully  ลบข้อมูลเรียบร้อยแล้ว  !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully  ไม่สามารถลบข้อมูลได้ !!.');
        }
        return redirect('user_student');
    }


    
    public function  delete_user_teacher()
    {
        $id = $this->input->get('id');
       

        $this->db->where('id', $id);
        $resultsedit = $this->db->delete('tbl_user', ['id' => $id]);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', ' Successfully  ลบข้อมูลเรียบร้อยแล้ว  !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully  ไม่สามารถลบข้อมูลได้ !!.');
        }
        return redirect('user_teacher');
    }

    public function board()
    {
        $data = array(

            'board_name'   => $this->input->post('board_name'),
            'create_at'     => date('Y-m-d H:i:s')

        );
                      
        $resultsedit = $this->db->insert('tbl_board', $data);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', 'Successfully เพิ่มข้อมูลคณะเรียบร้อยแล้ว !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully ไม่สามารถเพิ่มข้อมูคณะได้ !!.');
        }
        return redirect('index');
    }

    
    public function board_edit()
    {
        $id = $this->input->post('id');

        $data = array(

            'board_name'   => $this->input->post('board_name'),
            'create_at'     => date('Y-m-d H:i:s')

        );
                        $this->db->where('id', $id);
        $resultsedit = $this->db->update('tbl_board', $data);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', 'Successfully แก้ไขข้อมูลคณะเรียบร้อยแล้ว !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully ไม่สามารถเพิ่มข้อมูคณะได้ !!.');
        }
        return redirect('index');
    }

    public function  delete_board_edit()
    {
        $id = $this->input->get('id');
       

        $this->db->where('id', $id);
        $resultsedit = $this->db->delete('tbl_board', ['id' => $id]);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', ' Successfully  ลบข้อมูลเรียบร้อยแล้ว  !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully  ไม่สามารถลบข้อมูลได้ !!.');
        }
        return redirect('index');
    }
    
    public function subject()
    {
        $data = array(

            'subject_name'   => $this->input->post('subject_name'), 
            'board_id'   => $this->input->post('board_id'),
            'create_at'     => date('Y-m-d H:i:s')

        );
                      
        $resultsedit = $this->db->insert('tbl_subject', $data);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', 'Successfully เพิ่มข้อมูลโปรแกรมวิชาเรียบร้อยแล้ว !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully ไม่สามารถเพิ่มข้อมูโปรแกรมวิชาได้ !!.');
        }
        return redirect('index');
    }

    public function subject_edit()
    {
        $id = $this->input->post('id');

        $data = array(

            'subject_name'   => $this->input->post('subject_name'), 
            'create_at'     => date('Y-m-d H:i:s')

        );
                        $this->db->where('id', $id);
        $resultsedit = $this->db->update('tbl_subject', $data);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', 'Successfully แก้ไขข้อมูลโปรแกรมวิชาเรียบร้อยแล้ว !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully ไม่สามารถแก้ไขข้อมูลโปรแกรมวิชาได้ !!.');
        }
        return redirect('index');
    }

    public function  delete_subject_edit()
    {
        $id = $this->input->get('id');
       

        $this->db->where('id', $id);
        $resultsedit = $this->db->delete('tbl_subject', ['id' => $id]);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', ' Successfully  ลบข้อมูลเรียบร้อยแล้ว  !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully  ไม่สามารถลบข้อมูลได้ !!.');
        }
        return redirect('index');
    }

    public function branch()
    {
        $data = array(

            'subject_id'   => $this->input->post('subject_id'), 
            'board_id'   => $this->input->post('board_id'),
            'branch_name'   => $this->input->post('branch_name'),
            'create_at'     => date('Y-m-d H:i:s')

        );
                      
        $resultsedit = $this->db->insert('tbl_branch', $data);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', 'Successfully เพิ่มข้อมูลสาขาวิชาเรียบร้อยแล้ว !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully ไม่สามารถเพิ่มข้อมูลสาขาวิชาได้ !!.');
        }
        return redirect('index');
    }

    
    public function branch_edit()
    {
        $id = $this->input->post('id');

        $data = array(

            'branch_name'   => $this->input->post('branch_name'), 
            'create_at'     => date('Y-m-d H:i:s')

        );
                        $this->db->where('id', $id);
        $resultsedit = $this->db->update('tbl_branch', $data);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', 'Successfully แก้ไขข้อมูลสาขาวิชาเรียบร้อยแล้ว !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully ไม่สามารถแก้ไขข้อมูลสาขาวิชาได้ !!.');
        }
        return redirect('index');
    }

   

    public function  delete_branch_edit()
    {
        $id = $this->input->get('id');
       

        $this->db->where('id', $id);
        $resultsedit = $this->db->delete('tbl_branch', ['id' => $id]);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', ' Successfully  ลบข้อมูลเรียบร้อยแล้ว  !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully  ไม่สามารถลบข้อมูลได้ !!.');
        }
        return redirect('index');
    }
}
