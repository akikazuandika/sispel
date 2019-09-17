<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Violation_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

	public function create($data)
	{
        $this->db->insert('pelanggaran', $data);

        return ($this->db->affected_rows() > 0) ? true : false;
    }

    public function getAll()
    {
        $violation = $this->db->query("select pelanggaran.*, users_pengasuh.name as pengasuhName, users_santri.name as santriName from pelanggaran join kamar on pelanggaran.kamarId = kamar.id join users_pengasuh on pelanggaran.chairmanId = users_pengasuh.id join users_santri on pelanggaran.santriId = users_santri.id");

        if ($violation->num_rows() > 0) {
            return $violation->result_array();
        }else{
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->where('id', $id)->delete('pelanggaran');
        return ($this->db->affected_rows() < 1) ? false : true;
    }
    
    public function update($id, $data)
    {
        $this->db->where('id', $id)->update('pelanggaran', $data);
        return ($this->db->affected_rows() < 1) ? false : true;
    }
}
