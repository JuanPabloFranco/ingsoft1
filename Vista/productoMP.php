<html>
    <head>
        <link rel="StyleSheet" href="Recursos/css/subMP.css" type="text/css">
        <title>Productos</title>
    </head>
    <body>
    <center>        
        <table >            
            <tr>                
                <td class="menu_botones" >
                    <br>    
                    <a class="botonesMenu" href='index.php?page=productoMP&&page2=crearProducto'><img src="Recursos/img/btn_crear.png" style="width: 30px" style="height: 30px" title="Crear"></a>
                    <a class="botonesMenu" href='index.php?page=productoMP&&page2=buscarProducto'><img src="Recursos/img/btn_buscar.png" style="width: 30px" style="height: 30px" title="Buscar"></a>
                    <a class="botonesMenu" href='index.php?page=productoMP&&page2=listarProducto'><img src="Recursos/img/btn_listar.png" style="width: 30px" style="height: 30px" title="Listar"></a>
                </td>
                <td style="width: 2%"></td>
                <td  class="contenidoSubMP" >
                    <?php
                    if (isset($_GET['page2'])) {
                        include $_GET['page2'] . ".php";
                    }else{
                        include 'listarProducto.php';
                    }
                    ?>
                </td>
            </tr>
        </table>
        <br>
    </center>
</body>
</html>
