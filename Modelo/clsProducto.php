<?php

class clsProducto {

    private $id;
    private $codigo_prod;
    private $nombre_prod;
    private $marca_prod;
    private $id_categoria;
    private $id_proveedor;
    private $precio_prod;
    private $imagen_prod;
    private $busqueda;

    function __construct($id, $codigo_prod, $nombre_prod, $marca_prod, $id_categoria, $id_proveedor, $precio_prod, $imagen_prod, $busqueda) {
        $this->id = $id;
        $this->codigo_prod = $codigo_prod;
        $this->nombre_prod = $nombre_prod;
        $this->marca_prod = $marca_prod;
        $this->id_categoria = $id_categoria;
        $this->id_proveedor = $id_proveedor;
        $this->precio_prod = $precio_prod;
        $this->imagen_prod = $imagen_prod;
        $this->busqueda = $busqueda;
    }

    function getId() {
        return $this->id;
    }

    function getCodigo_prod() {
        return $this->codigo_prod;
    }

    function getNombre_prod() {
        return $this->nombre_prod;
    }

    function getMarca_prod() {
        return $this->marca_prod;
    }

    function getId_categoria() {
        return $this->id_categoria;
    }

    function getId_proveedor() {
        return $this->id_proveedor;
    }

    function getPrecio_prod() {
        return $this->precio_prod;
    }

    function getImagen_prod() {
        return $this->imagen_prod;
    }

    function getBusqueda() {
        return $this->busqueda;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setCodigo_prod($codigo_prod) {
        $this->codigo_prod = $codigo_prod;
    }

    function setNombre_prod($nombre_prod) {
        $this->nombre_prod = $nombre_prod;
    }

    function setMarca_prod($marca_prod) {
        $this->marca_prod = $marca_prod;
    }

    function setId_categoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    function setId_proveedor($id_proveedor) {
        $this->id_proveedor = $id_proveedor;
    }

    function setPrecio_prod($precio_prod) {
        $this->precio_prod = $precio_prod;
    }

    function setImagen_prod($imagen_prod) {
        $this->imagen_prod = $imagen_prod;
    }

    function setBusqueda($busqueda) {
        $this->busqueda = $busqueda;
    }

}
?>