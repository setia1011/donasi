<?php

class Petugas_model extends CI_Model
{

    function __construct()
    {
        $this->load->database(); // Berfungsi untuk memanggil database

    }

    public function getInformasi()
    {
        $this->db->select('*');
        $this->db->from('tbl_konten');
        $this->db->order_by('id_konten', 'ASC');
        $query =  $this->db->get();

        return $query->result_array();
    }

    public function getanakAsuh()
    {
        $this->db->select('*');
        $this->db->from('tbl_anak');
        $this->db->order_by('id_anak', 'DESC');
        $query =  $this->db->get();

        return $query->result_array();
    }

    public function jmlAnakAsuh()
    {
        $this->db->select('*');
        $this->db->from('tbl_anak');
        $this->db->order_by('id_anak', 'DESC');
        $query =  $this->db->get();

        return $query->num_rows();
    }

    public function jmlDonatur()
    {
        $this->db->select('*');
        $this->db->from('tbl_donasi');
        $this->db->order_by('id_donasi', 'DESC');
        $query =  $this->db->get();

        return $query->num_rows();
    }

    public function jmlPenggalangan()
    {
        $this->db->select('*');
        $this->db->from('tbl_penggalangan');
        $this->db->order_by('id_penggalangan', 'DESC');
        $query =  $this->db->get();

        return $query->num_rows();
    }

    public function jmlDonasiDiterima()
    {
        $this->db->select('*');
        $this->db->from('tbl_donasi');
        $this->db->where('status', 'Diterima');
        $query =  $this->db->get();

        return $query->num_rows();
    }

    public function totalDonasi()
    {
        $this->db->select_sum('nominal');
        $this->db->from('tbl_donasi');
        $query =  $this->db->get();

        return $query->row_array();
    }

    public function jmlDonasiDitolak()
    {
        $this->db->select('*');
        $this->db->from('tbl_donasi');
        $this->db->where('status', 'Ditolak');
        $query =  $this->db->get();

        return $query->num_rows();
    }

    public function jmlDonasiMenunggu()
    {
        $this->db->select('*');
        $this->db->from('tbl_donasi');
        $this->db->where('status', 'Menunggu Verifikasi');
        $query =  $this->db->get();

        return $query->num_rows();
    }

    public function grafikPenggalanganBulan($bulan)
    {
        $query = $this->db->query(
            "SELECT MONTH(created_date) as bulan, COUNT(judul) as judul
            FROM tbl_penggalangan WHERE MONTH(created_date) = '$bulan' GROUP BY MONTH(created_date)"
        );

        return $query->result_array();
    }

    public function getKategori()
    {
        $this->db->select('*');
        $this->db->from('tbl_kategori');
        $this->db->order_by('id_kategori', 'ASC');
        $query =  $this->db->get();

        return $query->result_array();
    }

    public function getPenggalangan()
    {
        $this->db->select('*');
        $this->db->from('tbl_penggalangan');
        $this->db->join('tbl_kategori_penggalangan', 'tbl_penggalangan.kategori = tbl_kategori_penggalangan.id');
        $this->db->order_by('id_penggalangan', 'ASC');
        $query =  $this->db->get();

        return $query->result_array();
    }


    public function dashboardDonasi()
    {
        $query = $this->db->query("SELECT * FROM tbl_penggalangan LIMIT 3 OFFSET 1");

        return $query->result_array();
    }


    public function detailPenggalangan($id_penggalangan)
    {
        $this->db->select('*');
        $this->db->from('tbl_penggalangan');
        $this->db->where('id_penggalangan', $id_penggalangan);
        $query =  $this->db->get();

        return $query->result_array();
    }

    public function informasiPenyaluran($id_penggalangan){

        $this->db->select('*');
        $this->db->from('tbl_penyaluran');
        $this->db->where('id_penggalangan', $id_penggalangan);
        $query =  $this->db->get();

        return $query->result_array();

    }


