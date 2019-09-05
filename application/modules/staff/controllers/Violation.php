<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Violation extends CI_Controller {

	public function __construct() {
		parent::__construct();
		isStaffLoggedIn();
        $this->load->model("violation_model", "violation");
        $this->load->model("santri_model", "santri");
    }

	public function index()
	{
		$data['violation'] = $this->violation->getAll();
		if ($data['violation'] == false) {
			$data['violation'] = array();
        }
        $data['santri'] = $this->santri->getAll();
		if ($data['santri'] == false) {
			$data['santri'] = array();
        }
		$data['title'] = "Daftar Pelanggaran | Admin";
		$data['active'] = "violation";
		$this->load->view('part/header', $data);
		$this->load->view('violation/lists', $data);
		$this->load->view('part/footer', $data);
	}

	public function doAddViolation()
	{
        $id = md5(uniqid());
        $data = array(
			'id' => $id,
            'santriId' => $this->input->post("santriId"),
            'kamarId' => $this->input->post("roomId"),
            'chairmanId' => $this->input->post("chairmanId"),
			'type' => $this->input->post("type"),
			'description' => $this->input->post("desc")
        );
		if ($this->violation->create($data)) {
            echo $id;
        }else{
            echo 'false';
        }
	}

	public function doDeleteViolation()
	{
		if ($_POST['id']) {
			if ($this->violation->delete($_POST['id'])) {
				echo "true";
			}else{
				echo "false";
			}	
		}
	}

	public function doUpdateViolation()
	{
		if ($_POST['id'] && $_POST['name'] && $_POST['username']) {
			$data = array(
				'name' => $_POST['name'],
				'username' => $_POST['username'],
			);
			if ($this->violation->update($_POST['id'], $data)) {
				echo "true";
			}else{
				echo "false";
			}	
		}
	}

}
