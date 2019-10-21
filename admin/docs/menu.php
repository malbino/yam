<?php
@session_start();
if($_SESSION['usuario']==""){
    echo "<script> window.location.href='page-login.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title style="align:left">Certificaciones y Tramites</title>
    <link rel="icon" type="image/png" href="../../imagenes/Logo%20Yam-03.png"  />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="css/main.css">
      <link rel="stylesheet" type="text/css" href="bootstrap4/font-awesome-4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="../../bootstrap4/css/bootstrap-select.css" />
      <script src="js/sweetalert2.all.min.js"></script>
  </head>

  <body class="app sidebar-mini rtl"  >

  <!-- Navbar-->
  <header class="app-header"><a class="app-header__logo" href="index.php">Yam&nbsp;<sub style="font-size: 60%">1.0.0</sub></a>
      <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
<!--          <li class="app-search">-->
<!--              <input class="app-search__input" type="search" placeholder="Search">-->
<!--              <button class="app-search__button"><i class="fa fa-search"></i></button>-->
<!--          </li>-->
          <!--Notification Menu-->
          <!--li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
              <ul class="app-notification dropdown-menu dropdown-menu-right">
                  <li class="app-notification__title">Notificaciones nuevas.</li>
                  <div class="app-notification__content">
                      <li><a class="app-notification__item" href="manualusuario/index.html" target="_blank"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-arrow-circle-right"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                              <div>
                                  <p class="app-notification__message">Ayuda</p>

                              </div></a></li>
                      <!--li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                              <div>
                                  <p class="app-notification__message">Lisa sent you a mail</p>
                                  <p class="app-notification__meta">2 min ago</p>
                              </div></a></li>
                      <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                              <div>
                                  <p class="app-notification__message">Mail server not working</p>
                                  <p class="app-notification__meta">5 min ago</p>
                              </div></a></li>
                      <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                              <div>
                                  <p class="app-notification__message">Transaction complete</p>
                                  <p class="app-notification__meta">2 days ago</p>
                              </div></a></li>
                      <div class="app-notification__content">
                          <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                  <div>
                                      <p class="app-notification__message">Lisa sent you a mail</p>
                                      <p class="app-notification__meta">2 min ago</p>
                                  </div></a></li>
                          <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                                  <div>
                                      <p class="app-notification__message">Mail server not working</p>
                                      <p class="app-notification__meta">5 min ago</p>
                                  </div></a></li>
                          <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                                  <div>
                                      <p class="app-notification__message">Transaction complete</p>
                                      <p class="app-notification__meta">2 days ago</p>
                                  </div></a></li>
                      </div>
                  </div>
                  <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
              </ul>
          </li-->
          <!-- User Menu-->
          <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu" style="text-transform: capitalize"><i class="fa fa-user fa-lg"></i>&nbsp;<?php echo $_SESSION['rol']?></a>
              <ul class="dropdown-menu settings-menu dropdown-menu-right">
                  <li><a class="dropdown-item" href="page-user.php"><i class="fa fa-user fa-lg"></i> Perfil</a></li>
                  <li><a class="dropdown-item" href="../../enrutador/enr_login.php?salir=true"><i class="fa fa-sign-out fa-lg"></i> Salir</a></li>
              </ul>
          </li>
      </ul>
  </header>
  <!-- Sidebar menu-->
  <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
  <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="../../imagenes/default_user.png" alt="User Image">
          <div>
              <p class="app-sidebar__user-name" style="text-transform: capitalize;"><?php echo $_SESSION['nombre']?></p>
              <p class="app-sidebar__user-designation" style="text-transform: capitalize;"><?php echo $_SESSION['papellido']." ".$_SESSION['sapellido']?></p>
          </div>
      </div>
      <ul class="app-menu">
          <?php if ($_SESSION['rol']=='personal' || $_SESSION['rol']=='administrador') {?>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user-circle"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu" >
                  <!--<li ><a class="treeview-item" href = "agregar-persona.php" ><i class="icon fa fa-circle-o" ></i > Crear Estudiante </a ></li >-->
                  <li ><a class="treeview-item" href = "agregar-empleado.php" ><i class="icon fa fa-user-plus" ></i >Registrar</a ></li >
                  <li ><a class="treeview-item" href = "table-personas.php" ><i class="icon fa fa-list" ></i > Listar Registros</a ></li >
                  <!--<li ><a class="treeview-item" href = "agregar_usuario.php" ><i class="icon fa fa-circle-o" ></i > Agregar Cuenta </a ></li >-->
                  <li ><a class="treeview-item" href = "listar_usuario.php" ><i class="icon fa fa-list" ></i > Listar Usuarios </a ></li >
                  <li ><a class="treeview-item" href = "listar_inhabilitados.php" ><i class="icon fa fa-list" ></i > Listar Usuarios Inhabilitados </a ></li >
                  <?php if ($_SESSION['rol']=='administrador'){?>
<!--                  <li ><a class="treeview-item" href = "crear_privilegios.php" ><i class="icon fa fa-plus" ></i > Crear privilegios </a ></li >-->
<!--                  <li ><a class="treeview-item" href = "listar_privilegios.php" ><i class="icon fa fa-list" ></i > Listar Privilegios</a ></li >-->
                  <?php }?>
              </ul >
              <?php if ($_SESSION['rol']=='administrador'){?>
       <!-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Roles</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
            <li><a class="treeview-item" href="crear_roles.php"><i class="icon fa fa-circle-o"></i> Crear</a></li>
              <li><a class="treeview-item" href="vst_rol1.php"><i class="icon fa fa-list"></i>Listar</a></li>
            <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
          </ul>
        </li>-->
          <?php  }}?>
<!--    Tramites      -->
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-clipboard"></i><span class="app-menu__label">Tramites</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <?php if ($_SESSION['rol']=='administrador' || $_SESSION['rol']=='personal' ) {?>
                    <li><a class="treeview-item" href="auxiliar_registro.php"><i class="icon fa fa-refresh"></i>Actualizar Tramite</a></li>
                    <li><a class="treeview-item" href="iniciar_tramite.php"><i class="icon fa fa-circle-o"></i>Iniciar Tramite</a></li>
                <?php if ($_SESSION['rol']=='administrador') {?>
                    <li><a class="treeview-item" href="tramites.php"><i class="icon fa fa-plus"></i>Crear Tramite</a></li>
                        <li><a class="treeview-item" href="modificartramite.php"><i class="icon fa fa-plus"></i>Modificar Tramite</a></li>
                <li><a class="treeview-item" href="modal_requisito.php"><i class="icon fa fa-plus"></i>Crear Requisito</a></li>
                <li><a class="treeview-item" href="listar_requisito.php"><i class="icon fa fa-list"></i>Listar Requisito</a></li>
                <li><a class="treeview-item" href="pasosplatilla.php"><i class="icon fa fa-plus"></i>Crear pasos</a></li>
                        <li><a class="treeview-item" href="listar_pasos.php"><i class="icon fa fa-list"></i>Listar Pasos</a></li>
                <?php  }}?>
                <?php if($_SESSION['rol']=='estudiante'){?>
                <li><a class="treeview-item" href="tramite_curso.php"><i class="icon fa fa-circle-o"></i>Estado de Tramite</a></li>
            <?php } ?>
            </ul>
        </li>
