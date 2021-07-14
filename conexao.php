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
	}
