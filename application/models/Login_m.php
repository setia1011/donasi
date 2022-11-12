<?php
class Login_m extends CI_Model{

	function __construct(){
		$this->load->database(); // Berfungsi untuk memanggil database
	}


    public function addUser(){

        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $jk = $this->input->post('jk');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $no_telpon = $this->input->post('no_telpon');
        $password = $this->input->post('password');
        $role = 3;
        $created_date = date('Y-m-d');

        $data = array(

            "nama" => $nama,
            "email" => $email,
            "jk" => $jk,
            "tgl_lahir" => $tgl_lahir,
            "no_telpon" => $no_telpon,
            "password" => $password,
            "role" => $role,
            "created_date" => $created_date
        );


        $this->db->insert('tbl_user', $data);
        $this->session->set_tempdata('message', '<div style="color:orange;">Selamat anda sudah terdaftar, silahkan masuk...</div>', 3);

    }




	public function doLogin(){
		$post = $this->input->post();

        // cari user berdasarkan email dan username
        $this->db->where('email', $post["email"]);
        $this->db->where('password', $post["password"]);
        $user = $this->db->get("tbl_user")->row();
        // jika user terdaftar
        if($user){
          
            // periksa role-nya
            $isPetugas = $user->role;

            // jika password benar dan dia admin
            if($isPetugas < 4){ 
                // login sukses yay!
                $this->session->set_userdata('nama', $user->nama);
                return $isPetugas;
            }
        }
        
        // login gagal
		return false;
    }

	

	
	
}
