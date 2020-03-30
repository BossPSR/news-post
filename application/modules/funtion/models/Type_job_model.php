<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Type_job_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
       public function type()
    {
        $this->db->select('*');
        $this->db->from('tbl_typejob');
        $data = $this->db->get();

        return $data->result();
    }
    public function type_delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_typejob');
    }
}

?>