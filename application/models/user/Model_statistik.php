<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_statistik extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function getProdi()
    {
        return $this->db->get('prodi')->result();
    }
    public function getDistinctJenjang()
    {
        $this->db->select('jenjang');
        $this->db->distinct();
        $query = $this->db->get('prodi');
        return $query->result();
    }
    public function getDistincFakultas()
    {
        $this->db->select('fakultas');
        $this->db->distinct();
        $query = $this->db->get('prodi');
        return $query->result();
    }
    function getTahunLulus()
    {
        $this->db->order_by('tahun_lulus', 'DESC');
        return $this->db->get('tahun_lulus')->result();
    }

    public function get_count_alumni()
    {
        $this->db->select("*")->from('alumni');
        return $this->db->count_all_results();
    }

    public function countAlumni($tahun_dari, $tahun_sampai, $jenjang, $fakultas, $prodi)
    {
        // Query untuk menghitung jumlah alumni berdasarkan prodi
        $this->db->select('prodi.nama as nama, fakultas , jenjang, COUNT(alumni.nisn) as jumlah_alumni');
        $this->db->from('prodi');
        $this->db->join('alumni', 'alumni.kode_prodi = prodi.kode', 'left');
        $this->db->group_by('prodi.kode');

        $this->db->where('alumni.tahun_lulus >=', $tahun_dari);
        $this->db->where('alumni.tahun_lulus <=', $tahun_sampai);

        if ($jenjang != "0") {
            $this->db->where('prodi.jenjang', $jenjang);
        }
        if ($fakultas != "0") {
            $this->db->where('prodi.fakultas', $fakultas);
        }

        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->result_array(); // Mengembalikan hasil dalam bentuk array
        } else {
            return array(); // Mengembalikan array kosong jika tidak ada data
        }
    }

    public function countAlumniNum($tahun_dari, $tahun_sampai, $jenjang, $fakultas, $prodi)
    {
        // Query untuk menghitung jumlah alumni berdasarkan prodi
        $this->db->select('nisn');
        $this->db->from('alumni');
        $this->db->join('prodi', 'alumni.kode_prodi = prodi.kode', 'right');
        // $this->db->order_by('prodi.nama', 'DESC');
        // $this->db->group_by('prodi.kode');

        $this->db->where('alumni.tahun_lulus >=', $tahun_dari);
        $this->db->where('alumni.tahun_lulus <=', $tahun_sampai);
        
        if ($jenjang != "0") {
            $this->db->where('prodi.jenjang', $jenjang);
        }
        if ($fakultas != "0") {
            $this->db->where('prodi.fakultas', $fakultas);
        }

        return $this->db->get()->num_rows();
    }

    public function countTracer($tahun_dari, $tahun_sampai, $jenjang, $fakultas, $prodi)
    {
        $this->db->select('p1,p2,p2,p3,p4,p5,p6');
        $this->db->from('tracer_univ');
        $this->db->join('alumni', 'tracer_univ.nisn = alumni.nisn', 'full');
        $this->db->join('prodi', 'alumni.kode_prodi = prodi.kode', 'full');

        $this->db->where('alumni.tahun_lulus >=', $tahun_dari);
        $this->db->where('alumni.tahun_lulus <=', $tahun_sampai);

        if ($jenjang !== "0") {
            $this->db->where('prodi.jenjang', $jenjang);
        }
        if ($fakultas !== "0") {
            $this->db->where('prodi.fakultas', $fakultas);
        }


        return $this->db->get()->result_array();
    }
}
