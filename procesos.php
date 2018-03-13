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
                        url: "verProce1.php",
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
        $sql = $enlace->query("SELECT * FROM proceso where nivel = 1");
        ?>
        <div class="container col-11"  >     
            <div class="row"style="width: 950; background-color:  white; text-align: center">
                <div class="row">
                   
                    <div class=" container col-6 "  >
                        <form id="formu">
                            <table class="table tab-content row">
                                <td>
                                    <select name="list" class="list-group-item-action" style="height: 30px; width: 300px" >
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

                                </td>
                                <td>
                                    <input type="button" class="btn btn-success  " value="VER SUCESOR" id="btnver" style="width: 130px; height: 30px;  " />
                                </td>
                            </table>
                            <input type="hidden" name="txtRegistro" id="txtRegistro">
                        </form>
                    </div>

                    <div id="muestra" class="container table-hover" >

                    </div>
                    <div id="encon" class="container table-hover" >

                    </div>

                </div>
            </div>
        </div>

    </body>
</html>

