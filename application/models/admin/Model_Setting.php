<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Setting extends CI_Model{
    public function __construct(){
        parent :: __construct();
        $this->load->database();
    }

    public function getProfil(){
        return $this->db->get('admin');
    }

    public function getprodi(){
        $this->db->from('prodi');
        
        $query = $this->db->get();
        return $query->result();
    }

    public function checkkodeprodi($kode){
        $this->db->where('kode', $kode);
        $query = $this->db->get('prodi')->num_rows();
        if ($query > 0) {
            return true;
        }else {
            return false;
        }
    }
    public function tambahprodi($data){
        $this->db->insert('prodi', $data);
    }

    public function editadmin($data){
        $this->db->update('admin', $data);
    }

    public function getWebsite(){
        return $this->db->get('setting');
    }

    public function editwebsite($data){
        $this->db->update('setting', $data);
    }

    public function getadmin(){
        $this->db->from('admin');
        $this->db->join('prodi', 'admin.kode_prodi = prodi.kode');
        
        $query = $this->db->get();
        return $query->result();
    }
    public function getadminbyusername($username){
        $this->db->where("username", $username);
        $this->db->from('admin');
        
        $query = $this->db->get();
        return $query->row();
    }
    public function checkusernameadmin($username){
        $this->db->where('username', $username);
        $query = $this->db->get('admin')->num_rows();
        if ($query > 0) {
            return true;
        }else {
            return false;
        }
    }
    public function deleteadminbyusername($username){
        $this->db->where("username", $username);
        $this->db->delete('admin');
    }

    public function tambahadmin($data){
        $this->db->insert('admin', $data);
    }

}
?>