<?php
session_start();
$nombre="Fundacion Infocal";
$correo=$_POST["correo"];

$conexion=mysqli_connect("localhost","root","","mydb");
$consulta="SELECT * FROM persona WHERE email='$correo'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if ($filas>0)
{

    $codigo=mt_rand(2000,90000);
    $_SESSION['correo']=$correo;
    $mensaje="codigo de verificacion";
    $contenido="Nombre: ".$nombre."\nCodigo: ".$codigo."\nMensaje: ".$mensaje;
    $_SESSION['variable']=$codigo;
    mail($correo,"verificacion",$contenido);
    header("location:gracias.html");

}
else
{
$_SESSION['mensaje']=2;
echo "el correo no existe en la base de datos";
header("location:page-login.php");
}
mysqli_close($conexion);

?>
