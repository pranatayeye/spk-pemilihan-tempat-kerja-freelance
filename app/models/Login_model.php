<?php 

class Login_model{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function daftarDataMhs($data)
	{
		$namaMhs = htmlspecialchars(ucwords(stripslashes($data['nama'])));
		$nim = htmlspecialchars(stripslashes($data['nim2']));
		$password = htmlspecialchars($data['password2']);
		$rePassword = htmlspecialchars($data['rePassword']);

		// cek nim
		if ((strlen($nim) < 9) || (strlen($nim) > 9)) {
			Flasher::buatFlash('NIM harus 9 angka','harap coba lagi.','danger');
			header('location:'. BASEURL . '/Login');
			exit;
			return false;
		}

		$result = $this->db->ambilRow("SELECT * FROM tb_mhs WHERE nim = '$nim'");

		if($result == true){
			Flasher::buatFlash('NIM sudah terdaftar','harap coba lagi.','danger');
			header('location:'. BASEURL . '/Login');
			exit;
			return false;
		}

		// cek pass
		if($password !== $rePassword){
			Flasher::buatFlash('Password tidak sama','harap coba lagi.','danger');
			header('location:'. BASEURL . '/Login');
			exit;
			return false;
		}

		// enkripsi pass
		$password = password_hash($password, PASSWORD_DEFAULT);

		// masuk db
		$daftar = $this->db->query("INSERT INTO tb_mhs VALUES ('$nim','$namaMhs','$password')");
		
		if ($daftar == true){
			$nama = explode(" ", $namaMhs);
			$log = $this->db->query("INSERT INTO tb_log VALUES (NULL,NOW(),'$nim $nama[0] telah mendaftar')");
			return 1;
		}else{
			return 0;
		}
	}

	public function loginDataMhs($data)
	{
		$nim = $data['nim'];
		$password = $data['password'];

		// cari data
		$result = $this->db->ambilRow("SELECT * FROM tb_mhs WHERE nim = '$nim'");

		// // cek data
		if($result == true){
			$result = $result[0]['password_mhs'];
			if(password_verify($password, $result)){
				$_SESSION['nim'] = $nim;
				return 1;
			} else{
				return 0;
			}
		} else{
			Flasher::buatFlash('Akun belum terdaftar','harap daftar terlebih dahulu.','danger');
			header('location:'. BASEURL . '/Login');
			exit;
			return false;
		}

	}

	public function loginDataAdmin($data)
	{
		$idAdmin = $data['idAdmin'];
		$password = $data['passAdmin'];

		// cari data
		$result = $this->db->ambilRow("SELECT * FROM tb_admin WHERE id_admin = '$idAdmin'");
		
		// // cek data
		if($result == true){
			$result = $result[0]['password_admin'];
			if(password_verify($password, $result)){
				$_SESSION['idAdmin'] = $idAdmin;
				return 1;
			} else{
				return 0;
			}
		} else{
			Flasher::buatFlash('Login gagal','Anda bukan Admin.','danger');
			header('location:'. BASEURL . '/Login');
			exit;
			return false;
		}
	}

}