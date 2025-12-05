<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('m_data');
    }

    // ============================================
    // Homepage
    // ============================================
    public function index()
    {
        // 3 artikel terbaru
        $data['artikel'] = $this->db->query("
            SELECT * FROM artikel, pengguna, kategori
            WHERE artikel_status = 'publish'
            AND artikel_author = pengguna_id
            AND artikel_kategori = kategori_id
            ORDER BY artikel_id DESC
            LIMIT 3
        ")->result();

        // Pengaturan website
        $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

        // SEO Meta
        $data['meta_keyword']     = $data['pengaturan']->nama;
        $data['meta_description'] = $data['pengaturan']->deskripsi;

        // Load View
        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_homepage', $data);
        $this->load->view('frontend/v_footer', $data);
    }

    // ============================================
    // Single Artikel
    // ============================================
    public function single($slug)
    {
        $data['artikel'] = $this->db->query("
            SELECT * FROM artikel, pengguna, kategori
            WHERE artikel_status = 'publish'
            AND artikel_author = pengguna_id
            AND artikel_kategori = kategori_id
            AND artikel_slug = '$slug'
        ")->result();

        // Pengaturan
        $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

        // SEO Meta
        if (count($data['artikel']) > 0) {
            $data['meta_keyword']     = $data['artikel'][0]->artikel_judul;
            $data['meta_description'] = substr($data['artikel'][0]->artikel_konten, 0, 100);
        } else {
            $data['meta_keyword']     = $data['pengaturan']->nama;
            $data['meta_description'] = $data['pengaturan']->deskripsi;
        }

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_single', $data);
        $this->load->view('frontend/v_footer', $data);
    }

    // ============================================
    // Halaman Blog + Pagination
    // ============================================
    public function blog()
    {
        // Pengaturan
        $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

        // SEO
        $data['meta_keyword']     = $data['pengaturan']->nama;
        $data['meta_description'] = $data['pengaturan']->deskripsi;

        // Jumlah artikel
        $jumlah_data = $this->m_data->get_data('artikel')->num_rows();

        // Pagination
        $this->load->library('pagination');

        $config['base_url']   = base_url('blog/');
        $config['total_rows'] = $jumlah_data;
        $config['per_page']   = 3;

        // Style pagination
        $config['full_tag_open']   = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']  = '</ul></nav></div>';
        $config['num_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']   = '</span></li>';
        $config['cur_tag_open']    = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']   = '</span></li>';
        $config['next_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '</span></li>';
        $config['prev_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']  = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';

        $config['first_link'] = 'First';
        $config['last_link']  = 'Last';
        $config['prev_link']  = '&laquo;';
        $config['next_link']  = '&raquo;';

        // Offset pagination
        $FROM = $this->uri->segment(2);
        if ($FROM == "") $FROM = 0;

        $this->pagination->initialize($config);

        // Data artikel berdasarkan pagination
        $data['artikel'] = $this->db->query("
            SELECT * FROM artikel, pengguna, kategori
            WHERE artikel_status = 'publish'
            AND artikel_author = pengguna_id
            AND artikel_kategori = kategori_id
            ORDER BY artikel_id DESC
            LIMIT $config[per_page] OFFSET $FROM
        ")->result();

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_blog', $data);
        $this->load->view('frontend/v_footer', $data);
    }

    // ============================================
    // Halaman Page
    // ============================================
    public function page($slug)
    {
        $where = ['halaman_slug' => $slug];
        $data['halaman'] = $this->m_data->edit_data('halaman', $where)->result();

        // Pengaturan + SEO
        $data['pengaturan']       = $this->m_data->get_data('pengaturan')->row();
        $data['meta_keyword']     = $data['pengaturan']->nama;
        $data['meta_description'] = $data['pengaturan']->deskripsi;

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_page', $data);
        $this->load->view('frontend/v_footer', $data);
    }

    // ============================================
    // Halaman Kategori + Pagination
    // ============================================
    public function kategori($slug)
    {
        // Pengaturan
        $data['pengaturan']       = $this->m_data->get_data('pengaturan')->row();
        $data['meta_keyword']     = $data['pengaturan']->nama;
        $data['meta_description'] = $data['pengaturan']->deskripsi;

        // Hitung jumlah artikel kategori
        $jumlah_artikel = $this->db->query("
            SELECT * FROM artikel, pengguna, kategori
            WHERE artikel_status = 'publish'
            AND artikel_author = pengguna_id
            AND artikel_kategori = kategori_id
            AND kategori_slug = '$slug'
        ")->num_rows();

        // Pagination
        $this->load->library('pagination');

        $config['base_url']   = base_url('kategori/' . $slug);
        $config['total_rows'] = $jumlah_artikel;
        $config['per_page']   = 4;

        $config['first_link'] = 'first';
        $config['last_link']  = 'last';
        $config['prev_link']  = 'prev';
        $config['next_link']  = 'next';

        $config['full_tag_open']  = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']  = '</span></li>';
        $config['cur_tag_open']   = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']  = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']  = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['prev_tag_open']  = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close']= '</span></li>';
        $config['last_tag_open']  = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';

        // Offset
        $FROM = $this->uri->segment(3);
        if ($FROM == "") $FROM = 0;

        $this->pagination->initialize($config);

        // Load artikel kategori
        $data['artikel'] = $this->db->query("
            SELECT * FROM artikel, pengguna, kategori
            WHERE artikel_status = 'publish'
            AND artikel_author = pengguna_id
            AND artikel_kategori = kategori_id
            AND kategori_slug = '$slug'
            ORDER BY artikel_id DESC
            LIMIT $config[per_page] OFFSET $FROM
        ")->result();

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_kategori', $data);
        $this->load->view('frontend/v_footer', $data);
    }

    // ============================================
    // Search Artikel
    // ============================================
    public function search()
    {
        // Ambil keyword
        $cari = trim(htmlentities($this->input->post('cari', true)));
        if ($this->uri->segment(2)) {
            $cari = $this->uri->segment(2);
        }

        // Pengaturan + SEO
        $data['pengaturan']       = $this->m_data->get_data('pengaturan')->row();
        $data['meta_keyword']     = $data['pengaturan']->nama;
        $data['meta_description'] = $data['pengaturan']->deskripsi;

        // Hitung total artikel
        $jumlah_artikel = $this->db->query("
            SELECT * FROM artikel, pengguna, kategori
            WHERE artikel_status = 'publish'
            AND artikel_author = pengguna_id
            AND artikel_kategori = kategori_id
            AND (artikel_judul LIKE '%$cari%' OR artikel_konten LIKE '%$cari%')
        ")->num_rows();

        // Pagination
        $this->load->library('pagination');

        $config['base_url']   = base_url('search/' . $cari);
        $config['total_rows'] = $jumlah_artikel;
        $config['per_page']   = 4;

        $config['first_link'] = 'first';
        $config['last_link']  = 'last';
        $config['prev_link']  = 'prev';
        $config['next_link']  = 'next';

        $config['full_tag_open']  = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav></div>';
        $config['num_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']  = '</span></li>';
        $config['cur_tag_open']   = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']  = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']  = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close'] = '</span></li>';
        $config['prev_tag_open']  = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close'] = '</span></li>';
        $config['first_tag_open'] = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close']= '</span></li>';
        $config['last_tag_open']  = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close'] = '</span></li>';

        // Offset
        $FROM = $this->uri->segment(3);
        if ($FROM == "") $FROM = 0;

        $this->pagination->initialize($config);

        // Load artikel hasil pencarian
        $data['artikel'] = $this->db->query("
            SELECT * FROM artikel, pengguna, kategori
            WHERE artikel_status = 'publish'
            AND artikel_author = pengguna_id
            AND artikel_kategori = kategori_id
            AND (artikel_judul LIKE '%$cari%' OR artikel_konten LIKE '%$cari%')
            ORDER BY artikel_id DESC
            LIMIT $config[per_page] OFFSET $FROM
        ")->result();

        $data['cari'] = $cari;

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_search', $data);
        $this->load->view('frontend/v_footer', $data);
    }

    public function notfound()
    {
    //data pengaturan website
    $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();
    //SEO Meta
    $data['meta_keyword'] = $data['pengaturan']->nama;
    $data['meta_description'] = $data['pengaturan']->deskripsi;
    $this->load->view('frontend/v_header',$data);
    $this->load->view('frontend/v_notfound',$data);
    $this->load->view('frontend/v_footer',$data);
    }
}
