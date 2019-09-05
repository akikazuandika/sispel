<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    
    public function login($username)
    {
        $this->db->where('username', $username);
        $user = $this->db->get('users_santri');
        return ($this->db->affected_rows() < 1) ? false : $user->result_array()[0];
    }

    public function changePassword($username, $pass)
    {
        $this->db->where('username', $username);
        $this->db->update('users_santri', array(
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
        $santri = $this->db->query("select users_santri.*, users_wali.name as waliName, users_wali.username as waliPhone, kamar.id as kamar, users_pengasuh.name as chairman from users_santri join users_wali on users_wali.idSantri = users_santri.id join kamar on users_santri.kamar = kamar.id join users_pengasuh on kamar.chairman = users_pengasuh.id where users_santri.username='" . $_SESSION['username'] . "'");

        if ($santri->num_rows() > 0) {
            return $santri->result_array()[0];
        }else{
            return false;
        }
    }

    public function getViolationSantri()
    {
        $violation = $this->db->query("select pelanggaran.* from pelanggaran join users_santri on users_santri.id = pelanggaran.santriId where users_santri.username='" . $_SESSION['username'] . "' ORDER BY pelanggaran.createdAt DESC ");
        if ($violation->num_rows() > 0) {
            return $violation->result_array();
        }else{
            return false;
        }
    }

}
