<?php

defined('BASEPATH') or exit('No direct script access allowed');

class App extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('kedai_model');
    }
    public function index()
    {
		$this->load->model('product_model');
		$data['products'] = $this->product_model->get_data('products')->result();
        $this->load->view('templates/header');
        $this->load->view('app',$data);
        $this->load->view('templates/footer');
    }
    function products()
    {

    }
    function cart()
    {
        $this->load->view('templates/header');
        $this->load->view('cart');
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
