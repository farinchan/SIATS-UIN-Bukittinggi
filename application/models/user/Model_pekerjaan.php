<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_pekerjaan extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function get_riwayat_pekerjaan($nisn)
    {
        return $this->db->get_where('riwayat_pekerjaan', ['nisn' => $nisn]);
    }
    public function check_if_exist($nisn)
    {
        // return $this->db->get_where('tracer_univ', ['nisn' => $nisn])->num_rows();
        $this->db->where('nisn', $nisn);
        $this->db->limit(1);
        $query = $this->db->get('tracer_univ');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function get_data_pekerjaan($nisn)
    {
        $data = $this->db->get_where('tracer_univ', ['nisn' => $nisn], 1)->result()[0];
        $arr = [];
        $arr = [
            'id' => $data->id == null ? '-' : $data->id,
            'nisn' => $data->nisn == null ? '-' : $data->nisn,
            'p1' => $data->p1 == null ? '-' : $data->p1,
            'p2' => $data->p2 == null ? '-' : $data->p2,
            'p3' => $data->p3 == null ? '-' : $data->p3,
            'p3' => $data->p3 == null ? '-' : $data->p3,
            'p4' => $data->p4 == null ? '-' : $data->p4,
            'p5' => $data->p5 == null ? '-' : $data->p5,
            'p6' => $data->p6 == null ? '-' : $data->p6,
        ];
        return $arr;
    }
    public function update_trace_pekerjaan($nisn, $data)
    {
        // return $this->db->get_where('tracer_univ', ['nisn' => $nisn])->result_array()[0];
        $this->db->where('nisn', $nisn);
        return $this->db->update('tracer_univ', $data);
        
    }
    public function insert_trace_pekerjaan($data)
    {
        // return $this->db->get_where('pekerjaan', ['nisn' => $nisn])->result_array()[0];
        return $this->db->insert('tracer_univ', $data);
        // return ($this->db->affected_rows() != 1) ? false : true;
    }
}
