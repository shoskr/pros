<?php

if (isset($_POST["txtRegistro"])) {

    $regre = $_POST["txtRegistro"];

    if ($regre == "buscar") {

        $text = trim($_POST["txtText"]);

        if (strlen($text) > 0) {


            $enlace = new mysqli("localhost", "root", "", "pruebaprocesos");
            $cod = '';
            $sql = $enlace->query("SELECT * FROM proceso where nombre like  '%" . $text . "%' order by codigo asc");
            $sql1 = $enlace->query("SELECT * FROM proceso where nombre like  '%" . $text . "%' order by nombre");
            $cont = 0;
            while ($row = mysqli_fetch_array($sql1)) {
                $cont++;
            }
            if ($cont > 0) {

                echo '<div class="container col-11"  > ';
                echo '<div class="row"style="width: 950; background-color:  white; text-align: center">';
                echo '<div class="row">';
                echo '<div class=" container "  > ';
                echo '<form action="pros.php" method="post">';
                echo '<table class="table col-lg-12 " style="font-size: small">';
                echo '<thead>';
                echo '<tr>';
                echo '<th style="width: 10%">#</th>';
                echo '<th style="width: 40%">Nombre Proceso</th>';
                echo '<th style="width: 10%"></th>';
                echo '<th style="width: 40%">Descripcion</th>';
                echo '</tr>';
                echo '</thead>';
                echo '<tbody>';

                while ($row = mysqli_fetch_array($sql)) {

                    echo '<tr>';
                    echo '<td style="width: 10%" ><input type="radio" name="id" style="width: 15px; height: 15px" value="' . $row[0] . '" /> </td> ';
                    echo '<td style="width: 40%" >' . $row[1] . '</td>';
                    echo '<td style="width: 10%" > | </td>';
                    echo '<td style="width: 40%" >' . $row[4] . '</td';
                    echo '</tr>';
                }
                echo '   <tr>';
                echo '   <button type="submit" class="btn btn-primary mb-2">ver</button> </tr>';
                echo '   </tbody>';
                echo '   </table>';
                echo '   </form>';
                echo '   </div>';
                echo '   </div>';
                echo '   </div>';
                echo '   </div> ';
            } else {
                echo '<div class="alert alert-warning"> <p> No encontrado </p> </div>';
            }
        }
    }
    return;
}    