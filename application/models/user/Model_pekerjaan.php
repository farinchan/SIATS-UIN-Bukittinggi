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
        // return $this->db->get_where('pekerjaan', ['nisn' => $nisn])->num_rows();
        $this->db->where('nisn', $nisn);
        $this->db->limit(1);
        $query = $this->db->get('pekerjaan');
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function get_data_pekerjaan($nisn)
    {
        $data = $this->db->get_where('pekerjaan', ['nisn' => $nisn], 1)->result()[0];
        $arr = [];
        $arr = [
            'id_pekerjaan' => $data->id_pekerjaan == null ? '-' : $data->id_pekerjaan,
            'nisn' => $data->nisn == null ? '-' : $data->nisn,
            'mendapatkan_pekerjaan' => $data->mendapatkan_pekerjaan == null ? '-' : $data->mendapatkan_pekerjaan,
            'tempat_kerja' => $data->tempat_kerja == null ? '-' : $data->tempat_kerja,
            'sumber_informasi_pekerjaan' => $data->sumber_informasi_pekerjaan == null ? '-' : $data->sumber_informasi_pekerjaan,
            'nama_atasan' => $data->nama_atasan == null ? '-' : $data->nama_atasan,
            'wa_atasan' => $data->wa_atasan == null ? '-' : $data->wa_atasan,
            'email_atasan' => $data->email_atasan == null ? '-' : $data->email_atasan,
            'lama_menganggur' => $data->lama_menganggur == null ? '-' : $data->lama_menganggur,
            'relevansi_bidang_kerja' => $data->relevansi_bidang_kerja == null ? '-' : $data->relevansi_bidang_kerja,
            'gaji_pertama_bekerja' => $data->gaji_pertama_bekerja == null ? '-' : $data->gaji_pertama_bekerja,
            'permasalahan_pekerjaan' => $data->permasalahan_pekerjaan == null ? '-' : $data->permasalahan_pekerjaan,
            'narasi_bidang_kerja' => $data->narasi_bidang_kerja == null ? '-' : $data->narasi_bidang_kerja,
            'masukan_skill_mahasiswa' => $data->masukan_skill_mahasiswa == null ? '-' : $data->masukan_skill_mahasiswa,
            'masukan_prodi_ptik' => $data->masukan_prodi_ptik == null ? '-' : $data->masukan_prodi_ptik,
            'penilaian_a' => $data->penilaian_a == null ? '-' : $data->penilaian_a,
            'penilaian_b' => $data->penilaian_b == null ? '-' : $data->penilaian_b,
            'penilaian_c' => $data->penilaian_c == null ? '-' : $data->penilaian_c,
            'penilaian_d' => $data->penilaian_d == null ? '-' : $data->penilaian_d,
            'penilaian_e' => $data->penilaian_e == null ? '-' : $data->penilaian_e,
            'penilaian_f' => $data->penilaian_f == null ? '-' : $data->penilaian_f,
            'penilaian_g' => $data->penilaian_g == null ? '-' : $data->penilaian_g,
            'penilaian_h' => $data->penilaian_h == null ? '-' : $data->penilaian_h,
            'penilaian_i' => $data->penilaian_i == null ? '-' : $data->penilaian_i,
            'penilaian_j' => $data->penilaian_j == null ? '-' : $data->penilaian_j,
            'penilaian_k' => $data->penilaian_k == null ? '-' : $data->penilaian_k,
            'penilaian_l' => $data->penilaian_l == null ? '-' : $data->penilaian_l,
            'penilaian_m' => $data->penilaian_m == null ? '-' : $data->penilaian_m,
            'penilaian_n' => $data->penilaian_n == null ? '-' : $data->penilaian_m,
        ];
        return $arr;
    }
    public function update_trace_pekerjaan($nisn, $data)
    {
        // return $this->db->get_where('pekerjaan', ['nisn' => $nisn])->result_array()[0];
        $this->db->where('nisn', $nisn);
        return $this->db->update('pekerjaan', $data);
        
    }
    public function insert_trace_pekerjaan($data)
    {
        // return $this->db->get_where('pekerjaan', ['nisn' => $nisn])->result_array()[0];
        return $this->db->insert('pekerjaan', $data);
        // return ($this->db->affected_rows() != 1) ? false : true;
    }
}
