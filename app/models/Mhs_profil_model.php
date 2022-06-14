<?php

class Mhs_profil_model{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	// melihat mahasiswa
	public function tampilMhs($nim)
	{
		$mhs = $this->db->ambilRow("SELECT * FROM tb_mhs WHERE nim = '$nim'");

		return $mhs;
	}


	// mengedit mahasiswa
	public function editDataMhs($nim)
	{
		$namaMhs = htmlspecialchars(ucwords(stripslashes($_POST['nama'])));
		$password = htmlspecialchars($_POST['password2']);
		$rePassword = htmlspecialchars($_POST['rePassword']);

		if (!empty($password)) {
			// cek pass
			if($password !== $rePassword){
				Flasher::buatFlash('Password tidak sama','harap coba lagi.','danger');
				header('location:'. BASEURL . '/Mhs_profil/'.$nim);
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
				WHERE nim = '$nim' 
			");
		}else{
			// masuk db
			$editMhs = $this->db->query("
				UPDATE tb_mhs SET 
				nama_mhs = '$namaMhs'
				WHERE nim = '$nim' 
			");
		}

		if ($editMhs == true){
			return 1;
		}else{
			return 0;
		}
	}

	// mengapus mahasiswa
	public function hapusDataMhs($nim)
	{
		$mhs = $this->db->query("DELETE FROM tb_mhs WHERE nim = '$nim'");
		
		if ($mhs == true){
			$log = $this->db->query("INSERT INTO tb_log VALUES (NULL,NOW(),'$nim telah menghapus akun')");
			return 1;
		}else{
			return 0;
		}
	}

}