<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Order_controller extends CI_Controller
{


    public function main_order()
    {
        $admin = $this->db->get_where('tbl_admin', ['username' => $this->session->userdata('username'), 'status' => 1])->row_array();
        $data['admin'] = $admin;
        if ($admin == true) {

            $this->load->view('main_order', $data);
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
            $data['advertise'] = $this->db->get('tbl_advertise')->result_array();
            $this->load->view('list_order', $data);
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
            $this->load->view('list_order_pdf', $data);
        } else {
            $this->session->set_flashdata('dont_click', TRUE);
            redirect('Dashboard');
        }
    }

    private function set_upload_options()
    {
        $config = array();
        $config['upload_path'] = '../uploads/pdf';
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['allowed_types'] = 'gif|jpg|png|JPEG|jpeg';
        $config['max_size'] = '2097152';
        $config['overwrite'] = FALSE;
        $name_file = "img-" . time();
        $config['file_name'] = $name_file;
        return $config;
    }

    public function pdf_add_com()
    {
        $topicfile  = $this->input->post('topic');

        if ($topicfile == 'แบบไฟล์PDF') {

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

                        'topic'         => $this->input->post('topic'),
                        'date'          => $this->input->post('date'),
                        'file_name'     => $gamber['file_name'],
                        'created_at'    => date('Y-m-d H:i:s'),

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
        } else {

            $this->load->library('upload');
            $dataInfo = array();
            $image = array();
            $files = $_FILES;
            $cpt = count($_FILES['fileimage']['name']);
            $error = [];

            for ($i = 0; $i < $cpt; $i++) {
                $_FILES['fileimage']['name']        = $files['fileimage']['name'][$i];
                $_FILES['fileimage']['type']        = $files['fileimage']['type'][$i];
                $_FILES['fileimage']['tmp_name']    = $files['fileimage']['tmp_name'][$i];
                $_FILES['fileimage']['error']       = $files['fileimage']['error'][$i];
                $_FILES['fileimage']['size']        = $files['fileimage']['size'][$i];

                $this->upload->initialize($this->set_upload_options());
                $this->upload->do_upload('fileimage');
                $dataInfo[] = $this->upload->data();

                $image[] = array(
                    'topic'         => $topicfile,
                    'date'          => $this->input->post('dateimg'),
                    'file_name'     => $dataInfo[$i]['file_name'],
                    'created_at'    => date('Y-m-d H:i:s')
                );

                if (!$this->upload->do_upload('userfile')) {
                    $error[] =  $this->upload->display_errors();
                }
            }

            //outside for loop

            if (!empty($uploaded)) {
                echo explode('<br>', $error);
            } else {
                $this->db->insert_batch('tbl_pdf', $image);
                $this->session->set_flashdata('responsepdf', TRUE);
                redirect('List_order_pdf');
            }
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


                    'topic'     => $this->input->post('topic'),
                    'date'     => $this->input->post('date'),
                    'file_name'     => $gamber['file_name'],
                    'update_at'     => date('Y-m-d H:i:s')


                );
                $this->db->where('id', $id);
                $resultsedit = $this->db->update('tbl_pdf', $data);
            }
        } else {
            $data = array(


                'topic'     => $this->input->post('topic'),
                'date'     => $this->input->post('date'),
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

    public function  delete_template()
    {
        $id = $this->input->get('id');


        $this->db->where('advertise_id', $id);
        $resultsedit = $this->db->delete('tbl_advertise', ['advertise_id' => $id]);

        if ($resultsedit > 0) {
            $this->session->set_flashdata('save_ss2', ' ลบข้อมูล template สำเร็จ !!.');
        } else {
            $this->session->set_flashdata('del_ss2', 'ลบข้อมูล template ไม่สำเร็จ');
        }
        return redirect('List-Order');
    }

    public function textarea()
    {
        
        echo mb_ereg_replace('\n','<br>',$this->input->get('data'));

    }

    public function insert_ads()
    {
        
        if ($this->session->userdata('username') != '') {

            $topic = $this->input->post('topic');

            if ($topic == 'ประกาศเลิกบริษัท') {

                $data = array(
                    'topic'             => $this->input->post('topic'),
                    'company_name'      => $this->input->post('companyฺB'),
                    'tax'               => $this->input->post('TaxpayerB'),
                    'meeting'           => $this->input->post('meetingB'),
                    'out_date'          => $this->input->post('dissolveB'),
                    'meeting_place'     => $this->input->post('addressB'),
                    'post_date'         => $this->input->post('postB'),
                    'name_surname'      => $this->input->post('signerB'),
                    'position'          => $this->input->post('positionB'),
                    'id_user'           => 'Admin',
                    'status'            => 1,
                    'created_at'        => date('Y-m-d H:i:s'),
                );
                $success = $this->db->insert('tbl_advertise', $data);
                if ($success > 0) {
                    $this->session->set_flashdata('save_ss2', 'บันทึกการลง template เรียบร้อยแล้ว !!.');
                    redirect('List-Order');
                } else {
                    $this->session->set_flashdata('del_ss2', 'ล้มเหลวในการบันทึก กรุณาลองใหม่อีกครั้ง');
                    redirect('List-Order');
                }
            } elseif ($topic == 'ประกาศจ่ายเงินปันผล') {

                $data = array(
                    'topic'             => $this->input->post('topic'),
                    'company_name'      => $this->input->post('companyC'),
                    'meeting'           => $this->input->post('meetingC'),
                    'announcement_to'   => $this->input->post('announcementC'),
                    'meeting_date'      => $this->input->post('meetingDateC'),
                    'meeting_time'      => $this->input->post('meetingTimeC'),
                    'meeting_place'     => $this->input->post('addressC'),
                    'stock_appove'      => $this->input->post('approveC'),
                    'all_shares'        => $this->input->post('allshares'),
                    'dividend'          => $this->input->post('moneyC'),
                    'reserve'           => $this->input->post('reserveC'),
                    'dividend_payment'  => $this->input->post('paymentC'),
                    'post_date'         => $this->input->post('dateC'),
                    'name_surname'      => $this->input->post('signerC'),
                    'position'          => $this->input->post('positionC'),
                    'id_user'           => 'Admin',
                    'status'            => 1,
                    'created_at'        => date('Y-m-d H:i:s'),
                );
                $success = $this->db->insert('tbl_advertise', $data);
                if ($success > 0) {
                    $this->session->set_flashdata('save_ss2', 'บันทึกการลง template เรียบร้อยแล้ว !!.');
                    redirect('List-Order');
                } else {
                    $this->session->set_flashdata('del_ss2', 'ล้มเหลวในการบันทึก กรุณาลองใหม่อีกครั้ง');
                    redirect('List-Order');
                }
            } else {

                $data = array(
                    'topic'             => $this->input->post('topic'),
                    'agenda'            => $this->input->post('agendaA'),
                    'company_name'      => $this->input->post('companyA'),
                    'meeting'           => $this->input->post('meetingA'),
                    'announcement_to'   => $this->input->post('announceA'),
                    'meeting_date'      => $this->input->post('announcedateA'),
                    'meeting_time'      => $this->input->post('timeA'),
                    'meeting_place'     => $this->input->post('placeA'),
                    'post_date'         => $this->input->post('advertisementA'),
                    'name_surname'      => $this->input->post('signA'),
                    'position'          => $this->input->post('positionA'),
                    'id_user'           => 'Admin',
                    'status'            => 1,
                    'created_at'        => date('Y-m-d H:i:s'),
                );
                $success = $this->db->insert('tbl_advertise', $data);
                if ($success > 0) {
                    $this->session->set_flashdata('save_ss2', 'บันทึกการลง template เรียบร้อยแล้ว !!.');
                    redirect('List-Order');
                } else {
                    $this->session->set_flashdata('del_ss2', 'ล้มเหลวในการบันทึก กรุณาลองใหม่อีกครั้ง');
                    redirect('List-Order');
                }
            }

        } else {
            $this->session->set_flashdata('del_ss2', 'ล้มเหลวในการบันทึก กรุณาลองใหม่อีกครั้ง');
            redirect('List-Order');
        }
    }

}
