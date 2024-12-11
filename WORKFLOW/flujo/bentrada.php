<?php
    $_SESSION["usuario"]='ariel';
    include "conexion.inc.php";
    $sql="select * from seguimiento";
    $sql.=" where fechafin is null";
    $sql.=" and usuario like '".$_SESSION["usuario"]."'";
    $result=mysqli_query($conn,$sql);
?>
<table>
    <tr>
        <td>Estado</td>
        <td>Flujo</td>
        <td>Proceso</td>
        <td>Operacion</td>
    </tr>
<?php
    while($fila=mysqli_fetch_array($result)){
        //echo $fila[0];
        echo "<tr>";
        echo "<td>$fila[0]</td>";
        echo "<td>$fila[1]</td>";
        echo "<td>$fila[2]</td>";
        echo "<td>";
        echo "<a href='http://localhost";
        echo "/flujo/motor.php?codflujo=$fila[1]&codproceso=$fila[2]'>Ver</a>";
        echo "</td>";
        echo "</tr>";
    }
?>
</table>