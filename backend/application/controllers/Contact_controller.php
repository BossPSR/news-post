<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Contact_controller extends CI_Controller
{

    public function list_Contact()
    {
        $admin = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username'), 'status' => 1])->row_array();
        $data['admin'] = $admin;
        if ($admin == true) {
            $data['contact'] = $this->db->get('tbl_contact')->result_array();
            $this->load->view('contact', $data);
        } else {
            $this->session->set_flashdata('dont_click', TRUE);
            redirect('Dashboard');
        }
    }

    
    public function list_Contact_us()
    {
        $admin = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username'), 'status' => 1])->row_array();
        $data['admin'] = $admin;
        if ($admin == true) {
            $data['contact_us'] = $this->db->get('tbl_contact_us')->result_array();
            $this->load->view('list_contact_us', $data);
        } else {
            $this->session->set_flashdata('dont_click', TRUE);
            redirect('Dashboard');
        }
    }


    public function contact_us_com()
    {
       
                $data = array(

                    'topic'     => $this->input->post('topic') ,
                    'message'     => $this->input->post('message') ,
                    'create_times'     => date('Y-m-d H:i:s') ,
                  
                );
                $resultsedit = $this->db->insert('tbl_contact_us', $data);
                if ($resultsedit > 0) {
                    $this->session->set_flashdata('save_ss2', 'Successfully เพื่ม คำถามที่พบบ่อย information !!.');
                } else {
                    $this->session->set_flashdata('del_ss2', 'Not Successfully เพื่ม คำถามที่พบบ่อย information');
                }
            
            
           return redirect('List_Contact_us');
        
       
    
    }

    public function contact_us_edit()
    {
        $id = $this->input->post('id');

                $data = array(

                    'topic'     => $this->input->post('topic') ,
                    'message'     => $this->input->post('message') ,
                    'create_times'     => date('Y-m-d H:i:s') ,
                  
                );

                               $this->db->where('id',$id);
                $resultsedit = $this->db->update('tbl_contact_us', $data);
                if ($resultsedit > 0) {
                    $this->session->set_flashdata('save_ss2', 'Successfully แก้ไข คำถามที่พบบ่อย information !!.');
                } else {
                    $this->session->set_flashdata('del_ss2', 'Not Successfully แก้ไข คำถามที่พบบ่อย information');
                }
            
            
           return redirect('List_Contact_us');
        
       
    
    }

    public function  delete_contact_us()
    {
        $id = $this->input->get('id');
       

        $this->db->where('id', $id);
        $resultsedit = $this->db->delete('tbl_contact_us', ['id' => $id]);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', ' Successfully delete คำถามที่พบบ่อย information !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully delete คำถามที่พบบ่อย information');
        }
        return redirect('List_Contact_us');
    }










    
}