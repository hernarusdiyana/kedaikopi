<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url() . 'welcome?pesan=belum-login');
        };
        
    }

    function index()
    {
        $data['orders'] = $this->db->query("SELECT * FROM orders ORDER BY id DESC limit 10")->result();
        $data['users'] = $this->db->query("SELECT * FROM users ORDER BY id DESC limit 10")->result();
        $data['products'] = $this->db->query("SELECT * FROM products ORDER BY id DESC limit 10")->result();

        $this->load->view('admin/header');
        $this->load->view('admin/index', $data);
        $this->load->view('admin/footer');
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
        $this->load->view('admin/header');
        $this->load->view('admin/products', $data);
        $this->load->view('admin/footer');
    }
    public function addProductForm() {
        $this->load->view('admin/header');
        $this->load->view('admin/product_add');
        $this->load->view('admin/footer');
    }

    public function addProduct() {
		
			// $config = array(
			// 	'upload_path' => "../../uploads/",
			// 	'allowed_types' => "gif|jpg|png|jpeg",
			// 	'overwrite' => TRUE,
			// 	'max_size' => "20480" 
			// 	);
			$config['upload_path'] = './assets/uploads';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size'] = 10240;
			$config['max_width'] = 6000;
			$config['max_height'] = 6000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
				$error = array('error' => $this->upload->display_errors());
				$this->load->view('admin/header');
        		$this->load->view('admin/product_add', $error);
				$this->load->view('admin/footer');
                
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

    /*
            function products_add()
            {
                $this->load->view('admin/header');
                $this->load->view('admin/products_add');
                $this->load->view('admin/footer');
            }

            function products_add_act()
            {
                $merk   = $this->input->post('merk');
                $plat   = $this->input->post('plat');
                $warna  = $this->input->post('warna');
                $tahun  = $this->input->post('tahun');
                $status = $this->input->post('status');
                $this->form_validation->set_rules('merk','Merk products','required');
                $this->form_validation->set_rules('status','Status products','required');

                if($this->form_validation->run() != false) {
                    $data = array(
                        'products_merk'    => $merk,
                        'products_plat'    => $plat,
                        'products_warna'   => $warna,
                        'products_tahun'   => $tahun,
                        'products_status'  => $status
                    );
                    $this->m_rental->insert_data($data,'products');
                    redirect(base_url().'admin/products');
                } else {
                    $this->load->view('admin/header');
                    $this->load->view('admin/products_add');
                    $this->load->view('admin/footer');
                }
            }

            function products_edit($id)
            {
                $where = array(
                    'product_id' => $id
                );
                $data['products'] = $this->m_rental->edit_data($where,'products')->result();
                $this->load->view('admin/header');
                $this->load->view('admin/products_edit',$data);
                $this->load->view('admin/footer');
            }

            function products_update()
            {
                $id     = $this->input->post('id');
                $merk   = $this->input->post('merk');
                $plat   = $this->input->post('plat');
                $warna  = $this->input->post('warna');
                $tahun  = $this->input->post('tahun');
                $status = $this->input->post('status');
                $this->form_validation->set_rules('merk','Merk products','required');
                $this->form_validation->set_rules('status','Status products','required');

                if($this->form_validation->run() != false) {
                    $where = array(
                        'product_id' => $id
                    );
                    $data = array(
                        'products_merk'    => $merk,
                        'products_plat'    => $plat,
                        'products_warna'   => $warna,
                        'products_tahun'   => $tahun,
                        'products_status'  => $status
                    );
                    $this->m_rental->update_data($where,$data,'products');
                    redirect(base_url().'admin/products');
                } else {
                    $where = array(
                        'product_id' => $id
                    );
                    $data['products'] = $this->m_rental->edit_data($where,'products')->result();
                    $this->load->view('admin/header');
                    $this->load->view('admin/products_edit',$data);
                    $this->load->view('admin/footer');
                }
            }

            function products_delete($id)
            {
                $where = array(
                    'product_id' => $id
                );
                $this->m_rental->delete_data($where,'products');
                redirect(base_url().'admin/products');
            } 

            function users()
            {
                $data['users'] = $this->m_rental->get_data('users')->result();
                $this->load->view('admin/header');
                $this->load->view('admin/users',$data);
                $this->load->view('admin/footer');
            }

            function users_add()
            {
                $this->load->view('admin/header');
                $this->load->view('admin/users_add');
                $this->load->view('admin/footer');
            }

            function users_add_act() 
            {
                $nama   = $this->input->post('nama');
                $alamat = $this->input->post('alamat');
                $jk     = $this->input->post('jk');
                $hp     = $this->input->post('hp');
                $ktp    = $this->input->post('ktp');
                $this->form_validation->set_rules('nama','Nama users','required');
                $this->form_validation->set_rules('ktp','KTP users','required');

                if($this->form_validation->run() != false) {
                    $data = array(
                        'users_nama'     => $nama,
                        'users_alamat'   => $alamat,
                        'users_jk'       => $jk,
                        'users_hp'       => $hp,
                        'users_ktp'      => $ktp
                    );
                    $this->m_rental->insert_data($data,'users');
                    redirect(base_url().'admin/users');
                } else {
                    $this->load->view('admin/header');
                    $this->load->view('admin/users_add');
                    $this->load->view('admin/footer');
                }
            }

            function users_edit($id)
            {
                $where = array(
                    'user_id' => $id
                );
                $data['users'] = $this->m_rental->edit_data($where,'users')->result();
                $this->load->view('admin/header');
                $this->load->view('admin/users_edit',$data);
                $this->load->view('admin/footer');
            }

            function users_update()
            {
                $id     = $this->input->post('id');
                $nama   = $this->input->post('nama');
                $alamat = $this->input->post('alamat');
                $jk     = $this->input->post('jk');
                $hp     = $this->input->post('hp');
                $ktp    = $this->input->post('ktp');
                $this->form_validation->set_rules('nama','Nama users','required');
                $this->form_validation->set_rules('ktp','KTP users','required');

                if($this->form_validation->run() != false) {
                    $where = array(
                        'user_id' => $id
                    );
                    $data = array(
                        'users_nama'     => $nama,
                        'users_alamat'   => $alamat,
                        'users_jk'       => $jk,
                        'users_hp'       => $hp,
                        'users_ktp'      => $ktp
                    );
                    $this->m_rental->update_data($where,$data,'users');
                    redirect(base_url().'admin/users');
                } else {
                    $where = array(
                        'user_id' => $id
                    );
                    $data['users'] = $this->m_rental->edit_data($where,'users')->result();
                    $this->load->view('admin/header');
                    $this->load->view('admin/users_edit',$data);
                    $this->load->view('admin/footer');
                }
            }

            function users_delete($id)
            {
                $where = array(
                    'user_id' => $id
                );
                $this->m_rental->delete_data($where,'users');
                redirect(base_url().'admin/users');
            }
            
            function orders()
            {
                $data['orders'] = $this->db->query("SELECT * FROM orders, products, users WHERE orders_products=product_id AND orders_users=user_id")->result();
                $this->load->view('admin/header');
                $this->load->view('admin/orders',$data);
                $this->load->view('admin/footer');
            }

            function orders_hapus($id){
                $w = array(
                    'order_id' => $id
                );
                $data = $this->m_rental->edit_data($w,'orders')->row();

                $ww = array(
                    'product_id' => $data->orders_products
                );
                $data2 = array(
                    'products_status' => '1'
                );
                $this->m_rental->update_data($ww,$data2,'products');

                $this->m_rental->delete_data($w,'orders');
                redirect(base_url().'admin/orders');
            }

            function orders_add()
            {
                $w = array('products_status'=>'1');
                $data['products'] = $this->m_rental->edit_data($w,'products')->result();
                $data['users'] = $this->m_rental->get_data('users')->result();
                $this->load->view('admin/header');
                $this->load->view('admin/orders_add',$data);
                $this->load->view('admin/footer');
            }

            function orders_add_act() 
            {
                $users       = $this->input->post('users');
                $products          = $this->input->post('products');
                $tgl_pinjam     = $this->input->post('tgl_pinjam');
                $tgl_kembali    = $this->input->post('tgl_kembali');
                $harga          = $this->input->post('harga');
                $denda          = $this->input->post('denda');

                $this->form_validation->set_rules('users','users','required');
                $this->form_validation->set_rules('products','products','required');
                $this->form_validation->set_rules('tgl_pinjam','Tanggal Pinjam','required');
                $this->form_validation->set_rules('tgl_kembali','Tanggal Kembali','required');
                $this->form_validation->set_rules('harga','Harga','required');
                $this->form_validation->set_rules('denda','Denda','required');

                if($this->form_validation->run() != false) {
                    $data = array(
                        'orders_karyawan'    => $this->session->userdata('id'),
                        'orders_users'    => $users,
                        'orders_products'       => $products,
                        'orders_tgl_pinjam'  => $tgl_pinjam,
                        'orders_tgl_kembali' => $tgl_kembali,
                        'orders_harga'       => $denda,
                        'orders_denda'       => $harga,
                    );
                    $this->m_rental->insert_data($data,'orders');
                    // Update status products yang dipinjam
                    $d = array(
                        'products_status' => '2'
                    );
                    $w = array(
                        'product_id' => $products
                    );
                    $this->m_rental->update_data($w, $d, 'products');
                    // Menghitung Total Harga Pinjam
                    // $bataskembali = strtotime($tgl);
                    redirect(base_url().'admin/orders');
                } else {
                    $w = array('products_status'=>'1');
                    $data['products'] = $this->m_rental->edit_data($w,'products')->result();
                    $data['users'] = $this->m_rental->get_data('users')->result();
                    $this->load->view('admin/header');
                    $this->load->view('admin/users_add');
                    $this->load->view('admin/footer');
                }
            }
            function orders_selesai($id){
                $data['products'] = $this->m_rental->get_data('products')->result();
                $data['users'] = $this->m_rental->get_data('users')->result();
                $data['orders'] = $this->db->query("select * from orders,products,users where orders_products=product_id and orders_users=user_id and order_id='$id'")->result();
                $this->load->view('admin/header');
                $this->load->view('admin/orders_selesai',$data);
                $this->load->view('admin/footer');
            }
            function orders_selesai_act(){
                $id = $this->input->post('id');
                $tgl_dikembalikan = $this->input->post('tgl_dikembalikan');
                $tgl_kembali = $this->input->post("tgl_kembali");
                $products = $this->input->post('products');
                $denda = $this->input->post('denda');

                $this->form_validation->set_rules('tgl_dikembalikan','Tanggal Di Kembalikan', 'required');

                if($this->form_validation->run() != false){
                    //menghitung selisih hari
                    $batas_kembali = strtotime($tgl_kembali);
                    $dikembalikan = strtotime($tgl_dikembalikan);
                    $selisih = abs(($batas_kembali - $dikembalikan)/(60*60*24));
                    $total_denda = $denda*$selisih;

                    //update status orders
                    $data = array(
                        'orders_tgldikembalikan' => $tgl_dikembalikan,
                        'orders_status' => '1',
                        'orders_totaldenda' => $total_denda
                    );
                    $w = array(
                        'order_id' => $id
                    );

                    $this->m_rental->update_data($w,$data,'orders');

                    //update status products
                    $data2 = array(
                        'products_status' => '1'
                    );
                    $w2 = array(
                        'product_id' => $products
                    );

                    $this->m_rental->update_data($w2,$data2,'products');
                    redirect(base_url().'admin/orders');
                }else{
                    $data['products'] = $this->m_rental->get_data('products')->result();
                    $data['users'] = $this->m_rental->get_data('users')->result();
                    $data['orders'] = $this->db->query("select * from orders,products,users where orders_products=product_id and orders_users=user_id and order_id='$id'")->result();

                    $this->load->view('admin/header');
                    $this->load->view('admin/orders_selesai',$data);
                    $this->load->view('admin/footer');
                }
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
            */
}
?>
