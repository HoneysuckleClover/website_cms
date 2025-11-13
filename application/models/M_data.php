<?php 
class M_data extends CI_Model{

    //untuk update data ganti password
    function update_data($table,$data,$where) {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    //fungsi untuk mengambil data dari database
    function get_data($table) {
        return $this->db->get($table);
    }

    //fungsi untuk menambahkan data ke database
    function insert_data($table,$data) {
        return $this->db->insert($table,$data);
    }

    //fungsi untuk mengedit data dari database
    function edit_data($table,$where) {
        return $this->db->get_where($table,$where);
    }

    //fungsi untuk menghapus data dari database
    function delete_data($table,$where) {
        return $this->db->delete($table,$where);
    }
}
?>