<?php
class Order_model extends CI_Model {
	public function count_orders() {
		$this->db->from('orders');
		return $this->db->count_all_results();
	}
	
	public function count_sales() {
		$this->db->where('status', 'Lunas');
		return $this->db->count_all_results('orders');
	}

	public function count_orders_by_date_range($start_date, $end_date) {
		$this->db->from('orders');
		$this->db->where('order_date >=', $start_date);
		$this->db->where('order_date >=', $end_date);
		return $this->db->count_all_results();
	}
	public function ubah_status($order_id, $status) {
        $data = array(
            'status' => $status
        );
        $this->db->where('order_id', $order_id);
        $this->db->update('orders', $data);
    }

	public function pindah_ke_sales($order_id) {
		// Ambil data pesanan berdasarkan ID
		$order = $this->db->get_where('orders', array('order_id' => $order_id))->row_array();
    
		// Sisipkan data order ke dalam tabel Sales
		$this->db->insert('orders', $order);
		
		// Hapus pesanan dari tabel Order
		$this->db->where('order_id', $order_id);
		$this->db->delete('orders');
	}
	public function update_order_status($order_id, $new_status) {
        if($new_status == 'Lunas') {
					$this->move_to_sales($order_id);
				}
    }
	// public function update_order_status($order_id, $status) {
  //       $this->db->where('order_id', $order_id);
  //       $this->db->update('orders', array('status' => $status));
  //       return $this->db->affected_rows();
  //   }

    public function move_to_sales($order_id) {
        // Get order data
        $order = $this->db->get_where('orders', array('order_id' => $order_id))->row_array();

        // Insert order data into sales table
        unset($order['order_id']); // Remove the order ID
        $this->db->insert('sales', $order);

        // Delete order from orders table
        $this->db->delete('orders', array('order_id' => $order_id));

        return $this->db->affected_rows();
    }

		public function get_lunas_orders() {
			$this->db->where('status', 'Lunas');
			$query = $this->db->get('orders');
			return $query->result();
		}

}


?>
