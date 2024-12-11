<?php
    $codflujo=$_GET['codflujo'];
    $codproceso=$_GET['codproceso'];
    $codprocesosiguiente=$_GET['codprocesosiguiente'];
    $archivo=$_GET['archivo'];
    include "controlador".$archivo;
    
    if(isset($_GET["Anterior"])){
        $sql="select * from proceso ";
        $sql.="where codflujo='$codflujo' ";
        $sql.="and codprocesosig='$codproceso'";
    }
    
    if(isset($_GET["Guardar"])){
        $sql="select * from proceso ";
        $sql.="where codflujo='$codflujo' ";
        $sql.="and codproceso='$codproceso'";
    }

    if(isset($_GET["Siguiente"])){
        if($codprocesosiguiente!=''){
            $sql="select * from proceso ";
            $sql.="where codflujo='$codflujo' ";
            $sql.="and codproceso='$codprocesosiguiente'";
        }else{
            $condicional=$_GET['condicional'];
            $codprocesosiguientesi=$_GET['codprocesosiguientesi'];
            $codprocesosiguienteno=$_GET['codprocesosiguienteno'];
            if($condicional=='si'){
                $sql="select * from proceso ";
                $sql.="where codflujo='$codflujo' ";
                $sql.="and codproceso='$codprocesosiguientesi'";
            }else{
                $sql="select * from proceso ";
                $sql.="where codflujo='$codflujo' ";
                $sql.="and codproceso='$codprocesosiguienteno'";
            }
        }
    }

    

    include "conexion.inc.php";
    
    $result=mysqli_query($conn,$sql);
    $fila=mysqli_fetch_array($result);
    $codprocesoenvia=$fila['codproceso'];
    $archivoenvia="motor.php?codflujo=".$codflujo."&codproceso=".$codprocesoenvia;
    header("Location: ".$archivoenvia);
?>