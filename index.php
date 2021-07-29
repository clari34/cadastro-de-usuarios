<?php
$dsn = 'mysql:host=localhost;dbname=pweb4';
$user = 'ana';
$pass = '';

try {

    $pdo = new PDO($dsn, $user, $pass);
    
} catch (PDOException $ex) {
    echo 'Erro ' .$ex->getMessage();
}
?>

