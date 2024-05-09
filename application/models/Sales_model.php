<?php

class Sales_model extends CI_Model {
	public function hitung_total_sales() {
		$this->db->select_sum('total_harga');
		$query = $this->db->get('orders');
		return $query->row()->total_harga;
	}
	public function save_sales($total_sales) {
		$data = array(
			'tanggal_sales' => date('Y-m-d'),
			'total_sales' => $total_sales
		);
		$this->db->insert('sales', $data);
		return $this->db->insert_id();
	}

	public function link_sales_to_order($sales_id, $order_id) {
		foreach ($order_id as $order_id) {
			$data = array(
				'sales_id' => $sales_id,
				'order_id' => $order_id,
			);
			$this->db->insert('sales_order',$data);
		}
	}

	public function get_order_id_with_status($status) {
		$this->db->select('order_id');
		$this->db->where('status', $status);
		$query = $this->db->get('orders');
		$order_id = array();
		foreach ($query->result() as $row) {
            $order_id[] = $row->order_id;
        }
        return $order_id;
	}

}

?>