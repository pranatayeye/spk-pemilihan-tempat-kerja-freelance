<?php

class Admin_model{
	private $db;
	private $jmlDataPerHal = 5;
	private $jmlLink = 2;

	public function __construct()
	{
		$this->db = new Database;
	}

	// mengambil id admin selanjutnya
	public function idAdmin()
	{
		$lenght = 2;
		for ($i=1; $i < $lenght; $i++) { 
		 	$result = $this->db->jmlRow("SELECT * FROM  tb_admin where id_admin = '00$i'");
			if($result == 1){
				$lenght++;
			}else{
				$this->id = "00$i";
				return $this->id;
			}
		} 
	}

	// menambah data admin
	public function tbhDataAdmin($data,$idLogin)
	{
		$idAdmin = $this->idAdmin();
		
		$namaAdmin = htmlspecialchars(ucwords(stripslashes($data['namaAdmin'])));
		$password = htmlspecialchars($data['password']);
		$rePassword = htmlspecialchars($data['rePassword']);
		$telp = htmlspecialchars(stripslashes($data['telp']));
		$email = htmlspecialchars(stripslashes($data['email']));
		$alamat = htmlspecialchars(stripslashes($data['alamat']));

		// cek pass
		if($password !== $rePassword){
			Flasher::buatFlash('Password tidak sama','harap coba lagi.','danger');
			header('location:'. BASEURL . '/Admin');
			exit;
			return false;
		}

		// enkripsi pass
		$password = password_hash($password, PASSWORD_DEFAULT);

		// masuk db
		$tbh = $this->db->query("INSERT INTO tb_admin VALUES ('$idAdmin','$namaAdmin','$password','$telp','$email','$alamat')");
		
		if ($tbh == true){
			$nama = explode(" ", $namaAdmin);
			$log = $this->db->query("INSERT INTO tb_log VALUES (NULL,NOW(),'$idLogin menambah admin $idAdmin $nama[0]')");
			return 1;
		}else{
			return 0;
		}
	}

	// mengambil jumlah halaman
	public function jmlHal($halamanAktif)
	{
		$cariAdmin= $this->cari();
		
		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("SELECT * FROM tb_admin WHERE 
			id_admin LIKE '%$cariAdmin%' OR
			nama_admin LIKE '%$cariAdmin%' OR
			no_telp LIKE '%$cariAdmin%' OR
			email LIKE '%$cariAdmin%' OR
			alamat LIKE '%$cariAdmin%'
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
		$cariAdmin = $this->cari();

		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("SELECT * FROM tb_admin WHERE 
			id_admin LIKE '%$cariAdmin%' OR
			nama_admin LIKE '%$cariAdmin%' OR
			no_telp LIKE '%$cariAdmin%' OR
			email LIKE '%$cariAdmin%' OR
			alamat LIKE '%$cariAdmin%'
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
			$_SESSION['cariAdmin'] = $cari;
			return $_SESSION['cariAdmin'];
		}else{
			if (empty($_SESSION['cariAdmin'])) {
				$cari = "";
				return $cari;
			}else{
				$cari = $_SESSION['cariAdmin'];
				return $cari;
			}
			
		}
	}

	// mencari admin
	public function tampilAdmin($halamanAktif)
	{
		$cariAdmin = $this->cari();
		
		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("SELECT * FROM tb_admin WHERE 
			id_admin LIKE '%$cariAdmin%' OR
			nama_admin LIKE '%$cariAdmin%' OR
			no_telp LIKE '%$cariAdmin%' OR
			email LIKE '%$cariAdmin%' OR
			alamat LIKE '%$cariAdmin%'
		");

		$jmlHal = ceil($jmlData / $jmlDataPerHal) ; 

		$awalData = ($jmlDataPerHal * $halamanAktif) - $jmlDataPerHal;


		$admin = $this->db->ambilRow("SELECT * FROM tb_admin WHERE 
			id_admin LIKE '%$cariAdmin%' OR
			nama_admin LIKE '%$cariAdmin%' OR
			no_telp LIKE '%$cariAdmin%' OR
			email LIKE '%$cariAdmin%' OR
			alamat LIKE '%$cariAdmin%'
			LIMIT $awalData,$jmlDataPerHal");

		return $admin;

	}

	// melihat detail admin
	public function detailAdmin($id)
	{
		$_SESSION['id'] = $id;
		$admin = $this->db->ambilRow("SELECT * FROM tb_admin WHERE id_admin = '$id'");
		return $admin;
	}

	// mengedit admin
	public function editDataAdmin($data,$idLogin)
	{
		$idAdmin = $data['idAdmin'];

		$namaAdmin = htmlspecialchars(ucwords(stripslashes($data['namaAdmin'])));
		$password = htmlspecialchars($data['password']);
		$rePassword = htmlspecialchars($data['rePassword']);
		$telp = htmlspecialchars(stripslashes($data['telp']));
		$email = htmlspecialchars(stripslashes($data['email']));
		$alamat = htmlspecialchars(stripslashes($data['alamat']));

		if (!empty($password)) {
			// cek pass
			if($password !== $rePassword){
				Flasher::buatFlash('Password tidak sama','harap coba lagi.','danger');
				header('location:'. BASEURL . '/Admin');
				exit;
				return false;
			}

			// enkripsi pass
			$password = password_hash($password, PASSWORD_DEFAULT);

			// masuk db
			$editAdmin = $this->db->query("
				UPDATE tb_admin SET 
				nama_admin = '$namaAdmin',
				password_admin = '$password',
				no_telp = '$telp',
				email = '$email',
				alamat = '$alamat' 
				WHERE id_admin = '$idAdmin' 
			");
		}else{
			// masuk db
			$editAdmin = $this->db->query("
				UPDATE tb_admin SET 
				nama_admin = '$namaAdmin',
				no_telp = '$telp',
				email = '$email',
				alamat = '$alamat' 
				WHERE id_admin = '$idAdmin' 
			");
		}

		
		
		if ($editAdmin == true){
			$nama = explode(" ", $namaAdmin);
			$log = $this->db->query("INSERT INTO tb_log VALUES (NULL,NOW(),'$idLogin mengedit admin $idAdmin $nama[0]')");
			return 1;
		}else{
			return 0;
		}
	}

	// mengapus admin
	public function hapusDataAdmin($id,$idLogin)
	{
		$admin = $this->db->query("DELETE FROM tb_admin WHERE id_admin = '$id'");

		if ($id == $idLogin) {
			header('location:'. BASEURL . '/Login');
			exit;
		}
		
		if ($admin == true){
			$log = $this->db->query("INSERT INTO tb_log VALUES (NULL,NOW(),'$idLogin menghapus admin $id')");
			return 1;
		}else{
			return 0;
		}
	}

}