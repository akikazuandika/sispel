<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model("pengasuh_model", "pengasuh");
    }

	public function index()
	{
		$this->load->view('login');
	}

	public function doLogin()
	{
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$data = $this->pengasuh->login($username);

		if ($data == null) {
			echo 'Username tidak terdaftar';
		}else{
			if (!password_verify($password, $data['password'])) {
				$this->session->set_flashdata('error', 'Username atau password salah');
				header("Location:/pengasuh/login");
			}else{
				$this->session->set_userdata(array(
					'username' => $data['username'],
					'pengasuh' => true,
					'name' => $data['name']
				));
				header("Location:/pengasuh");
			}
		}
	}

}
