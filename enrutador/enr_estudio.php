
<?php
require("../controlador/ctrl_estudio.php");
$obj=new ctrl_estudio();

if (isset($_POST['registrar'])){
    $obj->insertar($_POST);
    echo "<script> window.location.href='../admin/docs/crear_carrera.php';</script>";
}
elseif (isset($_POST['modificar_carrera'])){
    $obj->modificar_carrera($_POST);
    echo "<script> window.location.href='../admin/docs/listar_carrera.php';</script>";
}


?>