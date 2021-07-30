<?php
include_once "Conexao.class.php";
include_once "Functions.class.php";
class Usuario{

	private $con;
	private $objfc;
	private $nome_usuario; 
	private $nome_completo;
	private $email;
	private $senha;

	public function __construct(){
		$this->con = new Conexao();
		$this->objfc = new Functions();
	}

	public function __set($atributo, $valor){
		$this->$atributo = $valor;
	}
	public function __get($atributo){
		return $this->$atributo;
	}
	
	public function querySeleciona($dado){
		try{
			$this->nome_usuario = $this->objfc->codificar($dado, 2);
			$cst = $this->con->conectar()->prepare("SELECT `nome_usuario`, `nome_completo`, `email` FROM `usuario1` WHERE `nome_usuario` = :nome_usuario;");
			$cst->bindParam(":nome_usuario", $this->nome_usuario, PDO::PARAM_STR);
			if($cst->execute()){
				return $cst->fetch();
			}
		}catch(PDOException $ex){
			return 'Error: '.$ex->getMessage();
		}
	}
	
	public function querySelect(){
		try{
			$cst = $this->con->conectar()->prepare("SELECT `nome_usuario`, `nome_completo`, `email` FROM `usuario1`");
			$cst->execute();
			return $cst->fetchAll();
		}catch(PDOException $ex){
			return 'Error: '.$ex->getMessage();
		}
	}
	
	public function queryInsert($dados){
		try{
			$this->nome_usuario = $this->objfc->caracter($dados['nome_usuario'], 1);
			$this->nome_completo = $this->objfc->caracter($dados['nome_completo'], 1);
			$this->email = $this->objfc->caracter($dados['email'], 1);
			$this->senha = sha1($dados['senha']); //sha1 é para criptografia
			$cst = $this->con->conectar()->prepare("INSERT INTO `usuario1` (`nome_usuario`, `nome_completo`, `email`, `senha`) VALUES (:nome_usuario, :nome_completo, :email, :senha);");
			$cst->bindParam(":nome_usuario,", $this->nome_usuario, PDO::PARAM_STR);
			$cst->bindParam(":nome_completo,", $this->nome_completo, PDO::PARAM_STR);
			$cst->bindParam(":email", $this->email, PDO::PARAM_STR);
			$cst->bindParam(":senha", $this->senha, PDO::PARAM_STR);
			if($cst->execute()){
				return 'Certinhoo';
			}else{
				return 'Error ao cadastrar';
			}
		}catch(PDOException $ex){
			return 'Error: '.$ex->getMessage();
		}
	}
	
	public function queryUpdade($dados){
		try{
			$this->nome_usuario = $this->objfc-> codificar($dados['nome_usuario'], 2);
			$this->nome_completo = $this->objfc-> codificar($dados['nome_completo'], 2);
			$this->email = $dados['email'];
			$cst = $this->con->conectar()->prepare("UPDATE `usuario1` SET `nome_completo` = :nome_completo, `email` = :email WHERE `nome_usuario` = :nome_usuario;");
			$cst->bindParam(":nome_usuario", $this->nome_usuario, PDO::PARAM_STR);
			$cst->bindParam(":nome_completo", $this->nome_completo, PDO::PARAM_STR);
			$cst->bindParam(":email", $this->email, PDO::PARAM_STR);
			if($cst->execute()){
				return 'Certinhooo';
			}else{
				return 'Error ao alterar';
			}
		}catch(PDOException $ex){
			return 'Error: '.$ex->getMessage();
		}
	}
	
	public function queryDelete($dado){
		try{
			$this->nome_usuario = $this->objfc->codificar($dado, 2);
			$cst = $this->con->conectar()->prepare("DELETE FROM `usuario1` WHERE `nome_usuario` = :nome_usuario;");
			$cst->bindParam(":nome_usuario", $this->nome_usuario, PDO::PARAM_STR);
			if($cst->execute()){
				return 'Certinhoo';
			}else{
				return 'Erro ao deletar';
			}
		}catch(PDOException $ex){
			return 'Error: '.$ex->getMessage();
		}
	}
	
	public function loginUsuario($dados){
		$this->email = $dados['email'];
		$this->senha = sha1($dados['senha']);
		try{
			$cst = $this->con->conectar()->prepare("SELECT `nome_usuario`, `email`, `senha` FROM `usuario1` WHERE `email` = :email AND `senha` = :senha;");
			$cst->bindParam(':email', $this->email, PDO::PARAM_STR);
			$cst->bindParam(':senha', $this->senha, PDO::PARAM_STR);
			$cst->execute();
			if($cst->rowCount() == 0){
				header('location: login/?login=error');
			}else{
				session_start();
				$rst = $cst->fetch();
				$_SESSION['login'] = "yes";
				$_SESSION['user'] = $rst['nome_usuario'];
				header("location: login/admin");
			}
		}catch(PDOException $ex){
			return 'Error: '.$ex->getMessage();
		}
	}
	
	public function usuarioLogado($dado){
		$cst = $this->con->conectar()->prepare("SELECT `nome_usuario`, `nome_completo`, `email` FROM `usuario1` WHERE `nome_usuario` = :nome_usuario;");
		$cst->bindParam(':nome_usuario', $dado, PDO::PARAM_STR);
		$cst->execute();
		$rst = $cst->fetch();
		$_SESSION['nome_completo'] = $rst['nome_completo'];
	}
	
	public function Usuariosaida(){
		session_destroy();
		header ('location: http://localhost/login');
	}
	
}
?>