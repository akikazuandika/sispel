<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

	public function create($data)
	{
        $this->db->insert('kamar', $data);
        return ($this->db->affected_rows() < 1) ? false : true;
    }

    public function getAll()
    {
        $rooms = $this->db->query('select kamar.*, users_pengasuh.name from kamar join users_pengasuh on kamar.chairman = users_pengasuh.id');

        if ($rooms->num_rows() > 0) {
            return $rooms->result_array();
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('kamar');
        return ($this->db->affected_rows() < 1) ? false : true;
    }
    
    public function update($id, $capacity)
    {
        $this->db->where('id', $id)->update('kamar', array('capacity' => $capacity));
        return ($this->db->affected_rows() < 1) ? false : true;
    }
}
