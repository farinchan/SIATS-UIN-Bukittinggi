<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ModulSetting extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Model_Alumni');
        $this->load->model('admin/Model_Berita');
        $this->load->model('admin/Model_Donasi');
        $this->load->model('admin/Model_Setting');

        if (!$this->session->userdata('username_session')) {

            redirect(base_url('admin/login'));
        }

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

    public function profil()
    {

        $this->session->set_flashdata('location', "Profil");

        $data = array(
            'data' => $this->Model_Setting->getProfil()->result()
        );

        $content = array(
            'content' => $this->load->view('admin/setting/profil.php', $data, TRUE)
        );

        $this->load->view('admin/setting/setting.php', $content, FALSE);
    }

    public function updateprofilAction()
    {

        $config = array(
            'upload_path' => 'assets/admin/profil/',
            'allowed_types' => 'png|jpg|jpeg|JPG'
        );

        $this->load->library('upload', $config);
        $this->load->initialize($config);

        $password = $this->input->post('password');

        if (!empty($password)) {

            $data = array(
                'password' => password_hash($password, PASSWORD_DEFAULT)
            );

            $this->Model_Setting->editadmin($data);
        }

        if (!empty($_FILES['myFile']['name'])) {

            if ($this->upload->do_upload('myFile')) {

                $data = array(
                    'gambar' => $this->upload->data('file_name')
                );

                $this->Model_Setting->editadmin($data);
            } else {

                echo json_encode('Ekstensi Gambar Salah');
            }
        }

        $data = array(
            'nama_admin' => $this->input->post('nama_admin'),
            'email_admin' => $this->input->post('email_admin'),
            'username' => $this->input->post('username')
        );

        $this->Model_Setting->editadmin($data);

        echo json_encode('Data Profil Berhasil Diperbaruhi');
    }

    public function prodi()
    {
        checkSuperadmin();

        $this->session->set_flashdata('location', "prodi");

        $data = array(
            'data' => $this->Model_Setting->getprodi()
        );

        $content = array(
            'content' => $this->load->view('admin/setting/prodi.php', $data, TRUE)
        );

        $this->load->view('admin/setting/setting.php', $content, FALSE);
    }

    public function addprodi()
    {

        if (!$this->Model_Setting->checkkodeprodi($this->input->post('kode'))) {
            
            try {
                $data = array(
                    'kode' => $this->input->post('kode'),
                    'nama' => $this->input->post('nama'),
                    'fakultas' => $this->input->post('fakultas'),
                    'jenjang' =>  $this->input->post('jenjang')
                );
                $this->Model_Setting->tambahprodi($data);

                redirect(base_url('admin/ModulSetting/prodi'));
            } catch (\Throwable $th) {
            }
        }else {
            redirect(base_url('admin/ModulSetting/prodi?alertadmin=Gagal Menambahkan prodi, Karena kode prodi dari "'.$this->input->post('nama').'" Sudah Ada'));
        }
    }

    //import data prodi
    public function importprodi()
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

                $data = array(
                    'kode' => $sheetData[$i]['0'],
                    'nama' => $sheetData[$i]['1'],
                    'fakultas' => $sheetData[$i]['2'],
                    'jenjang' => $sheetData[$i]['3'],
                );
                $this->Model_Setting->tambahprodi($data);
            }
            redirect(base_url('admin/ModulSetting/prodi?alertadmin=Berhasil Import Data'));

        } else {
            redirect(base_url('admin/ModulSetting/prodi?alertadmin=Gagal Import Data, Karena Ekstensi File Salah (harus .xlsx)'));
        }
    }

    public function administrator()
    {
        checkSuperadmin();


        $this->session->set_flashdata('location', "administrator");

        $data = array(
            'data' => $this->Model_Setting->getadmin(),
            'list_prodi' => $this->Model_Setting->getprodi()
        );

        $content = array(
            'content' => $this->load->view('admin/setting/admin.php', $data, TRUE)
        );

        $this->load->view('admin/setting/setting.php', $content, FALSE);
    }
    public function addadmin()
    {
        

        $config = array(
            'upload_path' => 'assets/admin/profil/',
            'allowed_types' => 'png|jpg|jpeg|JPG'
        );

        $this->load->library('upload', $config);
        $this->load->initialize($config);

        if (!$this->Model_Setting->checkusernameadmin($this->input->post('username'))) {
            if (!empty($_FILES['myFile']['name'])) {
                if ($this->upload->do_upload('myFile')) {
                    $gambar = $this->upload->data('file_name');
                }
            }

            try {
                $data = array(
                    'username' => $this->input->post('username'),
                    'nama_admin' => $this->input->post('nama_admin'),
                    'email_admin' => $this->input->post('email_admin'),
                    'role' => $this->input->post('role'),
                    'kode_prodi' => $this->input->post('prodi'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'gambar' => $gambar

                );
                $this->Model_Setting->tambahadmin($data);

                redirect(base_url('admin/ModulSetting/administrator'));
            } catch (\Throwable $th) {
            }
        }else {
            redirect(base_url('admin/ModulSetting/administrator?alertadmin=Gagal Menambahkan Admin, Karena Username "'.$this->input->post('username').'" Sudah Ada'));
           
        }
    }

    public function deleteadmin($username)
    {
        if ($this->Model_Setting->checkusernameadmin($username)) {
            $admin = $this->Model_Setting->getadminbyusername($username);
            $file_path = './assets/admin/profil/' . $admin->gambar;
            unlink($file_path);
            $this->Model_Setting->deleteadminbyusername($username);
        }

        redirect(base_url('admin/ModulSetting/administrator'));
    }

    public function website()
    {

        $this->session->set_flashdata('location', "Website");

        $data = array(
            'data' => $this->Model_Setting->getWebsite()->result()
        );

        $content = array(
            'content' => $this->load->view('admin/setting/website.php', $data, TRUE)
        );

        $this->load->view('admin/setting/setting.php', $content, FALSE);
    }

    public function editwebsite()
    {

        if (!empty($_FILES['myFile']['name'])) {

            $config = array(
                'upload_path' => 'assets/img/',
                'allowed_types' => 'png|jpg|jpeg|JPG'
            );

            $this->load->library('upload', $config);
            $this->load->initialize($config);

            if ($this->upload->do_upload('myFile')) {

                $data = array(
                    'logo' => $this->upload->data('file_name')
                );

                $this->Model_Setting->editwebsite($data);
            }
        }

        $data = array(
            'nama_website' => $this->input->post('nama_website'),
            'email' => $this->input->post('email'),
            'no_wa' => $this->input->post('no_wa'),
            'facebook' => $this->input->post('facebook'),
            'instagram' => $this->input->post('instagram'),
            'footer' => $this->input->post('footer'),
            'syarat' => $this->input->post('syarat'),
            'tentang' => $this->input->post('tentang')
        );

        $this->Model_Setting->editwebsite($data);

        echo json_encode('Edit Berhasil');
    }

    public function landingpage()
    {

        $this->session->set_flashdata('location', "LandingPage");

        $data = array(
            'data' => $this->Model_Setting->getWebsite()->result()
        );

        $content = array(
            'content' => $this->load->view('admin/setting/landingpage.php', $data, TRUE)
        );

        $this->load->view('admin/setting/setting.php', $content, FALSE);
    }

    public function editbanner1()
    {

        if (!empty($_FILES['myFile']['name'])) {

            $config = array(
                'upload_path' => 'assets/img/banner/',
                'allowed_types' => 'png|jpg|jpeg|JPG'
            );

            $this->load->library('upload', $config);
            $this->load->initialize($config);

            if ($this->upload->do_upload('myFile')) {

                $data = array(
                    'lp_1' => $this->upload->data('file_name')
                );

                $this->Model_Setting->editwebsite($data);
            }
        }

        $data = array(
            'sup_1' => $this->input->post('sup_1'),
        );

        $this->Model_Setting->editwebsite($data);

        echo json_encode('Edit Berhasil');
    }

    public function editbanner2()
    {

        if (!empty($_FILES['myFile']['name'])) {

            $config = array(
                'upload_path' => 'assets/img/banner/',
                'allowed_types' => 'png|jpg|jpeg|JPG'
            );

            $this->load->library('upload', $config);
            $this->load->initialize($config);

            if ($this->upload->do_upload('myFile')) {

                $data = array(
                    'lp_2' => $this->upload->data('file_name')
                );

                $this->Model_Setting->editwebsite($data);
            }
        }

        $data = array(
            'sup_2' => $this->input->post('sup_2'),
        );

        $this->Model_Setting->editwebsite($data);

        echo json_encode('Edit Berhasil');
    }

    public function editbanner3()
    {

        if (!empty($_FILES['myFile']['name'])) {

            $config = array(
                'upload_path' => 'assets/img/banner/',
                'allowed_types' => 'png|jpg|jpeg|JPG'
            );

            $this->load->library('upload', $config);
            $this->load->initialize($config);

            if ($this->upload->do_upload('myFile')) {

                $data = array(
                    'lp_3' => $this->upload->data('file_name')
                );

                $this->Model_Setting->editwebsite($data);
            }
        }

        $data = array(
            'sup_3' => $this->input->post('sup_3'),
        );

        $this->Model_Setting->editwebsite($data);

        echo json_encode('Edit Berhasil');
    }
}
