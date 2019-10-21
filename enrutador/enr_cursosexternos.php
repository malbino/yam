<?php  
require("../controlador/ctrl_cursoexterno.php");
$obj=new ctrlcurso();

if (isset($_POST["asignar"])) {
	$obj->insertar($_POST);
	echo "<script> window.location.href='../admin/docs/cursos_externos.php';</script>";
}
elseif (isset($_POST["subircurso"])) {
    $obj->cursado($_POST);
   echo "<script> window.location.href='../admin/docs/curso_estudiante.php';</script>";
}

elseif (isset($_POST['modificar_curso'])){
    $obj->modificar_curso($_POST);
    echo "<script> window.location.href='../admin/docs/listar_cursoexterno.php';</script>";
}

?>