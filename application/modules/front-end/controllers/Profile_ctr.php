<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile_ctr extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function profile()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email' => $this->session->userdata('email')])->row_array();

		$this->load->view('option/header');
		$this->load->view('profile', $data);
		$this->load->view('option/footer');
	}

	public function profile_edit()
	{
		$userId		= $this->input->post('userId');
		$id_tax		= $this->input->post('id_tax');
		$company	= $this->input->post('company');
		$address	= $this->input->post('address');

		$data = array(
			'id_taxs'		=> $this->input->post('id_tax'),
			'company'		=> $this->input->post('company'),
			'address'		=> $this->input->post('address'),
			'update_times'	=> date('Y-m-d H:i:s'),
		);

		$this->db->where('id_user', $userId);
		if ($this->db->update('tbl_user', $data)) {
			$this->session->set_flashdata('success_profile', TRUE);
			redirect('profile');
		} else {
			$this->session->set_flashdata('fail_profile', TRUE);
			redirect('profile');
		}
	}
}
