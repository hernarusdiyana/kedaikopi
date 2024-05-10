<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
		$this->load->model('product_model');
        $this->load->model('order_model');
        $this->load->model('sales_model');
        if ($this->session->userdata('status') != "login") {
            redirect(base_url() . 'welcome?pesan=belum-login');
        };
        
    }

    function index()
    {
        $data['orders'] = $this->db->query("SELECT * FROM orders ORDER BY order_id DESC limit 10")->result();
        $data['users'] = $this->db->query("SELECT * FROM users ORDER BY user_id DESC limit 10")->result();
        $data['products'] = $this->db->query("SELECT * FROM products ORDER BY product_id DESC limit 10")->result();

		$total_orders = $this->order_model->count_orders();
		$total_products = $this->product_model->count_products();
		$total_sales = $this->order_model->count_sales();
		$data['total_orders'] = $total_orders;
		$data['total_products'] = $total_products;
		$data['total_sales'] = $total_sales;

        $this->load->view('admin/header2');
        $this->load->view('admin/index2', $data);
        $this->load->view('admin/footer2');
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'welcome?pesan=logout');
    }

    function products()
    {
        $this->load->model('product_model');
        $this->load->library('form_validation');
        $data['products'] = $this->product_model->get_data('products')->result();
        $this->load->view('admin/header2');
        $this->load->view('admin/products', $data);
        $this->load->view('admin/footer2');
    }
    public function addProductForm() {
        $this->load->view('admin/header2');
        $this->load->view('admin/product_add');
        $this->load->view('admin/footer2');
    }

    public function addProduct() {
			$config['upload_path'] = './assets/uploads';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 10240;
			$config['max_width'] = 6000;
			$config['max_height'] = 6000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin/header2');
        		$this->load->view('admin/product_add', $error);
				$this->load->view('admin/footer2');
                
				// $error = array('error' => $this->upload->display_errors());
				// $this->session->set_flashdata('message', '<div class="alert alert-danger">'.implode("",$error).'</div>');

			} else {
				// jika upload gambar berhasil
				$upload_data = $this->upload->data();
				
				// ambil data dari form
				$name = $this->input->post('name');
				$category = $this->input->post('category');
				$price = $this->input->post('price');
				// Menyimpan Produk Baru ke database
				$data = array(
					'name' => $name,
					'category' => $category,
					'price' => $price,
					'image' => file_get_contents($upload_data['full_path']),
				);
				
				$this->product_model->insertProduct($data);

				$this->session->set_flashdata('success', 'Produk berhasil ditambahkan.');


				redirect('admin/products');
				// Jika product_model, tampilkan pesan error
				$data['upload_error'] = $this->upload->display_errors();
			}
			
			
	}
	function product_edit($product_id)
	{
	    $where = array(
	        'product_id' => $product_id
	    );
		$this->load->model('kedai_model');
	    $data['products'] = $this->kedai_model->edit_data($where,'products')->result();
	    $this->load->view('admin/header2');
	    $this->load->view('admin/product_edit',$data);
	    $this->load->view('admin/footer2');
	}
	function product_update()
            {
                $product_id	= $this->input->post('product_id');
                $name   	= $this->input->post('name');
                $category   = $this->input->post('category');
                $price  	= $this->input->post('price');
                $image  	= $this->input->post('image');
                $this->form_validation->set_rules('name','Nama Produk','required');
                $this->form_validation->set_rules('category','Kategori Produk','required');

                if($this->form_validation->run() != false) {
                    $where = array(
                        'product_id' => $product_id
                    );
                    $data = array(
                        'name'    => $name,
                        'category'    => $category,
                        'price'   => $price,
                        'image'   => $image,
                    );
                    $this->product_model->update_data($where,$data,'products');
                    redirect(base_url().'admin/products');
                } else {
                    $where = array(
                        'product_id' => $$product_id
                    );
                    $data['products'] = $this->product_model->edit_data($where,'products')->result();
                    $this->load->view('admin/header');
                    $this->load->view('admin/product_edit',$data);
                    $this->load->view('admin/footer');
                }
            }

	function product_delete($product_id)
	{
		$this->load->model('kedai_model');
		$where = array(
			'product_id' => $product_id
		);
		$this->kedai_model->delete_data($where,'products');
		redirect(base_url().'admin/products');
	} 
	public function delete($id = null)
	{
		if(!$id){
			show_404();
		}

		$this->load->model('feedback_model');
		$this->feedback_model->delete($id);

		$this->session->set_flashdata('message', 'Data was deleted');
		redirect(site_url('admin/feedback'));
	}
	function orders()
    {
        $this->load->model('product_model');
        $this->load->library('form_validation');
        $data['orders'] = $this->product_model->get_data('orders')->result();
        $this->load->view('admin/header2');
        $this->load->view('admin/orders', $data);
        $this->load->view('admin/footer2');
    }
	public function ubah_status() {
        // Ambil data yang dikirimkan melalui AJAX
        $order_id = $this->input->post('order_id');
        $status = $this->input->post('status');

        // Lakukan proses penyimpanan perubahan status pesanan di dalam model jika diperlukan
        $this->order_model->ubah_status($order_id, $status);

        // Untuk contoh sederhana, kita hanya akan mencetak data yang diterima dari AJAX
        echo "ID Pesanan: " . $order_id . ", Status: " . $status;
		echo "Status pesanan berhasil diubah.";
	}

	public function update_status() {
        // Process updating order status via AJAX
        $order_id = $this->input->post('order_id');
        $new_status = $this->input->post('new_status');
		
		$this->load->model('order_model');
        $this->order_model->update_order_status($order_id, $new_status);
        // if ($new_status == 'Lunas') {
        //     $this->order_model->move_to_sales($order_id);
        // }
        echo json_encode(array('success' => true));
    }

	public function pindah_ke_sales($order_id) {
		// Ambil data pesanan berdasarkan ID
		$order = $this->db->get_where('orders', array('order_id' => $order_id))->row_array();
    
		// Jika status order sudah 'Lunas', pindahkan ke tabel Sales
		if ($order['status'] == 'Lunas') {
			// Panggil method untuk memindahkan order ke tabel Sales
			$this->order_model->pindah_ke_sales($order_id);
			echo "Pesanan telah dipindahkan ke tabel Sales.";
		} else {
			echo "Pesanan belum memiliki status 'Lunas'.";
		}
	}

	function sales2() {
		$total_sales = $this->order_model->hitung_sales('selesai');

		$sales_id = false;
		if($total_sales > 0) {
			$sales_id = $this->sales_model->save_sales($total_sales);
		}
		if($sales_id != false) {
			$order_id = $this->order_model->get_order_id_with_status('selesai');
			$this->sales_model->link_sales_to_order($sales_id, $order_id);
		} else {
			// Tidak ada penjualan yang dihasilkan dari order
		}
	}

		public function sales() {
			$data['orders'] = $this->order_model->get_lunas_orders();

			$this->load->view('admin/header2');
			$this->load->view('admin/sales', $data);
			$this->load->view('admin/footer2');
		}
	
		function laporan(){
			$dari = $this->input->post('dari');
			$sampai = $this->input->post('sampai');
			$this->form_validation->set_rules('dari','Dari Tanggal','required');
			$this->form_validation->set_rules('sampai','Sampai Tanggal','required');
	
			if($this->form_validation->run() != false){
				$data['laporan'] = $this->db->query("SELECT * FROM orders,products,users WHERE orders_products=product_id AND orders_users=user_id AND DATE(orders_tgl) >= '$dari'")->result();
				$this->load->view('admin/header');
				$this->load->view('admin/laporan_filter',$data);
				$this->load->view('admin/footer');
			}else{
				$this->load->view('admin/header');
				$this->load->view('admin/laporan');
				$this->load->view('admin/footer');
			}
		}
		function laporan_print(){
			$dari = $this->input->get('dari');
			$sampai = $this->input->get('sampai');
	
			if($dari != "" && $sampai != ""){
				$data['laporan'] = $this->db->query("SELECT * FROM orders,products,users WHERE orders_products=product_id AND orders_users=user_id AND DATE(orders_tgl) >= '$dari'")->result();
				$this->load->view('admin/laporan_print',$data);
			}else{
				redirect("admin/laporan");
			}
		}
	}

        

?>
