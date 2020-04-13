<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Credit_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->load->view('option/header');
        $this->load->view('credit');
        $this->load->view('option/footer'); 
    }

    public function check_user_credit()
    {
        if ($this->session->userdata('email') != '') {
            echo 1;
        } else {
            echo 0;
        }
    }

    function saveRecord_checkout()
    {
        if ($this->session->userdata('email') != '') 
        {
            include('public/assets/'.'omise-php/lib/Omise.php');
             define('OMISE_API_VERSION', '2017-11-02');
  
            define('OMISE_PUBLIC_KEY', 'pkey_test_5jj79losaq3gdkmmo4x');
            define('OMISE_SECRET_KEY', 'skey_test_5jj79losj9r74qo9qoq');
  
            $result_count    = $this->input->post('result_count');
            $result_price  = $this->input->post('result_price');
            $result_number_address  = $this->input->post('result_number_address');
            $result_compony_address  = $this->input->post('result_compony_address');
            $result_detail_address  = $this->input->post('result_detail_address');
            $id_user = $this->input->post('id_user');
  
             
            
  
            $charge = OmiseCharge::create(array(
            'amount' => $result_price*100,
            'currency' => 'thb',
            'card' => $_POST["omiseToken"]
  
             ));
  
            if (isset($charge)) 
            {
                $data = [
                    'price' => $result_price,
                    'count' => $result_count,
                    'id_taxs' => $result_number_address,
                    'company' => $result_compony_address,
                    'address' => $result_detail_address,
                    'id_user' => $id_user,
                ];
                   
                    $success =  $this->db->insert('tbl_omise',$data);
  
                    if($success > 0)
                    {
                        $this->session->set_flashdata('response','การสั่งซื้อสินค้าเรียบร้อยแล้ว.');
                    }
                    else
                    {
                        $this->session->set_flashdata('msg','ล้มเหลวในการสั่งซื้อสินค้า กรุณาลองใหม่อีกครั้ง!!');
                        redirect('/');
                    }
  
                    redirect('/');
  
            } 
            else
            {
                 $this->session->set_flashdata('msg','เกิดข้อผิดพลาดกรุณาลองใหม่อีกครั้ง!!');
                 redirect('/');
            }
             
        }
        else
        {
          redirect('/');
        }
    }
  
}
