<?php 

class Mhs_home_model{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function namaMhs($nim)
	{
		$result = $this->db->ambilRow("SELECT * FROM  tb_mhs WHERE nim = '$nim'");

		return $result;
	}

	public function jmlAlternatif($nim)
	{
		$result = $this->db->jmlRow("SELECT * FROM  tb_alternatif WHERE nim = '$nim'");

		return $result;
	}

	public function pengumuman()
	{
		$result = $this->db->ambilRow("
			SELECT * FROM  tb_log WHERE 
			keterangan LIKE '%menghapus kriteria%' OR
			keterangan LIKE '%menghapus nilai bobot%' OR
			keterangan LIKE '%mengedit kriteria%' OR
			keterangan LIKE '%mengedit nilai bobot%' OR
			keterangan LIKE '%menambah kriteria%' OR
			keterangan LIKE '%menambah nilai bobot%' 
			ORDER BY cap_waktu DESC
		");

		return $result;
	}

}