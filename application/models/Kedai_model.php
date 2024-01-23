<?php
defined('BASEPATH') or exit('No direct script allowed');

class Kedai_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    function get_order_by_id($order_id)
    {
        $this->db->select("*");
        $this->db->from("orders");
        $this->db->where("id", $order_id);
        $query = $this->db->get($order_id);


        $order_data = array(
            'id' => $order_id,
            'customer_name' => 'Aliana',
            'total_amount' => 50,
            'items' => array(
                array('item_name' => 'Americano Coffee', 'quantity' => 1, 'price' => 10),
                array('item_name' => 'Coffee Latte', 'quantity' => 2, 'price' => 16),
            ),
        );

        return $order_data;
    }
    function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function get_data($table)
    {
        return $this->db->get($table);
    }

    function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    function delete_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }


}
