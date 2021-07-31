<?php
class Conexao{
	private $user;
	private $pass;
	private $banco;
	private $servidor;
	private static $pdo;
	public function __construct(){		
		$this->servidor = "localhost";
		$this->banco = "pweb6";
		$this->user = "root"; 
		$this->pass = "";
	}
	public function conectar(){
		try{
			if(is_null(self::$pdo)){
				self::$pdo = new PDO("mysql:host=".$this->servidor.";dbname=".$this->banco, $this->user, $this->pass);
			}
			return self::$pdo;
		}catch(PDOException $ex) {
			echo 'Error: '.$ex->getMessage();
		}
	}
}
?>

