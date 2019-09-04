<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("wali_model", "wali");
    }

	public function index()
	{
		$this->load->view('login');
	}

	public function doLogin()
	{
		$phone = $this->input->post("phone");
		$password = $this->input->post("password");
		$data = $this->wali->login($phone);

		if ($data == null) {
			echo 'Phone tidak terdaftar';
		}else{
			if (!password_verify($password, $data['password'])) {
				$this->session->set_flashdata('error', 'phone atau password salah');
				header("Location:/wali/login");
			}else{
				$this->session->set_userdata(array(
					'username' => $data['username'],
					'name' => $data['name']
				));
				header("Location:/wali");
			}
		}
	}
}
