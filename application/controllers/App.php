<?php

defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kedai_model');
		$this->load->library('cart');
    }
    public function index()
    {
		$this->load->model('product_model');
		$data['products'] = $this->product_model->get_data('products')->result();
        $this->load->view('templates/header');
        $this->load->view('app',$data);
        $this->load->view('templates/footer');
    }
    function add_to_cart()
    {
		$data = array(
			// 'user_id' => $this->input->userdata('user_id'),
			'user_id' => 1,
			'product_id' => $this->input->post('product_id'),
			'quantity' => $this->input->post('quantity'),
		);
		
		$this->product_model->addCart($data);
		redirect('app/cart');
		// $product = $this->product_model->get_product_by_id($id);
		// $data = array(
		// 	'product_id'	=> $product['product_id'],
		// 	'qty'			=> 1,
		// 	'name'			=> $product['name'],
		// 	'price'			=> $product['price'],
		// 	'image'			=> $product['image'],
		// );
		// $this->cart->insert($data);
		// redirect('app/cart');
    }

    function cart()
    {
		$data['cart'] = $this->product_model->getCart();

        $this->load->view('templates/header');
        $this->load->view('cart', $data);
        $this->load->view('templates/footer');
    }
    function order()
    {
        // $this->load->model('m_kedai');
        $data['orders'] = $this->kedai_model->get_data('orders')->result();
        // $data['order'] = $this->m_order->get_order_by_id($order_id);

        $this->load->view('templates/header');
        $this->load->view('order', $data);
        $this->load->view('templates/footer');
    }

    function payment_method()
    {
        $this->load->view('templates/header');
        $this->load->view('payment_method');
        $this->load->view('templates/footer');
    }

}
?>
