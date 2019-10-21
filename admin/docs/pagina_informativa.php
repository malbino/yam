 <?php
  include_once('menu.php');
  include_once ('../../modelo/conexion.php');
  $con= new conexion();
  $sql="select * from tramite_plantilla where activotramite=1";
  $datos=$con->con_retorno($sql);
 ?>
 <main class="app-content">
    <div class="app-title">
        <div>
                <h1><i class="fa fa-th-list"></i>Pagina Informativa</h1>
            <p>Informacion de los tramites</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="index.php">Pagina Principal</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
        <div class="form-group">
            <div class="card">
                <div class="card-header">
                    <center><h3>Tramites Disponibles </h3></center>
                </div>
                <div class="card-body">
                    <?php
                    while ($row= mysqli_fetch_assoc($datos)){
                        echo "<div class='form-group row'>
                    <div class='col-md-12'>
                    <a href='vst_informativa.php?codigo=$row[idTramite_plantilla]&nombre=$row[nombretramite]' class='btn btn-success col-md-6' style='font-weight:bold;text-transform: capitalize;'>$row[nombretramite]</a>
             </div>
                        </div>";
                    }
                    ?>
                </div>
                <div class="card-footer"></div>
            </div>
        </div>
    </div>
     </div>
     
</main>