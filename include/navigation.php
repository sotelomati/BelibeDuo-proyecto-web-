<!DOCTYPE html>
<html lang="en" style="min-height: 100%; position: relative;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>   
    <ul class="menuLeft" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

        <a href="index.php">
        <li>Home</li>
        </a>
        <a href="#"></a>

        <a href="#">
        <li>More</li>
        </a>
    </ul>

    <div class="contenedorNav">
        
        <nav class="navegacion">
            
            <li>
                <i class="fas fa-blog" style="font-size: 40px; float: left"></i>
            </li>
            <!--CELULAR-->
            <ul class="menuLeft_borrar">
                <a href="index.php">
                <li>Home</li>
                </a>
                <a href="#"></a>

                <a href="#">
                <li>More</li>
                </a>

                <!--<hr class="lineaNav">-->
            </ul>
            <!--FIN CELULAR-->   
            
            <?php
            $accion = "";
            $rutaAccion = "";
            $imgLogin = "";
            $imgLogout = "";
            if(isset($_SESSION['sesionMostrar'])){
                if($_SESSION['sesionMostrar'] != "No logueado"){
                    $accion = "Logout";
                    $rutaAccion= "php/cerrarSesion.php";
                    $imgLogin = '<img style="width: 35px;" src="estilos\images\extras\logOut.png" alt="">';
                }
                else{
                    $accion = "Login";
                    $rutaAccion= "login.php";
                    $imgLogout = '<img style="width: 35px;" src="estilos\images\extras\logIn.png" alt="">';
                }
                
            }
            ?>
                <ul class= dch>
                    <li style = "float: right; font-size: 15px;">Usuario:<a href= "inicio.php" style="font-size: 15px;"> <?php echo $_SESSION['sesionMostrar']; ?></a></li> <br>
                    <li style = "float: right"><?php echo $imgLogin; ?><a href= <?php   echo $rutaAccion; ?> src=""> <?php echo $accion; ?><?php echo $imgLogout; ?></a></li>
                </ul>
        </nav>   
    </div>
</body>
</html>