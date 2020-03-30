
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Province_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
       public function Province()
    {
        $this->db->select('*');
        $this->db->from('provinces');
        $data = $this->db->get();

        return $data->result();
    }
    public function Province_name()
    {
        $this->db->select('*');
        $this->db->from('tbl_province');
        $data = $this->db->get();

        return $data->result();
    }
    public function amphures()
    {
        $this->db->select('*');
        $this->db->from('tbl_amphures');
        $data = $this->db->get();

        return $data->result();
    }
    public function Province_delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_province');
    }

    public function amphures_delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_amphures');
    }
}

?>