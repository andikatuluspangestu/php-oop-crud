<?php 

class Database{

	var $host = "localhost";
	var $user = "root";
	var $pass = "";
	var $db   = "sekolah";
	var $conn = "";
	
	public function getConnection(){
		$this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

		if (mysqli_connect_error()) {
			die("Database Connection Failed : " . mysqli_connect_error() . mysqli_connect_errno());
		}
	}
}
