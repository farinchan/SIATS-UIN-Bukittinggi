<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModulStatistik extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('admin/Model_Alumni');
        $this->load->model('admin/Model_Berita');
        $this->load->model('admin/Model_Donasi');
        $this->load->model('admin/Model_Setting');
        $this->load->model('admin/Model_Dashboard');
        $this->load->model('user/Model_register');

        if (!$this->session->userdata('username_session')) {

            redirect(base_url('admin/login'));
        }

        $data = array(
            'total_alumni_acc' => $this->Model_Alumni->total_alumni_acc(),
            'beritabelumacc' => $this->Model_Berita->beritabelumacc(),
            'donasiproses' => $this->Model_Donasi->donasi_diproses(),
            'profil' => $this->Model_Setting->getProfil()->result(),
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
        // Your code for the default method goes here
    }

    public function ftik()
    {
        $this->session->set_flashdata('location', "statistik ftik");

        $data = array();


        $this->load->view('admin/modulstatistik/content_ftik.php', $data, TRUE);
        $this->load->view('admin/modulstatistik/statistik.php', $data, FALSE);
    }

    public function febi()
    {
        // Your code for method2 goes here
    }

    public function fuad()
    {
        // Your code for method2 goes here
    }

    public function syariah()
    {
        // Your code for method2 goes here
    }

    public function pascasarjana()
    {
        // Your code for method2 goes here
    }

    // Add more methods as needed

    function grafikTracerAlumni()
    {
        header('Content-Type: application/json');

        $filter = $this->input->get('filter');

        $alumni = $this->Model_Alumni->alumni_filter($filter);
        $array_alumni = array();

        foreach ($alumni as $x) {
            array_push($array_alumni, substr($x->nisn, 2, 2));
        }

        $valueCounts = array_count_values($array_alumni);
        $alumni_angkatan = [];
        $tahun = "2";

        foreach ($valueCounts as $value => $count) {
            if ($count > 1) {
                $data = [
                    "tahun" => "20".$value,
                    "jumlah_alumni" => $count
                ];
                if ($tahun !== $value) {
                    $tracer = $this->Model_Alumni->alumni_tracer_filter($filter, $value);
                    $data["jumlah_tracer"] = $tracer;
                }
                array_push($alumni_angkatan, $data);
                $tahun = $value;
            }
        }
        $data = [
            "jumlah_alumni" => count($array_alumni),
            "angakatan" => $alumni_angkatan

        ];
        echo json_encode($data, JSON_PRETTY_PRINT);
    }
}
