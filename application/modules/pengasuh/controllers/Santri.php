<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {

	public function __construct() {
		parent::__construct();
		isPengasuhLoggedIn();
		$this->load->model("santri_model", "santri");
		$this->load->model("wali_model", "wali");
		$this->load->model("room_model", "room");
    }

	public function index()
	{
		$data['title'] = "Santri | Admin";
		$data['active'] = "santri";
		$data['santri'] = $this->santri->getAll();
		if ($data['santri'] == false) {
			$data['santri'] = array();
		}
		$data['rooms'] = $this->room->getAll();
		if ($data['rooms'] == false) {
			$data['rooms'] = array();
		}
		$this->load->view('part/header', $data);
		$this->load->view('santri/lists', $data);
		$this->load->view('part/footer', $data);
	}

	public function getDetailSantri()
	{
		if ($_GET['id']) {
			$santri = $this->santri->getDetail($_GET['id']);
			if ($santri != false) {
				print_r(json_encode($santri));
			}else{
				echo 'false';
			}
		}
	}	

	public function getDetailRoom()
	{
		if ($_GET['id']) {
			$room = $this->room->getDetail($_GET['id']);
			if ($room != false) {
				print_r(json_encode($room));
			}else{
				echo 'false';
			}
		}
	}	

	public function doAddSantri()
	{
		$password = 'default';
		if ($_POST['password'] && $_POST['password'] != "") {
			$password = $_POST['password'];
		}
		$idSantri = 'S'.md5(uniqid());
		$idWali = 'W'.md5(uniqid());
		$data = array(
			'id' => $idSantri,
			'name' => $this->input->post("name"),
			'username' => $this->input->post("username"),
			'password' => password_hash($password, PASSWORD_BCRYPT),
			'kamar' => $this->input->post("room"),
			'idWali' => $idWali
		);
		if ($this->santri->create($data)) {
			$data = array(
				'id' => $idWali,
				'name' => $this->input->post("waliName"),
				'username' => $this->input->post("phone"),
				'password' => password_hash($password, PASSWORD_BCRYPT),
				'idSantri' => $idSantri
			);
			if ($this->wali->create($data)) {
				echo $idSantri;
			}else{
				echo "false";
			}
			
		}else{
			echo "false";
		}
	}

	public function doDeleteSantri()
	{
		if ($_POST['id']) {
			if ($this->santri->delete($_POST['id'])) {
				echo "true";
			}else{
				echo "false";
			}	
		}
	}

}
