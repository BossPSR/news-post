<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
    }
    
    public function login($code_student, $password)
    {
       $this->db->where('code_student', $code_student);
       $this->db->where('password', $password);
       $this->db->where('is_admin', 4);
       $query = $this->db->get('tbl_user');

       if ($query->num_rows() > 0)
       {
        return true;
       }
       else
       {
        return false;
       }

    }
   
    public function login_student($code_student, $password)
    {
       $this->db->where('code_student', $code_student);
       $this->db->where('password', $password);
       $this->db->where('is_admin', 3);
       $query = $this->db->get('tbl_user');

       if ($query->num_rows() > 0)
       {
        return true;
       }
       else
       {
        return false;
       }

    }

    public function login_teacher($code_student, $password)
    {
       $this->db->where('code_student', $code_student);
       $this->db->where('password', $password);
       $this->db->where('is_admin', 2);
       $query = $this->db->get('tbl_user');

       if ($query->num_rows() > 0)
       {
        return true;
       }
       else
       {
        return false;
       }

    }
   



}
