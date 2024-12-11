<?php
    include "conexion.inc.php";
    $nroproyecto=$_GET["nroproyecto"];
    $nrohito=$_GET["nrohito"];
    $nroprog=$_GET["nroprog"];
    $descripcion=$_GET["descripcion"];
    $fecha=$_GET["fecha"];
    $sql="insert into controlproy.progreso (codproy,codhito,codprogreso,descripcion,fecha) ";
    $sql.="values ('$nroproyecto','$nrohito','$nroprog','$descripcion','$fecha')";
    $result=mysqli_query($conn,$sql);
?>