<?php 
session_start();
if(isset($_SESSION['nombre_c'])){
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<script src="../bootstrap/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.js"></script>
<link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
<div class="container">
<h1>Bienvenido <?php echo $_SESSION['nombre_c'] ;?> <a href="../enrutador/enr_login.php?salir='cerrar_session' " class="glyphicon glyphicon-user">Salir</a></h1>
<ul>
	<li><a href="">reservar auto</a></li>

</ul>
 
	

</div>

</body>
</html>
<?php
}
else{
	echo "<script> window.location.href='../vista/index.html';</script>";

}
?>