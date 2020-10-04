<!DOCTYPE html>
<html lang="en">
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
            
            

                <ul class= dch>
                    <li style = "float: right"><a href="login.php"> Login </a></li>
                </ul>
        </nav>   
    </div>
</body>
</html>