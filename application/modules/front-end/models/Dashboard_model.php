
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Dashboard_model extends CI_Model
{
    function __construct()
    {
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

    public function fetch_year()
    {
        $this->db->select('count(*) AS countas,year');
        $this->db->from('tbl_thesis');
        $this->db->group_by('year');
        $this->db->order_by('year', 'DESC');
        return $this->db->get();
    }

    public function fetch_chart_data($year)
    {
        $this->db->where('year', $year);
        $this->db->order_by('year', 'ASC');
        return $this->db->get('tbl_thesis');
    }
}

?>