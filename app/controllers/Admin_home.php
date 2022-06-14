<?php

class Admin_home extends Controller{
	
	public function index()
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}
		
		$data['judul'] = 'Home';

		$idLogin = $_SESSION['idAdmin'];
		$data['namaAdmin'] = $this->model('Admin_home_model')->namaAdmin($idLogin);

		$data['kriteria'] = $this->model('Admin_home_model')->jmlKriteria();
		$data['bobot'] = $this->model('Admin_home_model')->jmlBobot();
		$data['mhs'] = $this->model('Admin_home_model')->jmlMhs();
		$data['admin'] = $this->model('Admin_home_model')->jmlAdmin();
		$data['log'] = $this->model('Admin_home_model')->jmlLog();


		$this->view('templates/header', $data);
		$this->view('templates/admin_navbar');
		$this->view('admin_home/index', $data);
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
			header('location:'. BASEURL . '/Admin_home');
			exit;
		}
	}
}