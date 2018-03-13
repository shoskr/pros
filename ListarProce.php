<?php
include_once './Home.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title></title>
        
                <style>
            tables {
                width: 100%;
            }

            thead, tbody, tr, td, th { display: block; }
            
            tr:after {
                content: ' ';
                display: block;
                visibility: collapse;
                clear: both;
            }

            thead th {
                height: 30px;

                /*text-align: left;*/
            }

            tbody {
                width: 900px;
                height: 500px;
                overflow-y: auto;
            }

            thead {
                /* fallback */
            }


            tbody td, thead th {
               // width: 14%;
                float: left;
            }         

        </style>
    </head>


    <body>

        <?php
        $enlace = new mysqli("localhost", "root", "", "pruebaprocesos");
        $sql = $enlace->query("select * from proceso order by codigo, padre asc");
        ?>
        <div class="container col-11" style="background-color: white"  >     
            <div>
                <h3 style="font: oblique;text-align: center"> Listado Procesos</h3>
            </div>
            <div class="container "style="width: 950px; background-color:  white;">
                <div class="row">
                    <div class="  "  >
                        <form id="formu">
                            <table class="table table-fixed">
                                <thead>
                                    <tr>
                                        <th style="width: 200px;text-align: center">Nombre</th>
                                        <th style="width: 50px;text-align: center">Nivel</th>
                                        <th style="width: 150px;text-align: center">Padre</th>
                                        <th style="width: 200px;text-align: center">Descripcion</th>
                                        <th style="width: 200px;text-align: center">Responsable</th>
                                        <th style="width: 80px;text-align: center">Pais</th>
                                       
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($sql)) {
                                        $padre = strlen($row[3]);
                                        if ($padre > 0) {
                                            $sql1 = $enlace->query("select nombre from proceso where codigo = '" . $row[3] . "';");
                                            $fila = $sql1->fetch_assoc();
                                            $pp = $fila['nombre'];
                                        } else {
                                            $pp = "";
                                        }
                                        ?> 
                                        <tr>

                                            <td style="width: 200px; text-align: center"><?php echo $row[1] ?></td>
                                            <td style="width: 50px; text-align: center"><?php echo $row[2] ?></td>
                                            <td style="width: 150px; text-align: center"><?php echo $pp ?> </td>
                                            <td style="width: 200px; text-align: center"><?php echo $row[4] ?></td>
                                            <td style="width: 200px; text-align: center"><?php echo $row[5] ?></td>
                                            <td style="width: 80px; text-align: center"><?php echo $row[6] ?></td>
                                            
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
