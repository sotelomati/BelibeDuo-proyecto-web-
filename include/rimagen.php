<?php

session_start();

$fonts = [dirname(FILE).'estilos\fuentes\PosterChild.ttf'];
 
$string_length = 6;
$palabra = generate_string( $string_length);


//$palabra = "pruebas";
//crear una imagen
$imagen = imagecreate(150,50);
//color de fondo
$fondo= imagecolorallocate($imagen, 9, 132, 227);
$texto = imagecolorallocate($imagen,255,255,255);
//crear valor aleatorio

//rellenar la imagen
ImageFill($imagen, 50, 0, $fondo);
//Fuente para imagen

imagettftext($image, 20, rand(-15, 15), $initial + $i*$letter_space, rand(20, 40), $textcolors[rand(0, 1)], $fonts, $palabra);
//imprimir un texto a la imagen
setcookie('captcha', $palabra, time()+60*3);
$guardar =  md5( $palabra);
$_SESSION['palabra2'] = $guardar;
imagestring($imagen, 80 ,35,10, $palabra,$texto);
//imprimir la imagen
header('Content-type: image/png');
imagepng($imagen);



  
function generate_string( $strength = 5) {
    $input = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
  
    return $random_string;
}


?>