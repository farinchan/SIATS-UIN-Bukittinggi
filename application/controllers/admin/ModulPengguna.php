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
            'penilaian_pengguna' => $this->Model_Penilaian->getall_penilaian(),
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
            'recordsFiltered' => $this->Model_Penilaian->count_all_penilaian(),
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
            
            if ($penilaian_pengguna->alumni_list == null) {
                $penilaian_pengguna->alumni_list = "[]";
            }

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

    //import data Tracer
    public function importPenilaiain()
    {

        require_once(APPPATH . 'libraries/Excel/vendor/autoload.php');

        $file_mimes = array('application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        if (isset($_FILES['excel']['name']) && in_array($_FILES['excel']['type'], $file_mimes)) {

            $arr_file = explode('.', $_FILES['excel']['name']);
            $extension = end($arr_file);

            if ('csv' == $extension) {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
            } else {
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $reader->load($_FILES['excel']['tmp_name']);

            $sheetData = $spreadsheet->getActiveSheet()->toArray();

            for ($i = 1; $i < count($sheetData); $i++) {
                if ($sheetData[$i]['1'] != null || $sheetData[$i]['1'] != '') {
                    if ($sheetData[$i]['1'] != null || $sheetData[$i]['1'] != '') {

                        $data = array(
                            'nama' => $sheetData[$i]['1'],
                            'jabatan' => $sheetData[$i]['2'],
                            'instansi_lembaga' => $sheetData[$i]['3'],
                            'alamat_lembaga' => $sheetData[$i]['4'],
                            'no_telp' => $sheetData[$i]['5'],
                            'no_fax' => $sheetData[$i]['6'],
                            'email' => $sheetData[$i]['7'],
                            'pertanyaan1' => $sheetData[$i]['8'],
                            'pertanyaan2' => $sheetData[$i]['9'],
                            'pertanyaan3' => $sheetData[$i]['10'],
                            'pertanyaan4' => $sheetData[$i]['11'],
                            'pertanyaan5' => $sheetData[$i]['12'],
                            'pertanyaan6' => $sheetData[$i]['13'],
                            'pertanyaan7' => $sheetData[$i]['14'],
                            'pertanyaan8' => $sheetData[$i]['15'],
                            'pertanyaan9' => $sheetData[$i]['16'],
                            'pertanyaan10' => $sheetData[$i]['17'],
                            'created_at' => $sheetData[$i]['18'],

                        );
                        $this->Model_Penilaian->insert_penilaian($data);
                    }
                }
            }

            echo json_encode('Berhasil Import Data');
        } else {

            echo json_encode('Ekstensi File Salah (harus .xlsx)');
        }
    }
}
