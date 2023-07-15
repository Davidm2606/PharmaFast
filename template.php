<html>

<head>
    <link rel="stylesheet" href="css/estilo.css">
    </link>
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.3/themes/black/easyui.css">
        <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.3/themes/icon.css">
        <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.3/themes/color.css">
        <script type="text/javascript" src="jquery-easyui-1.10.3/jquery.min.js"></script>
        <script type="text/javascript" src="jquery-easyui-1.10.3/jquery.easyui.min.js"></script> 
</head>

<body>
    <header>
        <img src="imagenes/logo.png" width="100%" height="50%"></img>
    </header>
    <nav>
        <ul>
        <li><a href="index.php?action=medicamentos">MEDICAMENTOS</a></li>
        <li><a ></a></li>
        <li><a ></a></li>
        <li><a href="index.php?action=recetarios">RECETARIOS</a></li>
        </ul>
    </nav>
    <section>
        <?php
        $mvc= new MvcController();
        $mvc-> enlacesPaginasController();
        ?>
        
    </section>
    <footer>
        <p> DERECHOS RESERVADOS @UDLA-PROYECTO FARMACIAS</p>
    </footer>
 <a href='models/salir.php' class='easyui-linkbutton c6'  plain='true'>Salir</a>  
  
</body>

</html>