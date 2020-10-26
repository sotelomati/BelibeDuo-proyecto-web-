<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once  'include/head.php'; ?>
    <title>Principal</title>
</head>
<body class="body">
    <div class="galeria">
        <div class="contenedorJuegos">
                    <?php
                        //LLAMADA A LA BASE DE DATOS
                        /*
                        foreach($juegos as $juego){
                            echo '<div class="juegos"> <h1>'.$juego[0]'</h1></div>'
                        }*/
                        /*/////////////////////////////////////////////////////////////////////////////////
                         include 'modelos/clasejuego.php';
                        if($resultado){
                            while($row = $resultado->fetch_array()){
                                $nombre = $row['nombre'];
                                $descripcion1 = $row['descripcion'];
                                $descripcion2 = $row['tipo'];
                                $oJuego = new Juego($nombre, $descripcion2, $descripcion1);
                                /*$oJuego->setNombre($nombre);
                                $oJuego->setCategoria($descripcion2);
                                $oJuego->setDescripcion($descripcion1);*/
                                $vectorJuegos[$i]=$oJuego;
                                $i++;
                                ?>
                                <div class="juego">
                                    <h1><?php echo $nombre; ?></h1>
                                    <p><?php echo $descripcion1 ?></p>
                                    <p><?php echo $descripcion2 ?></p>
                                    <input class="buttons" type="submit" id="juego1" name="detalles" value="Detalles">
                                </div>
                                <?php
                            }
                        *//////////////////////////////////////////////////////////////////////////////////
                        $con = new mysqli('127.0.0.1','lectura','leyendoPA', 'trabajopractico1');

                        if($con ->connect_errno){
                            echo "<p class='error'>* falla coneccion base de datos</p>";    
                        }else{
    
                            $leeJuegos = "SELECT `Id_juego`, `nombre`, `descripcion` FROM `juegos`";
                            $juegos = mysqli_query($con, $leeJuegos);
                            $fila = mysqli_fetch_row($juegos);

                            foreach($fila as $juego){
                            $traeCategorias = 'SELECT categoria.descripcion FROM juegos_categoria
                                            INNER JOIN categoria
                                            ON juegos_categoria.id_categoria = categoria.id_categoria
                                            WHERE id_juego LIKE CSGO';
                            $categorias =  mysqli_query($con, $traeCategorias);
                            $filaCategorias = mysqli_fetch_row($categorias);
                            echo '<div class="juegos"> <h1>'.$juego[1]'</h1>
                            <p>
                            Descripcion: caca    
                            </p>
                            'foreach($filaCategorias as $category){
                                    echo "".$category;
                            }'
                            </div>'
                            }
                        /*3
                        SELECT juegos.nombre, categoria.descripcion, juegos.descripcion FROM `juegos_categoria` 
                        INNER JOIN juegos
                        ON juegos_categoria.id_juego = juegos.Id_juego
                        INNER JOIN categoria
                        ON juegos_categoria.id_categoria = categoria.id_categoria

                        SELECT categoria.descripcion FROM juegos_categoria
INNER JOIN categoria
ON juegos_categoria.id_categoria = categoria.id_categoria
WHERE id_juego LIKE 'CSGO'
                        
                    
                            echo '<div class="juego"> 
                                <h1> League of Legends </h1>
                                <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur laudantium deserunt praesentium nisi temporibus earum minus beatae necessitatibus consequatur? Velit porro accusantium magnam tempore nihil et culpa, quam ullam nostrum.
                                </p>
                                <input class="buttons" type="submit" id="juego1" name="detalles" value="Detalles">
                            </div>';
                            echo '<div class="juego"> 
                                <h1> League of Legends </h1>
                                <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur laudantium deserunt praesentium nisi temporibus earum minus beatae necessitatibus consequatur? Velit porro accusantium magnam tempore nihil et culpa, quam ullam nostrum.
                                </p>
                                <input class="buttons" type="submit" id="juego1" name="detalles" value="Detalles">
                            </div>';
                            echo '<div class="juego"> 
                                <h1> League of Legends </h1>
                                <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur laudantium deserunt praesentium nisi temporibus earum minus beatae necessitatibus consequatur? Velit porro accusantium magnam tempore nihil et culpa, quam ullam nostrum.
                                </p>
                                <input class="buttons" type="submit" id="juego1" name="detalles" value="Detalles">
                            </div>';

                            echo '<div class="juego"> 
                                <h1> League of Legends </h1>
                                <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur laudantium deserunt praesentium nisi temporibus earum minus beatae necessitatibus consequatur? Velit porro accusantium magnam tempore nihil et culpa, quam ullam nostrum.
                                </p>
                                <input class="buttons" type="submit" id="juego1" name="detalles" value="Detalles">
                            </div>';
                            echo '<div class="juego"> 
                                <h1> League of Legends </h1>
                                <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur laudantium deserunt praesentium nisi temporibus earum minus beatae necessitatibus consequatur? Velit porro accusantium magnam tempore nihil et culpa, quam ullam nostrum.
                                </p>
                                <input class="buttons" type="submit" id="juego1" name="detalles" value="Detalles">
                            </div>';
                            echo '<div class="juego"> 
                                <h1> League of Legends </h1>
                                <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur laudantium deserunt praesentium nisi temporibus earum minus beatae necessitatibus consequatur? Velit porro accusantium magnam tempore nihil et culpa, quam ullam nostrum.
                                </p>
                                <input class="buttons" type="submit" id="juego1" name="detalles" value="Detalles">
                            </div>';
                            echo '<div class="juego"> 
                                <h1> League of Legends </h1>
                                <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur laudantium deserunt praesentium nisi temporibus earum minus beatae necessitatibus consequatur? Velit porro accusantium magnam tempore nihil et culpa, quam ullam nostrum.
                                </p>
                                <input class="buttons" type="submit" id="juego1" name="detalles" value="Detalles">
                            </div>';
                            echo '<div class="juego"> 
                                <h1> League of Legends </h1>
                                <p>
                                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aspernatur laudantium deserunt praesentium nisi temporibus earum minus beatae necessitatibus consequatur? Velit porro accusantium magnam tempore nihil et culpa, quam ullam nostrum.
                                </p>
                                <input class="buttons" type="submit" id="juego1" name="detalles" value="Detalles">
                                
                            </div>';
                            
                        */
                    ?>
            </div>
        </div>
    <?php require_once 'include/footer.php';?> 
</body>

</html>