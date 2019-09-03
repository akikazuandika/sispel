<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

	public function create($data)
	{
        $this->db->insert('users_admin', $data);
        return ($this->db->affected_rows() < 1) ? false : true;
    }
    
    public function login($username)
    {
        $this->db->where('username', $username);
        $user = $this->db->get('users_admin');
        return ($this->db->affected_rows() < 1) ? false : $user->result_array()[0];
    }

    public function changePassword($username, $pass)
    {
        $this->db->where('username', $username);
        $this->db->update('users_admin', array(
            'password' => $pass
        ));
        if ($this->db->affected_rows() >= 1) {
            return true;
        }else{
            return null;
        }
    }

}
