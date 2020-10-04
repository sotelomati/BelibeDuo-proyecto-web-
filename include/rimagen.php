<?php

session_start();
//crear una imagen
$imagen = imagecreate(150,50);
//color de fondo
$fondo= imagecolorallocate($imagen, 9, 132, 227);
$texto = imagecolorallocate($imagen,255,255,255);
//crear valor aleatorio
$aleatorio=rand(100000,999999);
//rellenar la imagen
ImageFill($imagen, 50, 0, $fondo);
//Fuente para imagen
//$fuente = imageloadfont('estilos/fuentes/PosterChild.ttf');
//imprimir un texto a la imagen
imagestring($imagen,5,35,10,$_SESSION['palabra2'],$texto);
//imprimir la imagen
header('Content-type: image/png');
imagepng($imagen);


?>