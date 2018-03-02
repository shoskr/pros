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

                            $consulta = "SELECT codigo, nombre, nivel, padre FROM proceso where codigo = ";
                            $sql = $enlace->query($consulta . "'" . $codigo . "'");
                            $fila = $sql->fetch_assoc();
                            $ruta = "";
                            $aa = $fila['nivel'];
                            for ($index = 0; $index < $aa; $index++) {
                                $nombre = $fila['nombre'];
                                $ruta = $nombre . " -> " . $ruta;
                                $padre = $fila['padre'];
                                $sql1 = $enlace->query($consulta . "'" . $padre . "'");
                                $fila = $sql1->fetch_assoc();
                            }
                            ?>
                            <div class="container table-hover">
                                <table class="table table-active">
                                    <?php
                                    $arris = explode("->", $ruta);
                                    for ($index1 = 0; $index1 < count($arris); $index1++) {
                                        ?> 
                                        <tr>
                                            <td><?php echo ($index1 + 1) ?></td>
                                            <td> <?php echo $arris[$index1]; ?> </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>
                        <h2><a href="procesob.php">volver</a></h2>
                    </div>
                </div>
            </div>
    </body>
</html>