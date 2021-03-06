<html>
    <head>
        <title>Proveedor / Buscar</title>
    </head>
    <body>
        <section id="new-prod-index">
            <div class="row">
                <div class="col-xs-12 col-sm-6 center-all-contens">
                    <br><p style="color: black;" class="text-center lead">Buscar Proveedor</p>
                    <div id="proveedor">
                        <form class="formRegCat"  action="Controlador/gestionProveedor.php" name="form" role="form" method="post" data-form="save" >
                            <div class="form-group">
                                <div class="input-group" >
                                    <div class="input-group-addon"><i class="fa fa-binoculars"></i></div>
                                    <input class="form-control all-elements-tooltip"  type="text" placeholder="Ingrese un valor a buscar" required name="busqueda" data-toggle="tooltip" data-placement="top" title="Ingrese un valor a buscar">                                    
                                    <button type="submit" id="btnBuscar" class="btn btn-primary btn-block">&nbsp; Buscar</button>
                                </div>
                            </div>
                            <br>  
                            <input type="text" id="txtTipo" value="search" name="type" style="display: none"> 
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
                            $("#ResForm").html('Buscando proveedor <br><img src="Recursos/img/enviando.gif" class="center-all-contens">');
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