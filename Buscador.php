<?php

if (isset($_POST["txtRegistro"])) {

    $regre = $_POST["txtRegistro"];

    if ($regre == "buscar") {

        $enlace = new mysqli("localhost", "root", "", "pruebaprocesos");

        $text = trim($_POST["txtText"]);

        $sql = $enlace->query("SELECT * FROM proceso where nombre like  '%" . $text . "%' order by nivel");
        $sql1 = $enlace->query("SELECT * FROM proceso where nombre like  '%" . $text . "%' order by nombre");
       $cont = 0;
        while ($row = mysqli_fetch_array($sql1)) {
            $cont++;
        }
        if ($cont > 0) {
            echo ' <form id="formu">';
            echo ' <table class="table tab-content row">';
            echo ' <tr>';
            echo ' <td> * </td>';
            echo ' <td> Nombre </td>';
            echo ' <td> Nivel </td>';
            echo ' <td> Padre </td>';
            echo ' <td> Descripcion </td>';
            echo ' </tr>';

            while ($row = mysqli_fetch_array($sql)) {
                echo ' <tr>';
                echo ' <td> <input type="radio" name="id" value="' . $row[0] . '" /> </td>';
                echo ' <td> ' . $row[1] . ' </td>';
                echo ' <td> ' . $row[2] . ' </td>';
                $padre = strlen($row[3]);
                if ($padre > 0) {
                    $sql1 = $enlace->query("select nombre from proceso where codigo = '" . $row[3] . "';");
                    $fila = $sql1->fetch_assoc();

                    $pp = $fila['nombre'];
                } else {
                    $pp = "";
                }
                echo ' <td> ' . $pp . ' </td>';
                echo ' <td> ' . $row[4] . ' </td>';
                echo ' </tr>';
            }
            echo ' </table>';
            echo ' <input type="button" class="btn btn-success  " value="Seleccionar" id="btnver" style="width: 130px; height: 30px;  " />';
            echo ' <input type="hidden" name="txtRegistro" id="txtRegistro">';
            echo ' </form>';
        }
    } else {
        echo '<h3>No existe Resultado para su busqueda</h3>';
    }
    return;
}

