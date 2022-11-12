<?php
class Admin_model extends CI_Model
{

    function __construct()
    {
        $this->load->database(); // Berfungsi untuk memanggil database
    }

    public function getallUsers()
    {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->order_by('id_user', 'DESC');
        $query =  $this->db->get();

        return $query->result_array();
    }
    

}
