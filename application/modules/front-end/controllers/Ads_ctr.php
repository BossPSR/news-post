<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ads_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('option/header');
        $this->load->view('ads');
        $this->load->view('option/footer');
    }

    public function insert_ads()
    {
        
        if ($this->session->userdata('email') != '') {+
            $user = $this->db->get_where('tbl_user',['email' => $this->session->userdata('email')])->row_array();
            
            $dateYa         = date('Y-m-d');
            $dateYa_ex      = explode('-',$dateYa);
            $topic          = $this->input->post('topic');
            
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
                    'created_at'        => date('Y-m-d H:i:s'),
                );
                $success = $this->db->insert('tbl_advertise', $data);
                $first   = $this->db->insert_id();
                            
                if ($success > 0) {
                    $update = array(
                        'id_order' => $dateYa_ex[0].''.$dateYa_ex[1].$first
                    );
                    $this->db->where('advertise_id', $first);
                    $this->db->update('tbl_advertise', $update);
                    
                    $this->session->set_flashdata('responseA', TRUE);
                    redirect('ads');
                } else {
                    $this->session->set_flashdata('msgA', TRUE);
                    redirect('ads');
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
                    'created_at'        => date('Y-m-d H:i:s'),
                );
                $success = $this->db->insert('tbl_advertise', $data);
                if ($success > 0) {
                    $update = array(
                        'id_order' => $dateYa_ex[0].''.$dateYa_ex[1].$first
                    );
                    $this->db->where('advertise_id', $first);
                    $this->db->update('tbl_advertise', $update);

                    $this->session->set_flashdata('responseA', TRUE);
                    redirect('ads');
                } else {
                    $this->session->set_flashdata('msgA', TRUE);
                    redirect('ads');
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
                    'created_at'        => date('Y-m-d H:i:s'),
                );
                $success = $this->db->insert('tbl_advertise', $data);
                if ($success > 0) {
                    $update = array(
                        'id_order' => $dateYa_ex[0].''.$dateYa_ex[1].$first
                    );
                    $this->db->where('advertise_id', $first);
                    $this->db->update('tbl_advertise', $update);

                    $this->session->set_flashdata('responseA', TRUE);
                    redirect('ads');
                } else {
                    $this->session->set_flashdata('msgA', TRUE);
                    redirect('ads');
                }
            }

        } else {
            $this->session->set_flashdata('check_login', TRUE);
            redirect('ads');
        }
    }

    private function set_upload_options()
    {
        $config = array();
        $config['upload_path'] = 'uploads/pdf';
        $config['remove_spaces'] = TRUE;
        $config['encrypt_name'] = TRUE;
        $config['allowed_types'] = 'gif|jpg|png|JPEG|jpeg';
        $config['max_size'] = '2097152';
        $config['overwrite'] = FALSE;
        $name_file = "img-" . time();
        $config['file_name'] = $name_file;
        return $config;
    }

    public function insert_ads_pdf()
    {
        if ($this->session->userdata('email') != '') {
        
            $topicfile   = $this->input->post('topicfile');
        
            if ($topicfile == 'แบบไฟล์PDF') {

                $datepdf     = $this->input->post('datepdf');
                $datepdf_ex  = explode('/',$datepdf);

                $this->load->library('upload');

                // |xlsx|pdf|docx
                $config['upload_path'] = 'uploads/pdf';
                $config['allowed_types'] = 'pdf';
                $config['max_size']     = '200480';
                $config['max_width'] = '5000';
                $config['max_height'] = '5000';
                $name_file = "pdf-" . time();
                $config['file_name'] = $name_file;

                $this->upload->initialize($config);

                $data = array();

                if ($_FILES['file']['name']) {
                    if ($this->upload->do_upload('file')) {

                        $gamber     = $this->upload->data();
                        $data = array(

                            'topic'         => $topicfile,
                            'date'          => $datepdf_ex[2].'-'.$datepdf_ex[0].'-'.$datepdf_ex[1],
                            'file_name'     => $gamber['file_name'],
                            'created_at'    => date('Y-m-d H:i:s'),

                        );
                        $resultsedit = $this->db->insert('tbl_pdf', $data);
                        if ($resultsedit > 0) {
                            $this->session->set_flashdata('responsepdf', TRUE);
                            return redirect('ads');
                        } else {
                            $this->session->set_flashdata('msgpdf', TRUE);
                            return redirect('ads');
                        }
                    }
                }
            } else {
                $dateimg = $this->input->post('dateimg');
                $dateimg_ex  = explode('/',$dateimg);

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
                        'date'          => $dateimg_ex[2].'-'.$dateimg_ex[0].'-'.$dateimg_ex[1],
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
                    redirect('ads');
                }
            }

        } else {
            $this->session->set_flashdata('check_login', TRUE);
            redirect('ads');
        }
    }
}
