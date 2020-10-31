<?php
class Amadeuz{
    private $estanteria;
    private $cantidad;


    public function __construct($idUser){
        $this->cantidad = 0;
        $con = new mysqli('127.0.0.1','lectura','leyendoPA', 'trabajopractico1');
        if(empty($idUser)){
            if($con ->connect_errno){
                echo "<p class='error'>* falla coneccion base de datos</p>";    
            }else{
    
                $leeJuegos = "SELECT `Id_juego`, `nombre`, `descripcion` FROM `juegos`";
                $resultado = mysqli_query($con, $leeJuegos);
                $i=0;
            if($resultado){
                while($row = $resultado->fetch_array()){
                    $oJuego = new Juego($row['Id_juego'], $row['nombre'], $row['descripcion']);
                    $this->estanteria[$i]=$oJuego;
                    $i++;
                    $this->cantidad++;
                    }
                }
                $con->close();
            }
        }else{
            if($con ->connect_errno){
                echo "<p class='error'>* falla coneccion base de datos</p>";    
            }else{
                $leeJuegos = "SELECT juegos.Id_juego, nombre, descripcion FROM usuario_juego INNER JOIN juegos ON usuario_juego.id_juego = juegos.Id_juego WHERE usuario_juego.id_usuario LIKE '$idUser'";
                $resultado = mysqli_query($con, $leeJuegos);
                $i=0;
            if($resultado){
                while($row = $resultado->fetch_array()){
                    $oJuego = new Juego($row['Id_juego'], $row['nombre'], $row['descripcion']);
                    $this->estanteria[$i]=$oJuego;
                    $i++;
                    $this->cantidad++;
                    }
                }
                $con->close();
            }
        }
        
    }   

    public function mostrarGaleria(){
        for($i = 0; $i < $this->cantidad; $i++){
            $this->estanteria[$i]->mostrar();
        }
    }

    public function mostrarGaleriaPersonal(){
        for($i = 0; $i < $this->cantidad; $i++){
            $this->estanteria[$i]->mostrarPersonal();
        }
    }

    public function buscarJuego($idJuego){
        for($i = 0; $i < count($this->estanteria); $i++){
            if($this->estanteria[$i]->getAcronimo() == $idJuego){
                return $this->estanteria[$i];
            }
        }
        return NULL;
    }
}

class Juego{
    private $acronimo;
    private $nombre;
    private $categoria;
    private $descripcion;


    public function __construct($acronimoJuego, $nombreJuego, $categoriaDescripcion){
        $this->acronimo = $acronimoJuego;
        $this->nombre = $nombreJuego;
        $this->descripcion = $categoriaDescripcion;
        
        debug_to_console($this->acronimo);
        $this->setCategoria();
    }

    public function getAcronimo(){
        return $this->acronimo;
    }

    public function setCategoria()
    {
        $con = new mysqli('127.0.0.1','lectura','leyendoPA', 'trabajopractico1');

        if($con ->connect_errno){
            echo "<p class='error'>* falla coneccion base de datos</p>";    
        }else{
            $traeCategorias = "SELECT categoria.descripcion FROM juegos_categoria
            INNER JOIN categoria
            ON juegos_categoria.id_categoria = categoria.id_categoria
            WHERE id_juego LIKE '$this->acronimo'";
            $categorias =  mysqli_query($con, $traeCategorias);

            $vector;
            $i = 0;
            while($fila = $categorias->fetch_array()){
                $vector[$i] = $fila['descripcion'];
                $i++;
                $vector[$i] = ' | ';
                $i++;
            }
            $vector[$i-1] = ' '; //saco la barra | que esta de mas
            $this->categoria = $vector;
            $con->close();

        }
    }

    public function mostrar(){
        $urlimagen= "estilos/images/imagenjuegos/".$this->acronimo.".jpg";
        echo '
        <form class="frame" action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="post" >
            <div class="juego" style= "background-image: url('.$urlimagen.')">
                <h1>'.$this->nombre.'</h1>
                <p>'.$this->descripcion.'</p>';
                $this->muestraCategorias();

            echo'</div>
            <input class="buttons" type="submit" id="'.$this->acronimo.'" name="'.$this->acronimo.'" value="Detalles">
        </form>
        ';
    }

    public function mostrarPersonal(){
        $urlimagen= "estilos/images/imagenjuegos/".$this->acronimo.".jpg";
        echo '
        <form class="framePersonal" action="'.htmlspecialchars($_SERVER['PHP_SELF']).'" method="POST" >
            <div style=" space-between: justify: margin:auto;display: flex; text-align: center;";>
                <div style=" margin:auto;">
                    <h1>'.$this->nombre.'</h1>
                    <input name="juegoToDelete" method="POST" type="hidden" value="'.$this->acronimo.'">
                    ';$this->muestraCategorias();
                echo'</div>
                    <div style=" margin:auto;">
                    <input action="objetos\procesos\deleteJuego.php" style=" right: 10px; width: 30px;"; class="butonDelete" method="POST" src="estilos/images/extras/delete.png" type="image" name="deleteJuego">
                    </div>
            </div>
        </form>
        ';
    }

    private function muestraCategorias(){
        for($i = 0; $i < count($this->categoria); $i++){
             echo'<a  onclick=mostrarCategoria("'.$this->categoria[$i].'");">'.$this->categoria[$i].'</a>';
        }
    }

}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


?>