<!--   fin tramites       -->
          <?php if ($_SESSION['rol']=='administrador' || $_SESSION['rol']=='personal') {?>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-window-restore"></i><span class="app-menu__label">Estudios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
              <li><a class="treeview-item" href="inscribirse_curso_externo.php"><i class="icon fa fa-plus"></i>Inscribirse curso externo</a></li>
              <?php if($_SESSION['rol']=='administrador'){?>
              <li><a class="treeview-item" href="cursos_externos.php"><i class="icon fa fa-plus"></i>Crear Cursos</a></li>
              <?php } ?>
              <li><a class="treeview-item" href="listar_cursoexterno.php"><i class="icon fa fa-list"></i>Listar Cursos</a></li>
              <?php if($_SESSION['rol']=='administrador'){?>
              <li><a class="treeview-item" href="crear_carrera.php"><i class="icon fa fa-plus"></i>Crear Carreras</a></li>
              <?php } ?>
              <li><a class="treeview-item" href="listar_carrera.php"><i class="icon fa fa-list"></i>Listar Carreras</a></li>
              <li><a class="treeview-item" href="curso_estudiante.php"><i class="icon fa fa-list"></i>Listar Estudiantes en cursos</a></li>

          </ul>
            <?php  }?>
              <?php if ($_SESSION['rol']=='personal' || $_SESSION['rol']== 'administrador') {?>
              <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Reportes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                  <ul class="treeview-menu">
                      <li><a class="treeview-item" href="menu_reportes.php"><i class="icon fa fa-list-alt"></i>Reportes Tramites</a></li>
                  </ul>
              </li>


              <?php  }?>
        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">Pagina Informativa</span><i class="treeview-indicator fa fa-angle-right"></i></a>
          <ul class="treeview-menu">
              <li><a class="treeview-item" href="pagina_informativa.php"><i class="icon fa fa-clipboard"></i>Tramites Disponibles</a></li>
            </ul>
        </li>
