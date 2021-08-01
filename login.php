<?php

include_once "Functions.class.php";
include_once "Usuario.class.php";
include_once "Conexao.class.php";

$objUser = new Usuario();
$objFc = new Functions();
$objConec = new Conexao();
 
session_start();

if(isset($_POST['btLogar'])){
	$objUser-> loginUsuario($_POST);
}
?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Sistema de login</title>

</head>
<link href="usuario.css" rel="stylesheet" type="text/css" media="all">

<body>
    <div class="container">
        <div id="areaLogin">
            <form action="" method="post">
                <h1> Login </h1>
                <div class="input-group">
                    <span class="input-group-addon"></span>
                    <input type="text" name="email" class="form-control" placeholder="E-mail" required="required"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$">
                </div>
        </div>
        <div class="form-group">
            <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                <input type="password" name="senha" class="form-control" placeholder="Senha">
            </div>
        </div>
        <div class="form-group">
            <button type="submit" name="btLogar" class="btn btn-primary btn-block">Logar</button>
        </div>
        </form>
        <?php if(isset($_GET["login"]) == "error"){ ?>
        <div class="alert" role="alert">Erroo! E-mail ou Senha estão errado</div>
        <?php } ?>
    </div>
</body>

</html>