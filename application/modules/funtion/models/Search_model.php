
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Search_model extends CI_Model{
    function __construct(){
        parent::__construct();
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

    public function list_result($gsearch)
    {
        $this->db->select('*,tbl_thesis.id AS idT');
        $this->db->from('tbl_thesis');
        $this->db->join('tbl_board', 'tbl_board.id = tbl_thesis.board' , 'left');
        $this->db->join('tbl_subject', 'tbl_subject.id = tbl_thesis.subject', 'left');
        $this->db->join('tbl_branch', 'tbl_branch.id = tbl_thesis.branch', 'left');
        $this->db->like('title', $gsearch);
        $this->db->or_like('composer', $gsearch);
        $this->db->or_like('board_name', $gsearch);
        $this->db->or_like('subject_name', $gsearch);
        $this->db->or_like('branch_name', $gsearch);
        $this->db->or_like('year', $gsearch);
        $this->db->or_like('keyword', $gsearch);
        
        $data = $this->db->get();

        return $data->result();
    }

}

?>