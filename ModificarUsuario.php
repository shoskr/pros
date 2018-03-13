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
        <script>
            //Primero
            $(document).ready(function (event) {
                $("#btnver").click(function () {
                    $("#txtRegistro").val("VER");
                    $.ajax({
                        type: "POST",
                        url: "usuModi.php",
                        data: $("#formu").serialize(),
                        success: function (data) {
                            $("#encon").html(data);
                        }
                    });
                })
            });

        </script>


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
                            <h2 style="text-align: center"> Modificar usuario </h2>    
                        </div>
                        <form id="formu">
                            <div class="form-group">
                                <label>Usuarios</label>
                                <select class="form-control" name="cboUsuario" style="height: 34px">                                    
                                    <option value="00">Seleccione Usuario Para Modificar</option> 
                                    <?php
                                    while ($row = mysqli_fetch_array($query)) {
                                        ?> 
                                        <option value="<?php echo $row[0]; ?>"><?php echo $row[5]; ?></option> 
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <input type="hidden" name="txtRegistro" id="txtRegistro" value="" />
                            <input type="button" class="btn btn-primary mb-2" id="btnver" value="VER"/>
                        </form>
                    </div>
                </div>
            </div>
            <div>

            </div>
            <div class="row" style="width: 950; background-color:  white; text-align: center">
                <div id="encon" class=" container col-11 " >     

                </div>



            </div>
        </div>

    </body>
</html>

