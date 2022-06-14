<?php 

class Mhs_hasil_model{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function tampilAlternatif($nim)
	{
		$alternatif = $this->db->ambilRow("SELECT * FROM tb_alternatif WHERE nim = '$nim' ORDER BY kode_alternatif ASC");

		return $alternatif;
	}

	public function tampilAlternatifPil($nim)
	{
		$alternatif = $this->db->ambilRow("SELECT * FROM tb_alternatif WHERE status = '1' AND nim = '$nim' ORDER BY kode_alternatif ASC");

		return $alternatif;
	}

	// mengambil kriteria
	public function ambilKriteria()
	{
		$kriteria = $this->db->ambilRow("SELECT * FROM tb_kriteria");

		return $kriteria;
	}

	public function pilihDataAlternatif($data, $nim)
	{
		// cek 
		if(!empty($_POST['pilih'])){
			$cek = $_POST['pilih'];
		}else{
			$cek = [];
		}

		if(count($cek) < 3){
			Flasher::buatFlash('Pilihan alternatif kurang dari 3','harap tambah pilihan.','danger');
			header('location:'. BASEURL . '/Mhs_hasil');
			exit;
			return false;
		}

		// reset alternatif
		$reset = $this->db->query("
			UPDATE tb_alternatif SET 
			status = '0'
			WHERE nim = '$nim'
			");

		// masuk db
		foreach ($_POST['pilih'] as $pilih) {
			$pilihAlternatif = $this->db->query("
			UPDATE tb_alternatif SET 
			status = '1'
			WHERE kode_alternatif = '$pilih' AND nim = '$nim'
			");
		}

		if ($pilihAlternatif == true){
			return 1;
		}else{
			return 0;
		}

	}

	public function kriteriaBaru($fullKriteria , $nim)
	{
		if (!empty($fullKriteria)) {
			// ambil data 1
			$kriteria1 = $this->db->ambilRow("SELECT kode_kriteria FROM tb_rating GROUP BY kode_kriteria ORDER BY id_rating");

			foreach ($kriteria1 as $kriteria) {
				$kr1[] = $kriteria['kode_kriteria'];
			}

			// ambil data 2
			foreach ($fullKriteria as $kriteria) {
				$kr2[] = $kriteria['kode_kriteria'];
			}

			// cari kriteria yang tidak sama
			$kr3 = array_diff($kr2, $kr1);

			return array($kriteria1, $kr3);
		}
		
	}

	public function rating($nim)
	{
		// cek kode
		$cek = $this->db->ambilRow("SELECT kode_alternatif FROM tb_alternatif WHERE status = '1' AND nim = '$nim' ORDER BY kode_alternatif ASC");

		foreach ($cek as $cek1) {
			$cek2[] = $cek1['kode_alternatif'];
		}

		if (!empty($cek2)) {
			// buat array matriks
			for ($i=0; $i < count($cek2); $i++) { 
				$cek = $cek2[$i];

				$alternatif = $this->db->ambilRow("SELECT kode_alternatif FROM tb_alternatif WHERE status = '1' AND nim = '$nim' AND kode_alternatif = '$cek' ORDER BY kode_alternatif ASC");

				foreach ($alternatif as $alter) {
					$alt[] = $alter['kode_alternatif'];
				}

				$rating = $this->db->ambilRow("
					SELECT  
					tb_rating.id_rating,
					tb_bobot.bobot 
					FROM tb_rating 
					JOIN tb_bobot 
					ON tb_bobot.id_bobot = tb_rating.id_bobot 
					JOIN tb_alternatif 
					ON tb_alternatif.id_alternatif = tb_rating.id_alternatif 
		            JOIN tb_kriteria
		            ON tb_kriteria.kode_kriteria = tb_rating.kode_kriteria
					WHERE tb_alternatif.nim = '$nim' AND tb_alternatif.status = '1' AND tb_alternatif.kode_alternatif = '$cek'
					ORDER BY tb_rating.id_rating ASC
				");

				foreach ($rating as $rat) {
					$rt[] = $rat['bobot'];
				}	

				$merge[] = array_merge($alt,$rt);

				unset($alt,$rt);
			}
			return $merge;
		}
	
	}

	public function normalisasi($nim)
	{
		// data alternatif
		$alternatif = $this->rating($nim);

		if (!empty($alternatif)) {

			// data kriteria
			$ambilKriteria = $this->db->ambilRow("SELECT kode_kriteria FROM tb_rating GROUP BY kode_kriteria ORDER BY id_rating");

			foreach ($ambilKriteria as $krite) {
				$kriteria[] = $krite['kode_kriteria'];
			}

			$ambilKet = $this->db->ambilRow("
				SELECT  
					tb_rating.id_rating,
                    tb_kriteria.keterangan
					FROM tb_rating 
		            JOIN tb_kriteria
		            ON tb_kriteria.kode_kriteria = tb_rating.kode_kriteria
                    GROUP BY tb_kriteria.kode_kriteria
					ORDER BY tb_rating.id_rating ASC
			");

			foreach ($ambilKet as $ket) {
				$keterangan[] = $ket['keterangan'];
			}

			// r = normalisasi
			$r = [];

			// Hitung r
			$index_alternatif = 0;
			foreach ($alternatif as $alt) {
				$index_kriteria = 1;
				$i = 0;
				foreach ($kriteria as $kr) {
					if(($kr.$keterangan[$i]) == ($kr.'Cost')){
						if (empty($alternatif[$index_alternatif][$index_kriteria])) {
							$r[$index_alternatif][$index_kriteria] = null;
						}else{
						$r[$index_alternatif][$index_kriteria] = round(min(array_column($alternatif,$index_kriteria)) / $alternatif[$index_alternatif][$index_kriteria],2);
						}
					}elseif (($kr.$keterangan[$i]) == ($kr.'Benefit')) {
						if (empty($alternatif[$index_alternatif][$index_kriteria])) {
							$r[$index_alternatif][$index_kriteria] = null;
						}else{
						$r[$index_alternatif][$index_kriteria] = round($alternatif[$index_alternatif][$index_kriteria]/max(array_column($alternatif,$index_kriteria)),2);
						}
					}
					$index_kriteria++;
					$i++;
				}
				$index_alternatif++;	
			}

			return $r;
		}
	}


	public function hasilRangking($nim)
	{
		// data alternatif
		$alternatif = $this->rating($nim);

		if (!empty($alternatif)) {

			// data kriteria
			$ambilKriteria = $this->db->ambilRow("SELECT kode_kriteria FROM tb_rating GROUP BY kode_kriteria ORDER BY id_rating");

			foreach ($ambilKriteria as $krite) {
				$kriteria[] = $krite['kode_kriteria'];
			}

			// data bobot
			$ambilBot = $this->db->ambilRow("
				SELECT  
					tb_rating.id_rating,
					tb_kriteria.bobot_kriteria
					FROM tb_rating 
		            JOIN tb_kriteria
		            ON tb_kriteria.kode_kriteria = tb_rating.kode_kriteria
                    GROUP BY tb_kriteria.kode_kriteria
					ORDER BY tb_rating.id_rating ASC
			");

			foreach ($ambilBot as $bobot) {
				$w[] = $bobot['bobot_kriteria'];
			}

			// data normalisasi
			$r = $this->normalisasi($nim);

			// hitung hasil rangking
			$index_alternatif = 0;
			foreach ($alternatif as $alt) {
				$index_w = 0;
			 	$index_r = 1;
			 	$v = 0;
				foreach ($kriteria as $kr) {
					$v += $w[$index_w] * $r[$index_alternatif][$index_r];
					$index_r++;
					$index_w++;
				}
				$nilai_v[$index_alternatif]['kode_alternatif'] = $alt[0];
				$nilai_v[$index_alternatif]['nilai'] = $v;
				$index_alternatif++;	
			}

			// urut
			usort($nilai_v, function($a,$b){
				return $a['nilai'] <=> $b['nilai'];
			});

			// urut berlawan, atas besar ke kecil
			$nilai_v = array_reverse($nilai_v);

			return $nilai_v;

		}else{
			$arr = [];
			return $arr;
		}
	}

	public function tampilHasil($nim)
	{
		$ambilHasil = $this->hasilRangking($nim);

		if (!empty($ambilHasil)) {

			$hasil = $ambilHasil[0]['kode_alternatif'];

			$result = $this->db->ambilRow("SELECT * FROM tb_alternatif WHERE kode_alternatif = '$hasil' AND nim = '$nim'");

			return $result;
		}else{
			$arr = [];
			return $arr;
		}
	}

}