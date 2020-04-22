<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transfer_controller extends CI_Controller
{

    public function list_transfer()
    {
        $admin = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username'), 'status' => 1])->row_array();
        $data['admin'] = $admin;
        if ($admin == true) {
            $data['transfer'] = $this->db->get('tbl_transfer')->result_array();
            $this->load->view('list_transfer', $data);
        } else {
            $this->session->set_flashdata('dont_click', TRUE);
            redirect('Login');
        }
    }

    public function Notification()
    {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        $user_id = $this->input->get('user_id');

       
        $data = array(


            'status'                            => $status,
            'updated_at'                        => date('Y-m-d H:i:s')

        );
        $this->db->where('transfer_id', $id);
       $resultsedit = $this->db->update('tbl_transfer', $data);


      
        if ($resultsedit > 0) {

            $user_see = $this->db->get_where('tbl_user',['id_user'=> $user_id])->row_array();
            $user_app = $this->db->get_where('tbl_transfer',['transfer_id'=> $id])->row_array();
            $new = $user_see['point']+ $user_app['credit'];

            $data = array(


            'point'                               => $new,
            'update_times'                        => date('Y-m-d H:i:s')

        );
        $this->db->where('id_user', $user_id);
       $resultsedit = $this->db->update('tbl_user', $data);


            $this->session->set_flashdata('save_ss2', 'เปลี่ยนสถานะเสร็จสิ้น');
        } else {
            $this->session->set_flashdata('del_ss2', 'ไม่สามรถเปลี่ยนสถานะได้เสร็จสิ้น');
        }
        return redirect('list_transfer');
    }

    





    






    
}