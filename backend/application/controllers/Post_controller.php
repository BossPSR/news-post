<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post_controller extends CI_Controller
{

    public function list_post()
    {
        $admin = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username'), 'status' => 1])->row_array();
        $data['admin'] = $admin;
        if ($admin == true) {
            $data['post'] = $this->db->get('tbl_post')->result_array();
            $this->load->view('list_post', $data);
        } else {
            $this->session->set_flashdata('dont_click', TRUE);
            redirect('Dashboard');
        }
    }

    public function post_add_com()
    {

        $this->load->library('upload');

        // |xlsx|pdf|docx
        $config['upload_path'] = '../uploads/Post';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
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
                    'details'     => $this->input->post('details') ,
                    'file_name'     => $gamber['file_name'] ,
                    'created_at'     => date('Y-m-d H:i:s') ,
                  
                );
                $resultsedit = $this->db->insert('tbl_post', $data);
                if ($resultsedit > 0) {
                    $this->session->set_flashdata('save_ss2', 'Successfully Add post information !!.');
                } else {
                    $this->session->set_flashdata('del_ss2', 'Not Successfully Add post information');
                }
            } 
            
           return redirect('List-Post');
        }
       
    
    }



    






    
}