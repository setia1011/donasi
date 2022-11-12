<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('form', 'url'));
		$this->load->library("session");
		$this->load->model('Admin_model');
		$this->load->model('Petugas_model');
		$this->load->model('User_model');
	}

	public function index()
	{
		$data['title'] = 'Dashboard User';

		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		// $getId = $this->db->get_where('dataanak', ['nik_anak' => $this->session->userdata('nik_anak')])->row_array();
		// $idAnak = $getId['id_anak'];

		// $data['bantuanStunting_user'] = $this->Admin_model->bantuanStunting_user($idAnak);
		// $data['countBantuan_user'] = $this->Admin_model->countBantuan_user($idAnak);


		$data['informasi'] = $this->Petugas_model->getInformasi();
		$data['dashboardDonasi'] = $this->Petugas_model->dashboardDonasi();

		// $data['kegiatan'] = $this->Admin_model->getKegiatan();
		// $data['pencegahan'] = $this->Admin_model->getPencegahan();

		$this->load->view('User/Template/header', $data);
		$this->load->view('User/index', $data);
		$this->load->view('User/Template/footer');
	}

	public function profil(){

		$data['title'] = 'My Profile';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$user = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$getIdUser = $user['id_user'];

		$data['penggalanganDana'] = $this->Petugas_model->getPenggalangan();

		$data['historyDonasi'] = $this->User_model->historyDonasi($getIdUser);
		$data['test'] = $this->db->get_where('tbl_donasi', ['id_user' => $getIdUser])->result_array();

		$this->load->view('User/Template/header', $data);
		$this->load->view('User/profil', $data);
		$this->load->view('User/Template/footer');

	}

	public function editProfil(){

		$id_user = $this->input->post('id_user');
		$nama = $this->input->post('nama');
		// $email = $this->input->post('email');
		$tgl_lahir = $this->input->post('tgl_lahir');
		$jk = $this->input->post('jk');
		$no_telpon = $this->input->post('no_telpon');
		$password = $this->input->post('password');

		$data = array(

			"nama" => $nama,
			// "email" => $email,
			"tgl_lahir" => $tgl_lahir,
			"jk" => $jk,
			"no_telpon" => $no_telpon,
			"password" => $password

		);

		$this->db->where('id_user', $id_user);
		$this->db->update('tbl_user', $data );
		$this->session->set_userdata('nama', $nama);
		$this->session->set_tempdata('message', '<div class="alert alert-warning alert-dismissible " role="alert" style="color:black;">Data Berhasil di Edit</div>', 3);
		redirect('User/profil');

	}


	public function penggalanganDana(){

		$data['title'] = 'Donasi';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['penggalanganDana'] = $this->Petugas_model->getPenggalangan();
		$data['kategori'] = $this->db->get('tbl_kategori_penggalangan')->result_array();

		$this->load->view('User/Template/header', $data);
		$this->load->view('User/penggalanganDana', $data);
		$this->load->view('User/Template/footer');


	}


	public function detailPenggalangan(){

		$data['title'] = 'Donasi';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$id_penggalangan = $this->input->post('id_penggalangan');

		$data['paraDonatur'] = $this->User_model->paraDonatur($id_penggalangan);
		
		$data['informasiPenyaluran'] = $this->Petugas_model->informasiPenyaluran($id_penggalangan);
		
		$data['detailPenggalangan'] = $this->Petugas_model->detailPenggalangan($id_penggalangan);
		
		// $data_galang = $this->Petugas_model->detailPenggalangan($id_penggalangan);

		// $id_galang = json_encode($data_galang[0]['id_penggalangan']);
		
		$data['kegiatan'] = $this->Petugas_model->getKegiatan($id_penggalangan);

		$this->load->view('User/Template/header', $data);
		$this->load->view('User/detailPenggalangan', $data);
		$this->load->view('User/Template/footer');


	}

	public function filterKategori(){

		$data['title'] = 'Donasi';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$kategori = $this->input->post('kategori');

		$id = $this->input->post('kategori');

		$data['filterDonasi'] = $this->Petugas_model->filterPenggalangan($kategori);
		$data['kategori'] = $this->db->get('tbl_kategori_penggalangan')->result_array();
		$data['cat_name'] = $this->db->get_where('tbl_kategori_penggalangan', ['id' => $id ])->row_array();

		$this->load->view('User/Template/header', $data);
		$this->load->view('User/filterDonasi', $data);
		$this->load->view('User/Template/footer');

	}

	public function formDonasi(){

		$data['title'] = 'Form Donasi';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$id_penggalangan = $this->input->post('id_penggalangan');

		$data['spesifikPenggalangan'] = $this->User_model->spesifikPenggalangan($id_penggalangan);
		
		$data['id_penggalangan'] = $id_penggalangan;

		$this->load->view('User/Template/header', $data);
		$this->load->view('User/formDonasi', $data);
		$this->load->view('User/Template/footer');

	}

	public function formDonasi2(){

		$data['title'] = 'Bukti Transfer Donasi';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$id_penggalangan = $this->input->post('id_penggalangan');
		$nominal = $this->input->post('nominal');
		
		$data['spesifikPenggalangan'] = $this->User_model->spesifikPenggalangan($id_penggalangan);
		
		$data['id_penggalangan'] = $id_penggalangan;
		$data['nominal'] = $nominal;

		$this->load->view('User/Template/header', $data);
		$this->load->view('User/formDonasi2', $data);
		$this->load->view('User/Template/footer');

	}

	public function addDonasiUser(){

		$id_user = $_POST['id_user'];
		$id_penggalangan = $_POST['id_penggalangan'];
		$nominal = $_POST['nominal'];
		$doa = $_POST['doa'];
		$status = "Menunggu Verifikasi";
		// print_r($judul);
		// exit();

		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['upload_path'] = './assets/img/buktiTf/';
			$config['overwrite']     = true;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('gambar')) {
				$this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert">Ukuran Foto terlalu besar & file yang di izinkan gif|jpg|png|jpeg</div>', 3);
				redirect('Petugas/penggalangan');
			
			} else {
				$new_image = $this->upload->data('file_name');
			}
		}

		$insertData = array(

			"id_user" => $id_user,
			"id_penggalangan" => $id_penggalangan,
			"gambar" => $new_image,
			"nominal" => $nominal,
			"doa" => $doa,
			"status" => $status,
			"created_date" => date('Y-m-d')

		);
  
		$this->db->insert('tbl_donasi', $insertData);

		$this->session->set_tempdata('message', '<div class="alert alert-success alert-dismissible " role="alert">Donasi sedang kami proses...</div>', 3);
		redirect('User/profil');

	}

}