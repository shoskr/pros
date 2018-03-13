<?php
include_once './index.php';
if (isset($_GET['mensaje'])) {
    echo "<script>alert(" . $_GET["mensaje"] . ");</script>";
}
session_start();
session_destroy();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <div class="container" 
             style="width: 450px; 
                    margin: 180px 300px; 
                    border-radius: 43px 43px 43px 43px;
                    -moz-border-radius: 43px 43px 43px 43px;
                    -webkit-border-radius: 43px 43px 43px 43px;
                    border: 11px double #d1e2f0;
                    background-color: #e05351"  >
            <div style="text-align: center">
                <h3>Schedule Cadena IBS</h3>
                <form action="LoginFile.php" method="post">
                    <div class="container col-md-10 "style=" background: ;opacity: 0.8" >
                        <div class="row col-lg-6">
                            <div class="form-group" style="text-align: center">
                                <label>Nombre Usuario</label>
                                <input type="text" style="width: 350px" class="form-control" name="txtNombre" placeholder="">
                            </div>
                            <div class="form-group" style="text-align: center">
                                <label>Clave</label>
                                <input type="password" style="width: 350px; font-size: 15px" class="form-control" name="txtPass" placeholder="">
                            </div>
                            <div 
                                class="form-group" style="text-align: end">
                                <button type="submit" class="btn btn-primary mb-2">Ingresar</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>
