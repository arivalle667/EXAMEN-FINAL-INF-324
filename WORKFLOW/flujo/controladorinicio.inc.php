<?php
    include "conexion.inc.php";
    $nroproyecto=$_GET["nroproyecto"];
    $nombre=$_GET["nombre"];
    $descripcion=$_GET["descripcion"];
    $fecha=$_GET["fecha"];
    $sql="insert into controlproy.proyecto (codproy,nombre,descripcion,fecha) ";
    $sql.="values ('$nroproyecto','$nombre','$descripcion','$fecha')";
    $result=mysqli_query($conn,$sql);
?>