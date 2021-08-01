<?php

require_once 'Usuario.class.php';

$objUser = new Usuario();

if(isset($_POST['btLogar'])){
	$objFunc->logaFuncionario($_POST);
}
?>
<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Sistema de login</title>

</head>
<link href="../estetica/usuario.css" rel="stylesheet" type="text/css" media="all">

<body>
    <div id="lista">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Lista</h3>
            </div>
            <div class="panel-body">
                <?php foreach($objFunc->querySelect() as $rst){ ?>
                <div class="funcionario">
                    <div class="nome"><?=$objFc->tratarCaracter($rst['nome'], 2)?></div>
                    <div class="editar"><a href="?acao=edit&func=<?=$objFc->base64($rst['idFuncionario'], 1)?>"
                            title="Editar dados"><img src="../../img/ico-editar.png" width="16" height="16"
                                alt="Editar"></a></div>
                    <div class="excluir"><a href="?acao=delet&func=<?=$objFc->base64($rst['idFuncionario'], 1)?>"
                            title="Excluir esse dado"><img src="../../img/ico-excluir.png" width="16" height="16"
                                alt="Excluir"></a></div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>