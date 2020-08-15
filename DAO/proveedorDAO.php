<?php

class proveedorDAO {

    private $con;
    private $consultas;
    private $ejecutar;

    function __construct() {
        require '../Conexion/conexion.php';
        $this->consultas = new consultasSQL();
        $this->ejecutar = new ejecutarSQL();
    }

    public function guardar(clsProveedor $obj) {
        if (consultasSQL::InsertSQL("proveedores", "nit, nombre_proveedor, direccion_proveedor, telefono_proveedor, web_proveedor", "'" . $obj->getNit() . "','" . 
                $obj->getNombre_proveedor() . "','".$obj->getDireccion_proveedor()."','".$obj->getTelefono_proveedor()."','".$obj->getWeb_proveedor()."'")) {
            ?>
            <img src="Recursos/img/ok.png" class="center-all-contens"><br>El registro se completo con éxito<br>            
            <?php
        } else {
            ?>
            <img src=Recursos/img/error.png" class="center-all-contens"><br>Ha ocurrido un error al registrar el proveedor
            <?php
        }
    }

    public function actualizar(clsProveedor $obj) {
        if (consultasSQL::UpdateSQL("proveedores", "nit='" . $obj->getNit() . "', nombre_proveedor='" . $obj->getNombre_proveedor() . "', direccion_proveedor='" . 
                $obj->getDireccion_proveedor() . "', telefono_proveedor='" . $obj->getTelefono_proveedor() . "',web_proveedor='" . $obj->getWeb_proveedor() . "'", "id=" . $obj->getId())) {
            ?>
            <img src="Recursos/img/ok.png" class="center-all-contens"><br>La actualización se completo con éxito<br>            
            <?php
        } else {
            ?>
            <img src=Recursos/img/error.png" class="center-all-contens"><br>Ha ocurrido un error al actualizar el proveedor
            <?php
        }
    }

    public function eliminar(clsCategoria $obj) {
        
    }

    public function buscar(clsProveedor $obj) {
        $busqueda = ejecutarSQL::consultar("SELECT * FROM proveedores WHERE proveedores.nit REGEXP '" . $obj->getBusqueda() . "' OR proveedores.nombre_proveedor REGEXP '" . $obj->getBusqueda() . "'");
        if ($busqueda->num_rows > 0) {
            $cant = 0;
            ?>
            <div class="panel panel-info">                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="">
                            <tr>
                                <th class="text-center"><b>#</b></th>                                                  
                                <th class="text-center"><b>Nombre Proveedor</b></th>
                                <th class="text-center"><b>Nit</b></th>
                                <th class="text-center"><b>Dirección</b></th>
                                <th class="text-center"><b>Teléfono</b></th>
                                <th class="text-center"><b>Pagina Web</b></th>
                                <th class="text-center"><b>Editar</b></th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($proveedor = mysqli_fetch_array($busqueda)) {
                                $cant++;
                                ?>
                            <div id="busqueda_cat">
                                <tr style="text-align: center">                      
                                    <td><?php echo $cant ?></td>
                                    <td><?php echo $proveedor['nombre_proveedor'] ?></td>
                                    <td><?php echo $proveedor['nit'] ?></td>
                                    <td><?php echo $proveedor['direccion_proveedor'] ?></td>
                                    <td><?php echo $proveedor['telefono_proveedor'] ?></td>
                                    <td><?php echo $proveedor['web_proveedor'] ?></td>
                                    <td><a href="index.php?page=proveedorMP&&page2=crearProveedor&&id=<?php echo $proveedor['id'];?>"><img src="Recursos/img/btn_editar.png" style="width: 20px"></a></td>                                                                                                           
                                </tr>
                            </div>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?php
        } else {
            ?>
            <img src=Recursos/img/error.png" class="center-all-contens"><br>No se encontraron resultados
            <?php
        }
    }
}
?>