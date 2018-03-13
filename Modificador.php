<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container col-11"   >     
            <div class="row"style="width: 950; background-color:  white; text-align: center">
                <div class="row" col-8>
                    <div class=" container col-11 "  >
                        <div style="text-align: center">
                            <h2 style="text-align: center"> Modificar Proceso </h2>    
                        </div>
                        <?php
                        $enlace = new mysqli("localhost", "root", "", "pruebaprocesos");
                       
                        $codigo = $_POST["id"];
                        $consulta2 = "SELECT * FROM proceso where codigo = ".$codigo ;
                        $sql2 = $enlace->query($consulta2);
                        $file = $sql2->fetch_assoc();
                        ?> 
                        <div class=" container col-12  " >
                            <form action="Modi.php" method="post">
                                <div class="form-group">
                                    <label>Nombre Proceso</label>
                                    <input type="hidden" name="id" value="<?php echo $file['codigo']; ?>" />
                                    <input type="text" class="form-control" name="txtNombre" value="<?php echo $file['nombre']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Proceso Padre</label>
                                     <?php
                                        $consulta3 = "SELECT * FROM proceso where codigo = " . $file['padre'];
                                        $sql3 = $enlace->query($consulta3);
                                        $file2 = $sql3->fetch_assoc();
                                        ?>
                                    <select class="form-control" name="cboPad" style="height: 34px">
                                       
                                        <option value="<?php  echo $file2['codigo']; ?>"><?php  echo $file2['nombre']; ?>  </option>
                                        <option value="00"> </option>
                                        <?php
                                        $consulta = "SELECT * FROM proceso ";
                                        $sql = $enlace->query($consulta);
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
                                    <input type="text" class="form-control" name="txtDes" value="<?php echo $file['descripcion']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Responsable</label>
                                    <input type="text" class="form-control" name="txtRes" value="<?php echo $file['responsable']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Pais</label>
                                    <input type="text" class="form-control" name="txtPais" value="<?php echo $file['pais']; ?>">
                                </div>
                                <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                            </form>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
