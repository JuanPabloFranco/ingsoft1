<html>
    <head>
        <title>Proveedor / Listar</title>
        <script>
            $(document).ready(function () {
                $("#myInput").on("keyup", function () {
                    var value = $(this).val().toLowerCase();
                    $("#tabla tr").filter(function () {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
    </head>
    <body>
        <section id="new-prod-index">
            <div class="row" >
                <div class="panel panel-info">
                    <div class="panel-heading text-center"><h3>Productos Registrados</h3><input class="form-control" id="myInput" type="text" placeholder="Buscar un valor en la tabla"></div>
                    <div class="table-responsive" >
                        <table class="table table-bordered" id="tabla" >
                            <thead class="">
                                <tr >
                                    <th class="text-center"><b>#</b></th>Código</b></th>
                                    <th class="text-center"><b>Nombre del producto</b></th>
                                    <th class="text-center"><b>Marca</b></th>
                                    <th class="text-center"><b>Categoria</b></th>
                                    <th class="text-center"><b>Proveedor</b></th>
                                    <th class="text-center"><b>Precio</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'Conexion/conexion.php';
                                $sql = "SELECT codigo_prod, nombre_prod, marca_prod, nombre_categoria, nombre_proveedor, precio_prod FROM productos, categorias, proveedores WHERE productos.id_categoria=categorias.id AND"
                                        . " productos.id_proveedor=proveedores.id ORDER BY nombre_proveedor";
                                $result = ejecutarSQL::consultar($sql);
                                $cant = 0;
                                while ($fila = mysqli_fetch_array($result)) {
                                    $cant++;
                                    ?>
                                    <tr style="text-align: center;">
                                        <td><b><?php echo $cant ?></b></td>
                                        <td><?php echo $fila['codigo_prod'] ?></td>
                                        <td><?php echo $fila['nombre_prod'] ?></td>
                                        <td><?php echo $fila['marca_prod'] ?></td>
                                        <td><?php echo $fila['nombre_categoria'] ?></td>
                                        <td><?php echo $fila['nombre_proveedor'] ?></td>
                                        <td>$<?php echo $fila['precio_prod'] ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>                            
                        </table>
                    </div>                    
                </div>
            </div>
        </section> 
    </body>
</html>