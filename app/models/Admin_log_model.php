<?php

class Admin_log_model{
	private $db;
	private $jmlDataPerHal = 5;
	private $jmlLink = 2;

	public function __construct()
	{
		$this->db = new Database;
	}

	// mengambil jumlah halaman cari
	public function jmlHal($halamanAktif)
	{
		$cariLog = $this->cari();
		
		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("SELECT * FROM tb_log WHERE 
			cap_waktu LIKE '%$cariLog%' OR
			keterangan LIKE '%$cariLog%'
		");

		$jmlHal = ceil($jmlData / $jmlDataPerHal);

		$jmlLink = $this->jmlLink;

		if($halamanAktif > $jmlLink){
			$mulai = $halamanAktif - $jmlLink;
		}else{
			$mulai = 1;
		}

		if ($halamanAktif < ($jmlHal - $jmlLink)) {
			$akhir = $halamanAktif + $jmlLink;
		}else{
			$akhir = $jmlHal;
		}

		return array($mulai,$akhir,$jmlData,$jmlHal);
	} 

	// mengambil data awal indeks
	public function awalData($halamanAktif)
	{
		$cariLog = $this->cari();

		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("SELECT * FROM tb_log WHERE 
			cap_waktu LIKE '%$cariLog%' OR
			keterangan LIKE '%$cariLog%'
		");

		$jmlHal = ceil($jmlData / $jmlDataPerHal) ; 

		$awalData = ($jmlDataPerHal * $halamanAktif) - $jmlDataPerHal;

		return $awalData;
	}

	// mengambil data
	public function cari()
	{
		if (isset($_POST['button'])) {
			$cari = $_POST['cari'];
			$_SESSION['cariLog'] = $cari;
			return $_SESSION['cariLog'];
		}else{
			if (empty($_SESSION['cariLog'])) {
				$cari = "";
				return $cari;
			}else{
				$cari = $_SESSION['cariLog'];
				return $cari;
			}
			
		}
	}

	// mencari log
	public function tampilLog($halamanAktif)
	{
		$cariLog = $this->cari();
		
		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("SELECT * FROM tb_log WHERE 
			cap_waktu LIKE '%$cariLog%' OR
			keterangan LIKE '%$cariLog%'
		");

		$jmlHal = ceil($jmlData / $jmlDataPerHal) ; 

		$awalData = ($jmlDataPerHal * $halamanAktif) - $jmlDataPerHal;


		$log = $this->db->ambilRow("SELECT * FROM tb_log WHERE 
			cap_waktu LIKE '%$cariLog%' OR
			keterangan LIKE '%$cariLog%'
			ORDER BY cap_waktu DESC
			LIMIT $awalData,$jmlDataPerHal");

		return $log;

	}

}