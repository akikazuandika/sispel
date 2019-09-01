<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {

	public function __construct() {
		parent::__construct();
		isAdminLoggedIn();
		$this->load->model("room_model", "room");
    }

	public function index()
	{
		$data['rooms'] = $this->room->getAll();
		if ($data['rooms'] == false) {
			$data['rooms'] = array();
		}
		$data['title'] = "Daftar Kamar | Admin";
		$data['active'] = "room";
		$this->load->view('part/header', $data);
		$this->load->view('room/lists', $data);
		$this->load->view('part/footer', $data);
	}

	public function doAddRoom()
	{
		$data = array(
			'capacity' => $this->input->post("capacity"),
			'id' => $this->input->post("code"),
			'nomor' => $this->input->post("roomNumber"),
			'code' => $this->input->post("buildCode"),
		);

		if ($this->room->create($data)) {
			echo "true";
		}else{
			echo "false";
		}
	}

	public function doDeleteRoom()
	{
		if ($_POST['id']) {
			if ($this->room->delete($_POST['id'])) {
				echo "true";
			}else{
				echo "false";
			}	
		}
	}

	public function doUpdateRoom()
	{
		if ($_POST['id'] && $_POST['capacity']) {
			if ($this->room->update($_POST['id'], $_POST['capacity'])) {
				echo "true";
			}else{
				echo "false";
			}	
		}
	}

}
