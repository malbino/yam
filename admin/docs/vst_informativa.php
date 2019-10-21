<?php
include_once ('menu.php');
require ('../../modelo/conexion.php');
$con=new conexion();
$codigo=$_GET['codigo'];
$sql="select * from requisito_plantilla join necesita n on requisito_plantilla.id_Requisitoplantilla = n.Requisito_plantilla_id_Requisitoplantilla
join tramite_plantilla tp on n.Tramite_plantilla_idTramite_plantilla = tp.idTramite_plantilla where idTramite_plantilla =$codigo";
$consulta1=$con->con_retorno($sql);
$sql2="select *
from paso_plantilla join procede p on paso_plantilla.id_Pasoplantilla = p.paso_plantilla_id_Pasoplantilla
join tramite_plantilla tp on p.tramite_plantilla_idTramite_plantilla = tp.idTramite_plantilla where idTramite_plantilla =$codigo";
$consulta2=$con->con_retorno($sql2);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Informaciones</h1>
            <p>Listado de Roles registrados en el sistema</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Informaciones</li>
            <li class="breadcrumb-item active"><a href="pagina_informativa.php">Pagina Informativa</a></li>
        </ul>
    </div>
    <div class="col-md-12">

        <div class="card">

            <div class="card-header">
                <center>
                    <h3><?php echo $_GET['nombre']?></h3>
                </center>
            </div>
            <div class="card-body">
                <div class="form-group row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><center><h3>Requisitos</h3></center></div>

                        <div class="card-body">
                            <?php
                            while ($row=mysqli_fetch_assoc($consulta1)){
                                echo "<div class='row'><div class='col-md-12 border'><center><span>$row[nombrerequisitoplatilla]</span></center></div></div>";
                            }
                            ?>
                        </div>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><center><h3>Pasos</h3></center></div>
                        <div class="card-body">
                            <?php
                            $resultado=0;
                            while ($row=mysqli_fetch_assoc($consulta2)){
                                echo "<div class='row'><div class='col-md-12 border'><center><span>$row[nombrepasoplantilla]</span></center></div></div>";
                                    $resultado=$resultado+$row['duracion'];
                            }
                            echo "<div class='col-md-12 border'><center><span>Tiempo estimado en dias: $resultado</span></center></div>";
                            ?>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            <div class="card-footer">
                <div class="text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Imprimir</a></div>
            </div>
        </div>
    </div>
</main>
