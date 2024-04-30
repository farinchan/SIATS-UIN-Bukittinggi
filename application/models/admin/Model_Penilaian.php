<?php
class Model_Penilaian extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getall_penilaian() {
        $this->db->select('*');
        $this->db->from('penilaian_pengguna');        
        // $this->db->order_by('created_at', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function count_all_penilaian() {
        return $this->db->get('penilaian_pengguna')->num_rows();
    }

    public function get_penilaian($id) {
        $query = $this->db->get_where('penilaian_pengguna', array('id' => $id));
        return $query->row();
    }

    public function get_penilaian_lihat($id) {
        $query = $this->db->get_where('penilaian_pengguna', array('id' => $id));
        return $query->num_rows();
    }

    public function insert_penilaian($data) {
        $this->db->insert('penilaian_pengguna', $data);
    }
    

    public function update_penilaian($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('penilaian_pengguna', $data);
    }

    public function searchpenggunabyNama($keyword) {
        $this->db->like('nama', $keyword);
        $query = $this->db->get('penilaian_pengguna');
        return $query->result();
    }

}