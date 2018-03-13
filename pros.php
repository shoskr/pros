<?php
include './Home.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title> Procesos </title>
        

    </head>
    <body>
        <?php
        $enlace = new mysqli("localhost", "root", "", "pruebaprocesos");
        if (isset($_POST) == 'ver') {
            ?>
            <div class="container col-11"  >     
                <div class="row"style="width: 950; background-color:  white; text-align: center">
                    <div class="row">
                        <div class=" container col-6 "  >

                            <?php
                            $codigo = $_POST["id"];

                            $consulta = "SELECT * FROM proceso where codigo = ";
                            $sql = $enlace->query($consulta . "'" . $codigo . "'");
                            $fila = $sql->fetch_assoc();
                            $ruta = "";
                            $aa = $fila['nivel'];
                            for ($index = 0; $index < $aa; $index++) {
                                $nombre = $fila['codigo'];
                                $ruta = $nombre . " -> " . $ruta;
                                $padre = $fila['padre'];
                                $sql1 = $enlace->query($consulta . $padre);
                                $fila = $sql1->fetch_assoc();
                            }
                            ?>
                            <div class="container table-hover">
                                <table class="table table-active">
                                    <tr>
                                        <td>#</td>
                                        <td> Nombre </td>
                                        <td> Antecesor</td>
                                        <td> descripcion</td>
                                        <td> Responsable</td>
                                    </tr>

                                    <?php
                                    $arris = explode("->", $ruta);
                                    for ($index1 = 0; $index1 < count($arris) - 1; $index1++) {
                                        $codigo2 = $arris[$index1];
                                        $sql2 = $enlace->query($consulta . $codigo2);
                                        $fila1 = $sql2->fetch_assoc();
                                        $padre = strlen($fila1['padre']);
                                        if ($padre > 0) {
                                            $sql3 = $enlace->query("select nombre from proceso where codigo = " . $fila1['padre'] . ";");
                                            $fila2 = $sql3->fetch_assoc();
                                            $pp = $fila2['nombre'];
                                        } else {
                                            $pp = "";
                                        }
                                        ?> 

                                        <tr>
                                            <td><?php echo ($index1 + 1) ?></td>
                                            <td><?php echo $fila1['nombre']; ?></td>
                                            <td><?php echo $pp; ?></td>
                                            <td><?php echo $fila1['descripcion']; ?></td>
                                            <td><?php echo $fila1['responsable']; ?></td>

                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr><td colspan="5"> Procesos Siguientes</td></tr>
                                    <tr>
                                        <td>#</td>
                                        <td> Nombre </td>
                                        <td> Sucesor</td>
                                        <td> descripcion</td>
                                        <td> Responsable</td>
                                    </tr>
                                    <?php
                                    $Cons = "SELECT * FROM proceso where padre = ";
                                    $query = $enlace->query($Cons . $codigo );
                                    $num = 1;
                                    while ($row = mysqli_fetch_array($query)) {
                                        $padre = strlen($row[3]);
                                        if ($padre > 0) {
                                            $sql1 = $enlace->query("select nombre from proceso where codigo = " . $row[3] . ";");
                                            $fila = $sql1->fetch_assoc();
                                            $pp = $fila['nombre'];
                                        } else {
                                            $pp = "";
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo $num ?></td>
                                            <td><?php echo $row[1]; ?></td>
                                            <td><?php echo $pp; ?></td>
                                            <td><?php echo $row[4]; ?></td>
                                            <td><?php echo $row[5]; ?></td>
                                        </tr>
                                        <?php
                                        $num++;
                                    }
                                    ?>
                                </table>
                            </div>
                            <?php
                        }
                        ?>
                        <h2><a href="procesob.php">volver</a></h2>
                    </div>
                </div>
            </div>
    </body>
</html>