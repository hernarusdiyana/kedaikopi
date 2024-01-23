<?php 

final class Product_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    function get_data($table)
    {
        return $this->db->get($table);
    }
    public function insertProduct($data) {
        $this->db->insert('products',$data);
    }
    
}


?>