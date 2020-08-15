<?php

class clsProveedor {

    private $id;
    private $nit;
    private $nombre_proveedor;
    private $direccion_proveedor;
    private $telefono_proveedor;
    private $web_proveedor;
    private $busqueda;

    function __construct($id, $nit, $nombre_proveedor, $direccion_proveedor, $telefono_proveedor, $web_proveedor, $busqueda) {
        $this->id = $id;
        $this->nit = $nit;
        $this->nombre_proveedor = $nombre_proveedor;
        $this->direccion_proveedor = $direccion_proveedor;
        $this->telefono_proveedor = $telefono_proveedor;
        $this->web_proveedor = $web_proveedor;
        $this->busqueda = $busqueda;
    }

    function getId() {
        return $this->id;
    }

    function getNit() {
        return $this->nit;
    }

    function getNombre_proveedor() {
        return $this->nombre_proveedor;
    }

    function getDireccion_proveedor() {
        return $this->direccion_proveedor;
    }

    function getTelefono_proveedor() {
        return $this->telefono_proveedor;
    }

    function getWeb_proveedor() {
        return $this->web_proveedor;
    }

    function getBusqueda() {
        return $this->busqueda;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setNit($nit) {
        $this->nit = $nit;
    }

    function setNombre_proveedor($nombre_proveedor) {
        $this->nombre_proveedor = $nombre_proveedor;
    }

    function setDireccion_proveedor($direccion_proveedor) {
        $this->direccion_proveedor = $direccion_proveedor;
    }

    function setTelefono_proveedor($telefono_proveedor) {
        $this->telefono_proveedor = $telefono_proveedor;
    }

    function setWeb_proveedor($web_proveedor) {
        $this->web_proveedor = $web_proveedor;
    }

    function setBusqueda($busqueda) {
        $this->busqueda = $busqueda;
    }

}

?>