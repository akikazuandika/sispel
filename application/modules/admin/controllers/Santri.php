<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri extends CI_Controller {

	public function __construct() {
		parent::__construct();
		isAdminLoggedIn();
		$this->load->model("santri_model", "santri");
    }

	public function index()
	{
		$data['title'] = "Dashboard | Admin";
		$this->load->view('index', $data);
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

}
