<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function index()
    {
        $this->load->view('v_register');
    }

function simpan()
{
    $nama     = $this->input->post('nama');
    $email    = $this->input->post('email');
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $level    = $this->input->post('level');

    // validasi role
    if ($level != 'admin' && $level != 'penulis') {
        redirect('register');
    }

    // cek username atau email
    $cek = $this->db->where('pengguna_username', $username)
                    ->or_where('pengguna_email', $email)
                    ->get('pengguna')
                    ->num_rows();

    if ($cek > 0) {
        redirect('register?alert=duplikat');
    }

    $data = [
        'pengguna_nama'     => $nama,
        'pengguna_email'    => $email,
        'pengguna_username' => $username,
        'pengguna_password' => md5($password),
        'pengguna_level'    => $level,
        'pengguna_status'   => 1
    ];

    $this->db->insert('pengguna', $data);
    redirect('login?alert=register_berhasil');
}

}