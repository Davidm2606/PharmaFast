<?php
require 'conexion.php';
session_start();

$usuario=$_POST['usuario'];
$clave=$_POST['clave'];


$q= "SELECT COUNT(*) as contar  from usuarios where usuario = '$usuario ' and clave = '$clave ' ";
$consulta=mysqli_query($conn,$q) or die ( mysqli_error($conn));
$array = mysqli_fetch_array($consulta);

if($array['contar']>0){
   $_SESSION['username']=$usuario;
   header("location: ../index.php?action=inicio");
}
else{
    header("location:  ../views/interfaces/datosmal.php");
    
    
}
?>