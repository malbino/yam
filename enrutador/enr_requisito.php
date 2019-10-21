<?php
require("../controlador/ctrl_requisito.php");
$obj=new ctrl_requisito();

if (isset($_POST["insertar"])) {
    $obj->insertar_requisito($_POST);
}

    elseif (isset($_POST["modificar_requisito"]))
    {
    $obj->modificar_requisito($_POST);
    echo "<script> window.location.href='../admin/docs/listar_requisito.php';</script>";
    }

