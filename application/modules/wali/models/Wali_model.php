<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wali_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    
    public function login($phone)
    {
        $this->db->where('username', $phone);
        $user = $this->db->get('users_wali');
        return ($this->db->affected_rows() < 1) ? false : $user->result_array()[0];
    }

    public function changePassword($phone, $pass)
    {
        $this->db->where('username', $phone);
        $this->db->update('users_wali', array(
            'password' => $pass
        ));
        if ($this->db->affected_rows() >= 1) {
            return true;
        }else{
            return null;
        }
    }

}
