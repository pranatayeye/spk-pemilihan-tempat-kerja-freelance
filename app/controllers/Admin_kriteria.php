<?php

class Admin_kriteria extends Controller{
	
	public function index($halamanAktif ='1')
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}
		
		$data['judul'] = 'Kriteria';

		$data['kdKriteria'] = $this->model('Admin_kriteria_model')->kdKriteria();

		$data['cari'] = $this->model('Admin_kriteria_model')->cari();
		$data['tampilKriteria'] = $this->model('Admin_kriteria_model')->tampilKriteria($halamanAktif);
		$data['awalData'] = $this->model('Admin_kriteria_model')->awalData($halamanAktif);
		$data['jmlHal'] = $this->model('Admin_kriteria_model')->jmlHal($halamanAktif);

		$this->view('templates/header', $data);
		$this->view('templates/admin_navbar');
		$this->view('admin_kriteria/index', $data);
		$this->view('templates/footer');
	}

	public function tbhKriteria()
	{
		$idLogin = $_SESSION['idAdmin'];

		if($this->model('Admin_kriteria_model')->tbhDataKriteria($_POST,$idLogin) > 0){
			Flasher::buatFlash('Berhasil','menambahkan kriteria.','success');
			header('location:'. BASEURL . '/Admin_kriteria');
			exit;
		} else{
			Flasher::buatFlash('Gagal','menambahkan kriteria.','danger');
			header('location:'. BASEURL . '/Admin_kriteria');
			exit;
		}
	}

	public function detail($kode)
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('location:'. BASEURL . '/login');
			exit;
		}
		
		$data['judul'] = 'Detail Kriteria';

		$data['detailKriteria'] = $this->model('Admin_kriteria_model')->detailKriteria($kode);
	

		$this->view('templates/header', $data);
		$this->view('templates/admin_navbar');
		$this->view('admin_kriteria/detail', $data);
		$this->view('templates/footer');
	}

	public function edit($kode)
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}
		
		$data['judul'] = 'Edit Kriteria';

		$data['tampilKriteria'] = $this->model('Admin_kriteria_model')->detailKriteria($kode);

		$this->view('templates/header', $data);
		$this->view('templates/admin_navbar');
		$this->view('admin_kriteria/edit', $data);
		$this->view('templates/footer');
	}

	public function editKriteria($kode)
	{
		$idLogin = $_SESSION['idAdmin']; 

		if($this->model('Admin_kriteria_model')->editDataKriteria($kode,$idLogin) > 0){
			Flasher::buatFlash('Berhasil','mengubah.','success');
			header('location:'. BASEURL . '/Admin_kriteria');
			exit;
		} else{
			Flasher::buatFlash('Gagal','mengubah.','danger');
			header('location:'. BASEURL . '/Admin_kriteria');
			exit;
		}
	}

	public function hapusKriteria($kode)
	{
		$idLogin = $_SESSION['idAdmin'];

		if($this->model('Admin_kriteria_model')->hapusDataKriteria($kode,$idLogin) > 0){
			Flasher::buatFlash('Berhasil','menghapus kriteria.','success');
			header('location:'. BASEURL . '/Admin_kriteria');
			exit;
		} else{
			Flasher::buatFlash('Gagal','menghapus kriteria.','danger');
			header('location:'. BASEURL . '/Admin_kriteria');
			exit;
		}
	}

}