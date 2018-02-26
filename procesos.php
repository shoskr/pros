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
                    $("#txtRegistro").val("VER");
                    $.ajax({
                        type: "POST",
                        url: "verProce1.php",
                        data: $("#formu").serialize(),
                        success: function (data) {
                            $("#muestra").html(data);
                        }
                    });
                })
            });

        </script>
        <?php
        $enlace = new mysqli("localhost", "root", "", "pruebaprocesos");
        $sql = $enlace->query("SELECT * FROM proceso where nivel = 1");
        ?>
        <div class="container col-11"  >     
            <div class="row"style="width: 950; background-color:  white; text-align: center">
                <div class="row">
                    <div class=" container col-5 "  >
                        <form id="formu">
                            <table class="table tab-content row">
                                <td>
                                    <select name="list" class="embed-responsive-16by9" style="height: 30px" >
                                        <?php
                                        while ($row = mysqli_fetch_array($sql)) {
                                            ?>  
                                            <option value="<?php echo $row[0]; ?>"><?php echo $row[1]; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </td>
                                <td>
                                    <p>__</p>
                                </td>
                                <td>
                                    <input type="button" class="btn btn-success  " value="VER" id="btnver" style="width: 80px; height: 30px;  " />
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

