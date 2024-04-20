<?php
class Model_Notifikasi extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_configuration($id) {
        $query = $this->db->get_where('notifikasi_configuration', array('id' => $id));
        return $query->row();
    }
    
    public function update_configuration($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('notifikasi_configuration', $data);
    }
    
    public function logNotifikasiAlumni() {
        return $this->db->order_by('created_at', 'desc')->get("log_notifikasi_alumni")->result();
    }
    public function addlogNotifikasiAlumni($data) {
        $this->db->insert('log_notifikasi_alumni', $data);
    }

    public function logNotifikasiPengguna() {
        return $this->db->order_by('created_at', 'desc')->get("log_notifikasi_pengguna")->result();
    }
    public function addlogNotifikasiPengguna($data) {
        $this->db->insert('log_notifikasi_pengguna', $data);
    }
}