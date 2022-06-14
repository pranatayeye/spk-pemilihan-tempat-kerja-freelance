<?php

class Contact_us extends Controller{
	
	public function index()
	{
		if (!isset($_SESSION['nim'])) {
			header('location:'. BASEURL . '/Login');
			exit;
		}
		
		$data['judul'] = 'Contact Us';

		$this->view('templates/header', $data);
		$this->view('templates/mhs_navbar');
		$this->view('contact_us/index', $data);
		$this->view('templates/footer');
	}

}