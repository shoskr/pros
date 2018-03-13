<?php
session_start();
include_once './index.php';
if (isset($_GET['mensaje'])) {
    echo "<script>alert(" . $_GET["mensaje"] . ");</script>";
}

if (!isset($_SESSION['usuario'])) {
    header("Location:login.php?mensaje='Usuario No Ingresado'");
} else {
    $tipo = $_SESSION['Tipo'];
    $nombre = $_SESSION['usuario'];
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <style>
            .sidenav {
                height: 100%; /* 100% Full-height */
                width: 200px; /* 0 width - change this with JavaScript */
                position: fixed; /* Stay in place */
                z-index: 1; /* Stay on top */
                top: 0;
                left: 0;
                background-color: red; /* */
                overflow-x: hidden; /* Disable horizontal scroll */
                padding-top: 1px; /* Place content 60px from the top */
                transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */
            }

            /* The navigation menu links */
            .sidenav a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 15px;
                font-style: oblique;
                font-family: sans-serif;
                color: #f2f2f2;    
                display: block;
                transition: 0.3s
            }

            /* When you mouse over the navigation links, change their color */
            .sidenav a:hover, .offcanvas a:focus{
                color: #f1f1f1;
            }

            /* Position and style the close button (top right corner) */
            .sidenav .closebtn {
                position: absolute;
                top: 0;
                right: 25px;
                font-size: 25px;
                margin-left: 30px;
            }

            /* Style page content - use this if you want to push the page content to the right when you open the side navigation */
            #main {
                transition: margin-left .5s;
                padding: 20px;
                overflow:hidden;
                width:100%;
            }
            body {
                overflow-x: hidden;
            }

            /* Add a black background color to the top navigation */
            .topnav {
                background-color: red;
                overflow: hidden;
            }

            /* Style the links inside the navigation bar */
            .topnav a {
                float: left;
                display: block;
                color: #f2f2f2;
                text-align: center;
                padding: 15px 15px;
                text-decoration: none;
                font-size: 17px;
            }

            /* Change the color of links on hover */
            .topnav a:hover {
                background-color: #ddd;
                color: red;
            }

            /* Add a color to the active/current link */
            .topnav a.active {
                background-color: #4CAF50;
                color: white;
            }

            /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
            @media screen and (max-height: 450px) {
                .sidenav {padding-top: 15px;}
                .sidenav a {font-size: 18px;}
            }

            a svg{
                transition:all .5s ease;

                &:hover{
                    #transform:rotate(180deg);
                }
            }

            #ico{
                display: none;
            }

            .menu{
                background: #000;
                display: none;
                padding: 5px;
                width: 320px;
                @include border-radius(5px);

                #transition: all 0.5s ease;

                a{
                    display: block;
                    color: #fff;
                    text-align: center;
                    padding: 10px 2px;
                    margin: 3px 0;
                    text-decoration: none;
                    background: #444;

                    &:nth-child(1){
                        margin-top: 0;
                        @include border-radius(3px 3px 0 0 );
                    }
                    &:nth-child(5){
                        margin-bottom: 0;
                        @include border-radius(0 0 3px 3px);
                    }

                    &:hover{
                        background: #555;
                    }
                }
            }

        </style>
    </head>
    <script>
        function openNav() {
            document.getElementById("sideNavigation").style.width = "200px";
            document.getElementById("main").style.marginLeft = "250px";
        }

        function closeNav() {
            document.getElementById("sideNavigation").style.width = "0";
            document.getElementById("main").style.marginLeft = "0";
        }
    </script>
    <body onload="closeNav()">
       
        <div style="">
            <header>
                <nav class="topnav " style="height: 50px">
                    <a href="javascript:void(0)" onclick="openNav()">
                        <svg width="30" height="30" id="icoOpen">
                        <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
                        <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
                        <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
                        </svg>
                    </a>
                    <ul class="nav justify-content-end col-11">
                        <li class="nav nav-light" style="">
                            <?php
                            if ($tipo == 1) {
                                echo '<li class = "nav-light" style = " background-color: red; color: #025aa5">';
                                echo '<a class = "nav-link  " href = "HomeAdm.php" style = "font-family: fantasy" >Controladores</a>';
                                echo '</li>';
                            }
                            ?>
                        </li>
                        <li class="nav nav-light " >
                            <a class="nav-link " style="font-family: fantasy"href="login.php">Cerrar</a>
                        </li>
                    </ul>
                </nav>
                <div>
                    <nav>
                        <ul class="nav justify-content-end" >
                            <li class="nav nav-light"  style="color: black; font-family: cursive" >
                                <?php
                                echo '<h4 style=" margin: 5px 100px 10px" > Usuario : ' . $nombre . '</h4>';
                                ?>
                            </li>
                        </ul>
                    </nav>
                </div>
            </header>
        </div>
        <div id="sideNavigation" class="sidenav" onmouseout="">
            <li class="nav-light" style=" background-color: red; color: #025aa5">
                <a href="#" class="closebtn" style="font-size: 15px; font-weight: bolder; color: blue" onclick="closeNav()">Cerrar &times;</a>
            </li>

            <li class="nav-light" style=" background-color: red; color: #025aa5">
                <img src="img/logoScoti.gif" style="width: 150px;height: 130px; padding: 15px"/>
            </li>
            <div>
                <li class="nav-light" style=" background-color: red; color: #025aa5">
                    <a class="nav-link  " href="procesos.php" style="font-weight: bolder" >Procesos</a>
                </li>
                <li class="nav-light" style=" background-color: red; color: #025aa5;">
                    <a class="nav-link " href="procesob.php" style="font-weight: bolder" > Cadena Proceso</a>
                </li>
                <li class="nav-light" style=" background-color: red; color: #025aa5 ">
                    <a class="nav-link" href="ListarProce.php" style="font-weight: bolder" >Listado de Procesos</a>
                </li>

            </div>
        </div>

    </body>
</html>
