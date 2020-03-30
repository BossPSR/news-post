
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Job_post_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
       public function job_post()
    {
        $this->db->select('*');
        $this->db->from('tbl_postin');
        $data = $this->db->get();

        return $data->result();
    }
    
    public function job_post_delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_postin');
    }
}

?>