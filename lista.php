<?php
include_once "Usuario.class.php";
include_once "Functions.class.php";
include_once "Conexao.class.php";


$objConec = new Conexao();
$objUser = new Usuario();
$objFc = new Functions();

session_start();

if(isset($_POST['btLogar'])){
	$objUser->loginUsuario($_POST);
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
    <div id="lista">
                <h3 class="panel-title">Lista</h3>
            </div>
            <div class="body">
                <?php foreach($objUser->querySelect() as $rst){ ?>
                <div class="usuario">
                    <div class="nome"><?=$objFc->caracter($rst['nome'], 2)?></div>
                    <div class="editar"><a href="?acao=edit&func=<?=$objFc->codificar($rst['nome_usuario'], 1)?>"
                            title="Editar dados">
                                alt="Editar"></a></div>
                    <div class="exclusão"><a href="?acao=delet&func=<?=$objFc->codificar($rst['nome_usuario'], 1)?>"
                            title="Excluir dado">
                                alt="Excluir"></a></div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>