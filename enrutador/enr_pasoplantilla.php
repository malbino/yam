<?php
require("../controlador/ctrl_pasoplantilla.php");
$obj=new ctrl_pasoplantilla();

if (isset($_POST["insertarpaso"])) {
    $obj->insertar_paso($_POST);

}


elseif (isset($_POST["modificar_paso"]))
{
    $obj->modificar_paso($_POST);
    echo "<script> window.location.href='../admin/docs/listar_pasos.php';</script>";

}