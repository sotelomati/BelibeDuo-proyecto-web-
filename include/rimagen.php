<?php

session_start();
//crear una imagen
$imagen = imagecreate(100,35);
//color de fondo
$fondo= imagecolorallocate($imagen, 126, 2, 153);
$texto = imagecolorallocate($imagen,255,255,255);
//crear valor aleatorio
$aleatorio=rand(100000,999999);
//rellenar la imagen
ImageFill($imagen, 50, 0, $fondo);
//imprimir un texto a la imagen
imagestring($imagen,80,0,0,$_SESSION['palabra2'],$texto);
//imprimir la imagen
header('Content-type: image/png');
imagepng($imagen);


?>