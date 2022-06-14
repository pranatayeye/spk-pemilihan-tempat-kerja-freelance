<?php

class Admin_bobot extends Controller{
	
	public function index($halamanAktif ='1')
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}
		
		$data['judul'] = 'Nilai Bobot';

		$data['cari'] = $this->model('Admin_bobot_model')->cari();
		$data['tampilBobot'] = $this->model('Admin_bobot_model')->tampilBobot($halamanAktif);
		$data['awalData'] = $this->model('Admin_bobot_model')->awalData($halamanAktif);
		$data['jmlHal'] = $this->model('Admin_bobot_model')->jmlHal($halamanAktif);

		$this->view('templates/header', $data);
		$this->view('templates/admin_navbar');
		$this->view('admin_bobot/index', $data);
		$this->view('templates/footer');
	}

	public function tbhBobot()
	{
		$idLogin = $_SESSION['idAdmin'];

		if($this->model('Admin_bobot_model')->tbhDataBobot($_POST,$idLogin) > 0){
			Flasher::buatFlash('Berhasil','menambahkan nilai bobot.','success');
			header('location:'. BASEURL . '/Admin_bobot');
			exit;
		} else{
			Flasher::buatFlash('Gagal','menambahkan nilai bobot.','danger');
			header('location:'. BASEURL . '/Admin_bobot');
			exit;
		}
	}

	public function edit($id)
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}
		
		$data['judul'] = 'Edit Nilai Bobot';

		$data['tampilBobot'] = $this->model('Admin_bobot_model')->detailBobot($id);
		
		$this->view('templates/header', $data);
		$this->view('templates/admin_navbar');
		$this->view('admin_bobot/edit', $data);
		$this->view('templates/footer');
	}

	public function editBobot($id)
	{
		$idLogin = $_SESSION['idAdmin']; 

		if($this->model('Admin_bobot_model')->editDataBobot($id,$idLogin) > 0){
			Flasher::buatFlash('Berhasil','mengubah.','success');
			header('location:'. BASEURL . '/Admin_bobot');
			exit;
		} else{
			Flasher::buatFlash('Gagal','mengubah.','danger');
			header('location:'. BASEURL . '/Admin_bobot');
			exit;
		}
	}

	public function hapusBobot($id)
	{
		$idLogin = $_SESSION['idAdmin'];

		if($this->model('Admin_bobot_model')->hapusDataBobot($id,$idLogin) > 0){
			Flasher::buatFlash('Berhasil','menghapus nilai bobot.','success');
			header('location:'. BASEURL . '/Admin_bobot');
			exit;
		} else{
			Flasher::buatFlash('Gagal','menghapus nilai bobot.','danger');
			header('location:'. BASEURL . '/Admin_bobot');
			exit;
		}
	}

}