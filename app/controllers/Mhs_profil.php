<?php

class Mhs_profil extends Controller{
	
	public function index($nim = null)
	{
		if (!isset($_SESSION['nim'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}
		
		$data['judul'] = 'Edit Profil';

		$data['tampilMhs'] = $this->model('Mhs_profil_model')->tampilMhs($nim);

		$this->view('templates/header', $data);
		$this->view('templates/mhs_navbar');
		$this->view('mhs_profil/index', $data);
		$this->view('templates/footer');
	}

	public function editMhs($nim)
	{
		if($this->model('Mhs_profil_model')->editDataMhs($nim) > 0){
			Flasher::buatFlash('Berhasil','mengubah.','success');
			header('location:'. BASEURL . '/Mhs_profil/'.$nim);
			exit;
		} else{
			Flasher::buatFlash('Gagal','mengubah.','danger');
			header('location:'. BASEURL . '/Mhs_profil/'.$nim);
			exit;
		}
	}

	public function hapusMhs($nim)
	{
		if($this->model('Mhs_profil_model')->hapusDataMhs($nim) > 0){
			Flasher::buatFlash('Berhasil','menghapus akun.','success');
			header('location:'. BASEURL . '/Login');
			((session_destroy()) || session_unset());
			exit;
		} else{
			Flasher::buatFlash('Gagal','menghapus akun.','danger');
			header('location:'. BASEURL . '/Mhs_profil/'.$nim);
			exit;
		}
	}

}