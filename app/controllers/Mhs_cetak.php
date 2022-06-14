<?php

class Mhs_cetak extends Controller {
	public function index(){

		if (!isset($_SESSION['nim'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}
		
		$data['judul'] = 'Cetak Hasil Pemilihan';

		$nimLogin = $_SESSION['nim'];
		
		$data['nim'] = $nimLogin;
		$data['namaMhs'] = $this->model('Mhs_home_model')->namaMhs($nimLogin);

		$data['tampilAlternatifPil'] = $this->model('Mhs_hasil_model')->tampilAlternatifPil($nimLogin);
		$data['hasilRangking'] = $this->model('Mhs_hasil_model')->hasilRangking($nimLogin);

		$data['tampilHasil'] = $this->model('Mhs_hasil_model')->tampilHasil($nimLogin);

		// echo "<pre>";
		// print_r($data['namaMhs'][0]['nama_mhs']);die;

		$this->view('templates/header', $data);
		$this->view('mhs_cetak/index',$data);
		$this->view('templates/footer');
	}


}