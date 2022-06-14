<?php 

class Mhs_alternatif_model{
	private $db;
	private $jmlDataPerHal = 5;
	private $jmlLink = 2;

	public function __construct()
	{
		$this->db = new Database;
	}

	// mengambil kode alternatif selanjutnya
	public function kdAlternatif($nim)
	{
		$lenght = 2;
		for ($i=1; $i < $lenght; $i++) { 
		 	$result = $this->db->jmlRow("SELECT * FROM  tb_alternatif where kode_alternatif = 'A$i' AND nim = '$nim'");
			if($result == 1){
				$lenght++;
			}else{
				$this->kd = "A$i";
				return $this->kd;
			}
		} 
	}

	// mengambil id alternatif selanjutnya
	public function idAlternatif()
	{
		$cek = $this->db->jmlRow("SELECT id_alternatif FROM tb_alternatif");

		if (empty($cek)) {
			$hasil = 1;
		}elseif($cek == 1){
			$idAlternatif = $this->db->ambilRow("SELECT id_alternatif FROM tb_alternatif")[0]['id_alternatif'];
			$hasil = $idAlternatif + 1;
		}elseif($cek > 1){
			$idAlternatif = $this->db->ambilRow("SELECT MAX(id_alternatif) as id_alternatif FROM tb_alternatif")[0]['id_alternatif'];
			$hasil = $idAlternatif + 1;
		}

		return $hasil;
	}

	// mengambil pilihan kriteria
	public function pilKriteria()
	{
		$kriteria = $this->db->ambilRow("SELECT * FROM tb_kriteria");

			return $kriteria;
	}

	// mengambil pilihan nilai bobot
	public function pilBobot()
	{
		$bobot = $this->db->ambilRow("SELECT * FROM tb_bobot");

		return $bobot;
	}

	public function tbhDataAlternatif($data, $nim)
	{
		$pilKriteria = $this->pilKriteria();
		$kdAlternatif = $this->kdAlternatif($nim);
		$alternatif = htmlspecialchars(ucwords(stripslashes($data['alternatif'])));

		$idAlternatif = $this->idAlternatif();
		
		// cek alternatif
		$result = $this->db->ambilRow("SELECT * FROM tb_alternatif WHERE nama_alternatif = '$alternatif' AND nim ='$nim'");

		if($result == true){
			Flasher::buatFlash('Alternatif sudah tercatat','harap gunakan Alternatif lain.','danger');
			header('location:'. BASEURL . '/Mhs_alternatif');
			exit;
			return false;
		}

		// masuk db1
		$tbhAlternatif = $this->db->query("INSERT INTO tb_alternatif VALUES ('$idAlternatif','$kdAlternatif','$alternatif',0,'$nim')");

		// masuk db2
		$i = 0;
		foreach ($data['kriteria'] as $bobot) {
			$kode = $pilKriteria[$i]['kode_kriteria'];

			$tbhRating = $this->db->query("INSERT INTO tb_rating VALUES (NULL,'$idAlternatif','$bobot','$kode')");

			$i++;
		}


		if (($tbhAlternatif == true) || ($tbhRating == true)){
			return 1;
		}else{
			return 0;
		}
	}

