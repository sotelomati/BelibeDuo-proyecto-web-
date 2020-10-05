<?php
session_start();


/***********************************************************************************/


$image = imagecreatetruecolor(140, 60);
 
imageantialias($image, true);
 
$colors = [];
 
$red = rand(125, 175);
$green = rand(125, 175);
$blue = rand(125, 175);
 
for($i = 0; $i < 5; $i++) {
  $colors[] = imagecolorallocate($image, $red - 20*$i, $green - 20*$i, $blue - 20*$i);
}
 
imagefill($image, 0, 0, $colors[0]);
 
for($i = 0; $i < 10; $i++) {
  imagesetthickness($image, rand(2, 10));
  $rect_color = $colors[rand(1, 4)];
  imagerectangle($image, rand(-10, 190), rand(-10, 10), rand(-10, 190), rand(40, 60), $rect_color);
}

$fonts = [dirname(__FILE__).'\fuentes\Nunito-BoldItalic.ttf'];
$black = imagecolorallocate($image, 0, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);
$textcolors = [$black, $white];
$digitos = ["0","1","2","3","4","5","6","7","8","9","a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
$str = "";

/***********************************************************************************/
  $guardar= "";
  for($i = 0; $i < 5; $i++) {
      $letter_space = 100/4;
      $initial = 15;
      
      $let=$digitos{rand(0, 61)};
      $str.=$let;
      $guardar = $str;
      imagettftext($image, 20, rand(-15, 15), $initial + $i*$letter_space, rand(20, 40), $textcolors[rand(0, 1)], $fonts[array_rand($fonts)], $let);
  
  }
        
    
  $guardar =  md5( $guardar);
  $_SESSION['palabra2'] = $guardar;
header ('Content-Type: image/png');
imagepng($image);
imagedestroy($image);


?>