<html>
<?php
    //agarramos los valores del link de la pagina
    $codflujo=$_GET['codflujo'];
    $codproceso=$_GET['codproceso'];
    //incluimos la conexion a la base de datos
    include "conexion.inc.php";
    //hacemos la consulta para obtener los datos del flujo y proceso en el que estamos trbajando
    $sql="select * from proceso where codflujo='$codflujo' and codproceso='$codproceso'";
    $result=mysqli_query($conn,$sql);
    //obtenemos la fila de datos
    $fila=mysqli_fetch_array($result);
    $codprocesosiguiente=$fila['codprocesosig'];
    $archivo=$fila['pantalla'];
    if($codprocesosiguiente==''){
        //obtenemos los datos condicionales
        $sql1="select * from procesocond where codflujo='$codflujo' and codproceso='$codproceso'";
        $result1=mysqli_query($conn,$sql1);
        $fila1=mysqli_fetch_array($result1);
        $codprocesosiguientesi=$fila1['codprocesosi'];
        $codprocesosiguienteno=$fila1['codprocesono'];
    }
    
?>
<body>
    <h1>Motor de flujo</h1>
    <br>
    <form action="controlador.php" method="GET">
        <?php
            //incluimos la pantalla del archivo que obtuvimos
            //creamos un form que al accionar envia datos a controlador php
            include $archivo;
        ?>
        <input type="hidden" value="<?php echo $codflujo;?>" name="codflujo">
        <input type="hidden" value="<?php echo $codproceso;?>" name="codproceso">
        <input type="hidden" value="<?php echo $codprocesosiguiente;?>" name="codprocesosiguiente">
        <?php
            if($codprocesosiguiente==''){
                echo '<input type="hidden" value="'.$codprocesosiguientesi.'" name="codprocesosiguientesi">';
                echo '<input type="hidden" value="'.$codprocesosiguienteno.'" name="codprocesosiguienteno">';
                echo 'Escriba si o no:';
                echo '<input type="text" value="" name="condicional">';
            }
        ?>
        <input type="hidden" value="<?php echo $archivo;?>" name="archivo">
        <?php
            if($guardar=="si"){
                echo '<input type="submit" value="Guardar" name="Guardar">';
            }
        ?>
        <input type="submit" value="Anterior" name="Anterior">
        <input type="submit" value="Siguiente" name="Siguiente">
    </form>
</body>
</html>