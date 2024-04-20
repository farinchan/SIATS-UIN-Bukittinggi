<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Login extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function ValidationUsernamePassword($username, $password)
    {
        $q = $this->db->get('admin');

        foreach ($q->result() as $y) {

            if ($y->username == $username && $y->password == password_verify($password, $y->password)) {
                return true;
            } else {

                return false;
            }
        }
    }
    public function ValidationUsernamePassword1($username, $password)
    {
        $this->db->where("username", $username);
        return $q = $this->db->get('admin')->row();
        // if (!$q) {
        //     $adminRow = $q->row();
        //     if (password_verify($password, $q->password)) {
        //         return true;
        //     } else {
        //         return false;
        //     }
        // } else {
        //     return false;
        // }
    }
}
