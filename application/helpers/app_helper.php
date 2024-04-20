<?php

function cekDataPribadiAlumni()
{

    $ci = get_instance();

    $ci->load->model('user/Model_user');
    $alumni = $ci->Model_user->getDataAlumni($_SESSION['nisn_session'])->row();
    if ($alumni->tahun_lulus == null || $alumni->kampus_lulus == null || $alumni->status_alumni == null || $alumni->detail_status == null || $alumni->no_wa == null || $alumni->alamat_provinsi == null || $alumni->alamat_kabupaten == null || $alumni->alamat_kecamatan == null || $alumni->detail_alamat == null || $alumni->foto_alumni == null || $alumni->email == null) {

        $ci->session->set_flashdata('cekDataPribadiAlert', "tidakLengkap");
    }
}
function cekDataTracerAlumni()
{

    $ci = get_instance();

    $ci->load->model('user/Model_user');
    $ci->load->model('user/Model_pekerjaan');
    $alumni = $ci->Model_user->getDataAlumni($_SESSION['nisn_session'])->row();
    if ($alumni->tahun_lulus != null || $alumni->kampus_lulus != null || $alumni->status_alumni != null || $alumni->detail_status != null || $alumni->no_wa != null || $alumni->alamat_provinsi != null || $alumni->alamat_kabupaten != null || $alumni->alamat_kecamatan != null || $alumni->detail_alamat != null || $alumni->foto_alumni != null || $alumni->email != null) {
        if (!$ci->Model_pekerjaan->check_if_exist($_SESSION['nisn_session'])) {
            $ci->session->set_flashdata('cekDataTracerAlert', "tidakLengkap");
        }
    }
}
function checkSuperadmin()
{
if ($_SESSION['role'] != "superadmin") {
    redirect('admin/dashboard');
}
}
