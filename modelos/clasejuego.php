<?php

class Juego{
    public $nombre;
    public $categoria;
    public $descripcion;


    public function __construct($nombreJuego, $categoriaJuego, $categoriaDescripcion){
        $this->nombre = $nombreJuego;
        $this->categoria = $categoriaJuego;
        $this->descripcion = $categoriaDescripcion;
    }

    /*public function setNombre($nombreJuego)
    {
        $this->$nombre = $nombreJuego;
    }

    public function setCategoria($categoriaJuego)
    {
        $this->$categoria = $categoriaJuego;
    }

    public function setDescripcion($categoriaDescripcion)
    {
        $this->$descripcion = $categoriaDescripcion;
    }*/


}




?>