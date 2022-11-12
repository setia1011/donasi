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
