<?php
$dbhost = "localhost";
$dbname = "alertatec";
$dbuser = "root";
$dbpassword = "";

$conexion=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname,"3306");

// Verificar conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>