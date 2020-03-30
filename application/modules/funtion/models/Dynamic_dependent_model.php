<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dynamic_dependent_model extends CI_Model {


	function fetch_state($PROVINCE_ID)
	{
		$this->db->where('board_id', $PROVINCE_ID);
		$this->db->order_by('subject_name', 'desc');
		$query = $this->db->get('tbl_subject');
		$output = ' <option value="">--- กรุณาเลือกวิชา---</option>';
		foreach ($query->result() as $row) 
		{
			$output .= ' <option value="'.$row->id.'">'.$row->subject_name.'</option> ';
		}
		return $output;
	}

	function fetch_city($AMPHUR_ID)
	{
		$this->db->where('subject_id', $AMPHUR_ID);
		$this->db->order_by('branch_name', 'ASC');
		$query = $this->db->get('tbl_branch');
		$output = '<option value="">--- กรุณาเลือกสาขา ---</option> ';
		foreach ($query->result() as $row) 
		{
			$output .= '<option value="'.$row->id.'">'.$row->branch_name.'</option>';
		}
		return $output;
	}

	public function list()
    {
        $this->db->select('*,tbl_thesis.id AS idT');
        $this->db->from('tbl_thesis');
        $this->db->join('tbl_board', 'tbl_board.id = tbl_thesis.board', 'left');
        $this->db->join('tbl_subject', 'tbl_subject.id = tbl_thesis.subject', 'left');
        $this->db->join('tbl_branch', 'tbl_branch.id = tbl_thesis.branch', 'left');
        
        $data = $this->db->get();

        return $data->result();
    }


	
}

/* End of file dynamic_dependent_model.php */
/* Location: ./application/models/dynamic_dependent_model.php */ 