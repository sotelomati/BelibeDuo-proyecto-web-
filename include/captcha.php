<?php 
 

class contenedor{
    public $letras;
    public $palabras;
    public $longitud;
    
    public function __construct($largo){
        $this->longitud = $largo;
        $this->letras = "abcdefghijklmnopqrstuvwxyz";
        $this->palabras = [
            0 => 'alfombra',
            1 => 'palabra',
            2 => 'tentaculo',
            3 => 'naruto',
            4 => 'programar',
            5 => 'develop',
            6 => 'servicio',
            7 => 'validar',
            8 => 'impresora',
            9 => 'teclado',
            10 => 'boruto',
            11=> 'argento',
            12 => 'fatiga',
            13 => 'joystick',
            14 => 'monitor',
            15 => 'vectorphp',
            16 => 'matesuli',
            17 => 'termo',
            18 => 'windows',
            19 => 'linux',
        ];

    }
    public function getPalabra(){
        $resultado = (array_rand($this->palabras));
    
        while(strlen($resultado) <= $this->longitud){
            return $this->palabras[$resultado];
            $resultado = [array_rand($this->palabras)];
        }
    }
    public function getAbecedario(){
        return $this->letras;
    }
    
}

class captchaMaker{
    private $abecedario;
    private $matriz;
    private $palabra;

    public function __construct(){
        $this->abecedario = new contenedor(9);
        //creacion de matriz berreta
        $this->matriz = array(
            array("","",""),
            array("","",""),
            array("","","")
        );


    }

    public function getPalabra(){
        
            return $this->palabra;
        
    }

    public function llenarMatriz(){
        $this->palabra = $this->abecedario->getPalabra();
        

        $palabraAux = $this->palabra;
            //compruebo longitud para la matriz
        if(strlen($this->palabra) < 9){
            $cont = 0;
            $aux = "";
            while((strlen($this->palabra) + $cont) < 9){
                
            $aux.= $this->abecedario->getAbecedario(){rand(0, strlen($this->abecedario->getAbecedario()))};
            $cont++;
            }
            $palabraAux.= $aux;
        }
         //desordeno la palabra
         $aux = $palabraAux;
         $palabraAux = str_shuffle($aux);
        $contador = 0;
        //la ubico en la matriz
        
            for($i = 0; $i <3; $i++){
                for($j = 0; $j <3; $j++){
                    $this->matriz[$i][$j] = $palabraAux[$contador];
                      
                    $contador+=1;
                }
                echo "<br>";
            }
    }

    public function imprimirMatriz(){
        $aux;
            echo '<section class="contenido">';
        for($i = 0; $i <3; $i++){
            for($j = 0; $j <3; $j++){
                ?>
                
                    <div class="captcha" name="captchaValue">
                    <?php
                        echo "".$this->matriz[$i][$j]
                    ?>
                    </div>
                
                <?php 
            }
        }
            echo '</div>';
    }

    public function refresh(){
        $this->llenarMatriz();
        $this->imprimirMatriz();
        //$palabraToImage = $this->getPalabra();
        //require_once  'rimagen.php';
    }

}

class captchaValidator{
    private $original;
    private $letras;
    private $contador;
    private $limite;

    public function __construct(){
        $this->original="";
        $this->letras="       ";
        $this->contador = 0;
        $this->limite= 0;
    }
    public function setPalabra($captcha){
        $this->original = $captcha;
        $this->limite = strlen($this->original);
        unset($this->letras);
        $this->contador = 0;
    }
    public function getLongitud(){
        return strlen($this->original);
    }
    private function validarCaptcha(){
         if($this->letras == $this->original){
            cambiarPagina("logueado.php");
         }
    }
    public function setLetra($letra){
        if( $this->contador < $this->limite){
            $this->letras[$this->contador]=$letras;
            $this->contador++;
        }
        else{
            $this->validarCaptcha();
        }
    }
}

function cambiarPagina($ruta){
    header("location: http://localhost/loginPA/".$ruta);
}

$captchaMaker = new captchaMaker();
$captchaValidator = new captchaValidator();

//lleno la matriz y pongo la palabra en validador

$captchaMaker->refresh();
$captchaValidator->setPalabra($captchaMaker->getPalabra());


$contador = 0;
$letraAux;
$cosa =$captchaValidator->getLongitud();
echo $cosa;

//no funciona aun
if(isset($_POST['captchaValue'])){
        
    $letraAux = $_POST['captchaValue'];
    echo $cosa;
    $captchaValidator->setLetra($letraAux);
}

/*while($contador < $cosa){
    
    if(isset($_POST['captchaValue'])){
        
        $letraAux = $_POST['captchaValue'];
        $captchaValidator->setLetra($letraAux);
        $contador++;
    }
    
}*/











?>

