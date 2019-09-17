<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wali_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

	public function create($data)
	{
        $this->db->insert('users_wali', $data);

        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function getAll()
    {
        $this->db->order_by('createdAt','ASC');
        $rooms = $this->db->get('users_wali');

        if ($rooms->num_rows() > 0) {
            return $rooms->result_array();
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('users_wali');
        return ($this->db->affected_rows() < 1) ? false : true;
    }
    
    public function update($id, $data)
    {
        $this->db->where('id', $id)->update('users_wali', $data);
        return ($this->db->affected_rows() < 1) ? false : true;
    }
}
