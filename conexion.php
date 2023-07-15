<?php
  $hostName = "localhost";
  $dbName = "farmacia";
  $userName = "root";
  $password = "";
    $conn=mysqli_connect($hostName, $userName, $password, $dbName);
    $conn=new mysqli($hostName, $userName, $password, $dbName);
    
       if (!$conn) {
        die("error en la conexion".mysqli_connect_error());
    }
?>