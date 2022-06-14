<?php

class Mhs_hasil extends Controller {
	public function index(){

		if (!isset($_SESSION['nim'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}
		
		$data['judul'] = 'Hasil Pemilihan';

		$nimLogin = $_SESSION['nim'];
		
		$data['tampilAlternatif'] = $this->model('Mhs_hasil_model')->tampilAlternatif($nimLogin);
		$data['tampilAlternatifPil'] = $this->model('Mhs_hasil_model')->tampilAlternatifPil($nimLogin);
		$data['pilKriteria'] = $this->model('Mhs_hasil_model')->ambilKriteria();
		$data['kriteriaBaru'] = $this->model('Mhs_hasil_model')->kriteriaBaru($data['pilKriteria'], $nimLogin);
		$data['rating'] = $this->model('Mhs_hasil_model')->rating($nimLogin);
		$data['normalisasi'] = $this->model('Mhs_hasil_model')->normalisasi($nimLogin);
		$data['hasilRangking'] = $this->model('Mhs_hasil_model')->hasilRangking($nimLogin);

		$data['tampilHasil'] = $this->model('Mhs_hasil_model')->tampilHasil($nimLogin);

		$this->view('templates/header', $data);
		$this->view('templates/mhs_navbar');
		$this->view('mhs_hasil/index',$data);
		$this->view('templates/footer');
	}

	public function pilihAlternatif()
	{
		$nimLogin = $_SESSION['nim'];

		if($this->model('Mhs_hasil_model')->pilihDataAlternatif($_POST, $nimLogin) > 0){
			header('location:'. BASEURL . '/Mhs_hasil');
			exit;
		} else{
			header('location:'. BASEURL . '/Mhs_hasil');
			exit;
		}
	}

}