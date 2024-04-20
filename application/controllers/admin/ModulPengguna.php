<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModulPengguna extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/Model_Alumni');

        $this->load->model('admin/Model_Alumni');
        $this->load->model('admin/Model_Berita');
        $this->load->model('admin/Model_Donasi');
        $this->load->model('admin/Model_Setting');
        $this->load->model('admin/Model_Dashboard');
        $this->load->model('admin/Model_Notifikasi');
        $this->load->model('admin/Model_Penilaian');

        // if (!$this->session->userdata('username_session')) {

        //     redirect(base_url('admin/login'));
        // }

        $data = array(
            'total_alumni_acc' => $this->Model_Alumni->total_alumni_acc(),
            'beritabelumacc' => $this->Model_Berita->beritabelumacc(),
            'donasiproses' => $this->Model_Donasi->donasi_diproses(),
            'profil' => $this->Model_Setting->getProfil()->result()

        );

        $this->load->view('admin/partisi/sidebar.php', $data, TRUE);

        
        $datanav = array(
            'log_update_alumni' => $this->Model_Alumni->getlogupdatealumniLimit(),
            'log_update_alumni_total' => $this->Model_Alumni->logupdatealumnitotal(),
        );

        $this->load->view('admin/partisi/navbar.php', $datanav, TRUE);
    }

    public function index()
    {
        $this->session->set_flashdata('location', "penilaian_pengguna");

        $data = array(
            'totalalumni' => $this->Model_Dashboard->getAlumni()->num_rows(),
            'totalberita' => $this->Model_Dashboard->getBerita()->num_rows(),
            'totaltopik' => $this->Model_Dashboard->getTopik()->num_rows(),
            'totaldonasi' => $this->Model_Dashboard->getDonasi()->num_rows(),
            'transaksi' => $this->Model_Dashboard->getTransaksi()->result(),
            'notifikasi_configuration' => $this->Model_Notifikasi->get_configuration(1)
        );

        $this->load->view('admin/modulpengguna/content.php', $data, TRUE);
        $this->load->view('admin/modulpengguna/modulpengguna.php', $data, FALSE);
    }

    public function listpenilaian()
    {

        $list = $this->Model_Penilaian->getall_penilaian();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $x) {

            $no++;
            $row = array();
            $row[] = $x->nama;
            $row[] = $x->jabatan;
            $row[] = $x->instansi_lembaga;
            $row[] = $x->no_telp;
            $row[] = $x->no_fax;
            $row[] = $x->email;
            $row[] = $x->created_at;
            $row[] = '<center><a href="' . base_url('admin/ModulPengguna/lihatPenilaian/' . $x->id) . '"><span class="badge badge-primary">Lihat</span></a></center>';

            $data[] = $row;
        }

        $output = array(

            'draw' => $_POST['draw'],
            'recordsTotal' => $this->Model_Penilaian->count_all_penilaian(),
            'recordsFiltered' => 10,
            'data' => $data,
            'search' => $_POST['search']['value']

        );

        echo json_encode($output);
    }


    function lihatPenilaian()
    {
        // header('Content-Type: application/json');

        $this->session->set_flashdata('location', "penilaian_pengguna");

        $id = $this->uri->segment(4);

        if (empty($id) || $this->Model_Penilaian->get_penilaian_lihat($id) == 0) {

            redirect(base_url('admin/modulpengguna'));
        } else {

            $penilaian_pengguna = $this->Model_Penilaian->get_penilaian($id);

            $listAlumni = json_decode($penilaian_pengguna->alumni_list);
            $alumni = array();

            $result_alumni = [];
            foreach ($listAlumni as $nisn) {
                $alumni = $this->Model_Alumni->getAlumni($nisn)->row();
                if ($alumni) {
                    $data = [
                        "nisn" => $alumni->nisn,
                        "nama" => $alumni->nama_alumni,
                        "tahun_lulus" => $alumni->tahun_lulus,
                        "foto" => $alumni->foto_alumni
                    ];
                    $result_alumni[] = $data;
                }
            }


            $data = array(
                'totalalumni' => $this->Model_Dashboard->getAlumni()->num_rows(),
                'totalberita' => $this->Model_Dashboard->getBerita()->num_rows(),
                'totaltopik' => $this->Model_Dashboard->getTopik()->num_rows(),
                'totaldonasi' => $this->Model_Dashboard->getDonasi()->num_rows(),
                'transaksi' => $this->Model_Dashboard->getTransaksi()->result(),
                'data_penilaian' => $penilaian_pengguna,
                "alumni" => $result_alumni
            );

            // echo json_encode($data, JSON_PRETTY_PRINT);
            $this->load->view('admin/modulpengguna/lihat_penilaian.php', $data, TRUE);
            $this->load->view('admin/modulpengguna/moduldetail.php', $data, FALSE);
        }
    }

    function cetakpenilaian()
    {

        $id = $this->uri->segment(4);

        if (empty($id) || $this->Model_Penilaian->get_penilaian_lihat($id) == 0) {

            redirect(base_url('admin/modulpengguna'));
        } else {
            $penilaian_pengguna = $this->Model_Penilaian->get_penilaian($id);

            //mengambil dokumen surat
            $document = file_get_contents(base_url('assets/doc/instrumen2.rtf'));

            //mereplace semua kata yang ada di file dengan variabel
            $document = str_replace("#TAHUN", date("Y"), $document);
            $document = str_replace("#NAMA", $penilaian_pengguna->nama, $document);
            $document = str_replace("#JABATAN", $penilaian_pengguna->jabatan, $document);
            $document = str_replace("#INSTANSI", $penilaian_pengguna->instansi_lembaga, $document);
            $document = str_replace("#ALAMAT", $penilaian_pengguna->alamat_lembaga, $document);
            $document = str_replace("#TELP", $penilaian_pengguna->no_telp, $document);
            $document = str_replace("#FAX", $penilaian_pengguna->no_fax, $document);
            $document = str_replace("#EMAIL", $penilaian_pengguna->email, $document);
            $document = str_replace("#JAWAB1", $penilaian_pengguna->pertanyaan1, $document);
            $document = str_replace("#JAWAB2", $penilaian_pengguna->pertanyaan2, $document);
            $document = str_replace("#JAWAB3", $penilaian_pengguna->pertanyaan3, $document);
            $document = str_replace("#JAWAB4", $penilaian_pengguna->pertanyaan4, $document);
            $document = str_replace("#JAWAB5", $penilaian_pengguna->pertanyaan5, $document);
            $document = str_replace("#JAWAB6", $penilaian_pengguna->pertanyaan6, $document);
            $document = str_replace("#JAWAB7A", $penilaian_pengguna->pertanyaan7_1, $document);
            $document = str_replace("#JAWAB7B", $penilaian_pengguna->pertanyaan7_2, $document);
            $document = str_replace("#JAWAB7C", $penilaian_pengguna->pertanyaan7_3, $document);
            $document = str_replace("#JAWAB7D", $penilaian_pengguna->pertanyaan7_4, $document);

            // header untuk membuka file yang dihasilkan dengna aplikasi Ms. Word
            // nama file yang dihasilkan adalah surat izin.docx
            header("Content-type: application/msword");
            header("Content-disposition: inline; filename=Instrumen II (id-$penilaian_pengguna->id).doc");
            header("Content-length: " . strlen($document));
            echo $document;
        }
    }

  
}
