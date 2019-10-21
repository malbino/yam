<?php session_start();
@$_SESSION['mensaje'];
?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Main CSS-->
        <link rel="stylesheet" type="text/css" href="css/main.css">
        <script src="js/sweetalert2.all.min.js"></script>
        <!-- Font-icon css-->
        <link rel="stylesheet" type="text/css"
              href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/png" href="../../imagenes/Logo%20Yam-03.png"/>
        <title>Ingreso</title>
    </head>
    <body>
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="logo">
            <h1>Yam</h1>
        </div>
        <div class="login-box">

            <form class="login-form" action="../../enrutador/enr_login.php" method="post">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>INGRESO</h3>
                <div class="form-group">
                    <label class="control-label" for="nick">NOMBRE DE USUARIO</label>
                    <input class="form-control" type="email" id="nick" name="nick" placeholder="Email" required
                           autofocus autocomplete="off">
                </div>
                <div class="form-group">
                    <label class="control-label" for="clave">CLAVE</label>
                    <input class="form-control" type="password" id="clave" name="clave" placeholder="Password" required
                           autofocus onkeypress="return validar(event);">
                </div>
                <div class="form-group">
                    <div class="utility">
                        <div class="animated-checkbox">
                            <label>
                                <input type="checkbox"><span class="label-text">Recordar Cuenta</span>
                            </label>
                        </div>
                        <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Olvido la clave ?</a></p>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block" type="submit" name="loguearse"><i
                                class="fa fa-sign-in fa-lg fa-fw"></i>INGRESAR
                    </button>
                </div>
            </form>

            <form class="forget-form" action="enviar.php" method="post">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Olvido la clave ?</h3>
                <div class="form-group">
                    <label class="control-label">CORREO</label>
                    <input class="form-control" type="text" name="correo" placeholder="Email" required>
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>Enviar Correo
                    </button>
                </div>

                <div class="form-group mt-3">
                    <p class="semibold-text mb-0">Se enviará un codigo verificación para ingresar una nueva
                        contraseña</p>
                </div>

                <div class="form-group mt-3">
                    <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i>
                            Regresar al Inicio</a></p>
                </div>
            </form>
            <div class="form-group">
                <sub class="col-md-12" >Version: 1.0.0</sub>
            </div>
    </section>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <script type="text/javascript">
        // Login Page Flipbox control
        $('.login-content [data-toggle="flip"]').click(function () {
            $('.login-box').toggleClass('flipped');
            return false;
        });

    </script>

    </body>
    </html>
<?php
if(@$_SESSION['mensaje']==1) {
    echo "<script>swal({
  type: 'error',
  title: 'Lo Sentimos',
  text: 'Error de Usuario o Contraseña',
  footer: 'Intente de nuevo'
})</script>";
    session_destroy();
}
if(@$_SESSION['mensaje']==2) {
    echo "<script>swal({
  type: 'error',
  title: 'Lo Sentimos',
  text: 'Error El Correo no esta registrado',
  footer: 'Verifique que el correo es valido'
})</script>";
    session_destroy();
}
?>