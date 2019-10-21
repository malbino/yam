<?php 

require("../controlador/ctrl_rol.php");
$obj_ctrl=new ctrl_rol();


if (isset($_POST["agregar"]))
{
		$obj_ctrl->insertar($_POST);
?>
		<script type="text/javascript">
			window.location.href="../admin/docs/vst_rol1.php";
		</script>
<?php		

}elseif (isset($_GET["id_rol"])) 
	{
		$obj_ctrl->eliminar($_GET["id_rol"]);

?>
		<script type="text/javascript">
			window.location.href="../admin/docs/vst_rol1.php";

		</script>
<?php
	}	elseif (isset($_POST["modificar"])) 
	{
		$obj_ctrl->modificar($_POST);
		?>
		<script type="text/javascript">
			window.location.href="../admin/docs/vst_rol1.php";

		</script>
<?php
	}

?>