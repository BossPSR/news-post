
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Category_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
       public function category()
    {
        $this->db->select('*');
        $this->db->from('tbl_category');
        $data = $this->db->get();

        return $data->result();
    }
    public function category_delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('tbl_category');
    }
}

?>