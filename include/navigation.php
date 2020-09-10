<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="contenedorNav">
        <nav class="navegacion">
            <ul>
                    <li>
                        <i class="fas fa-blog" style="font-size: 40px; float: left"></i>
                    </li>

                <a href="index.php">
                <li>Home</li>
                </a>
                <a href="#"></a>

                <a href="#">
                <li>More</li>
                </a>

                <hr class="lineaNav">
            </ul>    

            

                <ul class= dch>
                    <a href="login.php" link="login.php">
                        <?php 
                        $url= $_SERVER["REQUEST_URI"];
                        
                        if(($url == "/loginPA/index.php") OR ($url == "/loginPA/")){
                            $remplazar= "Login";
                        }
                        elseif($url == "/loginPA/logueado.php"){
                            $remplazar = "Log Out";
                        }
                        else{
                            $remplazar = "";
                        }
                        
                        
                        ?>

                        <li class="dch"  style=" right: 100px;"> <?php echo $remplazar; ?></li>
                       
                    </a>
                </ul>
        </nav>   
    </div>
</body>
</html>