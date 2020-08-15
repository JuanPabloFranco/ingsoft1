<?php

class clsCategoria {

    private $id;
    private $nombre_categoria;
    private $descripcion_categoria;
    private $busqueda;

    function __construct($id, $nombre_categoria, $descripcion_categoria, $busqueda) {
        $this->id = $id;
        $this->nombre_categoria = $nombre_categoria;
        $this->descripcion_categoria = $descripcion_categoria;
        $this->busqueda = $busqueda;
    }

    function getId() {
        return $this->id;
    }

    function getNombre_categoria() {
        return $this->nombre_categoria;
    }

    function getDescripcion_categoria() {
        return $this->descripcion_categoria;
    }

    function getBusqueda() {
        return $this->busqueda;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNombre_categoria($nombre_categoria) {
        $this->nombre_categoria = $nombre_categoria;
    }

    function setDescripcion_categoria($descripcion_categoria) {
        $this->descripcion_categoria = $descripcion_categoria;
    }

    function setBusqueda($busqueda) {
        $this->busqueda = $busqueda;
    }

}

?>