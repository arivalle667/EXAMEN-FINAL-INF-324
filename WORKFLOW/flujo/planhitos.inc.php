<?php
    include "conexion.inc.php";
    $sql="select * from controlproy.hito where codproy = '1';";
    $result=mysqli_query($conn,$sql);
    $guardar="si";
?>

<p>Planificacion de Hitos<br>
Nro. del proyecto:
<input type="text" value="" name="nroproyecto"><br><br>
Nro. de hito:
<input type="text" value="" name="nrohito"><br><br>
Descripcion:
<input type="text" value="" name="descripcion"><br><br>
Fecha:
<input type="text" value="" name="fecha"><br><br>
</p>

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
