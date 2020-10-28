<?php
class Amadeuz{
    private $estanteria;
    private $cantidad;


    public function __construct(){
        $this->cantidad = 0;
        $con = new mysqli('127.0.0.1','lectura','leyendoPA', 'trabajopractico1');

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
    }

    public function mostrarGaleria(){
        for($i = 0; $i < $this->cantidad; $i++){
            $this->estanteria[$i]->mostrar();
        }
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

    public function setCategoria()
    {
        $con = new mysqli('127.0.0.1','lectura','leyendoPA', 'trabajopractico1');

        if($con ->connect_errno){
            echo "<p class='error'>* falla coneccion base de datos</p>";    
        }else{
            $traeCategorias = "SELECT categoria.descripcion FROM juegos_categoria
            INNER JOIN categoria
            ON juegos_categoria.id_categoria = categoria.id_categoria
            WHERE id_juego LIKE 'CSGO'";
            $categorias =  mysqli_query($con, $traeCategorias);

            $vector;
            $i = 0;
            while($fila = $categorias->fetch_array()){
                $vector[$i] = $fila['descripcion'];
                
                $i++;
            }
            $this->categoria = $vector;
            $con->close();

        }
    }

    public function mostrar(){
        $urlimagen= "estilos/images/imagenjuegos/".$this->acronimo.".jpg";
        echo '
        <div class="juego" style= "background-image: url('.$urlimagen.')">
            <h1>'.$this->nombre.'</h1>
            <p>'.$this->descripcion.'</p>
            <p>'.$this->muestraCategorias().'</p>
            <input class="buttons" type="submit" id="juego1" name="detalles" value="Detalles">
        </div>
        ';
    }

    private function muestraCategorias(){
        $resultado = "";
        for($i = 0; $i < count($this->categoria); $i++){
            $resultado .= $this->categoria[$i];
            $resultado .= "
            ";
        }
        return $resultado;
    }

}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}


?>