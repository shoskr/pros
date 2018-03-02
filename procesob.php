<?php
include './Home.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            table-fixed thead { 
                ancho: 100%; 
            } 
            .table-fixed tbody { 
                height: 300px; 
                overflow-x: auto; 
                overflow-y: auto; 
                ancho: 99%; 
            } 
            .table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th { 
                display: block; 
            } 
            .table-fixed tbody td, .table-fixed thead> tr> th { 
                display: inline-block; 
                border-bottom-width: 1; 
            }

        </style>
    </head>
    <body>
        <?php
        $enlace = new mysqli("localhost", "root", "", "pruebaprocesos");
        $sql = $enlace->query("SELECT * FROM proceso");
        ?>
        <div class="container col-11"  >     
            <div class="row"style="width: 950; background-color:  white; text-align: center">
                <div class="row">
                    <div class=" container "  >  
                        <form action="pros.php" method="post">
                            <table class="table table-fixed " style="font-size: small">
                                <thead>
                                    <tr>
                                        <th style="width: 20px">#</th>
                                        <th style="width: 300px">Nombre Proceso</th>
                                        <th style="width: 500px">Descripcion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    while ($row = mysqli_fetch_array($sql)) {
                                        ?>  
                                        <tr>
                                            <td style="width: 20px" ><input type="radio" name="id" value="<?php echo $row[0] ?>" /> </td>
                                            <td style="width: 300px" ><?php echo $row[1] ?></td>
                                            <td style="width: 300px" ><?php echo $row[4] ?></td
                                        </tr>
                                        <?php
                                    }
                                    ?>  
                                        <tr><input type="submit" value="ver" name="ver"/> </tr>
                                </tbody>
                            </table>





                        </form>
                    </div>
                </div>
            </div>
        </div>

    </body>
</html>