	// mengambil jumlah halaman
	public function jmlHal($halamanAktif, $nim)
	{
		$cariAlternatif = $this->cari();
		
		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("
			SELECT * FROM tb_alternatif WHERE 
			nim = '$nim' AND
			(kode_alternatif LIKE '%$cariAlternatif%' OR
			 nama_alternatif LIKE '%$cariAlternatif%') 
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
	public function awalData($halamanAktif, $nim)
	{
		$cariAlternatif = $this->cari();
		
		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("
			SELECT * FROM tb_alternatif WHERE 
			nim = '$nim' AND
			(kode_alternatif LIKE '%$cariAlternatif%' OR
			 nama_alternatif LIKE '%$cariAlternatif%') 
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
			$_SESSION['cariAlternatif'] = $cari;
			return $_SESSION['cariAlternatif'];
		}else{
			if (empty($_SESSION['cariAlternatif'])) {
				$cari = "";
				return $cari;
			}else{
				$cari = $_SESSION['cariAlternatif'];
				return $cari;
			}
			
		}
	}

	// mencari alternatif
	public function tampilAlternatif($halamanAktif,$nim)
	{
		$cariAlternatif = $this->cari();
		
		$jmlDataPerHal = $this->jmlDataPerHal;
		$jmlData = $this->db->jmlRow("
			SELECT * FROM tb_alternatif WHERE 
			nim = '$nim' AND
			(kode_alternatif LIKE '%$cariAlternatif%' OR
			 nama_alternatif LIKE '%$cariAlternatif%') 
		");

		$jmlHal = ceil($jmlData / $jmlDataPerHal) ; 

		$awalData = ($jmlDataPerHal * $halamanAktif) - $jmlDataPerHal;


		$alternatif = $this->db->ambilRow("
			SELECT * FROM tb_alternatif WHERE 
			nim = '$nim' AND
			(kode_alternatif LIKE '%$cariAlternatif%' OR
			nama_alternatif LIKE '%$cariAlternatif%')
			ORDER BY kode_alternatif ASC
			LIMIT $awalData,$jmlDataPerHal");

		return $alternatif;

	}

	// melihat detail kriteria
	public function detailAlternatif($kode, $nim)
	{
		$_SESSION['kodeAlternatif'] = $kode;
		
		$alternatif = $this->db->ambilRow("
			SELECT  
			tb_kriteria.kode_kriteria,
			tb_kriteria.nama_kriteria,
			tb_kriteria.pernyataan,
			tb_alternatif.kode_alternatif, 
			tb_alternatif.nama_alternatif,
			tb_rating.id_rating, 
			tb_bobot.keterangan, 
			tb_bobot.bobot 
			FROM tb_rating 
			JOIN tb_kriteria 
			ON tb_kriteria.kode_kriteria = tb_rating.kode_kriteria
			JOIN tb_bobot 
			ON tb_bobot.id_bobot = tb_rating.id_bobot 
			JOIN tb_alternatif 
			ON tb_alternatif.id_alternatif = tb_rating.id_alternatif 
			WHERE tb_alternatif.kode_alternatif = '$kode' AND tb_alternatif.nim = '$nim'
			ORDER BY tb_rating.id_rating ASC
		");

		return $alternatif;
	}

	// kriteria baru
	public function kriteriaBaru($kode, $nim)
	{	
		// ambil data1
		$kriteria1 = $this->detailAlternatif($kode, $nim);

		if (!empty($kriteria1)) {
			foreach ($kriteria1 as $kriteria) {
				$kr1[] = $kriteria['kode_kriteria'];
			}

			// ambil data2
			$kriteria2 = $this->pilKriteria();

			foreach ($kriteria2 as $kriteria) {
				$kr2[] = $kriteria['kode_kriteria'];
			}

			// cari kriteria yang tidak sama
			$kr3 = array_diff($kr2, $kr1);

			if (!empty($kr3)) {
				// buat array matriks
				foreach ($kr3 as $kod) { 
					$kriteriaBaru[] = $this->db->ambilRow("SELECT * FROM tb_kriteria WHERE kode_kriteria = '$kod'");
				}

				return $kriteriaBaru;
			}
		}
	
	}


	// mengedit alternatif
	public function editDataAlternatif($cek, $nim)
	{
		$kdAlternatif = htmlspecialchars(ucwords(stripslashes($_POST['kdAlternatif'])));

		$alternatif = htmlspecialchars(ucwords(stripslashes($_POST['alternatif'])));
		
		// cek alternatif
		if ($kdAlternatif !== $cek) {
			$result = $this->db->ambilRow("SELECT * FROM tb_alternatif WHERE nama_alternatif = '$alternatif' AND nim = '$nim'");

			if($result == true){
				Flasher::buatFlash('Alternatif sudah tercatat','harap gunakan Alternatif lain.','danger');
				header('location:'. BASEURL . '/Mhs_alternatif');
				exit;
				return false;
			}
		}

		// masuk db1
		$editAlternatif = $this->db->query("
			UPDATE tb_alternatif SET 
			nama_alternatif = '$alternatif'
			WHERE kode_alternatif = '$kdAlternatif' AND nim = '$nim'
		");

		// masuk db2
		$i = 0; $j = 0;
		foreach ($_POST['kriteria'] as $bobot) {
			$idRating = $_POST['idRating'][$i];
			$kode = $_POST['kdKriteria'][$j];

			if ($idRating == 'null') {
				// ambil id alternatif
				$ambilId = $this->db->ambilRow("SELECT * FROM tb_alternatif WHERE kode_alternatif = '$kdAlternatif' AND nim = '$nim'");

				foreach ($ambilId as $id) {
					$idAlternatif = $id['id_alternatif'];
				}

				// masuk db
				$tbhRating = $this->db->query("INSERT INTO tb_rating VALUES (NULL,'$idAlternatif','$bobot','$kode')");

			}else{
				$editRating = $this->db->query("
				UPDATE tb_rating SET 
				id_bobot = '$bobot'
				WHERE id_rating = '$idRating' 
				");
			}

			$i++; $j++;
		}

		if (($editAlternatif == true) || ($editRating == true)){
			return 1;
		}else{
			return 0;
		}

		
	}

	// mengapus alternatif
	public function hapusDataAlternatif($kode, $nim)
	{
		$hps = $this->db->query("DELETE FROM tb_alternatif WHERE kode_alternatif = '$kode' AND nim = '$nim'");
		
		if ($hps == true){
			// cek jml alternatif pilihan
			$alternatif = $this->db->jmlRow("SELECT * FROM tb_alternatif WHERE status = '1' AND nim = '$nim'");

			if ($alternatif < 3) {
				// reset alternatif
				$reset = $this->db->query("
					UPDATE tb_alternatif SET 
					status = '0'
					WHERE nim = '$nim'
					");
					}
			
			return 1;
		}else{
			return 0;
		}
	}

}