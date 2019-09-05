<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Santri_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

	public function create($data)
	{
        $this->db->insert('users_santri', $data);

        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function getAll()
    {
        $this->db->order_by('createdAt','DESC');
        $santri = $this->db->query("select users_santri.*, users_pengasuh.name as pengasuhName, users_pengasuh.id as pengasuhId, users_wali.name as waliName, users_wali.id as waliId from users_santri join kamar on users_santri.kamar = kamar.id join users_pengasuh on kamar.chairman = users_pengasuh.id  join users_wali on users_santri.idWali = users_wali.id");

        if ($santri->num_rows() > 0) {
            return $santri->result_array();
        }else{
            return false;
        }
    }

    public function getDetail($id)
    {
        $santri = $this->db->query("select users_santri.*, users_pengasuh.name as pengasuhName, users_pengasuh.id as pengasuhId from users_santri join kamar on users_santri.kamar = kamar.id join users_pengasuh on kamar.chairman = users_pengasuh.id where users_santri.id = '$id'");
        
        if ($santri->num_rows() > 0) {
            return $santri->result_array()[0];
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('users_santri');
        return ($this->db->affected_rows() < 1) ? false : true;
    }
    
    public function update($id, $data)
    {
        $this->db->where('id', $id)->update('users_santri', $data);
        return ($this->db->affected_rows() < 1) ? false : true;
    }
}
