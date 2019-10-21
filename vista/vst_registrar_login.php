
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" type="text/css" href="../bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo.css">


	<script src="../bootstrap/js/jquery.validate.min.js"></script>
	<script src="../js/funciones.js"></script>
    <?php
    require("../controlador/ctrl_usuario.php");
    $obj_ctrl=new ctrl_usuario();
    $resp=$obj_ctrl->buscar_id();
    $row=mysqli_fetch_array($resp);
    $id=$row[0];
    ?>
</head>
<body>
    <div class="container">
					<form action="../enrutador/enr_login.php" method="post">

                        <div class="card">
								<div class="card-header"><h3 class="form-title"><i class="fa fa-user"></i> Registro Login</h3></div>
								<div class="card-body">

										<div class="form-group row">
                                            <div class="col-md-6">
                                                <label for="login">Usuario</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="text" name="login" id="login" value="" class="form-control">
                                            </div>
                                        </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="clave">clave</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="clave" id="clave" value="" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="clave2">confirmar clave</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" name="clave2" id="clave2" value="" class="form-control" onblur="validar_clave();">
                                            <div id="msj_verificacion" style="display: none"> La clave no coincide...</div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <input type="text" value="<?php echo $id ?>" name="id" id="id" >
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                            <div class="card-footer">
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <input type="submit" name="crear_user" id="crear_user"  class="btn btn-primary"  disabled="true">
                                                    </div>
										<div class="col-md-6">
                                            <input class="btn btn-danger" type="reset" name="limpiar" value="Limpiar">
                                        </div>
								        </div>
                                            </div>
                        </div>
					</form>
    </div>
</body>
</html>