    public function getFilterDonasi($getFilter)
    {
        $this->db->select('tbl_user.nama, tbl_user.email, tbl_user.tgl_lahir, tbl_user.jk, tbl_user.no_telpon, tbl_penggalangan.judul, tbl_penggalangan.kategori, tbl_kategori_penggalangan.nama as nama_kategori, tbl_donasi.*');
        $this->db->from('tbl_donasi');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_donasi.id_user');
        $this->db->join('tbl_penggalangan', 'tbl_penggalangan.id_penggalangan = tbl_donasi.id_penggalangan');
        $this->db->join('tbl_kategori_penggalangan', 'tbl_kategori_penggalangan.id = tbl_penggalangan.kategori');
        $this->db->where('tbl_donasi.status', $getFilter);
        $this->db->order_by('tbl_donasi.id_donasi', 'DESC');
        $query =  $this->db->get();

        return $query->result_array();
    }

    public function filterPenggalangan($kategori)
    {
        $this->db->select('*');
        $this->db->from('tbl_penggalangan');
        $this->db->where('kategori', $kategori);
        $this->db->order_by('id_penggalangan', 'ASC');
        $query =  $this->db->get();

        return $query->result_array();
    }

    public function getVerifDonasi()
    {
        $this->db->select('tbl_user.nama, tbl_user.email, tbl_user.tgl_lahir, tbl_user.jk, tbl_user.no_telpon, tbl_penggalangan.judul, tbl_penggalangan.kategori, tbl_kategori_penggalangan.nama as nama_kategori, tbl_donasi.*');
        $this->db->from('tbl_donasi');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_donasi.id_user');
        $this->db->join('tbl_penggalangan', 'tbl_penggalangan.id_penggalangan = tbl_donasi.id_penggalangan');
        $this->db->join('tbl_kategori_penggalangan', 'tbl_kategori_penggalangan.id = tbl_penggalangan.kategori');
        $this->db->where('tbl_donasi.status', 'Menunggu Verifikasi');
        $this->db->order_by('tbl_donasi.id_donasi', 'DESC');
        $query =  $this->db->get();

        return $query->result_array();
    }

    public function getdetailDonasi($id_donasi)
    {
        $this->db->select('tbl_user.nama, tbl_user.email, tbl_user.tgl_lahir, tbl_user.jk, tbl_user.no_telpon, tbl_penggalangan.judul, tbl_penggalangan.kategori, tbl_donasi.*');
        $this->db->from('tbl_donasi');
        $this->db->join('tbl_user', 'tbl_user.id_user = tbl_donasi.id_user');
        $this->db->join('tbl_penggalangan', 'tbl_penggalangan.id_penggalangan = tbl_donasi.id_penggalangan');
        $this->db->where('tbl_donasi.id_donasi', $id_donasi );
        $query =  $this->db->get();

        return $query->result_array();
    }

    public function jumlahTotalProses($getId, $getNominal)
    {

        $getData = $this->db->query("SELECT * FROM tbl_penggalangan WHERE id_penggalangan = '$getId'");

        $rowData = $getData->row_array();

        $getTotalProses = $rowData['total_proses'];

        $jumlah = $getTotalProses + $getNominal;

        return $jumlah;
    }

    public function jumlahDonaturBaru($getId, $donaturBaru)
    {

        $getData = $this->db->query("SELECT * FROM tbl_penggalangan WHERE id_penggalangan = '$getId'");

        $rowData = $getData->row_array();

        $getDonatur = $rowData['jml_donatur'];

        $hasilDonatur = $getDonatur + $donaturBaru;

        return $hasilDonatur;
    }

    public function ubahTotalProses($getId, $getJumlah, $tambahDonatur)
    {

        $data = array(

            "total_proses" => $getJumlah,
            "jml_donatur" => $tambahDonatur

        );

        $this->db->where('id_penggalangan', $getId);
        $this->db->update('tbl_penggalangan', $data);
    }

    public function getKegiatan($id_penggalangan) {
        $this->db->select('*');
        $this->db->from('tbl_kegiatan');
        $this->db->where('id_penggalangan', $id_penggalangan);
        $this->db->order_by('id', 'DESC');
        $query =  $this->db->get();

        return $query->result_array();
    }
}
