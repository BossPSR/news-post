<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_ctr extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dashboard_model');
        $this->load->helper('string'); 
    }

    public function dashboard()
    {
        if ($this->session->userdata('code_student') != '') {
            $this->load->view('option/header');
            $this->load->view('dashboard');
            $this->load->view('option/footer');
        } else {
            $this->load->view('login');
        }
    }

    function getdata() 
    { 
        $data = $this->Dashboard_model->fetch_year();
        //         //data to json 

        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Topping", 
            "pattern" => "", 
            "type" => "string" 
        ); 
        $responce->cols[] = array( 
            "id" => "", 
            "label" => "Total", 
            "pattern" => "", 
            "type" => "number" 
        ); 
        foreach($data as $cd) 
            { 
                $responce->rows[]["c"] = array( 
                    array( 
                        "v" => "$cd->year", 
                        "f" => null 
                    ) , 
                    array( 
                        "v" => (int)$cd->countas, 
                        "f" => null 
                    ) 
                ); 
            } 
 
        echo json_encode($responce); 
    } 
}
