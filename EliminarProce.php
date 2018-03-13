<?php

$enlace = new mysqli("localhost", "root", "", "pruebaprocesos");

$id1 = $_POST['id'];

$cons = "Select * from proceso where padre = " . $id1;
$Sql1 = $enlace->query($cons);
$cont = 0;

while ($row = mysqli_fetch_array($Sql1)) {
    $cont++;
}

if ($cont == 0) {

    $consulta = "DELETE FROM proceso WHERE codigo = " . $id1;
    $Sql = $enlace->query($consulta);

    if ($Sql > 0) {
        header("Location:EliminarBusq.php?mensaje='Eliminado'");
    } 
}else {
        header("Location:EliminarBusq.php?mensaje='No Se Puede Eliminar, Existen Procesos que dependen de este proceso'");
    }



    