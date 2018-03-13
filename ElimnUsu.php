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

        <?php
        $enlace = new mysqli("localhost", "root", "", "pruebaprocesos");

        $cons = "SELECT * FROM usuario where id <> 1";
        $query = $enlace->query($cons);
        ?>
        <div class="container col-11"  >     
            <div class="row"style="width: 950; background-color:  white; text-align: center">
                <div class="row" >
                    <div class=" container col-11 "  >
                        <div style="text-align: center">
                            <h2 style="text-align: center"> Eliminar Usuario </h2>    
                        </div>
                        <form action="EliminUuFilm.php" method="post">
                            <div class="form-group">
                                <label>Usuarios</label>
                                <select class="form-control" name="cboUsuario" style="height: 34px">                                    
                                    <option value="00">Seleccione Usuario Para Eliminar</option> 
                                    <?php
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?> 
                                        <option value="<?php echo $row[0]; ?>"><?php echo $row[5]; ?></option> 
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary mb-2" id="btnver">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
    </body>
</html>