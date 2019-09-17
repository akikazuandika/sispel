<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends CI_Controller {

	public function __construct() {
		parent::__construct();
		isPengasuhLoggedIn();
		$this->load->model("security_model", "security");
    }

	public function index()
	{
		$data['security'] = $this->security->getAll();
		if ($data['security'] == false) {
			$data['security'] = array();
		}
		$data['title'] = "Daftar Ketua Kamar | Admin";
		$data['active'] = "security";
		$this->load->view('part/header', $data);
		$this->load->view('security/lists', $data);
		$this->load->view('part/footer', $data);
	}

	public function doAddStaff()
	{
		$password = 'default';
		if ($_POST['password'] && $_POST['password'] != "") {
			$password = $_POST['password'];
		}
		$id = md5(uniqid());
		$data = array(
			'id' => $id,
			'name' => $this->input->post("name"),
			'username' => $this->input->post("username"),
			'password' => password_hash($password, PASSWORD_BCRYPT)
		);
		if ($this->security->create($data)) {
			echo $id;
		}else{
			echo "false";
		}
	}

	public function doDeleteStaff()
	{
		if ($_POST['id']) {
			if ($this->security->delete($_POST['id'])) {
				echo "true";
			}else{
				echo "false";
			}	
		}
	}

	public function doUpdateStaff()
	{
		if ($_POST['id'] && $_POST['name'] && $_POST['username']) {
			$data = array(
				'name' => $_POST['name'],
				'username' => $_POST['username'],
			);
			if ($this->security->update($_POST['id'], $data)) {
				echo "true";
			}else{
				echo "false";
			}	
		}
	}

}
