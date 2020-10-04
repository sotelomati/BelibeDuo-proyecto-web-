
<?php 
session_start();
 


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
    private $validador;

    public function __construct($captchaValidator){
        $this->abecedario = new contenedor(9);
        //creacion de matriz berreta
        $this->matriz = array(
            array("","",""),
            array("","",""),
            array("","","")
        );
        $this->validador = $captchaValidator;
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
        $aux = 1;
            ?>
                <div class="contenedorCaptcha" id="contenedorMatriz" >
                    
                    <div class="contenedorMatriz">
                    
                    <?php
                        for($i = 0; $i <3; $i++){
                            for($j = 0; $j <3; $j++){
                                
                                ?>
                                <button  class="captcha" id="<?php echo $aux; ?>" value="<?php echo "".$this->matriz[$i][$j];?>" onclick="recibir(<?php echo $aux; ?>);"><?php echo "".$this->matriz[$i][$j];?></button>
                                <?php
                                $aux++;
                            }
                        }
                        
                        $palabrita = $this->getPalabra();
                        $_SESSION['palabra2'] = $palabrita;
                    ?>
                        
                    <!--LLAMADA A LA IMAGEN-->

                    <img src="include/rimagen.php"/>


                    <script type="text/javascript">
                    largo = "<?php echo strlen($this->getPalabra());?>";
                    
                    </script>
                    
                    </div>
                    <div class="contenedorBotonesCaptcha">
                        <div class="contenedorPalabra">
                            <?php
                                //  IMPRIME DONDE SE ESCRIBE LA PALABRA
                                for($i = 0; $i < strlen($this->getPalabra()); $i++){
                                    ?>
                                    
                                    <div  class="letra" id="<?php echo "letra".$i; ?>" value="" onclick=""></div>
                                    <?php
                                    $aux++;
                                }
                            ?> 
                        </div>
                        <button>
                            <i style="font-size: 40px; background-color: transparent; padding: 5px;" class="fas fa-sync" onclick="refrescar();"></i>
                        </button>

                        <button class="buttonsTiny">
                            Validar
                        </button>
                    </div> 
                </div>     
            
            <?php


               
            
    }
    public function refresh(){
        //$palabraToImage = $this->getPalabra();
        //require_once  'rimagen.php';
        $this->llenarMatriz();
        $this->imprimirMatriz();

    }


}

class captchaValidator{
    private $resultado;
    private $original;
    private $letras;
    private $contador;
    private $limite;

    public function __construct(){
        $this->original="";
        $this->letras="";
        $this->contador = 0;
        $this->limite= 0;
    }
    public function getResultado(){
        return ($resultado == 1);
    }
    public function setPalabra($captcha){
        $this->original = $captcha;
        $this->limite = strlen($this->original);
        unset($this->letras);
        $this->contador = 0;
    }
    public function getLongitud(){
        $this->comJsLongitud(strlen($this->original));
        return strlen($this->original);

    }

    private function comJsLongitud($long){
        debug_to_console("ya mande las cosas");
        $probando =  [$long];
        $largo = json_encode($probando);
        echo $largo;
        return $largo;
        //echo "caca";
        
    }

    private function validarCaptcha($final){
         if($final == $this->original){
            $_SESSION['resultado'] = 1;
            debug_to_console('psitivo');
         }
         else{
            $_SESSION['resultado'] = 0;
             debug_to_console("Fallaste crack");
         }
    }
}




$captchaValidator = new captchaValidator();
$captchaMaker = new captchaMaker($captchaValidator);

//lleno la matriz y pongo la palabra en validador

$captchaMaker->refresh();
$captchaValidator->setPalabra($captchaMaker->getPalabra());


$contador = 0;
$letraAux;
$cosa =$captchaValidator->getLongitud();
echo $cosa;

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

debug_to_console($cosa);
debug_to_console($captchaMaker->getPalabra());

function llamarval($pal){
    $captchaValidator->validarCaptcha($pal);
}



    if(isset($POST['refrescame']) == 1)
    {
        $captchaMaker->refresh();
    }

    if(isset($POST['palabra']) != "" )
    {
        debug_to_console("la palabra es : ".$POST['palabra']);
        $captchaValidator->validarCaptcha($POST['palabra']);
        if($captchaValidator->getResultado()){
            $host= $_SERVER["HTTP_HOST"];
            $url= $_SERVER["REQUEST_URI"];
            cambiarPagina("logueado.php");
        }
    }

    


  







?>

