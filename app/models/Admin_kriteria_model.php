<?php

class Admin_kriteria_model{
	private $db;
	private $jmlDataPerHal = 5;
	private $jmlLink = 2;

	public function __construct()
	{
		$this->db = new Database;
	}

	// mengambil kode kriteria selanjutnya
	public function kdKriteria()
	{
		$lenght = 2;
		for ($i=1; $i < $lenght; $i++) { 
		 	$result = $this->db->jmlRow("SELECT * FROM  tb_kriteria where kode_kriteria = 'C$i'");
			if($result == 1){
				$lenght++;
			}else{
				$this->kd = "C$i";
				return $this->kd;
			}
		} 
	}

	// menambah data kriteria
	public function tbhDataKriteria($data,$idLogin)
	{
		$kdKriteria = $this->kdKriteria();

		$kriteria = htmlspecialchars(ucwords(stripslashes($data['kriteria'])));
		$bobotKriteria = $data['bobotKriteria'];
		$keterangan = $data['ket'];
		$pernyataan = htmlspecialchars(lcfirst(stripslashes($data['pernyataan'])));
		
		// cek kriteria
		$result = $this->db->ambilRow("SELECT * FROM tb_kriteria WHERE nama_kriteria = '$kriteria'");

		if($result == true){
			Flasher::buatFlash('Kriteria sudah tercatat','harap gunakan kriteria lain.','danger');
			header('location:'. BASEURL . '/Admin_kriteria');
			exit;
			return false;
		}

		// masuk db
		$tbh = $this->db->query("INSERT INTO tb_kriteria VALUES ('$kdKriteria','$kriteria','$bobotKriteria','$keterangan','$pernyataan')");
		
		if ($tbh == true){
			$log = $this->db->query("INSERT INTO tb_log VALUES (NULL,NOW(),'$idLogin menambah kriteria $kdKriteria $kriteria')");
			return 1;
		}else{
			return 0;
		}
	}

	// mengambil jumlah halaman
	public function jmlHal($halamanAktif)
	{
		$cariKriteria = $this->cari();
		
		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("SELECT * FROM tb_kriteria WHERE 
			kode_kriteria LIKE '%$cariKriteria%' OR
			nama_kriteria LIKE '%$cariKriteria%' OR
			bobot_kriteria LIKE '%$cariKriteria%' OR
			keterangan LIKE '%$cariKriteria%'
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
		$cariKriteria = $this->cari();
		
		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("SELECT * FROM tb_kriteria WHERE 
			kode_kriteria LIKE '%$cariKriteria%' OR
			nama_kriteria LIKE '%$cariKriteria%' OR
			bobot_kriteria LIKE '%$cariKriteria%' OR
			keterangan LIKE '%$cariKriteria%'
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
			$_SESSION['cariKriteria'] = $cari;
			return $_SESSION['cariKriteria'];
		}else{
			if (empty($_SESSION['cariKriteria'])) {
				$cari = "";
				return $cari;
			}else{
				$cari = $_SESSION['cariKriteria'];
				return $cari;
			}
			
		}
	}

	// mencari kriteria
	public function tampilKriteria($halamanAktif)
	{
		$cariKriteria = $this->cari();
		
		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("SELECT * FROM tb_kriteria WHERE 
			kode_kriteria LIKE '%$cariKriteria%' OR
			nama_kriteria LIKE '%$cariKriteria%' OR
			bobot_kriteria LIKE '%$cariKriteria%' OR
			keterangan LIKE '%$cariKriteria%'
		");

		$jmlHal = ceil($jmlData / $jmlDataPerHal) ; 

		$awalData = ($jmlDataPerHal * $halamanAktif) - $jmlDataPerHal;


		$kriteria = $this->db->ambilRow("SELECT * FROM tb_kriteria WHERE 
			kode_kriteria LIKE '%$cariKriteria%' OR
			nama_kriteria LIKE '%$cariKriteria%' OR
			bobot_kriteria LIKE '%$cariKriteria%' OR
			keterangan LIKE '%$cariKriteria%'
			LIMIT $awalData,$jmlDataPerHal");

		return $kriteria;

	}

	// melihat detail kriteria
	public function detailKriteria($kode)
	{
		$_SESSION['kode'] = $kode;

		$kriteria = $this->db->ambilRow("SELECT * FROM tb_kriteria WHERE kode_kriteria= '$kode'");

		return $kriteria;
	}


	// mengedit kriteria
	public function editDataKriteria($cek,$idLogin)
	{
		$kdKriteria = htmlspecialchars(ucwords(stripslashes($_POST['kdKriteria'])));

		$kriteria =htmlspecialchars(ucwords(stripslashes($_POST['kriteria'])));
		$bobotKriteria = $_POST['bobotKriteria'];
		$keterangan = $_POST['ket'];
		$pernyataan =htmlspecialchars(lcfirst(stripslashes($_POST['pernyataan'])));

		// cek kode
		if ($kdKriteria !== $cek) {
			$result = $this->db->ambilRow("SELECT * FROM tb_kriteria WHERE kode_kriteria = '$kdKriteria'");

			if($result == true){
				Flasher::buatFlash('Kode kriteria sudah terdaftar','harap coba lagi.','danger');
				header('location:'. BASEURL . '/Admin_kriteria');
				exit;
				return false;
			}
		}

		// masuk db
		$editKriteria = $this->db->query("
			UPDATE tb_kriteria SET 
			nama_kriteria = '$kriteria',
			bobot_kriteria = '$bobotKriteria',
			keterangan = '$keterangan',
			pernyataan = '$pernyataan' 
			WHERE kode_kriteria = '$kdKriteria' 
		");
		
		if ($editKriteria == true){
			$log = $this->db->query("INSERT INTO tb_log VALUES (NULL,NOW(),'$idLogin mengedit kriteria $kdKriteria $kriteria')");
			return 1;
		}else{
			return 0;
		}
	}

	// mengapus kriteria
	public function hapusDataKriteria($kode,$idLogin)
	{
		$hps = $this->db->query("DELETE FROM tb_kriteria WHERE kode_kriteria = '$kode'");
		
		if ($hps == true){
			$cek = $this->db->jmlRow("SELECT * FROM tb_kriteria");

			if ($cek == 0) {
				// reset alternatif
				$reset = $this->db->query("DELETE FROM tb_alternatif");
			}
			
			$log = $this->db->query("INSERT INTO tb_log VALUES (NULL,NOW(),'$idLogin menghapus kriteria $kode')");
			return 1;
		}else{
			return 0;
		}
	}

}