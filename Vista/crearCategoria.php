<html>
    <head>
        <?php
        if (isset($_GET['id'])) {
            include 'Conexion/conexion.php';
            $consulta = mysqli_fetch_row(ejecutarSQL::consultar("SELECT nombre_categoria, descripcion_categoria FROM categorias WHERE id=" . $_GET['id']));
            ?>
            <title>Categoria / Editar</title>
            <?php
        } else {
            ?>
            <title>Categoria / Crear</title>
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
                        <br><p style="color: black;" class="text-center lead">Editar categoria</p>
                        <?php
                    } else {
                        ?>
                        <br><p style="color: black;" class="text-center lead">Registrar categoria</p>
                        <?php
                    }
                    ?>
                    <div id="categoria">
                        <form class="formRegCat"  action="Controlador/gestionCategoria.php" name="form" role="form" method="post" data-form="save" >
                            <div class="form-group">
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-font"></i></div>
                                    <input class="form-control all-elements-tooltip" id="txtNombreCategoria" type="text" placeholder="Ingrese el nombre de la categoria" required name="nombre_categoria" data-toggle="tooltip" data-placement="top" title="Ingrese el nombre de la categoria" value="<?php
                                    if (isset($_GET['id'])) {
                                        echo $consulta[0];
                                    }
                                    ?>">                                    
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-text-width"></i></div>
                                    <textarea class="form-control all-elements-tooltip" rows="3" id="txtNombreCategoria" placeholder="Ingrese la descripcion de la categoria" required name="descripcion_categoria" data-toggle="tooltip" data-placement="top"><?php
                                        if (isset($_GET['id'])) {
                                            echo $consulta[1];
                                        }
                                        ?></textarea>                                
                                </div>
                            </div>
                            <br>  
                            <p>
                                <?php
                                if (isset($_GET['id'])) {
                                    ?>
                                    <input type="text" id="txtTipo" value="update" name="type" style="display: none">
                                    <input type="text" id="txId" value="<?php echo $_GET['id']?>" name="id" style="display: none">
                                    <button type="submit" id="btnEditarCategoria" class="btn btn-default btn-block"><i class="fa fa-save"></i>&nbsp; Editar Categoria</button>
                                    <?php
                                } else {
                                    ?>
                                    <input type="text" id="txtTipo" value="save" name="type" style="display: none">
                                    <button type="submit" id="btnCrearCategoria" class="btn btn-default btn-block"><i class="fa fa-save"></i>&nbsp; Crear Categoria</button>                                    
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
                $('#categoria form').submit(function (e) {
                    e.preventDefault();
                    var informacion = $('#categoria form').serialize();
                    var metodo = $('#categoria form').attr('method');
                    var peticion = $('#categoria form').attr('action');
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
