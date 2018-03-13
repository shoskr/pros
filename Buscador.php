<?php

if (isset($_POST["txtRegistro"])) {

    $regre = $_POST["txtRegistro"];

    if ($regre == "buscar") {

        $enlace = new mysqli("localhost", "root", "", "pruebaprocesos");

        $text = trim($_POST["txtText"]);

        if (strlen($text) > 0) {

            $sql = $enlace->query("SELECT * FROM proceso where nombre like  '%" . $text . "%' order by codigo asc");
            $sql1 = $enlace->query("SELECT * FROM proceso where nombre like  '%" . $text . "%' order by nombre");
            $cont = 0;
            while ($row = mysqli_fetch_array($sql1)) {
                $cont++;
            }
            if ($cont > 0) {

                echo '    <script>';
                echo '   $(document).ready(function (event) {';
                echo '      $("#btnver").click(function () {';
                echo '        $("#txtRegistro").val("Seleccionar");';
                echo '         $.ajax({';
                echo '              type: "POST",';
                echo '             url: "Modificador.php",';
                echo '         data: $("#form").serialize(),';
                echo '                 success: function (data) {';
                echo '                      $("#muestra").html(data);';
                echo '                 }';
                echo '               });';
                echo '          })';
                echo '      });';

                echo '  </script>';

                echo ' <div class = "container "style = "width: 950px; background-color:  white; text-align: center">';
                echo ' <div class = "row">';
                echo ' <div id="muestra" class="container table-hover" >';
                echo '    </div>';
                echo ' <div  >';
                echo ' <form  id="form">';
                echo ' <div class = "" style="text-align: center">';
                echo ' <input type="hidden" name="txtRegistro" id="txtRegistro">';
                echo '  <input type="button" class="btn btn-success  " value="Seleccionar" id="btnver" style="width: 130px; height: 30px;  " />';
                echo ' </div>';
                echo ' <table class = "table table-fixed" >';
                echo ' <thead>';
                echo ' <tr>';
                echo ' <th style="width: 10px; text-align: center">#</th>';
                echo ' <th style="width: 200px;text-align: center" >Nombre</th>';
                echo ' <th style="width: 50px;text-align: center">Nivel</th>';
                echo ' <th style="width: 150px;text-align: center">Padre</th>';
                echo ' <th style="width: 200px;text-align: center">Descripcion</th>';
                echo ' <th style="width: 200px;text-align: center">Responsable</th>';
                echo ' <th style="width: 80px;text-align: center">Pais</th>';
                echo ' </tr>';
                echo ' </thead>';
                echo ' <tbody>';
                $i = 1;
                while ($row = mysqli_fetch_array($sql)) {
                    $padre = strlen($row[3]);
                    if ($padre > 0) {
                        $sql1 = $enlace->query("select nombre from proceso where codigo = " . $row[3] . ";");
                        $fila = $sql1->fetch_assoc();
                        $pp = $fila['nombre'];
                    } else {
                        $pp = "";
                    }
                    echo '  <tr>';
                    echo '  <td style="width: 10px; text-align: center" ><input type="radio" name="id" style="width: 15px; height: 15px" value="' . $row[0] . '" /></td>';
                    echo '  <td style="width: 200px; text-align: center">' . $row[1] . ' </td>';
                    echo '  <td style="width: 50px; text-align: center">' . $row[2] . '</td>';
                    echo '  <td style="width: 150px; text-align: center">' . $pp . '</td>';
                    echo '  <td style="width: 200px; text-align: center">' . $row[4] . ' </td>';
                    echo '  <td style="width: 200px; text-align: center">' . $row[5] . ' </td>';
                    echo '  <td style="width: 70px; text-align: center">' . $row[6] . ' </td>';
                    echo '  </tr>';
                }

                echo ' </tbody>';
                echo ' </table>';

                echo ' </form>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
            } else {
                echo '<div class="alert alert-warning"> <p> No encontrado </p> </div>';
            }
        }
    }
    return;
}

