<?php
include_once ('menu.php');
?>
<main class="app-content">
    <?php
    if($_SESSION['bienvenida']==0){
        echo "<script>const toast = swal.mixin({
  toast: true,
  position: 'top',
  showConfirmButton: false,
  timer: 3000
});

toast({
  type: 'success',
  title: 'Bienvenido al Sistema'
})</script>";
        $_SESSION['bienvenida']=1;
    }
    ?>
    <div class="app-title">
        <div>
            <h1><i class="fa fa-home"></i>Pagina Principal</h1>
            <p>Pagina Principal</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="#">Pagina Principal
                </a></li>
        </ul>
    </div>
    <div class="tile">
        <img src="../../imagenes/Logo%20Yam-03.png" width="120" height="100" style="float:left; margin:10px;">
    <center>
        <b><h1 style="font-family:'Brush Script MT'; font-size: 60px;">Bienvenido al Sistema YAM</h1> </b>
    </center>
        <p>
            Es un sistema de gestión de trámites para agilizar y facilitar los diferentes trámites que se llevan a cabo en el área de registros y certificaciones de modo que el cliente pueda verificar el estado de su trámite desde su móvil o pc.
        </p>

        <hr align="left" noshade="noshade" size="2" style="background-color: #6610f2" />
        <center>
        <img src="../../imagenes/usuario.png" width="200" height="200">
        <img src="../../imagenes/computadoras.png" width="250" height="250">
        <img src="../../imagenes/tramites.png" width="200" height="200">
        </center>
        <hr align="left" noshade="noshade" size="2" />
    </div>
</main>
<?php
if(@$_SESSION['error']=="exitoso"){
    echo "<script>swal(
  'Persona Creada!',
  'Inicie tramite para que se cree una cuenta!',
  'success'
)</script>";
    $_SESSION['error']=" ";
}
elseif (@$_SESSION['error']=="empleado"){
    echo "<script>swal(
  ' Creado!',
  ' Creacion exitosa!',
  'success'
)</script>";
    $_SESSION['error']=" ";
}
elseif (@$_SESSION['error']=="creado"){
    echo "<script>swal(
  'Tramite iniciado!',
  ' Inicio exitoso!',
  'success'
)</script>";
    $_SESSION['error']=" ";
}
?>