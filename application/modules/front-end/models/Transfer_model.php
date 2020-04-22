
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Transfer_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function transfer($userId)
    {
        $this->db->select('*');
        $this->db->from('tbl_transfer');
        $this->db->where('user_id', $userId);
        $this->db->order_by('created_at', 'desc');

        $data = $this->db->get();
        return $data->result_array();
    }


}

?>