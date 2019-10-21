<?php
include_once ('conexion.php');
$con=new conexion();
if(isset($_POST['modificar'])){
    $sql="update persona set nombre='$_POST[nombre]',papellido='$_POST[papellido]',sapellido='$_POST[sapellido]',
ci='$_POST[ci]',telefono='$_POST[telefono]',direccion='$_POST[direccion]',nombre='$_POST[nombre]'
 where id_persona='$_POST[id_persona]'";
    if($con->con_retorno($sql)){
        $_SESSION['error']="perfilmodificado";
        @session_destroy();
    }
    else{
        $_SESSION['error']="falla";
        echo "<script> window.location.href='../admin/docs/page-user.php';</script>";
    }
    echo "<script> window.location.href='../admin/docs/page-login.php';</script>";
}