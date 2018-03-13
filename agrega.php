<?php

$nombre = $_POST['txtNombre'];
$desc = $_POST['txtDes'];
$padre = $_POST['cboPad'];
$resp = $_POST['txtRes'];
$pais = $_POST['txtPais'];

//echo '-'.$nombre.'-'.$desc.'-'.$resp.'-'.$pais.'-'.$des.'-'.$padre;
$nivel;
$id;
$enlace = new mysqli("localhost", "root", "", "pruebaprocesos");
$contP = strlen($padre);


if ($contP > 0) {
    $consulta = "SELECT * FROM proceso where codigo = $padre";
    $sql = $enlace->query($consulta);
    $fila = $sql->fetch_assoc();
    $nivel = $fila['nivel'] + 1;
    $consulta2 = "SELECT * FROM proceso where padre = $padre";
    $sql1 = $enlace->query($consulta2);
   
} else{
    $nivel = 1;
}

$insert = "insert into proceso values( null,'" . $nombre . "'," . $nivel . "," . $padre . ",'" . $desc . "','" . $resp . "','" . $pais . "','No');";

$sqlInsert = $enlace->query($insert);

if ($sqlInsert > 0) {
   header("Location:AgregarProceso.php?mensaje='Guardado'");
} else {
  header("Location:AgregarProceso.php?mensaje='No se pudo Guardar el Proceso'");
}