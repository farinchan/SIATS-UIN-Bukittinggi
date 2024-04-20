<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_Galeri extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function tambahdata($data)
    {
        $this->db->insert('galeri_kegiatan', $data);
    }

    public function listFoto()
    {
        // $this->db->where('type', "foto");
        // $this->db->order_by('id', "DESC");
        // return $this->db->get('galeri_kegiatan');

        $this->db->select('galeri_kegiatan.*, galeri.*'); // Pilih kolom yang diinginkan
        $this->db->from('galeri_kegiatan');
        $this->db->where('galeri_kegiatan.type', 'foto');
        $this->db->order_by('galeri_kegiatan.id', 'DESC');
        $this->db->join('galeri', 'galeri.id_galeri = galeri_kegiatan.id_galeri', 'left'); // Sesuaikan dengan hubungan antara kedua tabel

        $query = $this->db->get();
        return $query->result();
    }

    public function listVideo()
    {
        // $this->db->where('type', "video");
        // $this->db->order_by('id', "DESC");
        // return $this->db->get('galeri_kegiatan');

        $this->db->select('galeri_kegiatan.*, galeri.*'); // Pilih kolom yang diinginkan
        $this->db->from('galeri_kegiatan');
        $this->db->where('galeri_kegiatan.type', 'video');
        $this->db->order_by('galeri_kegiatan.id', 'DESC');
        $this->db->join('galeri', 'galeri.id_galeri = galeri_kegiatan.id_galeri', 'left'); // Sesuaikan dengan hubungan antara kedua tabel

        $query = $this->db->get();
        return $query->result();
    }

    public function ListData($id)
    {
        // $this->db->where('id', $id);
        // return $this->db->get('galeri_kegiatan');

        $this->db->select('galeri_kegiatan.*, galeri.*'); // Pilih kolom yang diinginkan
        $this->db->from('galeri_kegiatan');
        $this->db->where('galeri_kegiatan.id', $id);
        $this->db->join('galeri', 'galeri.id_galeri = galeri_kegiatan.id_galeri', 'left'); // Sesuaikan dengan hubungan antara kedua tabel

        $query = $this->db->get();
        return $query->result();
   
    }

    public function EditData($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('galeri_kegiatan', $data);
    }

    public function getFoto($id)
    {
        // $res = $this->ListData($id);
        // foreach ($res->result() as $x) :
        //     return $x->file;
        // endforeach;

        $this->db->where('id', $id);
        return $this->db->get('galeri_kegiatan')->row();
    }

    public function Hapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('galeri_kegiatan');
    }

    // Revisi

    public function getDataGaleri()
    {
        return $this->db->get('galeri');
    }

    public function tambahkegiatan($data)
    {
        $this->db->insert('galeri', $data);
    }

    public function getDetail($id)
    {
        $this->db->where('id_galeri', $id);
        return $this->db->get('galeri_kegiatan');
    }

    public function getNamaKegiatan($id)
    {
        $this->db->where('id_galeri', $id);
        $res = $this->db->get('galeri');
        foreach ($res->result() as $x) {
            return $x->judul_kegiatan;
        }
    }

    public function getDetailByid($id)
    {
        $this->db->where('id', $id);
        return $this->db->get('galeri_kegiatan');
    }

    public function getGaleriByid($id)
    {
        $this->db->where('id_galeri', $id);
        return $this->db->get('galeri');
    }

    public function editGaleriKegiatan($id, $data)
    {
        $this->db->where('id_galeri', $id);
        $this->db->update('galeri', $data);
    }

    public function hapuskegiatan($id)
    {
        $this->db->where('id_galeri', $id);
        $this->db->delete('galeri');
    }
}
