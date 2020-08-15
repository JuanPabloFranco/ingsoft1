<html>
    <head>
        <meta charset="LATIN-7">      
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <link rel="StyleSheet" href="Recursos/css/masterPage.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
        <script language="javascript" src="Recursos/js/jquery-3.1.1.min.js"></script>
        <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>    
    <table >
        <?php
        if (isset($_GET['message_login'])) {
            ?>
            <tr style="text-align: center"><td colspan="20"><p class="bg-warning" style="width: 100%"><label class="aviso"><?php echo $_GET['message_login']; ?></label></p></td></tr>
            <?php
        }
        if (isset($_GET['message_search2'])) {
            echo "<script type'text/javascript'>" . $_GET['message_search2'] . "</script>";
        }
        include 'includes/encabezado.php';
        include 'includes/menu.php';
        ?>
        <tr>           
            <td  valign="top" class="contenido"  >
                <?php
                if (isset($_GET['page'])) {
                    include $_GET['page'] . ".php";
                } else {
//                    include '../Vista/inicio.php';
                }
                ?>
            </td>
        </tr>
    </table>
</body>
<?php include 'includes/footer.php';?>
</html>