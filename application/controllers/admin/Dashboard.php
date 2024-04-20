<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard extends CI_Controller
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
        $this->session->set_flashdata('location', "Dashboard");

        $data = array(
            'totalalumni' => $this->Model_Dashboard->getAlumni()->num_rows(),
            'totalberita' => $this->Model_Dashboard->getBerita()->num_rows(),
            'totaltopik' => $this->Model_Dashboard->getTopik()->num_rows(),
            'totaldonasi' => $this->Model_Dashboard->getDonasi()->num_rows(),
            'transaksi' => $this->Model_Dashboard->getTransaksi()->result(),
            "alumni" => $this->Model_Alumni->getAlumniAktif(0, 0),
            "lulus" => $this->Model_register->get_tahunlulus()->result()
        );

        // var_dump($data["countAlumniByProdi"]);

        $this->load->view('admin/dashboard/content.php', $data, TRUE);
        $this->load->view('admin/dashboard/dashboard.php', $data, FALSE);
    }

    public function getCountAlumniByProdi()
    {
        header('Content-Type: application/json');

        $result = $this->Model_Dashboard->countAlumniByProdi();
        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    public function getCountAlumniByfakultasFilter()
    {
        $filter = $this->input->get('filter');

        header('Content-Type: application/json');

        $result = $this->Model_Dashboard->countAlumniByFakultasFilter($filter);
        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    public function getCountAlumniByFakultas()
    {
        header('Content-Type: application/json');

        $alumniData = $this->Model_Dashboard->countAlumniByProdi();
        // Inisialisasi array untuk menyimpan total jumlah alumni per fakultas
        $totalAlumniPerFakultas = [];

        // Proses data alumni untuk menghitung total per fakultas
        foreach ($alumniData as $alumni) {
            $fakultas = $alumni['fakultas'];
            $jumlahAlumni = (int)$alumni['jumlah_alumni']; // konversi ke integer

            // Tambahkan jumlah alumni ke fakultas yang sesuai
            if (isset($totalAlumniPerFakultas[$fakultas])) {
                $totalAlumniPerFakultas[$fakultas] += $jumlahAlumni;
            } else {
                $totalAlumniPerFakultas[$fakultas] = $jumlahAlumni;
            }
        }

        // Ubah hasil perhitungan menjadi format yang diminta
        $result = [];
        foreach ($totalAlumniPerFakultas as $fakultas => $jumlahAlumni) {
            $result[] = [
                "fakultas" => $fakultas,
                "jumlah_alumni" => (string)$jumlahAlumni // konversi ke string
            ];
        }
        echo json_encode($result, JSON_PRETTY_PRINT);
    }

    public function gisAlumniGet()
    {
        header('Content-Type: application/json');

        $result = $this->Model_Alumni->getAlumniAktif(0, 0);
        $tahun_lulus = $this->Model_register->get_tahunlulus()->result();

        $filter = $this->input->get('filter');

        if ($filter == "true") {
            $response = new stdClass();
            foreach ($tahun_lulus as $tahun) {
                $resultTemp = [];
                foreach ($result as $row) {

                    if ($tahun->tahun_lulus == $row->tahun_lulus) {
                        $data = null;
                        $data['type'] = "Feature";
                        $data['id'] = $row->nisn;
                        $data['properties'] = [
                            "nia" => $row->nisn,
                            "nama_alumni" => $row->nama_alumni,
                            "tahun_lulus" => $row->tahun_lulus,
                            "status_alumni" => $row->status_alumni,
                            "detail_status" => $row->detail_status,
                            "no_wa" => $row->no_wa,
                            "detail_alamat" => $row->detail_alamat,
                            // 'alamat_provinsi' => $this->Model_user->getNamakota($row->alamat_provinsi),
                            // 'alamat_kabupaten' => $this->Model_user->getNamakota($row->alamat_kabupaten),
                            // 'alamat_kecamatan' => $this->Model_user->getNamakota($row->alamat_kecamatan),
                            "foto_alumni" => $row->foto_alumni == null ? "Belum diisi" : "$row->foto_alumni",
                            "facebook" => $row->facebook == null ? "Belum diisi" : "$row->facebook",
                            "twitter" => $row->twitter == null ? "Belum diisi" : "$row->twitter",
                            "instagram" => $row->instagram == null ? "Belum diisi" : "$row->instagram",
                            "icon" => base_url('assets/user/placeholder.png'),
                            "popUp" => "<table>
                                            <tr>
                                                <td colspan='3' ><center><img width='150' src=" . base_url() . "assets/user/img/" . $row->foto_alumni  . "></center></td>
                                            </tr>
                                            <tr>
                                                <td><b>Nama</b></td>
                                                <td> : </td>
                                                <td>" . $row->nama_alumni . "</td>
                                            </tr>
                                            <tr>
                                                <td><b>NIA</b></td>
                                                <td> : </td>
                                                <td>" . $row->nisn . "</td>
                                            </tr>
                                            <tr>
                                                <td><b>Tahun Lulus</b></td>
                                                <td> : </td>
                                                <td>" . $row->tahun_lulus . "</td>
                                            </tr>
                                            <tr>
                                                <td><b>Instansi</b></td>
                                                <td> : </td>
                                                <td>" . $row->detail_status . "</td>
                                            </tr>
                                            // <tr>
                                            //     <td><b>Alamat Instansi</b></td>
                                            //     <td> : </td>
                                            //     <td>" . $row->detail_alamat . "</td>
                                            // </tr>
                                        </table>"
                        ];
                        $data['geometry'] = [
                            "type" => "Point",
                            "coordinates" => [$row->latitude, $row->longitude]
                        ];
                        $data['title'] =  $row->nama_alumni;
                        $data['loc'] = [$row->latitude, $row->longitude];

                        array_push($resultTemp, $data);
                    }
                }
                $tahunlulus = $tahun->tahun_lulus;
                $response->$tahunlulus = $resultTemp;
            }

            echo json_encode($response, JSON_PRETTY_PRINT);
        } else {

            $response = [];

            foreach ($result as $row) {

                $data = null;
                $data['type'] = "Feature";
                $data['id'] = $row->nisn;
                $data['properties'] = [
                    "nia" => $row->nisn,
                    "nama_alumni" => $row->nama_alumni,
                    "tahun_lulus" => $row->tahun_lulus,
                    "status_alumni" => $row->status_alumni,
                    "detail_status" => $row->detail_status,
                    "no_wa" => $row->no_wa,
                    "detail_alamat" => $row->detail_alamat,
                    // 'alamat_provinsi' => $this->Model_user->getNamakota($row->alamat_provinsi),
                    // 'alamat_kabupaten' => $this->Model_user->getNamakota($row->alamat_kabupaten),
                    // 'alamat_kecamatan' => $this->Model_user->getNamakota($row->alamat_kecamatan),
                    "facebook" => $row->facebook == null ? "Belum diisi" : "$row->facebook",
                    "twitter" => $row->twitter == null ? "Belum diisi" : "$row->twitter",
                    "instagram" => $row->instagram == null ? "Belum diisi" : "$row->instagram",
                    "icon" => base_url('assets/user/placeholder.png'),
                    "popUp" => "Lokasi : " . $row->detail_alamat
                ];
                $data['geometry'] = [
                    "type" => "Point",
                    "coordinates" => [$row->latitude, $row->longitude]
                ];
                $data['title'] =  $row->nama_alumni;
                $data['loc'] = [$row->latitude, $row->longitude];

                array_push($response, $data);
            }
            echo json_encode($response, JSON_PRETTY_PRINT);
        }
    }

    public function loglogin()
    {

        $list = $this->Model_Dashboard->getloglogin();
        $data = array();
        $no = $_POST['start'];

        foreach ($list as $x) {

            $no++;
            $row = array();
            $row[] = "<a style='color:black;' href='" . base_url('admin/modulalumni/lihat/' . $x->nisn) . "'>" . $x->nama_alumni . "</a>";
            $row[] = $x->tahun_lulus;
            $row[] = $x->tanggal;

            $data[] = $row;
        }

        $output = array(

            'draw' => $_POST['draw'],
            'recordsTotal' => $this->Model_Dashboard->count_all_loglogin(),
            'recordsFiltered' => $this->Model_Dashboard->count_filtered_loglogin(),
            'data' => $data,
            'search' => $_POST['search']['value']

        );

        echo json_encode($output);
    }
}
