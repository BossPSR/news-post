<?php
defined('BASEPATH') or exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class History_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function order_history($session)
    {
        $this->db->select('*');
        $this->db->from('tbl_omise');
        $this->db->where('id_user', $session);
        $this->db->order_by('create_time', 'desc');

        $data = $this->db->get();
        return $data->row_array();
    }

    public function pdf_history($userId)
    {
        $this->db->select('*');
        $this->db->from('tbl_pdf');
        $this->db->where('id_user', $userId);
        $this->db->order_by('created_at', 'desc');

        $data = $this->db->get();
        return $data->result_array();
    }

    public function tem_history($userId)
    {
        $this->db->select('*');
        $this->db->from('tbl_advertise');
        $this->db->order_by('created_at', 'desc');

        $data = $this->db->get();
        return $data->result_array();
    }

    public function pdf_history_all($userId)
    {
        $this->db->select('*');
        $this->db->from('tbl_pdf');
        $this->db->where('id_user', $userId);
        $this->db->order_by('created_at', 'desc');

        $data = $this->db->get();
        return $data->result_array();
    }

    public function tem_history_all($userId)
    {
        $this->db->select('*');
        $this->db->from('tbl_advertise');
        $this->db->where('id_user', $userId);
        $this->db->order_by('created_at', 'desc');

        $data = $this->db->get();
        return $data->result_array();
    }
}

?>