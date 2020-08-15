<html>
    <head>
        <?php
        if (isset($_GET['id'])) {
            include 'Conexion/conexion.php';
            $consulta = mysqli_fetch_row(ejecutarSQL::consultar("SELECT nit, nombre_proveedor, direccion_proveedor, telefono_proveedor, web_proveedor FROM proveedores WHERE id=" . $_GET['id']));
            ?>
            <title>Proveedor / Editar</title>
            <?php
        } else {
            ?>
            <title>Proveedor / Crear</title>
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
                        <br><p style="color: black;" class="text-center lead">Editar Proveedor</p>
                        <?php
                    } else {
                        ?>
                        <br><p style="color: black;" class="text-center lead">Registrar Proveedor</p>
                        <?php
                    }
                    ?>
                    <div id="proveedor">
                        <form class="formRegProv"  action="Controlador/gestionProveedor.php" name="form" role="form" method="post" data-form="save" >
                            <div class="form-group">
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-barcode"></i></div>
                                    <input class="form-control all-elements-tooltip" id="txtNit" type="text" placeholder="Ingrese el NIT del proveedor" required name="nit" data-toggle="tooltip" data-placement="top" title="Ingrese el NIT del proveedor" value="<?php
                                    if (isset($_GET['id'])) {
                                        echo $consulta[0];
                                    }
                                    ?>">                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-font"></i></div>
                                    <input class="form-control all-elements-tooltip" id="txtNombreProveedor" type="text" placeholder="Ingrese el nombre del proveedor" required name="nombre_proveedor" data-toggle="tooltip" data-placement="top" title="Ingrese el nombre del proveedor" value="<?php
                                    if (isset($_GET['id'])) {
                                        echo $consulta[1];
                                    }
                                    ?>">                              
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-map-marker"></i></div>
                                    <input class="form-control all-elements-tooltip" id="txtDireccion" type="text" placeholder="Ingrese la dirección del proveedor" required name="direccion_proveedor" data-toggle="tooltip" data-placement="top" title="Ingrese la dirección del proveedor" value="<?php
                                    if (isset($_GET['id'])) {
                                        echo $consulta[2];
                                    }
                                    ?>">                              
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-mobile"></i></div>
                                    <input class="form-control all-elements-tooltip" id="txtTelefono" type="text" placeholder="Ingrese el teléfono del proveedor" required name="telefono_proveedor" data-toggle="tooltip" data-placement="top" title="Ingrese el teléfono del proveedor" value="<?php
                                    if (isset($_GET['id'])) {
                                        echo $consulta[3];
                                    }
                                    ?>">                              
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-google"></i></div>
                                    <input class="form-control all-elements-tooltip" id="txtWeb" type="text" placeholder="Ingrese la web del proveedor" required name="web_proveedor" data-toggle="tooltip" data-placement="top" title="Ingrese la web del proveedor" value="<?php
                                    if (isset($_GET['id'])) {
                                        echo $consulta[4];
                                    }
                                    ?>">                              
                                </div>
                            </div>
                            <p>
                                <?php
                                if (isset($_GET['id'])) {
                                    ?>
                                    <input type="text" id="txtTipo" value="update" name="type" style="display: none">
                                    <input type="text" id="txId" value="<?php echo $_GET['id']?>" name="id" style="display: none">
                                    <button type="submit" id="btnEditarProveedor" class="btn btn-primary btn-block"><i class="fa fa-save"></i>&nbsp; Editar Proveedor</button>
                                    <?php
                                } else {
                                    ?>
                                    <input type="text" id="txtTipo" value="save" name="type" style="display: none">
                                    <button type="submit" id="btnCrearProveedor" class="btn btn-primary btn-block"><i class="fa fa-save"></i>&nbsp; Crear Proveedor</button>                                    
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
            $(document).ready(function () {
                $('#proveedor form').submit(function (e) {
                    e.preventDefault();
                    var informacion = $('#proveedor form').serialize();
                    var metodo = $('#proveedor form').attr('method');
                    var peticion = $('#proveedor form').attr('action');
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
