<?php
include_once "Functions.class.php";
include_once "Usuario.class.php";

$objUser = new Usuario();
$objFc = new Functions();
 
session_start();

?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário de cadastro</title>
    <link href="usuario.css" rel="stylesheet" type="text/css" media="all">
</head>

<body>

    <div class="container">
        <h1> Cadastro </h1>
        <div id="formulario">
            <form name="formCad" action="" method="post">
                <input class="form-control" name="nome" type="text" required="required" placeholder="Nome Completo:"
                    value="<?= $objFc->caracter((isset($user['nome_completo'])) ? ($user['nome_completo']) : (''), 2) ?>"><br>
                <input class="form-control" name="user" type="text" required="required" placeholder="Nome Usuário:"
                    value="<?= $objFc->caracter((isset($user['nome_usuario'])) ? ($user['nome_usuario']) : (''), 2) ?>"><br>
                <input type="mail" name="email" class="form-control" required="required"
                    pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" placeholder="E-mail:"
                    value="<?= $objFc->caracter((isset($user['email'])) ? ($user['email']) : (''), 2) ?>"><br>
                <?php if (isset($_GET['acao']) <> 'edit'){?>
                <input type="password" name="senha" class="form-control" required="required" placeholder="Senha:"><br>
                <?php }?>
                <button type="submit" name="<?= (isset($_GET['acao']) == 'edit') ? ('btAlterar') : ('btCadastrar') ?>"
                    class="botao"><?= (isset($_GET['acao']) == 'edit') ? ('Alterar') : ('Cadastrar') ?></button>

            </form>
        </div>

</html>

</body>