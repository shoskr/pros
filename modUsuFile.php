<?php

$enlace = new mysqli("localhost", "root", "", "pruebaprocesos");

$nombre = $_POST["txtNombre"];
$Apate = $_POST["txtApat"];
$Materno = $_POST["txtMater"];
$Clave = $_POST["txtPass"];
$Tipo = $_POST["cboTipo"];
$usuario = $_POST["txtUsu"] ;
$id = $_POST["txtId"];

$modClav = strlen(trim($Clave));

if($modClav>0){
    $pass = password_hash($Clave, PASSWORD_DEFAULT);
    $consul = "UPDATE usuario set Nombres = '" . $nombre . "', Apellido_Paterno ='" . $Apate . "', Apellido_Materno ='" . $Materno . "', Tipo_Usuario =" . $Tipo . ", usu ='" . $usuario . "',clave ='" . $pass . "' where  id = ".$id.";";
}else if ($modClav==0){
    $consul = "UPDATE usuario set Nombres = '" . $nombre . "', Apellido_Paterno ='" . $Apate . "', Apellido_Materno ='" . $Materno . "', Tipo_Usuario =" . $Tipo . ", usu ='" . $usuario . "' where  id = ".$id.";";
}
$sql = $enlace->query($consul);

if ($sql > 0) {
    header("Location:ModificarUsuario.php?mensaje='Usuario $usuario Modificado'");
} else {
    echo $consul;
   // header("Location:ModificarUsuario.php?mensaje='Usuario No se puede Modificar'");
}
