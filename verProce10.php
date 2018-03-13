<?php

if (isset($_POST["txtRegistro10"])) {

    $regre = $_POST["txtRegistro10"];

    if ($regre == "VER SUCESOR") {

        echo' <script> ';
        echo' $(document).ready(function (event) {';
        echo' $("#btnver11").click(function () {';
        echo' $("#txtRegistro11").val("VER SUCESOR");';
        echo' $.ajax({';
        echo' type: "POST",';
        echo' url: "verProce11.php",';
        echo' data: $("#formu11").serialize(),';
        echo' success: function (data) {';
        echo' $("#muestra11").html(data);';
        echo' }';
        echo' });';
        echo' })';
        echo' });';
        echo' </script>';

         $enlace = new mysqli("localhost", "root", "", "pruebaprocesos");
        $ante = $_POST["list10"];
        $sql = $enlace->query("SELECT * FROM proceso where padre = " . $ante. " order by codigo");
        $sql2 = $enlace->query("SELECT * FROM proceso where padre = " . $ante);
        $sql3 = $enlace->query("SELECT * FROM proceso where codigo = " . $ante);

         $fila = $sql3->fetch_assoc();
         $cont = 0;
        while ($row = mysqli_fetch_array($sql2)) {
            $cont++;
        }
        
       echo' <div class=" container col-6 ">';
        echo' <table class="table tab-content row" >';
        echo' <tr>';
        echo' <td> Nivel </td>';
        echo' <td> Sucesores  </td>';
        echo' <td style="width: 80px"> Descripcion  </td>';
        echo' <td> Responsable </td>';
        echo' <td> Pais </td>';
        echo' </tr>';
        echo' <tr>';
        echo' <td> ' . $fila['nivel'] . ' </td>';
        echo' <td> ' . $cont . ' </td>';
        echo' <td style="width: 5000px"> ' . $fila['descripcion'] . ' </td>';
        echo' <td> ' . $fila['responsable'] . ' </td>';
        echo' <td> ' . $fila['pais'] . ' </td>';
        echo' </tr>';
        echo' <tr>';
        echo' <tr>';
        echo' </table >';
        echo' </div>';


        echo' <div class=" container col-6 "  >';
        echo' <form id="formu11">';
        echo' <table class="table tab-content row">';
        echo' <td>';
       

        if ($cont > 0) {
            echo' <select name="list11" class="list-group-item-action" style="height: 30px; width: 300px" > ';
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
        echo' <input type = "button" class = "btn btn-success  " value = "VER SUCESOR" id = "btnver11" style = "width: 130px; height: 30px;  " />';
        echo' </td>';
        echo' </table>';
        echo' <input type = "hidden" name = "txtRegistro11" id = "txtRegistro11">';
        echo' </form>';
        echo' </div>';
        echo' <div id = "muestra11" class = "container table-hover" >';
        echo' </div> ';
    }
    return;
}