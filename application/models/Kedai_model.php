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
	public function delete($id)
	{
		if(!$id){
			return;
		}

		$this->db->delete($this->_table, ['product_id' => $id]);
	}
	function insert_order($order_data, $cart_data) {
		// Masukkan data order ke dalam tabel 'orders'
        $this->db->insert('orders', $order_data);

        // Dapatkan ID order yang baru saja dimasukkan
        $order_id = $this->db->insert_id();

        // Masukkan detail order dari library Cart ke dalam tabel 'order_items'
        foreach ($cart_data as $item) {
            $data = array(
                'order_id' => $order_id,
                'product_id' => $item['id'],
                'quantity' => $item['qty'],
                'price' => $item['price'],
                'total' => $item['subtotal'],
                // ... (Tambahkan kolom lainnya sesuai kebutuhan)
            );

            $this->db->insert('order_items', $data);
		}
	}
}
