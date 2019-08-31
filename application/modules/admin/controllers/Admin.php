<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct() {
		parent::__construct();
		isAdminLoggedIn();
    }

	public function index()
	{
		$this->load->view('welcome_message');
	}

	public function logout()
	{
		session_destroy();
		header("Location:/admin/login");
	}

}
