<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transfer_history_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Transfer_model');
    }

    public function index()
    {
        $session                    = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
        $userId                     = $session['id_user'];
        $data['money']              = $this->Transfer_model->transfer($userId);

        if (empty($session)) {
            redirect('index');
        } else {
            $this->load->view('option/header');
            $this->load->view('transfer_history', $data);
            $this->load->view('option/footer');
        }
    }

    public function transfer_insert()
    {
        $user_id  = $this->input->post('user_id');
        $email    = $this->input->post('email');
        $order    = $this->input->post('order');
        $bank     = $this->input->post('bank');
        $date     = $this->input->post('date');
        $time     = $this->input->post('time');
        $money    = $this->input->post('money');
        $textarea = $this->input->post('textarea');

        $this->load->library('upload');
        // |xlsx|pdf|docx
        $config['upload_path'] = 'uploads/bank';
        $config['allowed_types'] = '*';
        $config['max_size']     = '200480';
        $config['max_width'] = '5000';
        $config['max_height'] = '5000';
        $name_file = "image-" . time();
        $config['file_name'] = $name_file;

        $this->upload->initialize($config);

        $data = array();

        if ($_FILES['file_name']['name']) {
            if ($this->upload->do_upload('file_name')) {

                $gamber     = $this->upload->data();

                $data = array(
                    'file_name'      => $gamber['file_name'],
                    'bank'           => $bank ,
                    'date_trade'     => $date ,
                    'time_trade'     => $time,
                    'money'          => $money,
                    'note'           => $textarea,
                    'updated_at'     => date('Y-m-d H:i:s'),
                );
                           $this->db->where('order_id', $order);
                $success = $this->db->update('tbl_transfer', $data);
                if ($success > 0) {
                    $this->session->set_flashdata('responseH', TRUE);
                    return redirect('transfer');
                } else {
                    $this->session->set_flashdata('msgH', TRUE);
                    return redirect('transfer');
                }

            }
        }
    }
}
