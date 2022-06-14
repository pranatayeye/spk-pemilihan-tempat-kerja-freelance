<?php

class Mhs_alternatif extends Controller {
	public function index($halamanAktif ='1'){

		if (!isset($_SESSION['nim'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}

		$nimLogin = $_SESSION['nim'];
		
		$data['judul'] = 'Alternatif';
		
		$data['kdAlternatif'] = $this->model('Mhs_alternatif_model')->kdAlternatif($nimLogin);
		$data['idAlternatif'] = $this->model('Mhs_alternatif_model')->idAlternatif();

		$data['cari'] = $this->model('Mhs_alternatif_model')->cari();
		$data['tampilAlternatif'] = $this->model('Mhs_alternatif_model')->tampilAlternatif($halamanAktif, $nimLogin);
		$data['awalData'] = $this->model('Mhs_alternatif_model')->awalData($halamanAktif, $nimLogin);
		$data['jmlHal'] = $this->model('Mhs_alternatif_model')->jmlHal($halamanAktif, $nimLogin);

		$data['pilKriteria'] = $this->model('Mhs_alternatif_model')->pilKriteria();
		$data['pilBobot'] = $this->model('Mhs_alternatif_model')->pilBobot();

		$this->view('templates/header', $data);
		$this->view('templates/mhs_navbar');
		$this->view('mhs_alternatif/index',$data);
		$this->view('templates/footer');
	}

	public function tbhAlternatif()
	{
		$nimLogin = $_SESSION['nim'];

		if($this->model('Mhs_alternatif_model')->tbhDataAlternatif($_POST, $nimLogin) > 0){
			Flasher::buatFlash('Berhasil','menambahkan alternatif.','success');
			header('location:'. BASEURL . '/Mhs_alternatif');
			exit;
		} else{
			Flasher::buatFlash('Gagal','menambahkan alternatif.','danger');
			header('location:'. BASEURL . '/Mhs_alternatif');
			exit;
		}
	}


	public function detail($kode)
	{
		if (!isset($_SESSION['nim'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}
		
		$data['judul'] = 'Detail Alternatif';

		$nimLogin = $_SESSION['nim'];

		$data['pilBobot'] = $this->model('Mhs_alternatif_model')->pilBobot();
		$data['detailAlternatif'] = $this->model('Mhs_alternatif_model')->detailAlternatif($kode, $nimLogin);

		$this->view('templates/header', $data);
		$this->view('templates/mhs_navbar');
		$this->view('mhs_alternatif/detail', $data);
		$this->view('templates/footer');
	}

	public function edit($kode)
	{
		if (!isset($_SESSION['nim'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}
		
		$data['judul'] = 'Edit Alternatif';

		$nimLogin = $_SESSION['nim'];

		$data['tampilAlternatif'] = $this->model('Mhs_alternatif_model')->detailAlternatif($kode, $nimLogin);
		$data['pilKriteria'] = $this->model('Mhs_alternatif_model')->pilKriteria();
		$data['pilBobot'] = $this->model('Mhs_alternatif_model')->pilBobot();
		$data['kriteriaBaru'] = $this->model('Mhs_alternatif_model')->kriteriaBaru($kode, $nimLogin);

		$this->view('templates/header', $data);
		$this->view('templates/mhs_navbar');
		$this->view('mhs_alternatif/edit', $data);
		$this->view('templates/footer');
	}

	public function editAlternatif($kode)
	{
		$nimLogin = $_SESSION['nim']; 

		if($this->model('Mhs_alternatif_model')->editDataAlternatif($kode, $nimLogin) > 0){
			Flasher::buatFlash('Berhasil','mengubah.','success');
			header('location:'. BASEURL . '/Mhs_alternatif');
			exit;
		} else{
			Flasher::buatFlash('Gagal','mengubah.','danger');
			header('location:'. BASEURL . '/Mhs_alternatif');
			exit;
		}

	}

	public function hapusAlternatif($kode)
	{
		$nimLogin = $_SESSION['nim'];

		if($this->model('Mhs_alternatif_model')->hapusDataAlternatif($kode, $nimLogin) > 0){
			Flasher::buatFlash('Berhasil','menghapus alternatif.','success');
			header('location:'. BASEURL . '/Mhs_alternatif');
			exit;
		} else{
			Flasher::buatFlash('Gagal','menghapus alternatif.','danger');
			header('location:'. BASEURL . '/Mhs_alternatif');
			exit;
		}
	}
}