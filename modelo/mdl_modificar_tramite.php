<?php
@session_start();
require ('conexion.php');
$con=new conexion();
if(isset($_POST['modificarnombre'])){
    $sql = "UPDATE tramite_plantilla SET nombretramite='$_POST[nombretramite]' where idTramite_plantilla=$_POST[idtramite];";
$con->sin_retorno($sql);
$_SESSION['error']="nombre";
    echo "<script> window.location.href='../admin/docs/modificar_tramite_final.php?i=$_POST[idtramite]'</script>";
}
elseif (isset($_GET['nombre'])){
    $sql="select * from requisito_plantilla
join necesita n on requisito_plantilla.id_Requisitoplantilla = n.Requisito_plantilla_id_Requisitoplantilla
  join tramite_plantilla tp on n.Tramite_plantilla_idTramite_plantilla = tp.idTramite_plantilla
where activorequisitoplantilla=1 and nombrerequisitoplatilla='$_GET[nombre]'";
   $datos= $con->con_retorno($sql);
    $row=mysqli_fetch_assoc($datos);
    $sql="DELETE FROM necesita WHERE Requisito_plantilla_id_Requisitoplantilla = $row[id_Requisitoplantilla];";
$con->sin_retorno($sql);
    $_SESSION['error']="requisito";
    echo "<script> window.location.href='../admin/docs/modificar_tramite_final.php?i=$row[idTramite_plantilla]'</script>";
}
elseif (isset($_GET['paso'])){
    $sql="select * from paso_plantilla
join procede p on paso_plantilla.id_Pasoplantilla = p.paso_plantilla_id_Pasoplantilla
join tramite_plantilla tp on p.tramite_plantilla_idTramite_plantilla = tp.idTramite_plantilla
where activopasoplantilla = 1 and nombrepasoplantilla='$_GET[paso]'";
    $datos= $con->con_retorno($sql);
    $row=mysqli_fetch_assoc($datos);
    $sql="DELETE FROM procede WHERE paso_plantilla_id_Pasoplantilla = $row[id_Pasoplantilla];";
    $con->sin_retorno($sql);
    $_SESSION['error']="paso";
    echo "<script> window.location.href='../admin/docs/modificar_tramite_final.php?i=$row[idTramite_plantilla]'</script>";
}
elseif (isset($_POST['modalrequisito'])){
$sql="INSERT INTO necesita (Requisito_plantilla_id_Requisitoplantilla,Tramite_plantilla_idTramite_plantilla) VALUES ('$_POST[modalnombrerequisito]','$_POST[idtramite]')";
$con->sin_retorno($sql);
    $_SESSION['error']="requisitoagregado";
    echo "<script> window.location.href='../admin/docs/modificar_tramite_final.php?i=$_POST[idtramite]'</script>";
}
elseif (isset($_POST['modalpaso'])){
    $sql="INSERT INTO procede (paso_plantilla_id_Pasoplantilla,tramite_plantilla_idTramite_plantilla) VALUES ('$_POST[modalnombrepaso]','$_POST[idtramite]')";
    $con->sin_retorno($sql);
    $_SESSION['error']="pasoagregado";
    echo "<script> window.location.href='../admin/docs/modificar_tramite_final.php?i=$_POST[idtramite]'</script>";

}