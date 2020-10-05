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
    
    

        <ul class= dch>
            
             <?php 
                $url= $_SERVER["REQUEST_URI"];
                $remplazar =""; //variable que se mostrara en la esquina superior derecha
                $ruta= ""; 
                
                if(($url == "/loginPA/index.php") OR ($url == "/loginPA/")){
                    $remplazar= "Login";
                    $ruta="login.php";
                }
                elseif($url == "/loginPA/logueado.php"){
                    $remplazar = "Log Out";
                    $ruta="index.php";
                }
                else{
                    $remplazar = "";
                }
                
                
            ?>

            <a href=<?php echo $ruta; ?>>
                <li> <?php echo $remplazar; ?></li>
            </a>
                <div class="prueba">
                <i class="fas fa-bars"></i>
                </div>
        </ul>
</nav>   
</div>
</body>
</html>