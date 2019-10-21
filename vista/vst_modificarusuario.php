<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<script src="../bootstrap/js/jquery.min.js"></script>
	<script src="../js/validacion.js"></script>


</head>
<body>
	<?php


	$cod=$_GET["cod"];

	$ar=explode("-",$cod);
	/*$id_persona=$ar['0'];
	$nombre=$ar['1'];
	$appat=$ar['0'];
	$id_persona=$ar['0'];
	$id_persona=$ar['0'];
	$id_persona=$ar['0'];
	$id_persona=$ar['0'];*/
	?>
<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-default">
				<div class="panel-heading"><h4>Registro</h4></div>
					<div class="panel-body">
						<form name="f1"  method="post"  class="form-group" action="../enrutador/enr_agregarusuario.php" >
							<input type="hidden" name="id_persona" value="<?php echo $ar['0'];?>">
						<label for="nombre"class="text-justify">Nombre</label>
						<input type="text" name="nombre" id="nombre"  class="form-control input-sm" value="<?php echo $ar['1'];?>" required autofocus onkeypress="return letras(event);">

						<label for="papellido">papellido</label>
						<input type="text" name="papellido" id="papellido" class="form-control input-sm" value="<?php echo $ar['2'];?>" onkeypress="return letras(event);">

						<label for="sapellido" >sapellido</label>
						<input type="text" name="sapellido" id="sapellido" value="<?php echo $ar['3'];?>" class="form-control input-sm" onkeypress="return letras(event);">

						<label for="ci">dni</label>
						<input type="text" name="ci" id="ci" value="<?php echo $ar['4'];?>" class="form-control input-sm">

						<label for="telefono">telefono</label>
						<input type="text" name="telefono" id="telefono" class="form-control input-sm" value="<?php echo $ar['5'];?>" onpaste="return false" onkeypress="return numeros(event);">

						<label for="direccion">Direccion</label>
						<input type="text" name="direccion" id="direccion" value="<?php echo $ar['6'];?>" class="form-control input-sm" onkeypress="return letras(event);">

						<label for="direccion">Rol</label>
						<select id="rol" name='rol' class="form-control">
							<?php

							require("../controlador/ctrl_roles.php");
	
						$obj1=new rol();
								$resp1=$obj1->listar_roles();
								while ($row1=mysqli_fetch_assoc($resp1)) {
									$cod1=$row1["id_rol"];
									$rol1=$row1["nombre"];

									echo "<option value='".$cod1."'>".$rol1."</option>";
									
								}
							?>

						</select>

							<button type="submit" class="btn btn-info" name="modificar">
								<span class="glyphicon glyphicon-pencil"></span> Modificar
							</button>

							<button type="reset" class="btn btn-info">
									<span class="glyphicon glyphicon-pencil"></span>Limpiar
							</button>

							<!--<button type="submit" class="btn btn-info"onclick="vst_login.html">
									<span class="glyphicon glyphicon-remove"></span>Cancelar
							</button>-->
						</form>
					</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>