<?php

class productoDAO {

    private $con;
    private $consultas;
    private $ejecutar;

    function __construct() {
        require '../Conexion/conexion.php';
        $this->consultas = new consultasSQL();
        $this->ejecutar = new ejecutarSQL();
    }

    public function guardar(clsProducto $obj) {
        if ($obj->getCodigo_prod() <> "" && $obj->getId_categoria() <> "0" && $obj->getId_proveedor() <> "0" && $obj->getMarca_prod() <> "" && $obj->getNombre_prod() <> "" && $obj->getPrecio_prod() <> "") {
            $busqueda = ejecutarSQL::consultar("SELECT productos.id FROM productos WHERE codigo_prod='" . $obj->getCodigo_prod() . "'");
            if ($busqueda->num_rows > 0) {
                ?>
                <img src="Recursos/img/error.png" class="center-all-contens"><br>Ya existe un producto registrado con el código <?php echo $obj->getCodigo_prod(); ?>
                <?php
            } else {
                if (consultasSQL::InsertSQL("productos", "codigo_prod, nombre_prod, marca_prod, id_categoria, id_proveedor, precio_prod, imagen_prod", "'" . $obj->getCodigo_prod() . "','" .
                                $obj->getNombre_prod() . "','" . $obj->getMarca_prod() . "'," . $obj->getId_categoria() . "," . $obj->getId_proveedor() . "," . $obj->getPrecio_prod() . ",''")) {
                    ?>
                    <img src="Recursos/img/ok.png" class="center-all-contens"><br>El registro se completo con éxito<br>            
                    <?php
                } else {
                    ?>
                    <img src="Recursos/img/error.png" class="center-all-contens"><br>Ha ocurrido un error al registrar el producto
                    <?php
                }
            }
        } else {
            ?>
            <img src="Recursos/img/error.png" class="center-all-contens"><br>Complete todos los campos
            <?php
        }
    }

    public function actualizar(clsProducto $obj) {
        if ($obj->getCodigo_prod() <> "" && $obj->getId_categoria() <> "0" && $obj->getId_proveedor() <> "0" && $obj->getMarca_prod() <> "" && $obj->getNombre_prod() <> "" && $obj->getPrecio_prod() <> "") {
            if (consultasSQL::UpdateSQL("productos", "codigo_prod='" . $obj->getCodigo_prod() . "', nombre_prod='" . $obj->getNombre_prod() . "', marca_prod='" .
                            $obj->getMarca_prod() . "', id_categoria=" . $obj->getId_categoria() . ",id_proveedor=" . $obj->getId_proveedor() . ",precio_prod=" . $obj->getPrecio_prod(), "id=" . $obj->getId())) {
                ?>
                <img src="Recursos/img/ok.png" class="center-all-contens"><br>La actualización se completo con éxito<br>            
                <?php
            } else {
                ?>
                <img src="Recursos/img/error.png" class="center-all-contens"><br>Ha ocurrido un error al actualizar el producto
                <?php
            }
        } else {
            ?>
            <img src="Recursos/img/error.png" class="center-all-contens"><br>Complete todos los campos
            <?php
        }
    }

    public function eliminar(clsProducto $obj) {
        
    }

    public function buscar(clsProducto $obj) {
        $busqueda = ejecutarSQL::consultar("SELECT productos.id, codigo_prod, nombre_prod, marca_prod, nombre_categoria, nombre_proveedor, precio_prod FROM productos, categorias, proveedores WHERE productos.id_categoria=categorias.id AND productos.id_proveedor=proveedores.id AND (productos.codigo_prod REGEXP '" . $obj->getBusqueda() . "' OR productos.nombre_prod REGEXP '" . $obj->getBusqueda() . "' OR productos.marca_prod REGEXP '" . $obj->getBusqueda() . "')");
        if ($busqueda->num_rows > 0) {
            $cant = 0;
            ?>
            <div class="panel panel-info">                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="">
                            <tr>
                                <th class="text-center"><b>#</b></th>                                                  
                                <th class="text-center"><b>Código</b></th> 
                                <th class="text-center"><b>Nombre Producto</b></th>
                                <th class="text-center"><b>Marca</b></th>
                                <th class="text-center"><b>Categoria</b></th>
                                <th class="text-center"><b>Proveedor</b></th>
                                <th class="text-center"><b>Precio</b></th>
                                <th class="text-center"><b>Editar</b></th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($producto = mysqli_fetch_array($busqueda)) {
                                $cant++;
                                ?>
                            <div id="busqueda_cat">
                                <tr style="text-align: center">                      
                                    <td><?php echo $cant ?></td>
                                    <td><?php echo $producto['codigo_prod'] ?></td>
                                    <td><?php echo $producto['nombre_prod'] ?></td>
                                    <td><?php echo $producto['marca_prod'] ?></td>
                                    <td><?php echo $producto['nombre_categoria'] ?></td>
                                    <td><?php echo $producto['nombre_proveedor'] ?></td>
                                    <td>$<?php echo $producto['precio_prod'] ?></td>
                                    <td><a href="index.php?page=productoMP&&page2=crearProducto&&id=<?php echo $producto['id']; ?>"><img src="Recursos/img/btn_editar.png" style="width: 20px"></a></td>                                                                                                           
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
            <img src="Recursos/img/error.png" class="center-all-contens"><br>No se encontraron resultados
            <?php
        }
    }

}
?>