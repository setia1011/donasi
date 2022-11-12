<?php

class User_model extends CI_Model
{

    function __construct()
    {
        $this->load->database(); // Berfungsi untuk memanggil database
       
    }

   
    public function spesifikPenggalangan($id_penggalangan)
    {
        $this->db->select('*');
        $this->db->from('tbl_penggalangan');
        $this->db->where('id_penggalangan', $id_penggalangan);
        $query =  $this->db->get();

        return $query->result_array();
    }


    public function historyDonasi($getIdUser){

        $this->db->select('tbl_user.*, tbl_penggalangan.judul, tbl_penggalangan.kategori, tbl_kategori_penggalangan.nama as nama_kategori, tbl_donasi.*');
        $this->db->from('tbl_donasi');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_donasi.id_user');
        $this->db->join('tbl_penggalangan', 'tbl_penggalangan.id_penggalangan = tbl_donasi.id_penggalangan');
        $this->db->join('tbl_kategori_penggalangan', 'tbl_kategori_penggalangan.id = tbl_penggalangan.kategori');
        $this->db->where('tbl_donasi.id_user', $getIdUser);
        $this->db->order_by('tbl_donasi.id_donasi', 'DESC');
        $query =  $this->db->get();

        return $query->result_array();

    }

    public function paraDonatur($id_penggalangan){

        $this->db->select('tbl_user.nama, tbl_donasi.*');
        $this->db->from('tbl_donasi');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_donasi.id_user');
        $this->db->where('tbl_donasi.status', 'Diterima');
        $this->db->where('tbl_donasi.id_penggalangan', $id_penggalangan);

        $query =  $this->db->get();

        return $query->result_array();


    }

    

  


}
