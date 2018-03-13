<?php

$enlace = new mysqli("localhost", "root", "", "pruebaprocesos");

if (isset($_POST["txtNombre"])) {

    $nombre = $_POST["txtNombre"];
    $Apate = $_POST["txtApat"];
    $Materno = $_POST["txtMater"];
    $Clave = $_POST["txtPass"];
    $Tipo = $_POST["cboTipo"];
    $usuario = $_POST["txtUsu"];


    $pass = password_hash($Clave, PASSWORD_DEFAULT);

    $consul = "INSERT INTO usuario VALUES (null,'" . $nombre . "','" . $Apate . "','" . $Materno . "'," . $Tipo . ",'" . $usuario . "','" . $pass . "');";

    $sql = $enlace->query($consul);

    if ($sql > 0) {
        header("Location:AgregarUsuario.php?mensaje='Usuario $usuario Agregado'");
    } else {
        header("Location:AgregarUsuario.php?mensaje='Usuario Existente'");
    }
}

