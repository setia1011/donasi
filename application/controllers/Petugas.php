<?php defined('BASEPATH') or exit('No direct script access allowed');

date_default_timezone_set('Asia/Jakarta');

class Petugas extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('Petugas_model');
		$this->load->model('User_model');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['title'] = 'Dashboard Petugas';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['jmlAnakAsuh'] = $this->Petugas_model->jmlAnakAsuh();
		$data['jmlDonatur'] = $this->Petugas_model->jmlDonatur();
		$data['jmlPenggalangan'] = $this->Petugas_model->jmlPenggalangan();

		$data['jmlDonasiDiterima'] = $this->Petugas_model->jmlDonasiDiterima();
		$data['jmlDonasiDitolak'] = $this->Petugas_model->jmlDonasiDitolak();
		$data['jmlDonasiMenunggu'] = $this->Petugas_model->jmlDonasiMenunggu();
		$data['totalDonasi'] = $this->Petugas_model->totalDonasi();

		$bulan = date('m');

		$filter = 6;
		if ($this->input->get('filter', TRUE)) {
			$filter = $this->input->get('filter', TRUE);
		}

		$x = $this->Petugas_model->grafikPenggalanganBulan($bulan);
		$data['jmlPenggalanganBulan'] = json_encode($x);
		$data['donasichart'] = $this->getDonasiChart($filter);

		$this->load->view('Petugas/Template/header', $data);
		$this->load->view('Petugas/index', $data);
		$this->load->view('Petugas/Template/footer');
	}

	public function getDonasiChart($filter) {
		$data = $this->db->query("SELECT * FROM tbl_donasi WHERE MONTH(created_date) = ". $filter)->result_array();

		return json_encode($data);
	}

	public function informasi()
	{

		$data['title'] = 'Informasi';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();


		$data['informasi'] = $this->Petugas_model->getInformasi();

		$this->load->view('Petugas/Template/header', $data);
		$this->load->view('Petugas/informasi', $data);
		$this->load->view('Petugas/Template/footer');
	}

	public function tambahInformasi()
	{

		$judul = $_POST['judul'];
		$isi_konten = $_POST['isi_konten'];

		$data = [

			'judul' => $judul,
			'isi_konten' => $isi_konten,
			'created_date' => date('Y-m-d')

		];
		$this->db->insert('tbl_konten', $data);
		$this->session->set_tempdata('message', '<div class="alert alert-success alert-dismissible " role="alert">Data Berhasil di Tambah</div>', 3);
		redirect('Petugas/informasi');
	}

	public function editInformasi()
	{

		$id_konten = $_POST['id_konten'];
		$judul = $_POST['judul'];
		$isi_konten = $_POST['isi_konten'];

		$data = [

			'judul' => $judul,
			'isi_konten' => $isi_konten

		];

		$this->db->where('id_konten', $id_konten);
		$this->db->update('tbl_konten', $data);
		$this->session->set_tempdata('message', '<div class="alert alert-warning alert-dismissible " role="alert">Data Berhasil di Ubah</div>', 3);
		redirect('Petugas/informasi');
	}

	public function hapusInformasi($id_konten)
	{
		if ($id_konten == "") {
			$this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert">Data Berhasil di Hapus</div>', 3);
			redirect('Petugas/informasi');
		} else {
			$this->db->where('id_konten', $id_konten);
			$this->db->delete('tbl_konten');
			$this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert">Data Berhasil di Hapus</div>', 3);
			redirect('Petugas/informasi');
		}
	}


	public function donasi()
	{

		$data['title'] = 'Donasi';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();


		$data['verifDonasi'] = $this->Petugas_model->getVerifDonasi();

		$this->load->view('Petugas/Template/header', $data);
		$this->load->view('Petugas/donasi', $data);
		$this->load->view('Petugas/Template/footer');
	}

	public function deleteDonasi($id_donasi)
    {
        if ($id_donasi == "") {
            $this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert" style="color:white;">Data Gagal di hapus</div>', 3);
            redirect('Petugas/donasi');
        } else {
            $this->db->where('id_donasi', $id_donasi);
            $this->db->delete('tbl_donasi');
            $this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert" style="color:white;">Data Berhasil di hapus</div>', 3);
            redirect('Petugas/donasi');
        }
    }


	public function detailDonasi($id_donasi)
	{

		$data['title'] = 'Detail Donasi';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['detailDonasi'] = $this->Petugas_model->getdetailDonasi($id_donasi);

		$this->load->view('Petugas/Template/header', $data);
		$this->load->view('Petugas/detailDonasi', $data);
		$this->load->view('Petugas/Template/footer');
	}



	public function terimaDonasi($id_donasi)
    {
        if ($id_donasi == "") {
            $this->session->set_tempdata('message', '<div class="alert alert-warning alert-dismissible " role="alert" style="color:white;">Data Gagal di Terima</div>', 3);
            redirect('Petugas/donasi');
        } else {

        		$id_donasiUpdate = $id_donasi;

        		$id_donasi = $this->db->get_where('tbl_donasi', ['id_donasi' => $id_donasi ])->row_array();
        		$getId = $id_donasi['id_penggalangan'];
        		$getNominal = $id_donasi['nominal'];
        		$donaturBaru = 1;

        		$getJumlah = $this->Petugas_model->jumlahTotalProses($getId, $getNominal);
        		$tambahDonatur = $this->Petugas_model->jumlahDonaturBaru($getId, $donaturBaru);

        		$this->Petugas_model->ubahTotalProses($getId, $getJumlah, $tambahDonatur);
        		

	        	$data = array(

					"status" => "Diterima"
				);

            $this->db->where('id_donasi', $id_donasiUpdate);
            $this->db->update('tbl_donasi', $data);
            $this->session->set_tempdata('message', '<div class="alert alert-warning alert-dismissible " role="alert" style="color:white;">Data Berhasil di Terima</div>', 3);
            redirect('Petugas/donasi');
           
        }
    }


    public function tolakDonasi($id_donasi)
    {
        if ($id_donasi == "") {
            $this->session->set_tempdata('message', '<div class="alert alert-warning alert-dismissible " role="alert" style="color:white;">Data Gagal di Tolak</div>', 3);
            redirect('Petugas/donasi');
        } else {

	        	$data = array(

				"status" => "Ditolak"
			);

            $this->db->where('id_donasi', $id_donasi);
            $this->db->update('tbl_donasi', $data);
            $this->session->set_tempdata('message', '<div class="alert alert-warning alert-dismissible " role="alert" style="color:white;">Data Berhasil di Tolak</div>', 3);
            redirect('Petugas/donasi');
            
        }
    }


    public function filterDonasi(){

    	$data['title'] = 'Filter Donasi';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['getFilter'] = $this->input->post('filterDonasi');

		$getFilter = $this->input->post('filterDonasi');

		$data['filterDonasi'] = $this->Petugas_model->getFilterDonasi($getFilter);


		$data['verifDonasi'] = $this->Petugas_model->getVerifDonasi();

		$this->load->view('Petugas/Template/header', $data);
		$this->load->view('Petugas/filterDonasi', $data);
		$this->load->view('Petugas/Template/footer');

    }

	public function infoDonatur($id_user){

    	$data['title'] = 'Filter Donasi';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['donatur'] = $this->db->get_where('tbl_user', ['id_user' => $id_user])->row_array();
		$data['donasi'] = $this->User_model->historyDonasi($id_user);

		$this->load->view('Petugas/Template/header', $data);
		$this->load->view('Petugas/infodonatur', $data);
		$this->load->view('Petugas/Template/footer');

    }


	public function anakAsuh()
	{

		$data['title'] = 'Data Anak Asuh Yayasan';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();


		$data['anakAsuh'] = $this->Petugas_model->getanakAsuh();

		$this->load->view('Petugas/Template/header', $data);
		$this->load->view('Petugas/anakAsuh', $data);
		$this->load->view('Petugas/Template/footer');
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
		redirect('Petugas/anakAsuh');
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
		$this->session->set_tempdata('message', '<div class="alert alert-warning alert-dismissible " role="alert" style="color:white;">Data Berhasil di Edit</div>', 3);
		
		redirect('Petugas/anakAsuh');
	}





	public function hapusAnakAsuh($id_anak)
    {
        if ($id_anak == "") {
            $this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert" style="color:white;">Data Gagal di hapus</div>', 3);
            redirect('Petugas/anakAsuh');
        } else {
            $this->db->where('id_anak', $id_anak);
            $this->db->delete('tbl_anak');
            $this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert" style="color:white;">Data Berhasil di hapus</div>', 3);
            redirect('Petugas/anakAsuh');
        }
    }


	public function penggalangan()
	{
		$data['title'] = 'Penggalangan Dana';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['penggalanganDana'] = $this->Petugas_model->getPenggalangan();
		$data['kategori'] = $this->db->get('tbl_kategori_penggalangan')->result_array();

		$this->load->view('Petugas/Template/header', $data);
		$this->load->view('Petugas/penggalangan', $data);
		$this->load->view('Petugas/Template/footer');
	}

	public function kategori()
	{
		$data['title'] = 'Kategori Penggalangan Dana';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['kategori'] = $this->db->get('tbl_kategori_penggalangan')->result_array();

		$this->load->view('Petugas/Template/header', $data);
		$this->load->view('Petugas/kategori', $data);
		$this->load->view('Petugas/Template/footer');
	}

	public function tambahKategori()
	{
		$nama = $this->input->post('nama');

		$data = [
			'nama' => $nama
		];

		$this->db->insert('tbl_kategori_penggalangan', $data);
		$this->session->set_tempdata('message', '<div class="alert alert-success alert-dismissible " role="alert">Data Berhasil di Tambah</div>', 3);
		redirect('Petugas/kategori');
	}

	public function editKategori()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');

		$data = [
			'nama' => $nama
		];

		$this->db->where('id', $id);
		$this->db->update('tbl_kategori_penggalangan', $data);

		$this->session->set_tempdata('message', '<div class="alert alert-success alert-dismissible " role="alert">Data Berhasil di Ubah</div>', 3);
		redirect('Petugas/kategori');
	}

	public function hapusKategori($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('tbl_kategori_penggalangan');

		$this->session->set_tempdata('message', '<div class="alert alert-success alert-dismissible " role="alert">Data Berhasil di Hapus</div>', 3);
		redirect('Petugas/kategori');
	}

	
	public function tambahPenggalangan()
	{
		$judul = $_POST['judul'];
		$kategori = $_POST['kategori'];
		$total_harapan = $_POST['total_harapan'];
		$bar = "0%";
		$waktu_penggalangan = $_POST['waktu_penggalangan'];
		// print_r($judul);
		// exit();

		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['upload_path'] = './assets/img/laporan/';
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

			"judul" => $judul,
			"kategori" => $kategori,
			"gambar" => $new_image,
			"total_harapan" => $total_harapan,
			"bar" => $bar,
			"waktu_penggalangan" => $waktu_penggalangan,
			"total_proses" => "0",
			"created_date" => date('Y-m-d')

		);

		$this->db->insert('tbl_penggalangan', $insertData);

		$this->session->set_tempdata('message', '<div class="alert alert-success alert-dismissible " role="alert">Data Berhasil di Tambah</div>', 3);
		redirect('Petugas/penggalangan');
	}

	public function updateBanner()
	{
		$upload_image = $_FILES['gambar']['name'];
		$id_update = $this->input->post('idgambar');
		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['upload_path'] = './assets/img/laporan/';
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

		$updateData = array(

			"gambar" => $new_image,

		);

		$this->db->where('id_penggalangan', $id_update);
		$this->db->update('tbl_penggalangan', $updateData);

		$this->session->set_tempdata('message', '<div class="alert alert-success alert-dismissible " role="alert">Gambar Berhasil di Update</div>', 3);
		redirect('Petugas/penggalangan');
	}


	public function editPenggalan(){

		$id_penggalangan = $this->input->post('id_penggalangan');
		$judul = $this->input->post('judul');
		$kategori = $this->input->post('kategori');
		$total_harapan = $this->input->post('total_harapan');
		$bar = $this->input->post('bar');
		$waktu_penggalangan = $this->input->post('waktu_penggalangan');

		$data = array(
			"judul" => $judul,
			"kategori" => $kategori,
			"total_harapan" => $total_harapan,
			"bar" => $bar,
			"waktu_penggalangan" => $waktu_penggalangan
		);

		print_r($data);
		die();
		$this->db->where('id_penggalangan', $id_penggalangan);
		$this->db->update('tbl_penggalangan', $data );
		$this->session->set_tempdata('message', '<div class="alert alert-warning alert-dismissible " role="alert" style="color:white;">Data Berhasil di Edit</div>', 3);
		
		redirect('Petugas/penggalangan');


	}

	public function hapusPenggalangan($id_penggalangan){

		if ($id_penggalangan == "") {
            $this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert" style="color:white;">Data Gagal di hapus</div>', 3);
            redirect('Petugas/penggalangan');
        } else {
            $this->db->where('id_penggalangan', $id_penggalangan);
            $this->db->delete('tbl_penggalangan');
            $this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert" style="color:white;">Data Berhasil di hapus</div>', 3);
            redirect('Petugas/penggalangan');
        }

	}

	public function penyaluran(){

		$data['title'] = 'Penyaluran Donasi';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['penggalanganDana'] = $this->Petugas_model->getPenggalangan();

		// $data['penyaluranDonasi'] = $this->Petugas_model->penyaluranDonasi();

		$this->load->view('Petugas/Template/header', $data);
		$this->load->view('Petugas/penyaluran', $data);
		$this->load->view('Petugas/Template/footer');

	}

	public function detailPenyaluran(){

		$data['title'] = 'Detail Penyaluran Donasi';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$id_penggalangan = $_POST['id_penggalangan'];

		$data['detailPenyaluranDonasi'] = $this->Petugas_model->detailPenggalangan($id_penggalangan);

		$data['informasiPenyaluran'] = $this->Petugas_model->informasiPenyaluran($id_penggalangan);
		$data['anak'] = $this->db->get('tbl_anak')->result_array();
		$data['penyaluran'] = $this->db->get_where('tbl_penyaluran', ['id_penggalangan' => $id_penggalangan])->result_array();

		$this->load->view('Petugas/Template/header', $data);
		$this->load->view('Petugas/detailPenyaluran', $data, $id_penggalangan);
		$this->load->view('Petugas/Template/footer');

	}

	public function tambahPenyaluran(){

		$id_penggalangan = $_POST['id_penggalangan'];
		$keterangan = $_POST['keterangan'];
		$jumlah = $_POST['jumlah'];

		$data = array(

			"id_penggalangan" => $id_penggalangan,
			"keterangan" => $keterangan,
			"jumlah" => $jumlah,
			"tgl_penyaluran" => date('Y-m-d')
		);

		$this->db->insert('tbl_penyaluran', $data);
		$this->session->set_tempdata('message', '<div class="alert alert-success alert-dismissible " role="alert">Data Berhasil di Tambah</div>', 3);
		redirect('Petugas/penyaluran');


	}

	public function editPenyaluran(){

		$id_penyaluran = $_POST['id_penyaluran'];
		$id_penggalangan = $_POST['id_penggalangan'];
		$keterangan = $_POST['keterangan'];
		$jumlah = $_POST['jumlah'];
		$tgl_penyaluran = $_POST['tgl_penyaluran'];

		$data = array(
			"id_penggalangan" => $id_penggalangan,
			"keterangan" => $keterangan,
			"jumlah" => $jumlah,
			"tgl_penyaluran" => $tgl_penyaluran
		);

		// print_r($data);

		$this->db->where('id_penyaluran', $id_penyaluran);
		$this->db->update('tbl_penyaluran', $data );
		$this->session->set_tempdata('message', '<div class="alert alert-warning alert-dismissible " role="alert" style="color:white;">Data Berhasil di Edit</div>', 3);
		
		redirect('Petugas/penyaluran');

	}

	public function deletePenyaluran($id_penyaluran)
    {
        if ($id_penyaluran == "") {
            $this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert" style="color:white;">Data Gagal di hapus</div>', 3);
            redirect('Petugas/penyaluran');
        } else {
            $this->db->where('id_penyaluran', $id_penyaluran);
            $this->db->delete('tbl_penyaluran');
            $this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert" style="color:white;">Data Berhasil di hapus</div>', 3);
            redirect('Petugas/penyaluran');
        }
    }

	public function kegiatan() {
		$data['title'] = 'Kegiatan';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['kegiatan'] = $this->db->query("SELECT * FROM `tbl_kegiatan` JOIN `tbl_penggalangan` ON `tbl_kegiatan`.`id_penggalangan` = `tbl_penggalangan`.`id_penggalangan`")->result_array();
		$data['penggalangan'] = $this->db->get('tbl_penggalangan')->result_array();

		$this->load->view('Petugas/Template/header', $data);
		$this->load->view('Petugas/kegiatan', $data);
		$this->load->view('Petugas/Template/footer');		
	}

	public function tambahKegiatan() {
		$nama = $this->input->post('nama');
		$kategori_penggalangan = $this->input->post('kategori_penggalangan');
		$desc_kegiatan = $this->input->post('desc_kegiatan');
		$kategori_kegiatan = $this->input->post('kategori_kegiatan');
		$foto = $_FILES['imageup'];
		if($foto=''){}else{
			$config['upload_path'] = './kegiatan';
			$config['allowed_types'] = 'jpg|png';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('imageup')) {
				echo "Upload Gagal"; die();
			} else {
				$foto = $this->upload->data('file_name');
			}
		}

		$data = [
			"nama_kegiatan" => $nama,
			"id_penggalangan" => $kategori_penggalangan,
			"desc_kegiatan" => $desc_kegiatan,
			"kategori_kegiatan" => $kategori_kegiatan,
			"gambar_kegiatan" => $foto
		];

		$this->db->insert('tbl_kegiatan', $data);

		redirect('Petugas/kegiatan');
	}

	public function deleteKegiatan($id) {
		$this->db->delete('tbl_kegiatan' , ['id' => $id]);
		redirect('Petugas/kegiatan');
	}

	public function editKegiatan($id) {
		$nama = $this->input->post('nama'.$id);
		$kategori_penggalangan = $this->input->post('kategori_penggalangan'.$id);
		$desc_kegiatan = $this->input->post('desc_kegiatan'.$id);
		$kategori_kegiatan = $this->input->post('kategori_kegiatan'.$id);
		$foto = $_FILES['imageup'.$id];
		if($foto=''){}else{
			$config['upload_path'] = './kegiatan';
			$config['allowed_types'] = 'jpg|png';

			$this->load->library('upload', $config);
			$this->upload->initialize($config);
			if(!$this->upload->do_upload('imageup'.$id)) {
				echo "Upload Gagal"; die();
			} else {
				$foto = $this->upload->data('file_name');
			}
		}

		$data = [
			"nama_kegiatan" => $nama,
			"id_penggalangan" => $kategori_penggalangan,
			"desc_kegiatan" => $desc_kegiatan,
			"kategori_kegiatan" => $kategori_kegiatan,
			"gambar_kegiatan" => $foto
		];

		$this->db->where('id', $id);
		$this->db->update('tbl_kegiatan', $data);

		redirect('Petugas/kegiatan');
	}

	public function homebanner()
	{
		$data['title'] = 'Home Banner';
		$data['user'] = $this->db->get_where('tbl_user', ['nama' => $this->session->userdata('nama')])->row_array();

		$data['banners'] = $this->db->get('tbl_banner')->result_array();

		$this->load->view('Petugas/Template/header', $data);
		$this->load->view('Petugas/banner', $data);
		$this->load->view('Petugas/Template/footer');
	}

	public function tambahbanner()
	{
		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['upload_path'] = './assets/images/';
			$config['overwrite']     = true;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('gambar')) {
				$this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert">Ukuran Foto terlalu besar & file yang di izinkan gif|jpg|png|jpeg</div>', 3);
				redirect('Petugas/homebanner');
			
			} else {
				$new_image = $this->upload->data('file_name');
			}
		}


		$insertData = array(

			"gambar" => $new_image,

		);

		$this->db->insert('tbl_banner', $insertData);

		$this->session->set_tempdata('message', '<div class="alert alert-success alert-dismissible " role="alert">Gambar Berhasil di Tambah</div>', 3);
		redirect('Petugas/homebanner');
	}

	public function updatehomebanner()
	{
		$upload_image = $_FILES['gambar']['name'];
		$id_banner = $this->input->post('idgambar');

		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['upload_path'] = './assets/images/';
			$config['overwrite']     = true;

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('gambar')) {
				$this->session->set_tempdata('message', '<div class="alert alert-danger alert-dismissible " role="alert">Ukuran Foto terlalu besar & file yang di izinkan gif|jpg|png|jpeg</div>', 3);
				redirect('Petugas/homebanner');
			
			} else {
				$new_image = $this->upload->data('file_name');
			}
		}


		$updateData = array(

			"gambar" => $new_image,

		);

		$this->db->where('id', $id_banner);
		$this->db->update('tbl_banner', $updateData);

		$this->session->set_tempdata('message', '<div class="alert alert-success alert-dismissible " role="alert">Gambar Berhasil di Tambah</div>', 3);
		redirect('Petugas/homebanner');
	}

	public function deletebanner()
	{
		$idbanner = $this->input->post('idbanner');

		$this->db->where('id', $idbanner);
		$this->db->delete('tbl_banner');

		$this->session->set_tempdata('message', '<div class="alert alert-success alert-dismissible " role="alert">Gambar Berhasil di Hapus</div>', 3);
		redirect('Petugas/homebanner');
	}

	public function tambahWaktu()
	{
		$id_galang = $this->input->post('idgalang');
		$date = $this->input->post('date');

		$updateData = array(
			"waktu_penggalangan" => $date,
		);

		$this->db->where('id_penggalangan', $id_galang);
		$this->db->update('tbl_penggalangan', $updateData);

		$this->session->set_tempdata('message', '<div class="alert alert-success alert-dismissible " role="alert">Batas Waktu Berhasil di Tambah</div>', 3);
		redirect('Petugas/penggalangan');
	}
}