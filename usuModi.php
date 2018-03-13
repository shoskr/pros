<?php

if (isset($_POST['txtRegistro'])) {
    $enlace = new mysqli("localhost", "root", "", "pruebaprocesos");

    $reg = $_POST['txtRegistro'];
    if ($reg == 'VER') {
        $id = $_POST['cboUsuario'];
        $cons = "SELECT * FROM usuario where id = " . $id;
        $query = $enlace->query($cons);
        $fila = $query->fetch_assoc();

        echo'<form action="modUsuFile.php" method="post">';
        echo'<div class="form-group">';
        echo'<label>Nombres</label>';
        echo'<input type="text" class="form-control" required="" name="txtNombre" value="' . $fila['Nombres'] . '">';
        echo'</div>';
        echo'<div class="form-group">';
        echo'<label>Apellido Paterno</label>';
        echo'<input type="text" class="form-control" required="" name="txtApat" value="' . $fila['Apellido_Paterno'] . '">';
        echo'</div>';
        echo'<div class="form-group">';
        echo'<label>Apellido Materno</label>';
        echo'<input type="text" class="form-control" required="" name="txtMater" value="' . $fila['Apellido_Materno'] . '">';
        echo'</div>';
        echo'<div class="form-group">';
        echo'<label>Usuario</label>';
        echo'<input type="text" class="form-control" required="" name="txtUsu" value="' . $fila['usu'] . '">';
        echo'</div>';
        echo'<div class="form-group">';
        echo'<label>Clave</label>';
        echo'<input type="password" class="form-control" name="txtPass" value="">';
        echo'</div>';
        echo'<div class="form-group">';
        echo'<label>Tipo Usuario</label>';
        echo'<select class="form-control" name="cboTipo" style="height: 34px"> ';
        if ($fila['Tipo_Usuario'] == 1) {
            echo'<option value="1">Administrador </option>';
            echo'<option value="2">Operador</option>';
        } else if ($fila['Tipo_Usuario'] == 2) {
            echo'<option value="2">Operador</option>';
            echo'<option value="1">Administrador </option>';
        }
        echo'</select>';
        echo'</div>';
        echo'<input type="hidden" name="txtId"  value="' . $fila['id'] . '" />';
        echo'<button type="submit" class="btn btn-primary mb-2">Modificar</button>';
        echo'</form>';
    }
    return;
}