<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {
	public function __construct() {
		parent::__construct();
		isSantriLoggedIn();
		$this->load->model("santri_model", "santri");
    }

	public function index()
	{
		$data['title'] = "Dashboard | Santri";
		$data['active'] = "dashboard";
		$data['info'] = $this->santri->getSantri();
		$data['violation'] = $this->santri->getViolationSantri();
		$this->load->view('part/header', $data);
		$this->load->view('index', $data);
		$this->load->view('part/footer', $data);
	}

	public function doChangePassword()
	{
		$oldPass = $this->input->post("oldPass");
		$newPass = $this->input->post("newPass");
		$confirmNewPass = $this->input->post("confirmNewPass");
		$username = $this->input->post("username");

		$data = $this->santri->login($username);
		if (!password_verify($oldPass, $data['password'])) {
			echo '1';
		}else if ($newPass != $confirmNewPass) {
			echo '0';
		}else{
			if ($this->santri->changePassword($username, password_hash($newPass, PASSWORD_BCRYPT))) {
				echo '2';
			};
		}
	}

	public function logout()
	{
		session_destroy();
		header("Location:/santri/login");
	}
}
