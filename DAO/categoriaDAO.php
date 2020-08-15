<?php

class categoriaDAO {

    private $con;
    private $consultas;
    private $ejecutar;

    function __construct() {
        require '../Conexion/conexion.php';
        $this->consultas = new consultasSQL();
        $this->ejecutar = new ejecutarSQL();
    }

    public function guardar(clsCategoria $obj) {
        if (consultasSQL::InsertSQL("categorias", "nombre_categoria, descripcion_categoria", "'" . $obj->getNombre_categoria() . "','" . $obj->getDescripcion_categoria() . "'")) {
            ?>
            <img src="Recursos/img/ok.png" class="center-all-contens"><br>El registro se completo con éxito<br>            
            <?php
        } else {
            ?>
            <img src=Recursos/img/error.png" class="center-all-contens"><br>Ha ocurrido un error al registrar la categoria
            <?php
        }
    }

    public function actualizar(clsCategoria $obj) {
        if (consultasSQL::UpdateSQL("categorias", "nombre_categoria='" . $obj->getNombre_categoria() . "', descripcion_categoria='" . $obj->getDescripcion_categoria() . "'", "id=" . $obj->getId())) {
            ?>
            <img src="Recursos/img/ok.png" class="center-all-contens"><br>La actualización se completo con éxito<br>            
            <?php
        } else {
            ?>
            <img src=Recursos/img/error.png" class="center-all-contens"><br>Ha ocurrido un error al actualizar la categoria
            <?php
        }
    }

    public function eliminar(clsCategoria $obj) {
        
    }

    public function buscar(clsCategoria $obj) {
        $busqueda = ejecutarSQL::consultar("SELECT * FROM categorias WHERE categorias.nombre_categoria REGEXP '" . $obj->getBusqueda() . "' OR categorias.descripcion_categoria REGEXP '" . $obj->getBusqueda() . "'");
        if ($busqueda->num_rows > 0) {
            $cant = 0;
            ?>
            <div class="panel panel-info">                
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="">
                            <tr>
                                <th class="text-center"><b>#</b></th>                                                  
                                <th class="text-center"><b>Nombre Categoria</b></th>
                                <th class="text-center"><b>Descripción</b></th>
                                <th class="text-center"><b>Editar</b></th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($categoria = mysqli_fetch_array($busqueda)) {
                                $cant++;
                                ?>
                            <div id="busqueda_cat">
                                <tr style="text-align: center">                      
                                    <td><?php echo $cant ?></td>
                                    <td><?php echo $categoria['nombre_categoria'] ?></td>
                                    <td><?php echo $categoria['descripcion_categoria'] ?></td>
                                    <td><a href="index.php?page=categoriaMP&&page2=crearCategoria&&id=<?php echo $categoria['id'];?>"><img src="Recursos/img/btn_editar.png" style="width: 15%"></a></td>                                                                                                           
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