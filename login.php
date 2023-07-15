<html>
<head>
    <title>INICIO DE SESION</title>  
    <meta charset="UTF-8">
    <!-- <link rel="stylesheet" type="text/css" href="css/diseño.css"> -->
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.3/themes/black/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.3/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.3/hemes/color.css">
    <script type="text/javascript" src="jquery-easyui-1.10.3/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-easyui-1.10.3/jquery.easyui.min.js"></script>
</head>
<body>

<header>
        <img src="imagenes/logo.png" width="100%" height="50%"></img>
    </header>
  

      <center> 
      <h2>INICIO DE SESION</h2>
         <form action="models/logear.php" method="POST">
             <input type="text" name="usuario">
             <br><br>
             <input type="password" name="clave">
             <br><br>
             <button type ="sumbit">INGRESAR</button>
         </form>  
     </center>
</body>
<footer>
        <p> DERECHOS RESERVADOS @UDLA-PROYECTOFARMACIAS</p>
    </footer>
</html>