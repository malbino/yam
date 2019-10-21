<?php
@session_start();
include_once ('conexion.php');
$ob=new conexion();
if($_POST['condicion']=='Despacho'){
    mail($_POST['correo'],"Informacion tramite","Su Tramite solicitado: $_POST[tramite] a culminado
    pase a Recoger su Documento");
    date_default_timezone_set('America/Boa_Vista');
    $fecha= strftime("%Y-%m-%d");
    $sql="UPDATE tramite SET fecha_despacho='$fecha' WHERE id_tramite=$_POST[id_tramite]";
    $ob->sin_retorno($sql);
}
elseif($_POST['condicion']=='Archivos'){
    mail($_POST['correo'],"Derivacion de Tramite","Su Tramite solicitado: $_POST[tramite], A sido
    derivado al area de Archivos pase por las oficianas de certificaciones para la solicitud de busqueda de documento");
}
date_default_timezone_set('America/Boa_Vista');
$fecha= strftime("%Y-%m-%d");
$sql="UPDATE tramite SET condicion='$_POST[condicion]',fecha_derivacion='$fecha' WHERE id_tramite=$_POST[id_tramite]";
$ob->sin_retorno($sql);
$_SESSION['error']="exitoso";
header('Location: ../admin/docs/auxiliar_registro.php');
exit;
