<?php
    include "conexion.inc.php";
    $nroproyecto=$_GET["nroproyecto"];
    $nrohito=$_GET["nrohito"];
    $descripcion=$_GET["descripcion"];
    $fecha=$_GET["fecha"];
    $sql="insert into controlproy.hito (codproy,codhito,descripcion,fecha) ";
    $sql.="values ('$nroproyecto','$nrohito','$descripcion','$fecha')";
    $result=mysqli_query($conn,$sql);
?>
