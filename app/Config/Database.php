<?php
namespace App\Config;
use PDO;


class Database{
	private $host = 'localhost';
	private $db_name = 'authdb';
	private $username = 'root';
	private $password = '';
	public $conn;

	public function __construct()
	{
		$this->conn = null;
		try {
		  $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->username, $this->password);
		  // set the PDO error mode to exception
		  $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
		  echo "Connection failed: " . $e->getMessage();
		}
	}

	public function fetchData($query, $params = []){
		try{
			$stmt = $this->conn->prepare($query);
			$stmt->execute($params);
			return $stmt->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){
			return false;
		}
	}

	public function fetchSingle($query){
		$stmt = $this->conn->query($query);
		return $stmt->fetch(PDO::FETCH_ASSOC);
	}

	



}