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
	function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
 	function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
	public function count_products() {
		$this->db->from('products');
		return $this->db->count_all_results();
	}
	function get_product_by_id($id)
    {
		$query = $this->db->get_where('products', array('product_id'=>$id));
        return $query->row_array(); // Mengembalikan satu baris hasil dalam bentuk array
    }
	function addCart($data)
	{
		$query = $this->db->get_where('cart', array(
			'user_id' => $data['user_id'],
			'product_id' => $data['product_id']
		));
		if ($query->num_rows() > 0) {
			$row = $query->row();
			$quantity_new = $row->quantity + $data['quantity'];
			$this->db->where('cart_id', $row->cart_id);
			$this->db->update('cart', array('quantity' => $quantity_new));
		} else {
			$this->db->insert('cart',$data);
		}
	}
	public function getCartItems() {
		$this->db->select('cart.*, products.name, products.price');
        $this->db->from('cart');
        $this->db->join('products', 'products.product_id = cart.product_id');
        return $this->db->get()->result_array();
	}
    function changeQty($cart_id,$quantity_new) {
		$this->db->where('cart_id',$cart_id);
		$this->db->update('cart', array('quantity' => $quantity_new));
	}
    function removeCart($cart_id) {
		$this->db->where('cart_id',$cart_id);
		$this->db->delete('cart');
	}
}

?>
