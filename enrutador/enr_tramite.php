<?php
@session_start();
require ('../modelo/conexion.php');
$con=new conexion();
$valorreq=$_POST['req'];
$valorpas=$_POST['pas'];
$valornombre=$_POST['nombre'];
$sql="select * from tramite_plantilla where nombretramite='$valornombre'";
$dato=$con->con_retorno($sql);
$ro=mysqli_fetch_assoc($dato);
if($ro['nombretramite']=="$valornombre"){
    $sql2 = "update tramite_plantilla set activotramite =1 where nombretramite='$valornombre'";
    $re=$con->con_retorno($sql2);
    if ($re == " ") {
        $_SESSION['error'] = "exitoso";
    } else {
        $_SESSION['error'] = "falla";
    }
    header("Location:" .getenv("HTTP_REFERER"));
} else{
$sql="insert into tramite_plantilla (nombretramite, activotramite) values ('$valornombre',1)";
$con->sin_retorno($sql);
$sql="select * from tramite_plantilla where nombretramite='$valornombre'";
$datostramite=$con->con_retorno($sql);
$v=mysqli_fetch_assoc($datostramite);
echo "$v[idTramite_plantilla]";
for ($i=0;$i<count($valorreq);$i++){
    $sql="select * from requisito_plantilla where nombrerequisitoplatilla='$valorreq[$i]';";
    $datosrequisito=$con->con_retorno($sql);
    $r=mysqli_fetch_assoc($datosrequisito);
    $sql="insert into necesita (Tramite_plantilla_idTramite_plantilla,Requisito_plantilla_id_Requisitoplantilla)
      values ('$v[idTramite_plantilla]','$r[id_Requisitoplantilla]')";
    $con->sin_retorno($sql);
}

for ($j=0;$j<count($valorpas);$j++){
    $sql="select * from paso_plantilla where nombrepasoplantilla='$valorpas[$j]';";
    $datospaso=$con->con_retorno($sql);
    $p=mysqli_fetch_assoc($datospaso);
    $sql="insert into procede (tramite_plantilla_idTramite_plantilla,paso_plantilla_id_Pasoplantilla)
      values ('$v[idTramite_plantilla]','$p[id_Pasoplantilla]')";
    $con->sin_retorno($sql);
}
    $_SESSION['error'] = "exitoso";
header("Location:" .getenv("HTTP_REFERER"));
exit;
}
