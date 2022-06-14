<?php

class Database {
	private $host = DB_HOST;
	private $user = DB_USER;
	private $pass = DB_PASS;
	private $database = DB_NAME;

	private $conn;

	public function __construct()
	{
		$this->conn = mysqli_connect($this->host, $this->user, $this->pass,$this->database);
		if (mysqli_connect_errno()){
			echo "Koneksi database gagal : " . mysqli_connect_error();
		}
	}

	public function query($query)
	{
		$result = mysqli_query($this->conn, $query);
		return $result;
	}

	public function ambilRow($query)
	{
		$rows = [];
		$result = mysqli_query($this->conn, $query);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()) {
			$rows[] = $row;
			}
		}
		return $rows;
	}

	public function jmlRow($query)
	{
		$result = mysqli_query($this->conn, $query);
		$rows = $result->num_rows;
		return $rows;	
	}
	
}