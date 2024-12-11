<?php
    include "conexion.inc.php";
    $sql="select * from controlproy.hito where codproy = '1';";
    $result=mysqli_query($conn,$sql);
    $sql1="select * from controlproy.progreso where codproy = '1';";
    $result1=mysqli_query($conn,$sql1);
    $guardar="no";
?>
<p>
    SEGUIMIENTO Y MONITOREO
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

<p>Progreso:<br></p>
<table>
    <tr>
        <td>Nro de proyecto</td>
        <td>Nro de hito</td>
        <td>Nro de progreso</td>
        <td>Fecha</td>
        <td>Descripcion</td>
    </tr>
<?php
    while($fila1=mysqli_fetch_array($result1)){
        echo "<tr>";
        echo "<td>$fila1[0]</td>";
        echo "<td>$fila1[1]</td>";
        echo "<td>$fila1[2]</td>";
        echo "<td>$fila1[3]</td>";
        echo "<td>$fila1[4]</td>";
        echo "</tr>";
    }
?>
</table>