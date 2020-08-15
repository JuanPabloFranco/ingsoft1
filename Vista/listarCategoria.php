<html>
    <head>
        <title>Categoria / Listar</title>
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
                    <div class="panel-heading text-center"><h3>Categorias Registradas</h3><input class="form-control" id="myInput" type="text" placeholder="Buscar un valor en la tabla"></div>
                    <div class="table-responsive" >
                        <table class="table table-bordered" id="tabla" >
                            <thead class="">
                                <tr >
                                    <th class="text-center"><b>#</b></th>
                                    <th class="text-center"><b>Nombre Categoria</b></th>
                                    <th class="text-center"><b>Descripción Categoria</b></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include 'Conexion/conexion.php';
                                $sql = "SELECT * FROM categorias ORDER BY nombre_categoria";
                                $result = ejecutarSQL::consultar($sql);
                                $cant = 0;
                                while ($fila = mysqli_fetch_array($result)) {
                                    $cant++;
                                    ?>
                                    <tr style="text-align: center;">
                                        <td><b><?php echo $cant ?></b></td>
                                        <td><?php echo $fila['nombre_categoria'] ?></td>
                                        <td><?php echo $fila['descripcion_categoria'] ?></td>
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
                            $("#ResForm").html('Buscando Categoria <br><img src="Recursos/img/enviando.gif" class="center-all-contens">');
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