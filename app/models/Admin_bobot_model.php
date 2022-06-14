<?php

class Admin_bobot_model{
	private $db;
	private $jmlDataPerHal = 5;
	private $jmlLink = 2;

	public function __construct()
	{
		$this->db = new Database;
	}

	// menambah data bobot
	public function tbhDataBobot($data,$idLogin)
	{
		$keterangan = htmlspecialchars(ucwords(stripslashes($data['keterangan'])));
		$bobot = $data['bobot'];
	
		// cek keterangan
		$result = $this->db->ambilRow("SELECT * FROM tb_bobot WHERE keterangan = '$keterangan'");

		if($result == true){
			Flasher::buatFlash('keterangan sudah tercatat','harap gunakan keterangan lain.','danger');
			header('location:'. BASEURL . '/Admin_bobot');
			exit;
			return false;
		}

		// masuk db
		$tbh = $this->db->query("INSERT INTO tb_bobot VALUES (NULL,'$keterangan','$bobot')");
		
		if ($tbh == true){
			$log = $this->db->query("INSERT INTO tb_log VALUES (NULL,NOW(),'$idLogin menambah nilai bobot')");
			return 1;
		}else{
			return 0;
		}
	}

	// mengambil jumlah halaman
	public function jmlHal($halamanAktif)
	{
		$cariBobot = $this->cari();
		
		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("SELECT * FROM tb_bobot WHERE 
			keterangan LIKE '%$cariBobot%' OR
			bobot LIKE '%$cariBobot%'
			ORDER BY bobot DESC
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
		$cariBobot = $this->cari();
		
		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("SELECT * FROM tb_bobot WHERE 
			keterangan LIKE '%$cariBobot%' OR
			bobot LIKE '%$cariBobot%'
			ORDER BY bobot DESC
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
			$_SESSION['cariBobot'] = $cari;
			return $_SESSION['cariBobot'];
		}else{
			if (empty($_SESSION['cariBobot'])) {
				$cari = "";
				return $cari;
			}else{
				$cari = $_SESSION['cariBobot'];
				return $cari;
			}
			
		}
	}

	// mencari kriteria
	public function tampilBobot($halamanAktif)
	{
		$cariBobot = $this->cari();
		
		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("SELECT * FROM tb_bobot WHERE 
			keterangan LIKE '%$cariBobot%' OR
			bobot LIKE '%$cariBobot%'
			ORDER BY bobot DESC
		");

		$jmlHal = ceil($jmlData / $jmlDataPerHal) ; 

		$awalData = ($jmlDataPerHal * $halamanAktif) - $jmlDataPerHal;


		$bobot = $this->db->ambilRow("SELECT * FROM tb_bobot WHERE 
			keterangan LIKE '%$cariBobot%' OR
			bobot LIKE '%$cariBobot%'
			ORDER BY bobot DESC
			LIMIT $awalData,$jmlDataPerHal");

		return $bobot;

	}

	// melihat detail bobot
	public function detailBobot($id)
	{
		// ambil session buat cek parameter link aktif
		$_SESSION['bobot'] = $id;

		$bobot = $this->db->ambilRow("SELECT * FROM tb_bobot WHERE id_bobot= '$id'");

		return $bobot;
	}


	// mengedit bobot
	public function editDataBobot($cek,$idLogin)
	{
		$keterangan = htmlspecialchars(ucwords(stripslashes($_POST['keterangan'])));
		$bobot = $_POST['bobot'];

		// ambil keterangan lama
		$result = $this->db->ambilRow("SELECT keterangan FROM tb_bobot WHERE id_bobot = '$cek'")[0]['keterangan'];

		// cek keterangan baru
		if ($keterangan !== $result) {
			$result2 = $this->db->ambilRow("SELECT * FROM tb_bobot WHERE keterangan = '$keterangan'");

			if ($result2 == true) {
				Flasher::buatFlash('Keterangan sudah tercatat','harap coba lagi.','danger');
				header('location:'. BASEURL . '/Admin_bobot');
				exit;
				return false;
				
			}
		}

		// masuk db
		$editBobot = $this->db->query("
			UPDATE tb_bobot SET 
			keterangan = '$keterangan',
			bobot = '$bobot'
			WHERE id_bobot = '$cek' 
		");
		
		if ($editBobot == true){
			$log = $this->db->query("INSERT INTO tb_log VALUES (NULL,NOW(),'$idLogin mengedit nilai Bobot')");
			return 1;
		}else{
			return 0;
		}
	}

	// mengapus bobot
	public function hapusDataBobot($id,$idLogin)
	{
		$hps = $this->db->query("DELETE FROM tb_bobot WHERE id_bobot = '$id'");
		
		if ($hps == true){
			// reset alternatif
			$reset = $this->db->query("DELETE FROM tb_alternatif");
				
			$log = $this->db->query("INSERT INTO tb_log VALUES (NULL,NOW(),'$idLogin menghapus nilai bobot')");
			return 1;
		}else{
			return 0;
		}
	}

}