<?php

if (isset($_POST["txtRegistro11"])) {

    $regre = $_POST["txtRegistro11"];

    if ($regre == "VER SUCESOR") {

        echo' <script> ';
        echo' $(document).ready(function (event) {';
        echo' $("#btnver12").click(function () {';
        echo' $("#txtRegistro12").val("VER SUCESOR");';
        echo' $.ajax({';
        echo' type: "POST",';
        echo' url: "verProce12.php",';
        echo' data: $("#formu12").serialize(),';
        echo' success: function (data) {';
        echo' $("#muestra12").html(data);';
        echo' }';
        echo' });';
        echo' })';
        echo' });';
        echo' </script>';

        $enlace = new mysqli("localhost", "root", "", "pruebaprocesos");
        $ante = $_POST["list11"];
        $sql = $enlace->query("SELECT * FROM proceso where padre = " . $ante. " order by codigo");
        $sql2 = $enlace->query("SELECT * FROM proceso where padre = " . $ante);
        $sql3 = $enlace->query("SELECT nombre,nivel, descripcion FROM proceso where codigo = " . $ante);

         $fila = $sql3->fetch_assoc();
         $cont = 0;
        while ($row = mysqli_fetch_array($sql2)) {
            $cont++;
        }
        
        echo' <div class=" container col-6 ">';
        echo' <table class="table tab-content row">';
        echo' <tr>';
        echo' <td> Nivel '.$fila['nivel'].' </td>';
        echo' <td> Sucesores '.$cont.' </td>';
        echo' <td> '.$fila['nombre'].' </td>';
        echo' <td> '.$fila['descripcion'].' </td>';
        echo' </tr>';
        echo' <tr>';
        echo' <tr>';
        echo' </table >';
        echo' </div>';


        echo' <div class=" container col-6 "  >';
        echo' <form id="formu12">';
        echo' <table class="table tab-content row">';
        echo' <td>';
        

        if ($cont > 0) {
            echo' <select name="list12" class="list-group-item-action" style="height: 30px; width: 300px" > ';
            while ($row = mysqli_fetch_array($sql)) {

                echo' <option value="' . $row[0] . '">' . $row[1] . '</option>';
            }
        } else {
            echo' <div style="text-align: center"> ';
            echo' <p>Sin Sucesor</p>';
            echo' </div>';

            return;
        }
        echo' </select>';
        echo' </td>';
        echo' <td>';
        echo' </td>';
        echo' <td>';
        echo' <input type = "button" class = "btn btn-success  " value = "VER SUCESOR" id = "btnver12" style = "width: 130px; height: 30px;  " />';
        echo' </td>';
        echo' </table>';
        echo' <input type = "hidden" name = "txtRegistro12" id = "txtRegistro12">';
        echo' </form>';
        echo' </div>';
        echo' <div id = "muestra12" class = "container table-hover" >';
        echo' </div> ';
    }
    return;
}