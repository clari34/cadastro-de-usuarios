<?php
$dsn = 'mysql:host=127.0.0.1;dbname=pweb4';
$user = 'ana';
$pass = 'root';

try {

    $pdo = new PDO($dsn, $user, $pass);

} catch (PDOException $ex) {
    echo 'Erro ' .$ex->getMessage();
}
?>

