<?php

$enlace = new mysqli("localhost", "root", "", "pruebaprocesos");

$Usuario = $_POST['txtNombre'];
$pass = $_POST['txtPass'];

$cons = "SELECT * FROM usuario WHERE usu = '" . $Usuario . "'";

$sql = $enlace->query($cons);

$fila = $sql->fetch_assoc();

$nombre = $fila['Nombres'] . " " . $fila['Apellido_Paterno'] . " " . $fila['Apellido_Materno'];
$tipo = $fila['Tipo_Usuario'];
session_start();
$_SESSION['usuario'] = $nombre;
$_SESSION['Tipo'] = $tipo;

if ($fila['Clave'] && password_verify($pass, $fila['Clave'])) {
    if ($tipo == 1) {
        header("Location:Home.php?mensaje='Bienvenido Sr/a " . $nombre . "'");
    } else if ($tipo == 2) {
        header("Location:Home.php?mensaje='Bienvenido Sr/a " . $nombre . "'");
    }
} else {
    header("Location:login.php?mensaje='Usuario O contraseña Incorrecto'");
}
