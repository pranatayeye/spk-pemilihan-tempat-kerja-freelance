<?php

class Admin_mhs_model{
	private $db;
	private $jmlDataPerHal = 5;
	private $jmlLink = 2;

	public function __construct()
	{
		$this->db = new Database;
	}

	// mengambil jumlah halaman
	public function jmlHal($halamanAktif)
	{
		$cariMhs = $this->cari();
		
		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("SELECT * FROM tb_mhs WHERE 
			nim LIKE '%$cariMhs%' OR
			nama_mhs LIKE '%$cariMhs%'
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
		$cariMhs = $this->cari();
		
		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("SELECT * FROM tb_mhs WHERE 
			nim LIKE '%$cariMhs%' OR
			nama_mhs LIKE '%$cariMhs%'
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
			$_SESSION['cariMhs'] = $cari;
			return $_SESSION['cariMhs'];
		}else{
			if (empty($_SESSION['cariMhs'])) {
				$cari = "";
				return $cari;
			}else{
				$cari = $_SESSION['cariMhs'];
				return $cari;
			}
			
		}
	}

	public function tbhDataMhs($data,$idLogin)
	{
		$namaMhs = htmlspecialchars(ucwords(stripslashes($data['nama'])));
		$nim = htmlspecialchars(stripslashes($data['nim2']));
		$password = htmlspecialchars($data['password2']);
		$rePassword = htmlspecialchars($data['rePassword']);

		// cek nim
		if ((strlen($nim) < 9) || (strlen($nim) > 9)) {
			Flasher::buatFlash('NIM harus 9 angka','harap coba lagi.','danger');
			header('location:'. BASEURL . '/Admin_mhs');
			exit;
			return false;
		}

		$result = $this->db->ambilRow("SELECT * FROM tb_mhs WHERE nim = '$nim'");

		if($result == true){
			Flasher::buatFlash('NIM sudah terdaftar','harap coba lagi.','danger');
			header('location:'. BASEURL . '/Admin_mhs');
			exit;
			return false;
		}

		// cek pass
		if($password !== $rePassword){
			Flasher::buatFlash('Password tidak sama','harap coba lagi.','danger');
			header('location:'. BASEURL . '/Admin_mhs');
			exit;
			return false;
		}

		// enkripsi pass
		$password = password_hash($password, PASSWORD_DEFAULT);

		// masuk db
		$daftar = $this->db->query("INSERT INTO tb_mhs VALUES ('$nim','$namaMhs','$password')");

		if($daftar == true){
			$nama = explode(" ", $namaMhs);
			$log = $this->db->query("INSERT INTO tb_log VALUES (NULL,NOW(),'$idLogin menambah mahasiswa $nim $nama[0]')");
			return 1;
		}else{
			return 0;
		}
	}

	// mencari mahasiswa
	public function tampilMhs($halamanAktif)
	{
		$cariMhs = $this->cari();
		
		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("SELECT * FROM tb_mhs WHERE 
			nim LIKE '%$cariMhs%' OR
			nama_mhs LIKE '%$cariMhs%'
		");

		$jmlHal = ceil($jmlData / $jmlDataPerHal) ; 

		$awalData = ($jmlDataPerHal * $halamanAktif) - $jmlDataPerHal;


		$mhs = $this->db->ambilRow("SELECT * FROM tb_mhs WHERE 
			nim LIKE '%$cariMhs%' OR
			nama_mhs LIKE '%$cariMhs%'
			LIMIT $awalData,$jmlDataPerHal");

		return $mhs;

	}

	// melihat detail mahasiswa
	public function detailMhs($nim)
	{
		$_SESSION['nimMhs'] = $nim;

		$mhs = $this->db->ambilRow("SELECT * FROM tb_mhs WHERE nim = '$nim'");
		
		return $mhs;
	}


	// mengedit mahasiswa
	public function editDataMhs($cek,$idLogin)
	{
		$namaMhs = htmlspecialchars(ucwords(stripslashes($_POST['nama'])));
		$nim = htmlspecialchars(stripslashes($_POST['nim2']));
		$password = htmlspecialchars($_POST['password2']);
		$rePassword = htmlspecialchars($_POST['rePassword']);

		if (!empty($password)) {
			// cek pass
			if($password !== $rePassword){
				Flasher::buatFlash('Password tidak sama','harap coba lagi.','danger');
				header('location:'. BASEURL . '/Admin_mhs');
				exit;
				return false;
			}

			// enkripsi pass
			$password = password_hash($password, PASSWORD_DEFAULT);

			// masuk db
			$editMhs = $this->db->query("
				UPDATE tb_mhs SET 
				nama_mhs = '$namaMhs',
				password_mhs = '$password'
				WHERE nim = '$cek' 
			");
		}else{
			// masuk db
			$editMhs = $this->db->query("
				UPDATE tb_mhs SET 
				nama_mhs = '$namaMhs'
				WHERE nim = '$cek' 
			");
		}

		if ($editMhs == true){
			$nama = explode(" ", $namaMhs);
			$log = $this->db->query("INSERT INTO tb_log VALUES (NULL,NOW(),'$idLogin mengedit mahasiswa $nim $nama[0]')");
			return 1;
		}else{
			return 0;
		}
	}

	// mengapus mahasiswa
	public function hapusDataMhs($nim,$idLogin)
	{
		$mhs = $this->db->query("DELETE FROM tb_mhs WHERE nim = '$nim'");
		
		if ($mhs == true){
			$log = $this->db->query("INSERT INTO tb_log VALUES (NULL,NOW(),'$idLogin menghapus mahasiswa $nim')");
			return 1;
		}else{
			return 0;
		}
	}

}