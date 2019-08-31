<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		isAdminLoggedIn();
    }

	public function index()
	{
		$data['title'] = "Dashboard | Admin";
		$this->load->view('index', $data);
	}

	public function logout()
	{
		session_destroy();
		header("Location:/admin/login");
	}

}
