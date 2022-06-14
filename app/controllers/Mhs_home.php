<?php

class Mhs_home extends Controller{
	
	public function index()
	{
		if (!isset($_SESSION['nim'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}

		$data['judul'] = 'Home';

		$nimLogin = $_SESSION['nim'];

		$data['namaMhs'] = $this->model('Mhs_home_model')->namaMhs($nimLogin);
		$data['alternatif'] = $this->model('Mhs_home_model')->jmlAlternatif($nimLogin);
		$data['tampilHasil'] = $this->model('Mhs_hasil_model')->tampilHasil($nimLogin);
		$data['pengumuman'] = $this->model('Mhs_home_model')->pengumuman();

		$this->view('templates/header', $data);
		$this->view('templates/mhs_navbar');
		$this->view('mhs_home/index', $data);
		$this->view('templates/footer');
	}

	public function logout()
	{
		if((session_destroy() || session_unset()) == true){
			Flasher::buatFlash('Berhasil','log out.','success');
			header('location:'. BASEURL . '/Login');
			exit;
		} else{
			Flasher::buatFlash('Gagal','log out.','danger');
			header('location:'. BASEURL . '/Mhs_home');
			exit;
		}
	}
}