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
                    <div class="panel-heading text-center"><h3>Proveedores Registrados</h3><input class="form-control" id="myInput" type="text" placeholder="Buscar un valor en la tabla"></div>
                    <div class="table-responsive" >
                        <table class="table table-bordered" id="tabla" >
                            <thead class="">
                                <tr >
                                    <th class="text-center"><b>#</b></th>
                                    <th class="text-center"><b>Nombre Proveedor</b></th>
                                    <th class="text-center"><b>Nit</b></th>
                                    <th class="text-center"><b>Dirección</b></th>
                                    <th class="text-center"><b>Teléfono</b></th>
                                    <th class="text-center"><b>Página Web</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'Conexion/conexion.php';
                                $sql = "SELECT * FROM proveedores ORDER BY nombre_proveedor";
                                $result = ejecutarSQL::consultar($sql);
                                $cant = 0;
                                while ($fila = mysqli_fetch_array($result)) {
                                    $cant++;
                                    ?>
                                    <tr style="text-align: center;">
                                        <td><b><?php echo $cant ?></b></td>
                                        <td><?php echo $fila['nombre_proveedor'] ?></td>
                                        <td><?php echo $fila['nit'] ?></td>
                                        <td><?php echo $fila['direccion_proveedor'] ?></td>
                                        <td><?php echo $fila['telefono_proveedor'] ?></td>
                                        <td><?php echo $fila['web_proveedor'] ?></td>
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