<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	 public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('Login_m');
        $this->load->helper(array('form', 'url'));
    }

	public function index()
	{
		$this->load->view('Auth/login');
	}

	public function register()
	{
		$this->load->view('Auth/register');
	}


	public function addUser(){

		$this->Login_m->addUser();
		redirect('Login');


	}
	
	public function postLogin()
	{

		if($this->input->post()){
			if($this->Login_m->doLogin() === '1' ){
				$this->session->set_userdata('admin', 'Success as a admin.');
				redirect('Admin');	
			}else if($this->Login_m->doLogin() === '2' ){
				$this->session->set_userdata('petugas', 'Success as a petugas.');
				redirect('Petugas');	
				
			}else if($this->Login_m->doLogin() === '3' ){
				$this->session->set_userdata('user', 'Success as a user.');
				redirect('User');	
			}else {

				$this->session->set_tempdata('err', '<div class="mb-3 ml-3" style="color:red;">Email / Password Salah....!</div>', 3);
				redirect('Login');
			}
        }

	
	}


	public function logout(){

		$this->session->unset_userdata('nama');
		// session_destroy();
		$this->session->sess_destroy();
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('Dashboard');
    

	}

	// Berfungsi untuk menghapus session atau logout
	// function logout() {
	// 	session_destroy();
	// 	redirect('Login');
	// 	}
}
