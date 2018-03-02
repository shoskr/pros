<?php
include './Home.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title> Procesos </title>

    </head>
    <body>
        <script>
            //Primero
            $(document).ready(function (event) {
                $("#btnver").click(function () {
                    $("#txtRegistro").val("VER SUCESOR");
                    $.ajax({
                        type: "POST",
                        url: "proMod.php",
                        data: $("#formu").serialize(),
                        success: function (data) {
                            $("#muestra").html(data);
                        }
                    });
                })
            });

            $(document).ready(function (event) {
                $("#buscador").click(function () {
                    $("#txtRegistro").val("buscar");
                    $.ajax({
                        type: "POST",
                        url: "Buscador.php",
                        data: $("#buscador").serialize(),
                        success: function (data) {
                            $("#muestra").html(data);
                        }
                    });
                })
            });

        </script>
        <?php
        $enlace = new mysqli("localhost", "root", "", "pruebaprocesos");
        $sql = $enlace->query("SELECT * FROM proceso");
        ?>







        <div class="container col-11"  >     
            <div class="row"style="width: 950; background-color:  white; text-align: center">
                <div class="row">
                    <div class=" container col-6 "  >
                        <form id="buscador" > 
                            <input  name="txtText" type="search" placeholder="Buscar aquí..."  >
                            <input type="button" name="buscador" class="boton peque aceptar" value="buscar">
                            <input type="hidden" name="txtRegistro" id="txtRegistro">
                        </form>

                        <form id="formu">
                            <table class="table tab-content row">
                                <td>
                                    <select name="list" class="list-group-item-action" style="height: 30px; width: 300px" >
                                        <?php
                                        while ($row = mysqli_fetch_array($sql)) {
                                            ?>  
                                            <option  value="<?php echo $row[0]; ?>"><?php echo 'Niv. ' . $row[2] . ' - ' . $row[1]; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>

                                </td>
                                <td>
                                    <input type="button" class="btn btn-success  " value="Seleccionar" id="btnver" style="width: 130px; height: 30px;  " />
                                </td>
                            </table>
                            <input type="hidden" name="txtRegistro" id="txtRegistro">
                        </form>
                    </div>


                    <div id="muestra" class="container table-hover" >

                    </div>

                </div>
            </div>
        </div>

    </body>
</html>

