<?php
require '../Modelo/clsCategoria.php';
require '../DAO/categoriaDAO.php';
sleep(1);
isset($_POST['id']) ? $id = $_POST['id'] : $id = "";
isset($_POST['nombre_categoria']) ? $nombre_categoria = $_POST['nombre_categoria'] : $nombre_categoria = "";
isset($_POST['descripcion_categoria']) ? $descripcion_categoria = $_POST['descripcion_categoria'] : $descripcion_categoria = "";
isset($_POST['busqueda']) ? $busqueda = $_POST['busqueda'] : $busqueda = "";
isset($_POST['type']) ? $accion = $_POST['type'] : $accion = "";

$categoria = new clsCategoria($id, $nombre_categoria, $descripcion_categoria, $busqueda);

$dao = new categoriaDAO(); 

switch ($accion) {

    case "save":
        $dao->guardar($categoria);
        break;
    
    case "update":
        $dao->actualizar($categoria);
        break; 
    
    case "search":
        $dao->buscar($categoria);
        break; 
   
}
?>