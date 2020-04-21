<?php
defined('BASEPATH') or exit('No direct script access allowed');

use setasign\Fpdi;
use setasign\fpdf;

error_reporting(E_ALL);
ini_set('display_errors', 1);
set_time_limit(2);
date_default_timezone_set('UTC');
$start = microtime(true);


//$pdf = new Fpdi\TcpdfFpdi('L', 'mm', 'A3');
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

        if ($this->session->userdata('email') != '') {
            $user = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
            if ($user['point'] == 0) {
                $this->session->set_flashdata('point_user', TRUE);
                redirect('ads');
            }
            $dateYa         = date('Y-m-d');
            $dateYa_ex      = explode('-', $dateYa);
            $topic          = $this->input->post('topic');


            if ($topic == 'ประกาศเลิกบริษัท') {

                $topicB     = $this->input->post('topic');
                $companyฺB   = $this->input->post('companyฺB');
                $TaxpayerB  = $this->input->post('TaxpayerB');
                $meetingB   = $this->input->post('meetingB');
                $dissolveB  = $this->input->post('dissolveB');
                $dissolveB_ex   = explode('/', $dissolveB);

                $addressB   = $this->input->post('addressB');
                $postB      = $this->input->post('postB');
                $postB_ex   = explode('/', $postB);

                $signerB    = $this->input->post('signerB');
                $positionB  = $this->input->post('positionB');

                if ($topicB == '' || $companyฺB == '' || $TaxpayerB == '' || $meetingB == '' || $dissolveB == '' || $addressB == '' || $postB == '' || $signerB == '' || $positionB == '') {
                    $this->session->set_flashdata('msgB', TRUE);
                    return redirect('ads');
                } else {


                    $data = array(
                        'topic'             => $this->input->post('topic'),
                        'company_name'      => $this->input->post('companyฺB'),
                        'tax'               => $this->input->post('TaxpayerB'),
                        'meeting'           => $this->input->post('meetingB'),
                        'out_date'          => $dissolveB_ex[2].'-'.$dissolveB_ex[1].'-'.$dissolveB_ex[0],
                        'meeting_place'     => $this->input->post('addressB'),
                        'post_date'         => $postB_ex[2].'-'.$postB_ex[1].'-'.$postB_ex[0],
                        'name_surname'      => $this->input->post('signerB'),
                        'position'          => $this->input->post('positionB'),
                        'created_at'        => date('Y-m-d H:i:s'),
                        'id_user'           => $user['id_user'],
                        'credit'            => 1,
                    );
                    $success = $this->db->insert('tbl_advertise', $data);
                    $first   = $this->db->insert_id();
                    if ($success > 0) {

                        $update = array(
                            'id_order' => $dateYa_ex[0] . '' . $dateYa_ex[1] . $first
                        );
                        $this->db->where('advertise_id', $first);
                        $this->db->update('tbl_advertise', $update);

                        $pointUser = $user['point'] - 1;
                        $this->db->where('id_user', $user['id_user']);
                        $this->db->update('tbl_user', ['point' => $pointUser]);

                        $this->session->set_flashdata('responseA', TRUE);
                        redirect('ads');
                    } else {
                        $this->session->set_flashdata('msgA', TRUE);
                        redirect('ads');
                    }
                }
            } elseif ($topic == 'ประกาศจ่ายเงินปันผล') {

                $topicC         = $this->input->post('topic');
                $companyC       = $this->input->post('companyC');
                $meetingC       = $this->input->post('meetingC');
                $announcementC  = $this->input->post('announcementC');
                $meetingDateC      = $this->input->post('meetingDateC');
                $meetingDateC_ex   = explode('/', $meetingDateC);

                $meetingTimeC   = $this->input->post('meetingTimeC');
                $addressC       = $this->input->post('addressC');
                $approveC       = $this->input->post('approveC');
                $allshares      = $this->input->post('allshares');
                $moneyC         = $this->input->post('moneyC');
                $reserveC       = $this->input->post('reserveC');
                $paymentC       = $this->input->post('paymentC');
                $dateC          = $this->input->post('dateC');
                $dateC_ex       = explode('/', $dateC);

                $signerC        = $this->input->post('signerC');
                $positionC      = $this->input->post('positionC');

                if (
                    $topicC == '' || $companyC == '' || $meetingC == '' || $announcementC == '' || $meetingDateC == '' ||
                    $meetingTimeC == '' || $addressC == '' || $approveC == '' || $moneyC == '' || $allshares == '' ||  $reserveC == '' ||
                    $paymentC == '' || $dateC == '' || $signerC == '' || $positionC == ''
                ) {
                    $this->session->set_flashdata('msgB', TRUE);
                    return redirect('ads');
                } else {

                    $data = array(
                        'topic'             => $this->input->post('topic'),
                        'company_name'      => $this->input->post('companyC'),
                        'meeting'           => $this->input->post('meetingC'),
                        'announcement_to'   => $this->input->post('announcementC'),
                        'meeting_date'      => $meetingDateC_ex[2].'-'.$meetingDateC_ex[1].'-'.$meetingDateC_ex[0],
                        'meeting_time'      => $this->input->post('meetingTimeC'),
                        'meeting_place'     => $this->input->post('addressC'),
                        'stock_appove'      => $this->input->post('approveC'),
                        'all_shares'        => $this->input->post('allshares'),
                        'dividend'          => $this->input->post('moneyC'),
                        'reserve'           => $this->input->post('reserveC'),
                        'dividend_payment'  => $this->input->post('paymentC'),
                        'post_date'         => $dateC_ex[2].'-'.$dateC_ex[1].'-'.$dateC_ex[0],
                        'name_surname'      => $this->input->post('signerC'),
                        'position'          => $this->input->post('positionC'),
                        'created_at'        => date('Y-m-d H:i:s'),
                        'id_user'           => $user['id_user'],
                        'credit'            => 1,
                    );
                    $success = $this->db->insert('tbl_advertise', $data);
                    $first   = $this->db->insert_id();

                    if ($success > 0) {
                        $update = array(
                            'id_order' => 'OD' . $dateYa_ex[0] . '' . $dateYa_ex[1] . $first
                        );
                        $this->db->where('advertise_id', $first);
                        $this->db->update('tbl_advertise', $update);

                        $pointUser = $user['point'] - 1;
                        $this->db->where('id_user', $user['id_user']);
                        $this->db->update('tbl_user', ['point' => $pointUser]);

                        $this->session->set_flashdata('responseA', TRUE);
                        redirect('ads');
                    } else {
                        $this->session->set_flashdata('msgA', TRUE);
                        redirect('ads');
                    }
                }
            } else {
                $topicA             = $this->input->post('topic');
                $agendaA            = $this->input->post('agendaA');
                $companyA           = $this->input->post('companyA');
                $meetingA           = $this->input->post('meetingA');
                $announceA          = $this->input->post('announceA');
                $announcedateA      = $this->input->post('announcedateA');
                $announcedateA_ex   = explode('/', $announcedateA);

                $timeA              = $this->input->post('timeA');
                $placeA             = $this->input->post('placeA');
                $advertisementA     = $this->input->post('advertisementA');
                $advertisementA_ex   = explode('/', $advertisementA);

                $signA              = $this->input->post('signA');
                $positionA          = $this->input->post('positionA');

                if (
                    $topicA == '' || $agendaA == '' || $companyA == '' || $meetingA == '' || $announceA == '' ||
                    $announcedateA == '' || $timeA == '' || $placeA == '' || $advertisementA == '' || $signA == '' ||  $positionA == ''
                ) {
                    $this->session->set_flashdata('msgB', TRUE);
                    return redirect('ads');
                } else {

                    $data = array(
                        'topic'             => $this->input->post('topic'),
                        'agenda'            => $this->input->post('agendaA'),
                        'company_name'      => $this->input->post('companyA'),
                        'meeting'           => $this->input->post('meetingA'),
                        'announcement_to'   => $this->input->post('announceA'),
                        'meeting_date'      => $announcedateA_ex[2].'-'.$announcedateA_ex[1].'-'.$announcedateA_ex[0],
                        'meeting_time'      => $this->input->post('timeA'),
                        'meeting_place'     => $this->input->post('placeA'),
                        'post_date'         => $advertisementA_ex[2].'-'.$advertisementA_ex[1].'-'.$advertisementA_ex[0],
                        'name_surname'      => $this->input->post('signA'),
                        'position'          => $this->input->post('positionA'),
                        'created_at'        => date('Y-m-d H:i:s'),
                        'id_user'           => $user['id_user'],
                        'credit'            => 1,
                    );
                    $success = $this->db->insert('tbl_advertise', $data);
                    $first   = $this->db->insert_id();
                    if ($success > 0) {
                        $update = array(
                            'id_order' => 'OD' . $dateYa_ex[0] . '' . $dateYa_ex[1] . $first
                        );
                        $this->db->where('advertise_id', $first);
                        $this->db->update('tbl_advertise', $update);

                        $pointUser = $user['point'] - 1;
                        $this->db->where('id_user', $user['id_user']);
                        $this->db->update('tbl_user', ['point' => $pointUser]);

                        $this->session->set_flashdata('responseA', TRUE);
                        redirect('ads');
                    } else {
                        $this->session->set_flashdata('msgA', TRUE);
                        redirect('ads');
                    }
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
            $user = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();
            if ($user['point'] == 0) {
                $this->session->set_flashdata('point_user', TRUE);
                redirect('ads');
            }

            $topicfile   = $this->input->post('topicfile');

            if ($topicfile == 'แบบไฟล์PDF') {

                $datepdf     = $this->input->post('datepdf');

                $datepdf_ex  = explode('/', $datepdf);

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
                        $numPage = $this->numPagePDF($name_file);
                        if ($user['point'] < $numPage) {
                            $this->session->set_flashdata('point_user', TRUE);
                            redirect('ads');
                        }

                        $gamber     = $this->upload->data();
                        $data = array(

                            'topic'         => $topicfile,
                            'date'          => $datepdf_ex[2] . '-' . $datepdf_ex[1] . '-' . $datepdf_ex[0],
                            'credit'        => $numPage,
                            'file_name'     => $gamber['file_name'],
                            'created_at'    => date('Y-m-d H:i:s'),
                            'id_user'           => $user['id_user'],
                        );
                        $resultsedit = $this->db->insert('tbl_pdf', $data);
                        if ($resultsedit > 0) {
                            $pointUser = $user['point'] - $numPage;
                            $this->db->where('id_user', $user['id_user']);
                            $this->db->update('tbl_user', ['point' => $pointUser]);

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
                $dateimg_ex  = explode('/', $dateimg);

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
                        'date'          => $dateimg_ex[2] . '-' . $dateimg_ex[1] . '-' . $dateimg_ex[0],
                        'credit'        => 1,
                        'file_name'     => $dataInfo[$i]['file_name'],
                        'created_at'    => date('Y-m-d H:i:s'),
                        'id_user'           => $user['id_user'],
                    );

                    if (!$this->upload->do_upload('userfile')) {
                        $error[] =  $this->upload->display_errors();
                    }
                }

                //outside for loop

                if (!empty($uploaded)) {
                    echo explode('<br>', $error);
                } else {
                    $pointUser = $user['point'] - 1;
                    $this->db->where('id_user', $user['id_user']);
                    $this->db->update('tbl_user', ['point' => $pointUser]);

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

    private function numPagePDF($name_file)
    {
        $this->load->library('CustomFpdf');
        global $pdf;
        $pdf = new Fpdi\Fpdi();
        $pdfPage = "uploads/pdf/" . $name_file . '.pdf';
        $pdfPagePDF = $pdf->setSourceFile($pdfPage);
        return $pdfPagePDF;
    }
}
