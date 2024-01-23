<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('kedai_model');
	}

	public function index()
	{
		$this->load->view('login');
	}

	function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');

		if ($this->form_validation->run() != false) {
			$where = array(
				'username' => $username,
				'password' => md5($password)
			);

			$data = $this->kedai_model->edit_data($where, 'admin_users');
			$d = $this->kedai_model->edit_data($where, 'admin_users')->row();

			$cek = $data->num_rows();
			if ($cek > 0) {
				$session = array(
					'id' => $d->id,
					'nama' => $d->username,
					'status' => 'login'
				);

				$this->session->set_userdata($session);
				redirect(base_url() . 'admin');
			} else {
				redirect(base_url() . 'welcome?pesan=gagal');
			}
		} else {
			$this->load->view('login');

		}
	}
}
?>