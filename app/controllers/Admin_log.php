<?php

class Admin_log extends Controller{
	
	public function index($halamanAktif ='1')
	{
		if (!isset($_SESSION['idAdmin'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}
		
		$data['judul'] = 'Log Aktivitas';

		$data['cari'] = $this->model('Admin_log_model')->cari();
		$data['tampilLog'] = $this->model('Admin_log_model')->tampilLog($halamanAktif);
		$data['awalData'] = $this->model('Admin_log_model')->awalData($halamanAktif);
		$data['jmlHal'] = $this->model('Admin_log_model')->jmlHal($halamanAktif);
		
		$this->view('templates/header', $data);
		$this->view('templates/admin_navbar');
		$this->view('admin_log/index', $data);
		$this->view('templates/footer');
	}


}