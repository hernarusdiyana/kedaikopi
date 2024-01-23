<?php
defined("BASEPATH") or exit("No direct script access allowed");

class M_order extends CI_Model
{

    public function get_order_by_id($order_id)
    {
        $this->db->select("*");
        $this->db->from("orders");
        $this->db->where("id", $order_id);
        $query = $this->db->get();


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
}
?>