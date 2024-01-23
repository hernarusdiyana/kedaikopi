<?php 

final class Products extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->library('form_validation');
    }

    public function addProductForm() {
        $this->load->view('admin/add_product');
    }

    public function addProduct() {
        // Menyimpan Produk Baru ke database
        $data = array(
            'name' => $this->input->post('name'),
            'category' => $this->input->post('category'),
            'price' => $this->input->post('price'),
        );
    

    $this->Product_model->insertProduct($data);

    redirect('admin/products');
    }
}


?>