<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_login');
        $this->load->model('m_data');
        /* cek session login, jika session status tidak sama dengan session telah_login, berarti pengguna belum login
           maka halaman login akan dialihkan kembali ke halaman login.
        */

        if($this->session->userdata('status') != "telah_login"){
            redirect('login?alert=belum_login');
        }
    }

    function index()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_index');
        $this->load->view('dashboard/v_footer');
    }

    function ganti_password()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_ganti_password');
        $this->load->view('dashboard/v_footer');
    }

    function ganti_password_aksi()
    {
        // set form_validation
        $this->form_validation->set_rules('password_lama','last password','required');
        $this->form_validation->set_rules('password_baru','new password','required|min_length[8]');
        $this->form_validation->set_rules('konfirmasi_password','password confirmation','required|matches[password_baru]');

        // cek validasi
        if ($this->form_validation->run() != false) {
            //menangkap data dari input form
            $password_lama = $this->input->post('password_lama');
            $password_baru = $this->input->post('password_baru');
            $konfirmasi_password = $this->input->post('konfirmasi_password');

            //cek kesesuain password lama dengan id pengguna yang sedang login dan password lama
            $where = array(
                'pengguna_id' => $this->session->userdata('id'),
                'pengguna_password' => md5($password_lama)
            );

            $cek = $this->m_login->cek_login('pengguna',$where);

            //cek kesesuaian password lama
            if ($cek->num_rows() > 0) {
                //update data password pengguna
                $w = array(
                    'pengguna_id' => $this->session->userdata('id')
                );
                $data = array(
                    'pengguna_password' => md5($password_baru)
                );
                $this->m_data->update_data('pengguna',$data,$where);
                //alihkan halaman kembali ke halaman ganti password
                redirect('dashboard/ganti_password?alert=sukses');
            } else {
                //alihkan halaman kembali ke halaman ganti password
                redirect('dashboard/ganti_password?alert=gagal');
            }
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_ganti_password');
            $this->load->view('dashboard/v_footer');
        }
    }

    function kategori() 
    {
        $data ['kategori'] = $this->m_data->get_data('kategori')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_kategori',$data);
        $this->load->view('dashboard/v_footer');
    }

    function kategori_tambah()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_kategori_tambah');
        $this->load->view('dashboard/v_footer');
    }

    function kategori_tambah_aksi()
    {
        $this->form_validation->set_rules('kategori','kategori','required');
        if ($this->form_validation->run() != false) {
            $kategori = $this->input->post('kategori');
            $data = array(
                'kategori_nama' => $kategori,
                'kategori_slug' => strtolower(url_title($kategori))
            );
            $this->m_data->insert_data('kategori',$data);
            redirect(base_url().'dashboard/kategori');
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_kategori_tambah');
            $this->load->view('dashboard/v_footer');
        }
    }

    function kategori_edit($id)
    {
        $where = array(
            'kategori_id' => $id
        );

        $data['kategori'] = $this->m_data->edit_data('kategori',$where)->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_kategori_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    function kategori_update()
    {
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');
        if ($this->form_validation->run() !=false) {
            $id = $this->input->post('id');
            $kategori = $this->input->post('kategori');
            $where = array(
                'kategori_id' => $id
            );
            $data = array(
                'kategori_nama' => $kategori,
                'kategori_slug' => strtolower(url_title($kategori))
            );
            $this->m_data->update_data('kategori',$data,$where);
            redirect(base_url().'dashboard/kategori');
        } else {
            $id = $this->input->post('id');
            $where = array(
                'kategori_id' =>$id
            );
            $data['kategori'] = $this->m_data->edit_data('kategori',$where)->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_kategori_edit',$data);
            $this->load->view('dashboard/v_footer');
        }
    }

    function kategori_hapus($id)
    {
        $where = array(
            'kategori_id' => $id
        );
        $this->m_data->delete_data('kategori',$where);
        redirect(base_url().'dashboard/kategori');
    }

    //fitur mengelola artikel
    function artikel()
    {
        $data['artikel'] = $this->db->query('SELECT * FROM artikel,kategori,pengguna
                                                WHERE artikel_kategori=kategori_id
                                                and artikel_author=pengguna_id
                                                order by artikel_id desc')->result();
                                           
                            $this->load->view('dashboard/v_header');
                            $this->load->view('dashboard/v_artikel',$data);
                            $this->load->view('dashboard/v_footer');
    }

    function artikel_tambah()
    {
        $data['kategori'] = $this->m_data->get_data('kategori')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_artikel_tambah',$data);
        $this->load->view('dashboard/v_footer');
    }

    function artikel_aksi()
    {
        //wajib isi judul, konten dan kategori
        $this->form_validation->set_rules('judul','Judul','required|is_unique[artikel.artikel_judul]l');
        $this->form_validation->set_rules('konten','Konten','required');
        $this->form_validation->set_rules('kategori','Kategori','required');
        //membuat gambar wajib diisi
        if (empty($_FILES['sampul']['name'])) {
            $this->form_validation->set_rules('sampul','Gambar Sampul','required');
        }
        if ($this->form_validation->run() != false) {
            $config['upload_path'] = './gambar/artikel/';
            $config['allowed_types'] = 'gif|jpg|png';
            $this->load->library('upload',$config);
            if ($this->upload->do_upload('sampul')) {

                //mengambil data tentang gambar
                $gambar = $this->upload->data();

                $tanggal = date('Y-m-d H:i:s');
                $judul = $this->input->post('judul');
                $slug = strtolower(url_title($judul));
                $konten = $this->input->post('konten');
                $sampul = $gambar['file_name'];
                $author = $this->session->userdata('id');
                $kategori = $this->input->post('kategori');
                $status = $this->input->post('status');

                $data = array(
                    'artikel_tanggal' => $tanggal,
                    'artikel_judul' => $judul,
                    'artikel_slug' => $slug,
                    'artikel_konten' => $konten,
                    'artikel_sampul' => $sampul,
                    'artikel_author' => $author,
                    'artikel_kategori' => $kategori,
                    'artikel_status' => $status,
                );
                $this->m_data->insert_data('artikel',$data);
                redirect(base_url().'dashboard/artikel');
            } else {
                $this->form_validation->set_message('sampul', $data['gambar_error'] = $this->upload->display_errors());
                $data['kategori'] = $this->m_data->get_data('kategori')->result();
                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_artikel_tambah',$data);
                    $this->load->view('dashboard/v_footer');
            }
        } else {
            $data['kategori'] = $this->m_data->get_data('kategori')->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_artikel_tambah',$data);
            $this->load->view('dashboard/v_footer');
            
        }

    }

    function artikel_edit($id)
    {
        $where = array(
            'artikel_id' => $id
        );
        $data['artikel'] = $this->m_data->edit_data('artikel',$where)->result();
        $data['kategori'] = $this->m_data->get_data('kategori')->result();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_artikel_edit',$data);
        $this->load->view('dashboard/v_footer');
    }

    function artikel_update()
    {
        // Judul, konten, dan kategori wajib diisi
        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('konten', 'Konten', 'required');
        $this->form_validation->set_rules('kategori', 'Kategori', 'required');

            if ($this->form_validation->run() != false) {
                $id       = $this->input->post('id');
                $judul    = $this->input->post('judul');
                $slug     = strtolower(url_title($judul));
                $konten   = $this->input->post('konten');
                $kategori = $this->input->post('kategori');
                $status   = $this->input->post('status');

                $where = array(
                         'artikel_id' => $id
                );

                $data = array(
                        'artikel_judul'   => $judul,
                        'artikel_slug'    => $slug,
                        'artikel_konten'  => $konten,
                        'artikel_kategori'=> $kategori,
                        'artikel_status'  => $status
                );

        $this->m_data->update_data('artikel', $data, $where);

         // Jika ada file gambar yang diupload
            if (!empty($_FILES['sampul']['name'])) {
                    $config['upload_path']   = './gambar/artikel/';
                    $config['allowed_types'] = 'gif|jpg|png';

                 $this->load->library('upload', $config);

                    if ($this->upload->do_upload('sampul')) {
                        // Mengambil data gambar
                        $gambar = $this->upload->data();
                        $data = array(
                                'artikel_sampul' => $gambar['file_name']
                        );

                         $this->m_data->update_data('artikel', $data, $where);
                            redirect(base_url().'dashboard/artikel');

                     } else {
                        // Jika upload gagal
                        $this->form_validation->set_message('sampul',$data['gambar_error'] = $this->upload->display_errors());
                    
                        $where = array(
                                 'artikel_id' => $id
                         );

                        $data['artikel']  = $this->m_data->edit_data('artikel', $where)->result();
                        $data['kategori'] = $this->m_data->get_data('kategori')->result();

                        $this->load->view('dashboard/v_header');
                        $this->load->view('dashboard/v_artikel_edit', $data);
                        $this->load->view('dashboard/v_footer');
                    }

            } else {
                   // Jika tidak upload gambar, langsung redirect
                    redirect(base_url().'dashboard/artikel');
            }

            } else {
                    // Jika validasi gagal
                    $id = $this->input->post('id');
                    $where = array(
                            'artikel_id' => $id
                    );

                    $data['artikel']  = $this->m_data->edit_data('artikel', $where)->result();
                    $data['kategori'] = $this->m_data->get_data('kategori')->result();

                    $this->load->view('dashboard/v_header');
                    $this->load->view('dashboard/v_artikel_edit', $data);
                    $this->load->view('dashboard/v_footer');
            }
    }

    function artikel_hapus($id)
    {
        $where = array(
            'artikel_id' => $id
        );
        $this->m_data->delete_data('artikel',$where);
        redirect(base_url().'dashboard/artikel');
    }

    function pages()
    {
        $data['halaman'] = $this->m_data->get_data('halaman')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pages',$data);
        $this->load->view('dashboard/v_footer');
    }

    function keluar()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>