<?php
if($_SESSION['rol']=='personal' || $_SESSION['rol']== 'administrador'){
?>
          <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cog"></i><span class="app-menu__label">Ayuda</span><i class="treeview-indicator fa fa-angle-right"></i></a>
              <ul class="treeview-menu">
                  <li><a class="treeview-item" href="manualusuario" target="_blank"><i class="icon fa fa-list-alt"></i>Manual de Usuario</a></li>
              </ul>

              <ul class="treeview-menu">
                  <li><a class="treeview-item" href="manualtecnico/MANUALTECNICO.pdf" target="_blank"><i class="icon fa fa-list-alt"></i>Manual Tecnico</a></li>
              </ul>
          </li>
          <?php } ?>
<!--        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-th-list"></i><span class="app-menu__label">Tables</span><i class="treeview-indicator fa fa-angle-right"></i></a>-->
<!--          <ul class="treeview-menu">-->
<!--            <li><a class="treeview-item" href="table-basic.html"><i class="icon fa fa-circle-o"></i> Basic Tables</a></li>-->
<!--            <li><a class="treeview-item" href="table-personas.php"><i class="icon fa fa-circle-o"></i> Data Tables</a></li>-->
<!--          </ul>-->
<!--        </li>-->
<!--        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>-->
<!--          <ul class="treeview-menu">-->
<!--            <li><a class="treeview-item" href="blank-page.html"><i class="icon fa fa-circle-o"></i> Blank Page</a></li>-->
<!--            <li><a class="treeview-item" href="page-login.php"><i class="icon fa fa-circle-o"></i> Login Page</a></li>-->
<!--            <li><a class="treeview-item" href="page-lockscreen.html"><i class="icon fa fa-circle-o"></i> Lockscreen Page</a></li>-->
<!--            <li><a class="treeview-item" href="page-user.html"><i class="icon fa fa-circle-o"></i> User Page</a></li>-->
<!--            <li><a class="treeview-item" href="page-invoice.html"><i class="icon fa fa-circle-o"></i> Invoice Page</a></li>-->
<!--            <li><a class="treeview-item" href="page-calendar.html"><i class="icon fa fa-circle-o"></i> Calendar Page</a></li>-->
<!--            <li><a class="treeview-item" href="page-mailbox.html"><i class="icon fa fa-circle-o"></i> Mailbox</a></li>-->
<!--            <li><a class="treeview-item" href="page-error.html"><i class="icon fa fa-circle-o"></i> Error Page</a></li>-->
<!--              <li><a class="treeview-item" href="visualizador.php"><i class="icon fa fa-circle-o"></i> visualizar</a></li>-->
<!--          </ul>-->
<!--        </li>-->



      </ul>
    </aside>
    <!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="../../bootstrap4/js/bootstrap.js"></script>
    <script src="js/main.js"></script>
  <script src="../../bootstrap4/js/bootstrap-select.min.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript">
      var data = {
      	labels: ["January", "February", "March", "April", "May"],
      	datasets: [
      		{
      			label: "My First dataset",
      			fillColor: "rgba(220,220,220,0.2)",
      			strokeColor: "rgba(220,220,220,1)",
      			pointColor: "rgba(220,220,220,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(220,220,220,1)",
      			data: [65, 59, 80, 81, 56]
      		},
      		{
      			label: "My Second dataset",
      			fillColor: "rgba(151,187,205,0.2)",
      			strokeColor: "rgba(151,187,205,1)",
      			pointColor: "rgba(151,187,205,1)",
      			pointStrokeColor: "#fff",
      			pointHighlightFill: "#fff",
      			pointHighlightStroke: "rgba(151,187,205,1)",
      			data: [28, 48, 40, 19, 86]
      		}
      	]
      };
      var pdata = [
      	{
      		value: 300,
      		color: "#46BFBD",
      		highlight: "#5AD3D1",
      		label: "Complete"
      	},
      	{
      		value: 50,
      		color:"#F7464A",
      		highlight: "#FF5A5E",
      		label: "In-Progress"
      	}
      ]

     // var ctxl = $("#lineChartDemo").get(0).getContext("2d");
      //var lineChart = new Chart(ctxl).Line(data);

      //var ctxp = $("#pieChartDemo").get(0).getContext("2d");
      //var pieChart = new Chart(ctxp).Pie(pdata);
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>
