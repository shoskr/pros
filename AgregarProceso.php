<?php
include './Home.php';
if(isset($_GET['mensaje'])){
    echo "<script>alert(".$_GET["mensaje"].");</script>";
    
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
                            <h2 style="text-align: center"> Agregar Proceso </h2>    
                        </div>

                        <form action="agrega.php" method="post">
                            <div class="form-group">
                                <label>Nombre Proceso</label>
                                <input type="text" class="form-control" name="txtNombre" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Proceso Padre</label>
                                <select class="form-control" name="cboPad" style="height: 34px">
                                    <?php
                                    $enlace = new mysqli("localhost", "root", "", "pruebaprocesos");
                                    $consulta = "SELECT * FROM proceso ";
                                    $sql = $enlace->query($consulta);
                                    ?>                                   
                                        <option value="00">  </option>
                                        <?php
                                        while ($row = mysqli_fetch_array($sql)) {
                                            ?>  
                                            <option  value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?> </option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                            </div>

                            <div class="form-group">
                                <label>Descripcion</label>
                                <input type="text" class="form-control" name="txtDes" placeholder="">
                            </div>
                            
                            <div class="form-group">
                                <label>Responsable</label>
                                <input type="text" class="form-control" name="txtRes" placeholder="">
                            </div>
                          
                            <div class="form-group">
                                <label>Pais</label>
                                <input type="text" class="form-control" name="txtPais" placeholder="">
                            </div>
                             <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </body>
</html>
