<?php

class Login extends Controller {
	public function index()
	{
		$data['judul'] = 'Login';
		
		$this->view('templates/header', $data);
		$this->view('login/index');
		$this->view('templates/footer');
	}

	public function daftarMhs()
	{
		if($this->model('Login_model')->daftarDataMhs($_POST) > 0){
			Flasher::buatFlash('Berhasil','mendaftar.','success');
			header('location:'. BASEURL . '/Login');
			exit;
		} else{
			Flasher::buatFlash('Gagal','mendaftar.','danger');
			header('location:'. BASEURL . '/Login');
			exit;
		}
	}

	public function loginMhs()
	{
		if($this->model('Login_model')->loginDataMhs($_POST) > 0){

			header('location:'. BASEURL . '/Mhs_home');
		}else{
			Flasher::buatFlash('Password salah','harap coba lagi.','danger');
			header('location:'. BASEURL . '/Login');
		}
	}

	public function loginAdmin()
	{
		if($this->model('Login_model')->loginDataAdmin($_POST) > 0){

			header('location:'. BASEURL . '/Admin_home');
		}else{
			Flasher::buatFlash('Password salah','harap coba lagi.','danger');
			header('location:'. BASEURL . '/Login');
		}
	}

}