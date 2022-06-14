<?php 

class Admin_home_model{
	private $db;

	public function __construct()
	{
		$this->db = new Database;
	}

	public function jmlKriteria()
	{
		$result = $this->db->jmlRow("SELECT * FROM  tb_kriteria");
		return $result;
	}

	public function jmlBobot()
	{
		$result = $this->db->jmlRow("SELECT * FROM  tb_bobot");
		return $result;
	}

	public function jmlMhs()
	{
		$result = $this->db->jmlRow("SELECT * FROM  tb_mhs");
		return $result;
	}

	public function jmlAdmin()
	{
		$result = $this->db->jmlRow("SELECT * FROM  tb_admin");
		return $result;
	}

	public function jmlLog()
	{
		$result = $this->db->jmlRow("SELECT * FROM  tb_log");
		return $result;
	}

	public function namaAdmin($id)
	{
		$result = $this->db->ambilRow("SELECT nama_admin FROM  tb_admin WHERE id_admin = '$id'");
		return $result;
	}

}
