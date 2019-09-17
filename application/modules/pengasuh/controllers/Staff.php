<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff extends CI_Controller {

	public function __construct() {
		parent::__construct();
		isPengasuhLoggedIn();
		$this->load->model("staff_model", "staff");
    }

	public function index()
	{
		$data['staff'] = $this->staff->getAll();
		if ($data['staff'] == false) {
			$data['staff'] = array();
		}
		$data['title'] = "Daftar Pengasuh | Admin";
		$data['active'] = "staff";
		$this->load->view('part/header', $data);
		$this->load->view('staff/lists', $data);
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
		if ($this->staff->create($data)) {
			echo $id;
		}else{
			echo "false";
		}
	}

	public function doDeleteStaff()
	{
		if ($_POST['id']) {
			if ($this->staff->delete($_POST['id'])) {
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
			if ($this->staff->update($_POST['id'], $data)) {
				echo "true";
			}else{
				echo "false";
			}	
		}
	}

}
