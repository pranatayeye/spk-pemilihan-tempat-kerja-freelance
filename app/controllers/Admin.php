<?php

class Admin extends Controller{
	
	public function index($halamanAktif ='1')
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}

		$data['judul'] = 'Admin';
		
		$data['idAdmin'] = $this->model('Admin_model')->idAdmin();
		$data['defaultPass'] = '12345';

		$data['cari'] = $this->model('Admin_model')->cari();
		$data['tampilAdmin'] = $this->model('Admin_model')->tampilAdmin($halamanAktif);
		$data['awalData'] = $this->model('Admin_model')->awalData($halamanAktif);
		$data['jmlHal'] = $this->model('Admin_model')->jmlHal($halamanAktif);

		$this->view('templates/header', $data);
		$this->view('templates/admin_navbar');
		$this->view('admin/index', $data);
		$this->view('templates/footer');
	}

	public function tbhAdmin()
	{
		$idLogin = $_SESSION['idAdmin'];

		if($this->model('Admin_model')->tbhDataAdmin($_POST,$idLogin) > 0){
			Flasher::buatFlash('Berhasil','menambahkan admin.','success');
			header('location:'. BASEURL . '/Admin');
			exit;
		} else{
			Flasher::buatFlash('Gagal','menambahkan admin.','danger');
			header('location:'. BASEURL . '/Admin');
			exit;
		}
	}

	public function detail($id)
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}

		$data['judul'] = 'Detail Admin';

		$data['detailAdmin'] = $this->model('Admin_model')->detailAdmin($id);

		$this->view('templates/header', $data);
		$this->view('templates/admin_navbar');
		$this->view('admin/detail', $data);
		$this->view('templates/footer');
	}

	public function edit($id)
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}
		
		$data['judul'] = 'Edit Admin';

		$data['tampilAdmin'] = $this->model('Admin_model')->detailAdmin($id);

		$this->view('templates/header', $data);
		$this->view('templates/admin_navbar');
		$this->view('admin/edit', $data);
		$this->view('templates/footer');
	}

	public function editAdmin()
	{
		$idLogin = $_SESSION['idAdmin']; 

		if($this->model('Admin_model')->editDataAdmin($_POST,$idLogin) > 0){
			Flasher::buatFlash('Berhasil','mengubah.','success');
			header('location:'. BASEURL . '/Admin');
			exit;
		} else{
			Flasher::buatFlash('Gagal','mengubah.','danger');
			header('location:'. BASEURL . '/Admin');
			exit;
		}
	}

	public function hapusAdmin($id)
	{
		$idLogin = $_SESSION['idAdmin'];

		if($this->model('Admin_model')->hapusDataAdmin($id,$idLogin) > 0){
			Flasher::buatFlash('Berhasil','menghapus admin.','success');
			header('location:'. BASEURL . '/Admin');
			exit;
		} else{
			Flasher::buatFlash('Gagal','menghapus admin.','danger');
			header('location:'. BASEURL . '/Admin');
			exit;
		}
	}

	
}