<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Model_Login');
    }

    public function index()
    {
        $this->session->set_flashdata('location', "Login Aplikasi");

        $data = array(
            'number_1' => rand(1, 10),
            'number_2' => rand(1, 10)
        );

        $this->load->view('admin/login/login.php', $data, FALSE);
    }


    public function actionlogin()
    {

        $number_1 = $this->input->post('number_1');
        $number_2 = $this->input->post('number_2');
        $true_answer = $number_1 + $number_2;

        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $remember = $this->input->post('remember');
        $jawabanuser = $this->input->post('captcha');

        $loginVerify = true;

        if ($jawabanuser == $true_answer) {

            $loginadmin = $this->Model_Login->ValidationUsernamePassword1($username, $password);
            // $data = array(
            //     "hasil" => $loginadmin,
            //     'pass_ver' => password_verify($password, $loginadmin->password)
            // );

            // print_r($data);

            // cek apakah user sudah terdaftar?
            if (!$loginadmin) {
                $loginVerify  =  FALSE;
            }

            // cek apakah passwordnya benar?
            if (!password_verify($password, $loginadmin->password)) {
                $loginVerify  = FALSE;
            }

            if ($loginVerify) {
                
                
                $data = array(
                    'username_session' => $username,
                    'role' => $loginadmin->role,
                    'kode_prodi' => $loginadmin->kode_prodi
                );
                // var_dump($data);

                $this->session->set_userdata($data);

                if (isset($remember)) {

                    set_cookie("remember", $username, time() + (10 * 365 * 24 * 60 * 60));

                    redirect(base_url('admin/dashboard'));
                } else {

                    set_cookie("remember", "");

                    redirect(base_url('admin/dashboard'));
                }
            } else {

                redirect(base_url('admin/login?form=false'));
            }
        } else {

            redirect(base_url('admin/login?captcha=false'));
        }
    }

    public function logoutsystem()
    {

        session_start();

        unset(
            $_SESSION
        );

        session_destroy();

        redirect(base_url('admin/login'));
    }
}
