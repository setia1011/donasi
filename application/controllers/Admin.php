<?php
defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library("session");
		$this->load->model('Admin_model');
		$this->load->model('Petugas_model');
	}

	public function index()
	{
		$data['title'] = 'Dashboard Admin';

		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['jmlAnakAsuh'] = $this->Petugas_model->jmlAnakAsuh();
		$data['jmlDonatur'] = $this->Petugas_model->jmlDonatur();
		$data['jmlPenggalangan'] = $this->Petugas_model->jmlPenggalangan();

		$data['jmlDonasiDiterima'] = $this->Petugas_model->jmlDonasiDiterima();
		$data['jmlDonasiDitolak'] = $this->Petugas_model->jmlDonasiDitolak();
		$data['jmlDonasiMenunggu'] = $this->Petugas_model->jmlDonasiMenunggu();
		$data['totalDonasi'] = $this->Petugas_model->totalDonasi();

		$bulan = date('m');

		$x = $this->Petugas_model->grafikPenggalanganBulan($bulan);
		$data['jmlPenggalanganBulan'] = json_encode($x);


		$this->load->view('Admin/Template/header', $data);
		$this->load->view('Admin/index', $data);
		$this->load->view('Admin/Template/footer');
	}


	public function Users(){

		$data['title'] = 'Data Users';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();


		$data['allUsers'] = $this->Admin_model->getallUsers();

		$this->load->view('Admin/Template/header', $data);
		$this->load->view('Admin/users', $data);
		$this->load->view('Admin/Template/footer');

	}

	public function tambahUser(){

		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$jk = $_POST['jk'];
		$no_telpon = $_POST['no_telpon'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		
		$data = [

			'nama' => $nama,
			'email' => $email,
			'tgl_lahir' => $tgl_lahir,
			'jk' => $jk,
			'no_telpon' => $no_telpon,
			'password' => $password,
			'role' => $role,
			'created_date' => date('Y-m-d')

		];
		$this->db->insert('tbl_user', $data);
		$this->session->set_tempdata('message', '<div class="alert alert-success alert-dismissible " role="alert">Data Berhasil di Tambah</div>', 3);
		redirect('Admin/Users');

	}

	public function editUser(){

		$id_user = $_POST['id_user'];
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$jk = $_POST['jk'];
		$no_telpon = $_POST['no_telpon'];
		$password = $_POST['password'];
		$role = $_POST['role'];
		
		$data = [

			'nama' => $nama,
			'email' => $email,
			'tgl_lahir' => $tgl_lahir,
			'jk' => $jk,
			'no_telpon' => $no_telpon,
			'password' => $password,
			'role' => $role,
			'created_date' => date('Y-m-d')
		];

		$this->db->where('id_user', $id_user);
		$this->db->update('tbl_user', $data);
		$this->session->set_tempdata('message', '<div class="alert alert-warning alert-dismissible " role="alert">Data Berhasil di Ubah</div>', 3);
		redirect('Admin/Users');
		

	}

	public function hapusUsers($id_user)
	{
		if ($id_user == "") {
			$this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert">Data Berhasil di Hapus</div>', 3);
			redirect('Admin/Users');
		} else {
			$this->db->where('id_user', $id_user);
			$this->db->delete('tbl_user');
			$this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert">Data Berhasil di Hapus</div>', 3);
			redirect('Admin/Users');
		}
	}

	public function anakAsuhAdmin()
	{

		$data['title'] = 'Data Anak Asuh Yayasan';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();


		$data['anakAsuhAdmin'] = $this->Petugas_model->getanakAsuh();

		$this->load->view('Admin/Template/header', $data);
		$this->load->view('Admin/anakAsuh_admin', $data);
		$this->load->view('Admin/Template/footer');
	}

	public function tambahAnakAsuh()
	{
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$getNow = date('Y-m-d');         
		$umur = $getNow - $tgl_lahir;
		$alamat = $_POST['alamat'];
		$kategori = $_POST['kategori'];
		

		$insertData = array(

			"nama" => $nama,
			"jk" => $jk,
			"tgl_lahir" => $tgl_lahir,
			"umur" => $umur,
			"alamat" => $alamat,
			"kategori" => $kategori,
			"created_date" => date('Y-m-d')

		);

		$this->db->insert('tbl_anak', $insertData);

		$this->session->set_tempdata('message', '<div class="alert alert-success alert-dismissible " role="alert">Data Berhasil di Tambah</div>', 3);
		redirect('Admin/anakAsuhAdmin');
	}


	public function editAnakAsuh()
	{
		$id_anak = $_POST['id_anak'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$tgl_lahir = $_POST['tgl_lahir'];
		$getNow = date('Y-m-d');         
		$umur = $getNow - $tgl_lahir;
		$alamat = $_POST['alamat'];
		$kategori = $_POST['kategori'];
		

		$data = array(

			"nama" => $nama,
			"jk" => $jk,
			"tgl_lahir" => $tgl_lahir,
			"umur" => $umur,
			"alamat" => $alamat,
			"kategori" => $kategori,
			"created_date" => date('Y-m-d')

		);

		$this->db->where('id_anak', $id_anak);
		$this->db->update('tbl_anak', $data );
		$this->session->set_tempdata('message', '<div class="alert alert-warning alert-dismissible " role="alert" style="color:black;">Data Berhasil di Edit</div>', 3);
		
		redirect('Admin/anakAsuhAdmin');
	}





	public function hapusAnakAsuh($id_anak)
    {
        if ($id_anak == "") {
            $this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert" style="color:black;">Data Gagal di hapus</div>', 3);
            redirect('Admin/anakAsuhAdmin');
        } else {
            $this->db->where('id_anak', $id_anak);
            $this->db->delete('tbl_anak');
            $this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert" style="color:black;">Data Berhasil di hapus</div>', 3);
            redirect('Admin/anakAsuhAdmin');
        }
    }

}
