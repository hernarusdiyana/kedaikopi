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
		$redirect_page = $this->input->post('redirect_page');
		$data = array(
            "id"    	=> $this->input->post('id'),
            "qty"    	=> $this->input->post('qty'),
            "name"    	=> $this->input->post('name'),
            "price"    	=> $this->input->post('price'),
		);
        $this->cart->insert($data); // return row id
		redirect($redirect_page,'refresh');
    }

    function cart()
    {
		// $data['products'] = $this->product_model->get_data('products')->result();

		echo $this->view_cart();
    }
	public function load()
    {
        echo $this->view_cart();
    }
	public function remove_cart()
	{
		$row_id = $this->input->post('row_id');
		$data = array(
			'rowid'   => $row_id,
			'qty'     => 0 // Set kuantitas menjadi 0 untuk menghapus item
		);
		$this->cart->update($data);
		echo $this->view_cart();
	}
	public function clear_cart()
	{
		$this->cart->destroy();
		echo $this->view_cart();
	}
	public function view_cart()
	{
		$this->load->view('templates/header');
		// $this->load->view('cart');
		$this->load->view('templates/footer');
		$output = '';
        $output .= '
            <div class="container-fluid mt-14">
			<h3>Keranjang Belanja</h3> <br/>
            <div class="table-responsive">
            <div class="flex justify-end" align="right">
                <button type="button" id="clear_cart" class="btn btn-sm btn-warning"><i class="fa fa-shopping-cart"></i> Kosongkan</button>
            </div>
                <br/>
                <table class="table table-bordered">
                    <tr>
                        <th width="40%">Name</th>
                        <th width="15%">Jumlah</th>
                        <th width="20%">Harga</th>
                        <th width="20%">Total</th>
                        <th width="5%">#</th>
                    </tr>
        ';
        $count = 0;
        foreach ($this->cart->contents() as $item) {
            $count++;
            $output .= '
            <tr>
                <td>' . $item["name"] . '</td>
                <td>' . $item["qty"] . '</td>
				<td>Rp ' . number_format($item["price"], 0, ',', '.') . '</td>
				<td>Rp ' . number_format($item["subtotal"], 0, ',', '.') . '</td>
                <td><button type="button" name="remove" class="btn btn-danger btn-sm remove_inventory" id="' . $item['rowid'] . '"><i class="fi fi-rr-cross-circle"></i></button></td>
            </tr>
            ';
        }
        $output .= '
            <tr>
                <td colspan="4" align="right">Total</td>
                <td>Rp' . number_format($this->cart->total(), 0, ',', '.') . '</td>
            <tr>
            </table>
            </div>
			<a href="' . base_url('app/checkout') . '" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">Order</a>

			
			</div>
        ';
        if ($count == 0) {
            $output .= '
			<h3 class="text-center text-danger"><i class="fa fa-shopping-cart">
			</i> Keranjang belanja kosong</h3> <a href="' . base_url('app/') . '" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline-blue">Pilih Menu</a>';
        
		}
		
        return $output;

	}
	
    function checkout()
    {
       $cart_contents = $this->cart->contents();
	   
	//    FORM VALIDATION
		$this->form_validation->set_rules('nama', 'Nama', 'required');
		$this->form_validation->set_rules('nomor_meja', 'Nomor Meja', 'required');
		$this->form_validation->set_rules('notes', 'Notes');

	//    Proses Pesanan
		if ($this->form_validation->run() == TRUE) {
			$nama = $this->input->post('nama');
			$nomor_meja = $this->input->post('nomor_meja');
			$notes = $this->input->post('notes');

			// simpan data pesanan ke database (tabel order)
			$data_order = array(
				'nama' => $nama,
				'nomor_meja' => $nomor_meja,
				'notes' => $notes,
			);

			$this->db->insert('pesanan', $data_order);
		} else {
			$this->load->view('templates/header');
			$this->load->view('checkout', array('cart_contents'=> $cart_contents));
			$this->load->view('templates/footer');
		}
    }

    function process_order()
    {
		$cart_data = $this->cart->contents();

		// $user_id = $this->session->userdata('user_id'); // Gantilah dengan cara yang sesuai untuk mendapatkan user_id
		$order_data = array(
			// 'user_id' => $user_id,
			'nama' => $this->input->post('nama'),
			'notes' => $this->input->post('notes'),
			'nomor_meja' => $this->input->post('nomor_meja'),
			'metode_pembayaran' => $this->input->post('metode_pembayaran'),
			'total' => $this->cart->total(),
			'status' => 'pending',
		);

		$this->kedai_model->insert_order($order_data, $cart_data);

		// proses pembayaran
		// ...

		// hapus data dari library cart setelah proses checkout selesai
		$this->cart->destroy();
						
		$this->load->view('templates/header');
		$this->load->view('checkout_success');
		$this->load->view('templates/footer');

    }

}
?>
