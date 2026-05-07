<?php

$host = "mysql-mina.alwaysdata.net";
$usuario = "mina";
$password = "clase12345";
$bd = "mysql-mina.alwaysdata.net";

$conn = new mysqli($host, $usuario, $password, $bd);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

?>