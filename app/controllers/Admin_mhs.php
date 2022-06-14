<?php

class Admin_mhs extends Controller{
	
	public function index($halamanAktif ='1')
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}
		
		$data['judul'] = 'Mahasiswa';
		
		$data['defaultPass'] = '12345';

		$data['cari'] = $this->model('Admin_mhs_model')->cari();
		$data['tampilMhs'] = $this->model('Admin_mhs_model')->tampilMhs($halamanAktif);
		$data['awalData'] = $this->model('Admin_mhs_model')->awalData($halamanAktif);
		$data['jmlHal'] = $this->model('Admin_mhs_model')->jmlHal($halamanAktif);

		$this->view('templates/header', $data);
		$this->view('templates/admin_navbar');
		$this->view('admin_mhs/index', $data);
		$this->view('templates/footer');
	}

	public function tbhMhs()
	{
		$idLogin = $_SESSION['idAdmin'];

		if($this->model('Admin_mhs_model')->tbhDataMhs($_POST,$idLogin) > 0){
			Flasher::buatFlash('Berhasil','menambahkan mahasiswa.','success');
			header('location:'. BASEURL . '/Admin_mhs');
			exit;
		} else{
			Flasher::buatFlash('Gagal','menambahkan mahasiswa.','danger');
			header('location:'. BASEURL . '/Admin_mhs');
			exit;
		}
	}

	public function edit($nim)
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}
		
		$data['judul'] = 'Edit Mahasiswa';

		$data['tampilMhs'] = $this->model('Admin_mhs_model')->detailMhs($nim);

		$this->view('templates/header', $data);
		$this->view('templates/admin_navbar');
		$this->view('admin_mhs/edit', $data);
		$this->view('templates/footer');
	}

	public function editMhs($nim)
	{
		$idLogin = $_SESSION['idAdmin'];

		if($this->model('Admin_mhs_model')->editDataMhs($nim,$idLogin) > 0){
			Flasher::buatFlash('Berhasil','mengubah.','success');
			header('location:'. BASEURL . '/Admin_mhs');
			exit;
		} else{
			Flasher::buatFlash('Gagal','mengubah.','danger');
			header('location:'. BASEURL . '/Admin_mhs');
			exit;
		}
	}

	public function hapusMhs($nim)
	{
		$idLogin = $_SESSION['idAdmin'];

		if($this->model('Admin_mhs_model')->hapusDataMhs($nim,$idLogin) > 0){
			Flasher::buatFlash('Berhasil','menghapus mahasiswa.','success');
			header('location:'. BASEURL . '/Admin_mhs');
			exit;
		} else{
			Flasher::buatFlash('Gagal','menghapus mahasiswa.','danger');
			header('location:'. BASEURL . '/Admin_mhs');
			exit;
		}
	}

}