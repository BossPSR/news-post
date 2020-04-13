<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_controller extends CI_Controller
{


    public function main_order()
    {
        $admin = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username'), 'status' => 1])->row_array();
        $data['admin'] = $admin;
        if ($admin == true) {
           
            $this->load->view('main_order',$data);
        } else {
            $this->session->set_flashdata('dont_click', TRUE);
            redirect('Dashboard');
        }
    }
    public function list_order()
    {
        $admin = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username'), 'status' => 1])->row_array();
        $data['admin'] = $admin;
        if ($admin == true) {
           
            $this->load->view('list_order',$data);
        } else {
            $this->session->set_flashdata('dont_click', TRUE);
            redirect('Dashboard');
        }
    }

    public function list_order_pdf()
    {
        $admin = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username'), 'status' => 1])->row_array();
        $data['admin'] = $admin;
        if ($admin == true) {
            $data['pdf'] = $this->db->get('tbl_pdf')->result_array();
            $this->load->view('list_order_pdf',$data);
        } else {
            $this->session->set_flashdata('dont_click', TRUE);
            redirect('Dashboard');
        }
    }

    public function pdf_add_com()
    {

        $this->load->library('upload');

        // |xlsx|pdf|docx
        $config['upload_path'] = '../uploads/pdf';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
        $config['max_size']     = '200480';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $name_file = "Post-" . time();
        $config['file_name'] = $name_file;

        $this->upload->initialize($config);

        $data = array();

        if ($_FILES['file_name']['name']) {
            if ($this->upload->do_upload('file_name')) {

                $gamber     = $this->upload->data();
                $data = array(

                    'topic'     => $this->input->post('topic') ,
                    'date'     => $this->input->post('date') ,
                    'file_name'     => $gamber['file_name'] ,
                    'created_at'     => date('Y-m-d H:i:s') ,
                  
                );
                $resultsedit = $this->db->insert('tbl_pdf', $data);
                if ($resultsedit > 0) {
                    $this->session->set_flashdata('save_ss2', 'Successfully เพื่ม pdf และ รูปภาพ information !!.');
                } else {
                    $this->session->set_flashdata('del_ss2', 'Not Successfully เพื่ม pdf และ รูปภาพ information');
                }
            } 
            
           return redirect('List_order_pdf');
        }
       
    
    }

    public function pdf_edit_com()
    {

         $id =  $this->input->post('id');

        $this->load->library('upload');

        // |xlsx|pdf|docx
        $config['upload_path'] = '../uploads/pdf';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size']     = '200480';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $name_file = "poster-" . time();
        $config['file_name'] = $name_file;

        $this->upload->initialize($config);

        $data = array();

       
        if ($_FILES['file_name']['name']) {
            if ($this->upload->do_upload('file_name')) {

                $gamber     = $this->upload->data();
                $data = array(


                    'topic'     => $this->input->post('topic') ,
                    'date'     => $this->input->post('date') ,
                    'file_name'     => $gamber['file_name'] ,
                    'update_at'     => date('Y-m-d H:i:s')
                  

                );
                $this->db->where('id', $id);
                $resultsedit = $this->db->update('tbl_pdf', $data);
            }
        } else {
            $data = array(

              
                'topic'     => $this->input->post('topic') ,
                'date'     => $this->input->post('date') ,
                'update_at'     => date('Y-m-d H:i:s')


            );

            $this->db->where('id', $id);
            $resultsedit = $this->db->update('tbl_pdf', $data);
        }


        
        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', 'Successfully แก้ไข pdf/และรูปภาพ information !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully แก้ไข pdf/และรูปภาพ information');
        }
        return redirect('List_order_pdf');
    }

    public function  delete_pdf()
    {
        $id = $this->input->get('id');
       

        $this->db->where('id', $id);
        $resultsedit = $this->db->delete('tbl_pdf', ['id' => $id]);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', ' Successfully ลบ pdf/และรูปภาพ information !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'Not Successfully ลบ pdf/และรูปภาพ information');
        }
        return redirect('List_order_pdf');
    }


    



    






    
}
