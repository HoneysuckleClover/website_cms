<?php

defined('BASEPATH') OR exit('No script direct access allowed');
class Login extends CI_Controller{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }

    function index()
    {
        $this->load->view('v_login');
    }

    function aksi()
    {
        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');

            if ($this->form_validation->run() != false) {
                //mengambil data username dan password dari halaman login
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $where = array(
                    'pengguna_username' => $username,
                    'pengguna_password' => md5($password),
                    'pengguna_status'   => 1
                );

                //$this->load->model('m_login');

                //cek kesesuaian login pada tabel pengguna
                $cek = $this->m_login->cek_login('pengguna', $where);
                //cek login apabila benar
                if ($cek->num_rows() > 0) {
                    // ambil data pengguna yang melakukan login
                    $data = $this->m_login->cek_login('pengguna', $where)->row();
                    //buat session untuk pengguna yang berhasil login
                    $data_session = array(
                        'id'            => $data->pengguna_id,
                        'username'      => $data->pengguna_username,
                        'level'         => $data->pengguna_level,
                        'status'        => 'telah_login'
                    );
                    $this->session->set_userdata($data_session);

                    // alihkan halaman ke halaman dashboard pengguna
                    redirect('dashboard');
                } else {
                    redirect('login?alert=gagal');
                }
            } else {
                $this->load->view('v_login');
            }
    }
}
?>