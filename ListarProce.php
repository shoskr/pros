<?php
include_once './Home.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <style>
        table-fixed thead { 
            ancho: 100%; 
        } 
        .table-fixed tbody { 
            height: 500px; 
            overflow-x: auto; 
            overflow-y: auto; 
            ancho: 99%; 
        } 
        .table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th { 
            display: block; 
        } 
        .table-fixed tbody td, .table-fixed thead> tr> th { 
            display: inline-block; 
            border-bottom-width: 1; 
        }

    </style>

    <body>
        <?php
        $enlace = new mysqli("localhost", "root", "", "pruebaprocesos");
        $sql = $enlace->query("select * from proceso order by codigo, padre asc");
        ?>
        <div class="container col-11"  >     
            <div>
                <h3 style="font: oblique;text-align: center"> Listado Procesos</h3>
            </div>
            <div class="row"style="width: 950; background-color:  white; text-align: center">
                <div class="row">
                    <div class=" container "  >
                        <form id="formu">
                            <table class="table table-fixed " style="font-size: small">
                                <thead>
                                    <tr>
                                       
                                        <th style="width: 300px">Nombre Proceso</th>
                                        <th style="width: 50px">Nivel </th>
                                        <th style="width: 300px">Proceso Padre</th>
                                        <th style="width: 150px">Descripcion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $padre = strlen($row[3]);
                                        if ($padre > 0) {
                                            $sql1 = $enlace->query("select nombre from proceso where codigo = '" . $row[3]."';");
                                            $fila = $sql1->fetch_assoc();

                                            $pp = $fila['nombre'];
                                        } else {
                                            $pp = "";
                                        }
                                        ?> 
                                        <tr>
                                           
                                            <td style="width: 300px"> <?php echo $row[1] ?> </td>
                                            <td style="text-align: center;width: 50px"> Nivel <?php echo $row[2] ?> </td>
                                            <td style="width: 300px"> <?php echo $pp ?> </td>
                                            <td style="width: 150px"> <?php echo $row[4] ?> </td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>




                </div>
            </div>
        </div>
    </body>
</html>
