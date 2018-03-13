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
    </head>
    <body>
        <div class="container col-11"  >     
            <div class="row"style="width: 950; background-color:  white; text-align: center">
                <div class="row" >

                    <div class=" container col-11 "  >
                        <div style="text-align: center">
                            <h2 style="text-align: center"> Agregar usuario </h2>    
                        </div>

                        <form action="GuardarUsuario.php" method="post">
                            <div class="form-group">
                                <label>Nombres</label>
                                <input type="text" class="form-control" name="txtNombre" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Apellido Paterno</label>
                                <input type="text" class="form-control" name="txtApat" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Apellido Materno</label>
                                <input type="text" class="form-control" name="txtMater" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Usuario</label>
                                <input type="text" class="form-control" name="txtUsu" placeholder="" required="">
                            </div>
                            <div class="form-group">
                                <label>Clave</label>
                                <input type="password" class="form-control" name="txtPass" placeholder="" required="">
                            </div>

                            <div class="form-group">
                                <label>Tipo Usuario</label>
                                <select class="form-control" name="cboTipo" style="height: 34px">                                    
                                    <option value="1">Administrador </option> 
                                    <option value="2">Operador</option>       
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </body>
</html>


