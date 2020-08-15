<html>
    <head>
        <?php
        include 'Conexion/conexion.php';
        if (isset($_GET['id'])) {
            $consulta = mysqli_fetch_row(ejecutarSQL::consultar("SELECT codigo_prod, nombre_prod, marca_prod, id_categoria, id_proveedor, precio_prod FROM proveedores, productos, categorias WHERE "
                    . "productos.id_categoria=categorias.id AND productos.id_proveedor=proveedores.id AND productos.id=" . $_GET['id']));
            ?>
            <title>Producto / Editar</title>
            <?php
        } else {
            ?>
            <title>Producto / Crear</title>
            <?php
        }
        ?>    
    </head>
    <body>
        <section id="new-prod-index">
            <div class="row">
                <div class="col-xs-12 col-sm-6 center-all-contens">
                    <?php
                    if (isset($_GET['id'])) {
                        ?>
                        <br><p style="color: black;" class="text-center lead">Editar Producto</p>
                        <?php
                    } else {
                        ?>
                        <br><p style="color: black;" class="text-center lead">Registrar Producto</p>
                        <?php
                    }
                    ?>
                    <div id="producto">
                        <form class="formRegProv"  action="Controlador/gestionProducto.php" name="form" role="form" method="post" data-form="save" >
                            <div class="form-group">
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-barcode"></i></div>
                                    <input class="form-control all-elements-tooltip" id="txtCódigo" type="text" placeholder="Ingrese el código del producto" required name="codigo_prod" data-toggle="tooltip" data-placement="top" title="Ingrese el código del producto" value="<?php
                                    if (isset($_GET['id'])) {
                                        echo $consulta[0];
                                    }
                                    ?>">                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-font"></i></div>
                                    <input class="form-control all-elements-tooltip" id="txtNombreProducto" type="text" placeholder="Ingrese el nombre del producto" required name="nombre_prod" data-toggle="tooltip" data-placement="top" title="Ingrese el nombre del producto" value="<?php
                                    if (isset($_GET['id'])) {
                                        echo $consulta[1];
                                    }
                                    ?>">                              
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                    <input class="form-control all-elements-tooltip" id="txtMarca" type="text" placeholder="Ingrese la marca del producto" required name="marca_prod" data-toggle="tooltip" data-placement="top" title="Ingrese la marca del producto" value="<?php
                                    if (isset($_GET['id'])) {
                                        echo $consulta[2];
                                    }
                                    ?>">                              
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                    <?php
                                    $resultCat = ejecutarSQL::consultar("SELECT * FROM categorias ORDER BY nombre_categoria");
                                    $categorias = "";
                                    if ($resultCat->num_rows > 0) {
                                        while ($cat = mysqli_fetch_array($resultCat)) {
                                            $categorias .= "<option value='" . $cat['id'] . "'>" . $cat['nombre_categoria'] . "</option>";
                                        }
                                    }
                                    ?>
                                    <select class="form-control all-elements-tooltip" id="selCategoria" required name="id_categoria"> 
                                        <option value="0" selected>Seleccione una categoria</option>
                                        <?php
                                        echo $categorias;
                                        ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                    <?php
                                    $resultProv = ejecutarSQL::consultar("SELECT * FROM proveedores ORDER BY nombre_proveedor");
                                    $proveedores = "";
                                    if ($resultProv->num_rows > 0) {
                                        while ($prov = mysqli_fetch_array($resultProv)) {
                                            $proveedores .= "<option value='" . $prov['id'] . "'>" . $prov['nombre_proveedor'] . "</option>";
                                        }
                                    }
                                    ?>
                                    <select class="form-control all-elements-tooltip" id="selProveedor" required name="id_proveedor"> 
                                        <option value="0" selected>Seleccione un proveedor</option>
                                        <?php
                                        echo $proveedores;
                                        ?>
                                    </select> 
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-google"></i></div>
                                    <input class="form-control all-elements-tooltip" id="txtPrecio" type="number" placeholder="Ingrese el precio del producto" required name="precio_prod" data-toggle="tooltip" data-placement="top" title="Ingrese el precio del producto" value="<?php
                                    if (isset($_GET['id'])) {
                                        echo $consulta[5];
                                    }
                                    ?>">                              
                                </div>
                            </div>
                            <p>
                                <?php
                                if (isset($_GET['id'])) {
                                    ?>
                                    <input type="text" id="txtTipo" value="update" name="type" style="display: none">
                                    <input type="text" id="txId" value="<?php echo $_GET['id'] ?>" name="id" style="display: none">
                                    <button type="submit" id="btnEditarProducto" class="btn btn-primary btn-block"><i class="fa fa-save"></i>&nbsp; Editar Producto</button>
                                    <?php
                                } else {
                                    ?>
                                    <input type="text" id="txtTipo" value="save" name="type" style="display: none">
                                    <button type="submit" id="btnCrearProducto" class="btn btn-primary btn-block"><i class="fa fa-save"></i>&nbsp; Crear Producto</button>                                    
                                    <?php
                                }
                                ?>   
                            </p>
                            <div class="ResForm" id="ResForm" style="width: 100%; color: black; text-align: center; margin: 0;"></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <script>
            document.getElementById("selCategoria").value = "<?php echo $consulta[3]?>";
            document.getElementById("selProveedor").value = "<?php echo $consulta[4]?>";
            $(document).ready(function () {
                $('#producto form').submit(function (e) {
                    e.preventDefault();
                    var informacion = $('#producto form').serialize();
                    var metodo = $('#producto form').attr('method');
                    var peticion = $('#producto form').attr('action');
                    $.ajax({
                        type: metodo,
                        url: peticion,
                        data: informacion,
                        beforeSend: function () {
                            $("#ResForm").html('Procesando <br><img src="Recursos/img/enviando.gif" class="center-all-contens">');
                        },
                        error: function () {
                            $("#ResForm").html("Ha ocurrido un error en el sistema");
                        },
                        success: function (data) {
                            $("#ResForm").html(data);
                        }
                    });
                    return false;
                });

            });
        </script>

        <?php
// put your code here
        ?>
    </body>
</html>
