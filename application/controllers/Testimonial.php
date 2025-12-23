<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');
        date_default_timezone_set('Asia/Jakarta');
    }

    // =====================
    // FORM TESTIMONIAL
    // =====================
    public function index()
    {
        $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

        $data['meta_keyword']     = 'Testimonial - '.$data['pengaturan']->nama;
        $data['meta_description'] = 'Kirim testimonial untuk '.$data['pengaturan']->nama;

        $this->load->view('frontend/v_header', $data);
        $this->load->view('frontend/v_testimonial_form');
        $this->load->view('frontend/v_footer', $data);
    }

    // =====================
    // SIMPAN TESTIMONIAL
    // =====================
    public function kirim()
    {
        $nama = $this->input->post('nama', TRUE);
        $isi  = $this->input->post('isi', TRUE);

        if (!$nama || !$isi) {
            $this->_alert('error', 'Gagal', 'Nama dan Testimoni wajib diisi!');
            return;
        }

        $foto = null;

        if (!empty($_FILES['foto']['name'])) {
            $config['upload_path']   = './gambar/testimonial/';
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['max_size']      = 2048;
            $config['file_name']     = 'testi_' . time();

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('foto')) {
                $foto = $this->upload->data('file_name');
            }
        }

        $this->db->insert('testimonial', [
            'testimonial_nama'   => $nama,
            'testimonial_isi'    => $isi,
            'testimonial_foto'   => $foto,
            'testimonial_status' => 'pending',
            'created_at'         => date('Y-m-d H:i:s')
        ]);

        $this->_alert(
            'success',
            'Berhasil 🎉',
            'Terima kasih 🙏 Testimoni Anda berhasil dikirim dan menunggu persetujuan admin.'
        );
    }

    // =====================
    // SWEETALERT HELPER
    // =====================
    private function _alert($icon, $title, $text)
    {
        echo "
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: '$icon',
                    title: '$title',
                    text: '$text',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = '".base_url('welcome')."';
                });
            </script>
        </body>
        </html>";
    }

    // =====================
// HALAMAN TESTIMONIAL FULL
// =====================
public function list()
{
    // pengaturan website
    $data['pengaturan'] = $this->m_data->get_data('pengaturan')->row();

    // SEO
    $data['meta_keyword']     = 'Testimonial - '.$data['pengaturan']->nama;
    $data['meta_description'] = 'Semua testimonial dari pengguna '.$data['pengaturan']->nama;

    // pagination
    $this->load->library('pagination');

    $this->db->where('testimonial_status','approved');
    $total = $this->db->count_all_results('testimonial');

    $config['base_url']   = base_url('testimonial/list');
    $config['total_rows'] = $total;
    $config['per_page']   = 6;

    // style pagination (Bootstrap)
    $config['full_tag_open']   = '<nav><ul class="pagination justify-content-center">';
    $config['full_tag_close']  = '</ul></nav>';
    $config['cur_tag_open']    = '<li class="page-item active"><span class="page-link">';
    $config['cur_tag_close']   = '</span></li>';
    $config['num_tag_open']    = '<li class="page-item"><span class="page-link">';
    $config['num_tag_close']   = '</span></li>';
    $config['prev_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['prev_tag_close']  = '</span></li>';
    $config['next_tag_open']   = '<li class="page-item"><span class="page-link">';
    $config['next_tag_close']  = '</span></li>';
    $config['prev_link']       = '«';
    $config['next_link']       = '»';

    $this->pagination->initialize($config);

    $from = $this->uri->segment(3);
    if(!$from) $from = 0;

    // data testimonial
    $data['testimonial'] = $this->db
        ->where('testimonial_status','approved')
        ->order_by('testimonial_id','DESC')
        ->limit($config['per_page'],$from)
        ->get('testimonial')
        ->result();

    $this->load->view('frontend/v_header',$data);
    $this->load->view('frontend/v_testimonial_list',$data);
    $this->load->view('frontend/v_footer',$data);
}

}
