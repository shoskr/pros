<?php
include './Home.php';
if (isset($_GET['mensaje'])) {
    echo "<script>alert(" . $_GET["mensaje"] . ");</script>";
}
?>
<html>
    <head>
        <meta charset="UTF-8">
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
        <script>
            //buscador
            $(document).ready(function (event) {
                $("#buscador").click(function () {
                    $("#txtRegistro").val("buscar");
                    $.ajax({
                        type: "POST",
                        url: "ProcesoVer.php",
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
                        <form id="buscador"  > 
                            <input  name="txtText" type="search" placeholder="Buscar..."  >
                            <input type="button" name="buscador" class="boton peque aceptar" value="buscar">
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
