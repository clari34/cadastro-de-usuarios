<?php
	
	$username = "ana";
	$password = "root";
	$database = "pweb2";
	$server = "localhost"; 
	
	$conexao = new mysqli($server, $username, $password, $database);
	
	if($conexao->connect_error){
		die("Erro na conexão ".$conexao->connect_error);
	} else {
		echo "Conexão realizada.";
		$nomeUsuario = $_REQUEST["usuario"];
        $nomeUsuario1 = $_REQUEST["usuario1"];
		$email = $_REQUEST["email"];
		$senha = $_REQUEST["senha"];

		$sql = "INSERT INTO usuarios (nome_usuario, nome_completo, email, senha) VALUES
				('$nomeUsuario', '$nomeUsuario1', '$email', '$senha')";
		if($conexao->query($sql)){
			echo "Usuário inserido.";
		} else {
			echo $conexao->error;
		}
	}
?>