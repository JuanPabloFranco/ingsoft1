<?php

require '../Modelo/clsProducto.php';
require '../DAO/productoDAO.php';
sleep(1);
isset($_POST['id']) ? $id = $_POST['id'] : $id = "";
isset($_POST['codigo_prod']) ? $codigo_prod = $_POST['codigo_prod'] : $codigo_prod = "";
isset($_POST['nombre_prod']) ? $nombre_prod = $_POST['nombre_prod'] : $nombre_prod = "";
isset($_POST['marca_prod']) ? $marca_prod = $_POST['marca_prod'] : $marca_prod = "";
isset($_POST['id_categoria']) ? $id_categoria = $_POST['id_categoria'] : $id_categoria = "";
isset($_POST['id_proveedor']) ? $id_proveedor = $_POST['id_proveedor'] : $id_proveedor = "";
isset($_POST['precio_prod']) ? $precio_prod = $_POST['precio_prod'] : $precio_prod = "";
isset($_POST['imagen_prod']) ? $imagen_prod = $_POST['imagen_prod'] : $imagen_prod = "";
isset($_POST['busqueda']) ? $busqueda = $_POST['busqueda'] : $busqueda = "";
isset($_POST['type']) ? $accion = $_POST['type'] : $accion = "";

$producto = new clsProducto($id, $codigo_prod, $nombre_prod, $marca_prod, $id_categoria, $id_proveedor, $precio_prod, $imagen_prod, $busqueda);

$dao = new productoDAO();

switch ($accion) {

    case "save":
        $dao->guardar($producto);
        break;

    case "update":
        $dao->actualizar($producto);
        break;

    case "search":
        $dao->buscar($producto);
        break;
}
?>