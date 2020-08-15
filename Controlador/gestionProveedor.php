<?php
require '../Modelo/clsProveedor.php';
require '../DAO/proveedorDAO.php';
sleep(1);
isset($_POST['id']) ? $id = $_POST['id'] : $id = "";
isset($_POST['nit']) ? $nit = $_POST['nit'] : $nit = "";
isset($_POST['nombre_proveedor']) ? $nombre_proveedor = $_POST['nombre_proveedor'] : $nombre_proveedor = "";
isset($_POST['direccion_proveedor']) ? $direccion_proveedor = $_POST['direccion_proveedor'] : $direccion_proveedor = "";
isset($_POST['telefono_proveedor']) ? $telefono_proveedor = $_POST['telefono_proveedor'] : $telefono_proveedor = "";
isset($_POST['web_proveedor']) ? $web_proveedor = $_POST['web_proveedor'] : $web_proveedor = "";
isset($_POST['busqueda']) ? $busqueda = $_POST['busqueda'] : $busqueda = "";
isset($_POST['type']) ? $accion = $_POST['type'] : $accion = "";

$proveedor = new clsProveedor($id, $nit, $nombre_proveedor, $direccion_proveedor, $telefono_proveedor, $web_proveedor, $busqueda);

$dao = new proveedorDAO(); 

switch ($accion) {

    case "save":
        $dao->guardar($proveedor);
        break;
    
    case "update":
        $dao->actualizar($proveedor);
        break; 
    
    case "search":
        $dao->buscar($proveedor);
        break; 
   
}
?>