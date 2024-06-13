<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model_Alumni extends CI_Model{

    public function __construct(){
        parent :: __construct();
        $this->load->database();
    }


    public function getTahunlulus(){

        $this->db->from('tahun_lulus');
        return $this->db->order_by('tahun_lulus', 'desc')->get(); 
    }

    public function tambahtahunlulus($data){

        $this->db->insert('tahun_lulus', $data);

    }

    public function logupdatealumni($data){
        $this->db->insert('log_update', $data);
    }

    public function logupdatealumnitotal(){
        $this->db->where('dibaca', 0);
        return $this->db->get('log_update')->num_rows();
    }

    public function getlogupdatealumni(){
        $this->db->from('log_update');
        $this->db->order_by('waktu_update', 'desc'); 
        
        $query = $this->db->get();
        return $query->result();
    }
    public function getlogupdatealumniLimit(){
        $this->db->from('log_update');
        $this->db->order_by('waktu_update', 'desc'); 
        $this->db->limit(5); 
        
        $query = $this->db->get();
        return $query->result();
    }

    public function mark_all_as_read() {
        $this->db->update('log_update', array('dibaca' => 1));
    }


    public function gettahunlulusbyvalue($tahunlulus){
        $this->db->where('tahun_lulus', $tahunlulus);
        return $this->db->get('tahun_lulus');
    }

    public function hapustahunlulus($tahunlulus){
        $this->db->where('tahun_lulus', $tahunlulus);
        $this->db->delete('tahun_lulus');
    }

    public function get_listalumni_query($isi_tracer, $tahun_lulus , $kode_prodi){
        $coloumn_order = array('nisn', 'nama_alumni', 'tahun_lulus', 'status_alumni', 'detail_status', null);
        $coloumn_search = array('nisn', 'nama_alumni', 'tahun_lulus', 'status_alumni', 'detail_status');
        $order = array('alumni.nisn'=>'DESC');

        $this->db->select('*');
        $this->db->from('alumni');
        $this->db->join('prodi', 'alumni.kode_prodi = prodi.kode', 'inner');


        if ($isi_tracer == 1) {
            $this->db->join('tracer_univ', 'alumni.nisn = tracer_univ.nisn', 'inner');
        }

        $this->db->where('status_akun', "Y");

        if ($tahun_lulus != 0) {
            $this->db->where('tahun_lulus', $tahun_lulus);
        }

        if ($kode_prodi != 0) {
            $this->db->where('alumni.kode_prodi', $kode_prodi);     
        }

        $i = 0;

        foreach ($coloumn_search as $item){

            if($_POST['search']['value']){

                if($i == 0){

                    $this->db->like($item, $_POST['search']['value']);
                    $this->db->where('status_akun', "Y");

                }else{

                    $this->db->or_like($item, $_POST['search']['value']);
                    $this->db->where('status_akun', "Y");

                }

                $i++;

            }

            if(isset($_POST['order'])){

                $this->db->order_by($coloumn_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

            }else if(isset($order)){

                $this->db->order_by(key($order), $order[key($order)]);

            }

            if ($_SESSION['role'] == "admin") {
                $this->db->where('alumni.kode_prodi', $_SESSION['kode_prodi']);
            }

        }

    }

    public function getlistalumni($isi_tracer, $tahun_lulus, $kode_prodi){

        $this->get_listalumni_query($isi_tracer, $tahun_lulus, $kode_prodi);
        if($_POST['length'] != -1){

            $this->db->limit($_POST['length'], $_POST['start']);

        }

        return $this->db->get()->result();

    }


    public function count_filtered_alumni($tracer, $lulus, $kode_prodi){

        $this->get_listalumni_query($tracer, $lulus, $kode_prodi);
        return $this->db->get()->num_rows();

    }

    public function count_all_alumni(){
        $this->db->where('status_akun', "Y");
        return $this->db->get('alumni')->num_rows();

    }
    public function alumni_filter($kode_prodi){
        $this->db->select("alumni.nisn");
        $this->db->from('alumni');
        $this->db->where('status_akun', "Y");
        $this->db->where("kode_prodi" , "$kode_prodi");
        // $this->db->where("SUBSTRING(alumni.nisn, 3, 2) = '20'");
        return $this->db->get()->result();
    }
    public function alumni_tracer_filter($kode_prodi, $angkatan){
        $this->db->select("tracer_univ.nisn");
        $this->db->from('tracer_univ');
        $this->db->where("SUBSTRING(tracer_univ.nisn, 1, 2) = $kode_prodi");
        $this->db->where("SUBSTRING(tracer_univ.nisn, 3, 2) = $angkatan");
        return $this->db->get()->num_rows();
    }

    public function alumni_tracer_filter2($kode_prodi, $angkatan){
        $this->db->select("tracer_univ.nisn");
        $this->db->from('tracer_univ');
        $this->db->where("SUBSTRING(tracer_univ.nisn, 1, 3) = $kode_prodi");
        $this->db->where("SUBSTRING(tracer_univ.nisn, 4, 2) = $angkatan");
        return $this->db->get()->num_rows();
    }

    public function get_all_alumni_incomplete(){
        $this->db->select('*');
        $this->db->from('alumni'); // Ganti "nama_tabel" dengan nama tabel Anda
        $this->db->where('status_akun', "Y");
        $this->db->group_start();
        $this->db->where('alamat_kabupaten IS NULL');
        $this->db->or_where('alamat_kabupaten IS NULL');
        $this->db->or_where('alamat_kecamatan IS NULL');
        $this->db->or_where('foto_alumni IS NULL');
        $this->db->or_where('facebook IS NULL');
        $this->db->or_where('twitter IS NULL');
        $this->db->or_where('instagram IS NULL');
        $this->db->group_end();
        $query = $this->db->get();
        return $query->result();

    }

    public function searchAlumnibyNama($keyword) {
        $this->db->like('nama_alumni', $keyword);
        $query = $this->db->get('alumni');
        return $query->result();
    }

    public function getAlumni($nisn){
        $this->db->where('nisn', $nisn);
        return $this->db->get('alumni');
    }

    public function getTracerAlumni($nisn){
        $this->db->where('nisn', $nisn);
        return $this->db->get('tracer_univ');
    }
    public function getTracerAll(){
        $this->db->select('*');
        $this->db->from('tracer_univ');
        $this->db->join('alumni', 'tracer_univ.nisn = alumni.nisn', 'inner');
        $this->db->order_by('tracer_univ.nisn', 'ASC');
        return $this->db->get();
    }

    public function input_tracer($data){
        $this->db->insert('tracer_univ', $data);
    }

    public function tracer_if_exist($nisn)
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

    public function getnamaAlumni($nisn){
        $x = $this->getAlumni($nisn);
        foreach ($x->result() as $y){
            return $y->nama_alumni;
        }
    } 
    
    public function hapusAlumni($nisn){
        $this->db->where('nisn', $nisn);
        $this->db->delete('alumni');
    }

    public function getAlumniRes(){
        return $this->db->get('alumni')->result();
    }

    public function getAlumniAktif($isi_tracer, $tahun_lulus, $kode_prodi){
        // return $this->db->where('status_akun', "Y")->limit(10)->get("alumni");

        $this->db->select('*');
        $this->db->from('alumni');

        if ($isi_tracer == 1) {
            $this->db->join('tracer_univ', 'alumni.nisn = tracer_univ.nisn', 'inner');
        }

        $this->db->where('status_akun', "Y");

        if ($tahun_lulus != 0) {
            $this->db->where('tahun_lulus', $tahun_lulus);
        }

        if ($kode_prodi != 0) {
            $this->db->where('alumni.kode_prodi', $kode_prodi);     
        }

        $this->db->order_by('alumni.nisn', 'ASC');
    
        // Execute the query and return the results
        return $this->db->get()->result();
    }

    public function totalberita_acc($nisn){
        $this->db->where('nisn', $nisn);
        $this->db->where('status_berita', "Y");
        return $this->db->get('berita')->num_rows();
    }

    public function totalberita_noacc($nisn){
        $this->db->where('nisn', $nisn);
        $this->db->where('status_berita', "N");
        return $this->db->get('berita')->num_rows();
    }

    public function totaltopik($nisn){
        $this->db->where('nisn', $nisn);
        return $this->db->get('topik')->num_rows();
    }

    public function getBeritaAlumni($nisn){
        $this->db->select('*');
        $this->db->from('kategori_berita');
        $this->db->join('berita', 'kategori_berita.id_kategoriberita = berita.id_kategoriberita');
        $this->db->where('nisn', $nisn);
        $this->db->order_by('id_berita', "DESC");
        return $this->db->get();
    }

    public function getBeritaDetail($idberita){
        $this->db->select('*');
        $this->db->from('kategori_berita');
        $this->db->join('berita', 'kategori_berita.id_kategoriberita = berita.id_kategoriberita');
        $this->db->where('id_berita', $idberita);
        return $this->db->get();
    }

    public function getJudulberita($idberita){
        $list = $this->getBeritaDetail($idberita);
        foreach ($list->result() as $x):
            return $x->judul_berita;
        endforeach;
    }

    public function getBeritaAlumniDetail($idberita){
        $this->db->select('*');
        $this->db->from('kategori_berita');
        $this->db->join('berita', 'kategori_berita.id_kategoriberita = berita.id_kategoriberita');
        $this->db->where('id_berita', $idberita);
        $this->db->order_by('id_berita', "DESC");
        return $this->db->get();
    }

    public function getlisttopikbyalumni($nisn){
        $this->db->select('*');
        $this->db->from('kategori_topik');
        $this->db->join('topik', 'kategori_topik.id_kategoritopik = topik.id_kategoritopik');
        $this->db->join('alumni','topik.nisn = alumni.nisn');
        $this->db->where('alumni.nisn', $nisn);
        $this->db->order_by('id_topik', "DESC");
        return $this->db->get();
    }

    public function cektopik_byid_nisn($idtopik){
        $this->db->where('id_topik', $idtopik);
        return $this->db->get('topik');
    }

    public function getNamaFileTopikOld($idtopik){
        $this->db->where('id_topik', $idtopik);
        $x = $this->db->get('topik')->result();
        foreach ($x as $y):
            return $y->lampiran_file;
        endforeach;
    }

    public function hapustopik($idtopik){
        $this->db->where('id_topik', $idtopik);
        $this->db->delete('topik');
    }

    public function get_listalumni_acc_query(){
        $coloumn_order = array('nisn', 'nama_alumni', 'tahun_lulus', 'status_alumni', 'detail_status', null);
        $coloumn_search = array('nisn', 'nama_alumni', 'tahun_lulus', 'status_alumni', 'detail_status');
        $order = array('nisn'=>'DESC');

        $this->db->select('*');
        $this->db->from('alumni');
        $this->db->where('status_akun', "N");

        $i = 0;

        foreach ($coloumn_search as $item){

            if($_POST['search']['value']){

                if($i == 0){

                    $this->db->like($item, $_POST['search']['value']);
                    $this->db->where('status_akun', "N");

                }else{

                    $this->db->or_like($item, $_POST['search']['value']);
                    $this->db->where('status_akun', "N");

                }

                $i++;

            }

            if(isset($_POST['order'])){

                $this->db->order_by($coloumn_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);

            }else if(isset($order)){

                $this->db->order_by(key($order), $order[key($order)]);

            }

        }

    }

    public function getlistalumni_acc(){

        $this->get_listalumni_acc_query();
        if($_POST['length'] != -1){

            $this->db->limit($_POST['length'], $_POST['start']);

        }

        return $this->db->get()->result();

    }

    public function count_filtered_alumni_acc(){

        $this->get_listalumni_acc_query();
        return $this->db->get()->num_rows();

    }

    public function count_all_alumni_acc(){
        $this->db->where('status_akun', "N");
        return $this->db->get('alumni')->num_rows();

    }

    public function total_alumni_acc(){
        $this->db->where('status_akun', "N");
        return $this->db->get('alumni')->num_rows();
    }

    public function edittopik($idtopik, $data){
        $this->db->where('id_topik', $idtopik);
        $this->db->update('topik', $data);
    }
    
    
        //tambahan riwayat pekerjaan dan pendidikan
    
    public function tambahRiwayatPekerjaan($data){
        $this->db->insert('riwayat_pekerjaan', $data);
    }

    public function tambahRiwayatPendidikan($data){
        $this->db->insert('riwayat_pendidikan', $data);
    }

    public function getRiwayatPekerjaan($nisn){
        $this->db->where('nisn', $nisn);
        return $this->db->get('riwayat_pekerjaan');
    }

    public function getRiwayatPendidikan($nisn){
        $this->db->where('nisn', $nisn);
        return $this->db->get('riwayat_pendidikan');
    }

    public function hapusRiwayatPendidikanByid($id){
        $this->db->where('id_riwayat', $id);
        $this->db->delete('riwayat_pendidikan');
    }

    public function hapusRiwayatPekerjaanByid($id){
        $this->db->where('id_pekerjaan', $id);
        $this->db->delete('riwayat_pekerjaan');
    }

    public function hapusSemuaRiwayatPendidikan($nisn){
        $this->db->where('nisn', $nisn);
        $this->db->delete('riwayat_pendidikan');
    }

    public function hapusSemuaRiwayatPekerjaan($nisn){
        $this->db->where('nisn', $nisn);
        $this->db->delete('riwayat_pekerjaan');
    }
    
}
?>