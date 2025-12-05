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
        //hitung jumlah artikel
        $data['jumlah_artikel'] = $this->m_data->get_data('artikel')->num_rows();
        //hitung jumlah kategori
        $data['jumlah_kategori'] = $this->m_data->get_data('kategori')->num_rows();
        //hitung jumlah pengguna
        $data['jumlah_pengguna'] = $this->m_data->get_data('pengguna')->num_rows();
        //hitung jumlah halaman
        $data['jumlah_halaman'] = $this->m_data->get_data('halaman')->num_rows();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_index',$data);
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

    function pages_tambah() 
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pages_tambah');
        $this->load->view('dashboard/v_footer');
    }

    function pages_aksi()
    {
        //wajib isi judul dan konten
        $this->form_validation->set_rules('judul','Judul','required|is_unique[halaman.halaman_judul]');
        $this->form_validation->set_rules('konten','Konten','required');
        if ($this->form_validation->run() != false) {
            $judul = $this->input->post('judul');
            $slug = strtolower(url_title($judul));
            $konten = $this->input->post('konten');
            $data = array(
                'halaman_judul' => $judul,
                'halaman_slug' => $slug,
                'halaman_konten' => $konten
            );

            $this->m_data->insert_data('halaman',$data);
            redirect(base_url().'dashboard/pages');
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_pages_tambah');
            $this->load->view('dashboard/v_footer');
        }
    }

    function pages_edit($id)
    {
        $where = array('halaman_id' => $id );
        $data['halaman'] = $this->m_data->edit_data('halaman',$where)->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pages_edit',$data);
        $this->load->view('dashboard/v_footer');
    }

    function pages_update()
    {
        //wajib isi judul dan konten
        $this->form_validation->set_rules('judul','Judul','required');
        $this->form_validation->set_rules('konten','Konten','required');
        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id');
            $judul = $this->input->post('judul');
            $slug = strtolower(url_title($judul));
            $konten = $this->input->post('konten');
            $where = array(
                    'halaman_id' => $id
            );
            $data = array(
                    'halaman_judul' => $judul,
                    'halaman_slug' => $slug,
                    'halaman_konten' => $konten
            );
            $this->m_data->update_data('halaman', $data, $where);
            redirect(base_url().'dashboard/pages');
        } else {
            $id = $this->input->post('id');
            $where = array('halaman_id' => $id );
            $data['halaman'] = $this->m_data->edit_data('halaman',$where)->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_pages_edit',$data);
            $this->load->view('dashboard/v_footer');
        }

    }

    public function pages_hapus($id)
    {
        $where = array(
                'halaman_id' => $id
        );
        $this->m_data->delete_data('halaman',$where);
        redirect(base_url().'dashboard/pages');
    }

    public function profil()
    {
        //ambil id pengguna yang sedang login
        $id_pengguna = $this->session->userdata('id');
        $where = array(
                'pengguna_id' => $id_pengguna
        );
        $data['pengguna'] = $this->m_data->edit_data('pengguna',$where)->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_profil',$data);
        $this->load->view('dashboard/v_footer');
    }

    public function profil_update() 
    {
        //rules form wajib diisi untuk nama dan email
        $this->form_validation->set_rules('nama','Nama', 'Required');
        $this->form_validation->set_rules('email','Email', 'Required');
        if ($this->form_validation->run() != false) {
            $id = $this->session->userdata('id');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $where = array(
                    'pengguna_id' => $id
            );
            $data = array(
                    'pengguna_nama' => $nama,
                    'pengguna_email' => $email
            );
            $this->m_data->update_data('pengguna',$data,$where);
            redirect(base_url().'dashboard/profil/?alert=sukses');
        } else {
            //id pengguna yang sedang login
            $id_pengguna = $this->session->userdata('id');
            $where = array(
                    'pengguna_id' => $id
            );
            $data['pengguna'] = $this->m_data->edit_data('pengguna',$where)->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_profil',$data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function pengaturan() 
    {
        $data['pengaturan'] = $this->m_data->get_data('pengaturan')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pengaturan',$data);
        $this->load->view('dashboard/v_footer');
    }

    public function pengaturan_update() 
    {
        //Wjib diisi untuk dama dan deskripsi
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('deskripsi','Deskripsi', 'required');
        if ($this->form_validation->run() != false) {
            $nama = $this->input->post('nama');
            $deskripsi = $this->input->post('deskripsi');
            $link_facebook = $this->input->post('link_facebook');
            $link_twitter = $this->input->post('link_twitter');
            $link_instagram = $this->input->post('link_instagram');
            $link_github = $this->input->post('link_github');
            $where = array(

            );
            $data = array(
                    'nama' => $nama,
                    'deskripsi' => $deskripsi,
                    'link_facebook' => $link_facebook,
                    'link_twitter' => $link_twitter,
                    'link_instagram' => $link_instagram,
                    'link_github' => $link_github
            );

        //update pengaturan website
        $this->m_data->update_data('pengaturan',$data,$where);
        //periksa apakah ada gambar yang akan diupload
        if (!empty($_FILES['logo']['name'])) {
            $config['upload_path'] = './gambar/website/';
            $config['allowed_types'] = 'jpg|png';

            $this->load->library('upload',$config);
                if ($this->upload->do_upload('logo')) {
                    //mengambil data logo yang akan diupload
                    $gambar = $this->upload->data();
                    $logo = $gambar['file_name'];
                    $this->db->query("UPDATE pengaturan SET logo='$logo'");
                }
        }
        redirect(base_url().'dashboard/pengaturan/?alert=sukses');
        } else {
            $data['pengaturan'] = $this->m_data->get_data('pengaturan')->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_pengaturan',$data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function pengguna() 
    {
        $data['pengguna'] = $this->m_data->get_data('pengguna')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pengguna',$data);
        $this->load->view('dashboard/v_footer');
    }

    public function pengguna_tambah() 
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pengguna_tambah');
        $this->load->view('dashboard/v_footer');
    }

    public function pengguna_tambah_aksi()
    {
        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('email', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('username', 'Username Pengguna', 'required');
        $this->form_validation->set_rules('password', 'Password Pengguna', 'required|min_length[8]');
        $this->form_validation->set_rules('level', 'Level Pengguna', 'required');
        $this->form_validation->set_rules('status', 'Status Pengguna', 'required');
        if ($this->form_validation->run() != false) {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $level = $this->input->post('level');
            $status = $this->input->post('status');
            $data = array(
                    'pengguna_nama' => $nama,
                    'pengguna_email' => $email,
                    'pengguna_username' => $username,
                    'pengguna_password' => $password,
                    'pengguna_level' => $level,
                    'pengguna_status' => $status
            );
            $this->m_data->insert_data('pengguna',$data);
            redirect(base_url().'dashboard/pengguna');
        } else {
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_pengguna_tambah');
            $this->load->view('dashboard/v_footer');
        }
    }

    public function pengguna_edit($id)
    {
        $where = array(
                'pengguna_id' => $id
        );
        $data['pengguna'] = $this->m_data->edit_data('pengguna',$where)->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pengguna_edit', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function pengguna_update()
    {
        //rules untuk wajib diisi
        $this->form_validation->set_rules('nama', 'Nama Pengguna', 'required');
        $this->form_validation->set_rules('email', 'Email Pengguna', 'required');
        $this->form_validation->set_rules('username', 'Username Pengguna', 'required');
        $this->form_validation->set_rules('level', 'Level Pengguna', 'required');
        $this->form_validation->set_rules('status', 'Status Pengguna', 'required');
        if ($this->form_validation->run() != false) {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $level = $this->input->post('level');
            $status = $this->input->post('status');
        //cek apabila password tidak diisi, maka kolom password tidakakan diupdate
        if ($this->input->post('password') == "") {
            $data = array(
                    'pengguna_nama' => $nama,
                    'pengguna_email' => $email,
                    'pengguna_username' => $username,
                    'pengguna_level' => $level,
                    'pengguna_status' => $status
            );
        } else  {
            $data = array(
                    'pengguna_nama' => $nama,
                    'pengguna_email' => $email,
                    'pengguna_username' => $username,
                    'pengguna_password' => $password,
                    'pengguna_level' => $level,
                    'pengguna_status' => $status
            );
        }
            $where = array(
                     'pengguna_id' => $id
            );
            $this->m_data->update_data('pengguna',$data,$where);
            redirect(base_url().'dashboard/pengguna');
        } else {
            $id = $this->input->post('id');
            $where = array(
                    'pengguna_id' => $id
            );
            $data['pengguna'] = $this->m_data->get_data('pengguna',$where)->result();
            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_pengguna_edit', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function pengguna_hapus($id) 
    {
        $where = array(
                'pengguna_id' => $id
        );
        $data['pengguna_hapus'] = $this->m_data->edit_data('pengguna',$where)->row();
        $data['pengguna_lain'] = $this->db->query("SELECT * FROM pengguna WHERE pengguna_id != '$id'")->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_pengguna_hapus', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function pengguna_hapus_aksi()
    {
        $pengguna_hapus = $this->input->post('pengguna_hapus');
        $pengguna_tujuan = $this->input->post('pengguna_tujuan');
        //hapus data pengguna
        $where = array(
                'pengguna_id' => $pengguna_hapus
        );
        $this->m_data->delete_data('pengguna',$where);
        //pindahkan semua artikel pengguna yang dihapus pada pengguna tujuan
        $w = array(
            'artikel_author' => $pengguna_hapus
        );
        $d = array(
            'artikel_author' => $pengguna_tujuan
        );
        $this->m_data->update_data('artikel',$d,$w);
        redirect(base_url().'dashboard/pengguna');
    }

    function keluar()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
?>