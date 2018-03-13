<?php
$enlace = new mysqli("localhost", "root", "", "pruebaprocesos");

if(isset($_POST['cboUsuario'])){

$id = $_POST['cboUsuario'];

$consulta = "delete from usuario where id = ".$id;

$Sql = $enlace->query($consulta);

if($Sql>0){
     header("Location:ElimnUsu.php?mensaje='Usuario Eliminado'");
}else{
     header("Location:ElimnUsu.php?mensaje='No se Pudo Eliminar Usuario'");
}
}
