<?php

$enlace = new mysqli("localhost", "root", "", "pruebaprocesos");

$id1 = $_POST['id'];
$nombre = $_POST['txtNombre'];
$descrip = $_POST['txtDes'];
$padre = $_POST['cboPad'];
$resp = $_POST['txtRes'];
$Pais = $_POST['txtPais'];
$consulta2 = "Select *from proceso where codigo = " . $id1;
$Sql = $enlace->query($consulta2);
$fila = $Sql->fetch_assoc();
$consulta3 = "SELECT * FROM proceso where codigo = " . $padre;
$sql3 = $enlace->query($consulta3);
$file2 = $sql3->fetch_assoc();
$nivel = $file2['nivel']+1;


$consulta = "update  proceso set nombre = '" . $nombre . "', nivel = ".$nivel.",padre = '" . $padre . "' , descripcion = '" . $descrip . "', responsable = '" . $resp . "', pais = '" . $Pais . "' where codigo = '" . $id1 . "'; ";
$Sql = $enlace->query($consulta);

if ($Sql > 0) {
    header("Location:modificar.php?mensaje='Modificado'");
} else {
    header("Location:modificar.php?mensaje='No Modificado'");
}


    