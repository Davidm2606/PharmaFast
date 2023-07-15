<html>
<head>
    <title>PharmaFast</title> 
    <meta charset="UTF-8">
    <link rel=stylesheet href="css/estilo.css" type ="text/css">
      
 

</head>

<body>
    <section>
<?php
error_reporting(0);
session_start();
$usuario= $_SESSION['username'];
        if(!isset($usuario)){
            $cont = file_get_contents("views/interfaces/login.php"); 
            echo $cont;
        }
        else{
            $usuario=$_SESSION['username'];
            echo "<h1> Bienvenido $usuario </h1>";
            require_once "controllers/controller.php";
            require_once "models/model.php";
            $mvc=new MvcController();
            $mvc->plantilla();
                  }       
 ?>
 </section>
</body>

</html>   