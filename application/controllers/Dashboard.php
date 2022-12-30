<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	 public function __construct(){
        parent::__construct();
        $this->load->model('Petugas_model');
		$this->load->model('Admin_model');
		$this->load->model('User_model');
        $this->load->helper(array('form', 'url'));
    }

	public function index()
	{
		$data['informasi'] = $this->Petugas_model->getInformasi();
		$data['banners'] = $this->db->get('tbl_banner')->result_array();

		$data['dashboardDonasi'] = $this->Petugas_model->dashboardDonasi();

		$this->load->view('Dashboard/index', $data);
	}

	public function csvLaporan() {
		$ref = $_POST['ref'];
		if ($ref == 'donasi') {
			$donatur = $this->db->query("SELECT
			b.nama,
			c.judul,
			a.nominal,
			a.status,
			a.created_date
			FROM `tbl_donasi` a
				JOIN `tbl_user` b ON a.`id_user` = b.`id_user`
				JOIN `tbl_penggalangan` c ON a.`id_penggalangan` = c.`id_penggalangan`")->result_array();

			$file = fopen('assets/laporan/donasi.csv', 'w');
			$header = array("Donatur","Penggalangan", "Nominal", "Status", "Tanggal Masuk"); 
			fputcsv($file, $header);
			foreach ($donatur as $key => $value) { 
				fputcsv($file, $value); 
			}
			fclose($file);
			$filex = 'assets/laporan/donasi.csv';
			header('Content-Type: application/json');
			echo json_encode(["filename" => basename($filex)]);
		}
		
		if ($ref == 'penyaluran') {
			$penyaluran = $this->db->query("SELECT
				b.judul,
				a.jumlah,
				a.keterangan,
				a.tgl_penyaluran
				FROM `tbl_penyaluran` a
					JOIN `tbl_penggalangan` b ON a.`id_penggalangan` = b.`id_penggalangan`;")->result_array();
			$file = fopen('assets/laporan/penyaluran.csv', 'w');
			$header = array("Penggalangan", "Nominal", "Keterangan", "Tanggal Penyaluran"); 
			fputcsv($file, $header);
			foreach ($penyaluran as $key => $value) { 
				fputcsv($file, $value); 
			}
			fclose($file);
			$filex = 'assets/laporan/penyaluran.csv';
			header('Content-Type: application/json');
			echo json_encode(["filename" => basename($filex)]);
		}
	}

	public function detail(){

		$data['title'] = 'Donasi';

		$id_penggalangan = $this->input->post('id_penggalangan');

		$data['paraDonatur'] = $this->User_model->paraDonatur($id_penggalangan);
		
		$data['informasiPenyaluran'] = $this->Petugas_model->informasiPenyaluran($id_penggalangan);
		
		$data['detailPenggalangan'] = $this->Petugas_model->detailPenggalangan($id_penggalangan);
		
		$data['kegiatan'] = $this->Petugas_model->getKegiatan($id_penggalangan);

		$this->load->view('Dashboard/Template/header', $data);
		$this->load->view('Dashboard/detailPenggalangan', $data);
		$this->load->view('Dashboard/Template/footer');
	}
	
	public function penggalanganDana(){

		$data['title'] = 'Donasi';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['penggalanganDana'] = $this->Petugas_model->getPenggalangan();
		$data['kategori'] = $this->db->get('tbl_kategori_penggalangan')->result_array();

		$this->load->view('Dashboard/Template/header', $data);
		$this->load->view('Dashboard/penggalanganDana', $data);
		$this->load->view('Dashboard/Template/footer');
	}

	public function filterKategori(){

		$data['title'] = 'Donasi';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$kategori = $this->input->post('kategori');

		$id = $this->input->post('kategori');

		$data['filterDonasi'] = $this->Petugas_model->filterPenggalangan($kategori);
		$data['kategori'] = $this->db->get('tbl_kategori_penggalangan')->result_array();
		$data['cat_name'] = $this->db->get_where('tbl_kategori_penggalangan', ['id' => $id ])->row_array();

		$this->load->view('Dashboard/Template/header', $data);
		$this->load->view('Dashboard/filterDonasi', $data);
		$this->load->view('Dashboard/Template/footer');

	}
}
