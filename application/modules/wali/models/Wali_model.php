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

    public function getSantri()
    {
        $santri = $this->db->query("select users_wali.*, users_santri.name as santriName, kamar.id as kamar, users_pengasuh.name as chairman from users_wali join users_santri on users_santri.idWali = users_wali.id join kamar on users_santri.kamar = kamar.id join users_pengasuh on kamar.chairman = users_pengasuh.id where users_wali.username=" . $_SESSION['username']);

        if ($santri->num_rows() > 0) {
            return $santri->result_array()[0];
        }else{
            return false;
        }
    }

}
