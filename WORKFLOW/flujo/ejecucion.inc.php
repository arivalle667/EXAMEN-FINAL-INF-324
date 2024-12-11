<?php
    include "conexion.inc.php";
    $sql="select * from controlproy.hito where codproy = '1';";
    $result=mysqli_query($conn,$sql);
    $guardar="no";
?>
<p>El equipo operativo esta ejecutando las tareas.<br></p>
<p>Hitos:<br></p>
<table>
    <tr>
        <td>Nro de proyecto</td>
        <td>Nro de hito</td>
        <td>Descripcion</td>
        <td>Fecha</td>
    </tr>
<?php
    while($fila=mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>$fila[0]</td>";
        echo "<td>$fila[1]</td>";
        echo "<td>$fila[2]</td>";
        echo "<td>$fila[3]</td>";
        echo "</tr>";
    }
?>
</table>