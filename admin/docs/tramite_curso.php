<?php
include_once ('menu.php');
include_once ('../../modelo/conexion.php');
$ob=new conexion();
$sql="select * from tramite join tramite_plantilla tp on tramite.Tramite_plantilla_idTramite_plantilla = tp.idTramite_plantilla
join estudiante e on tramite.estudiante_id_estudiante = e.id_estudiante and tramite.estudiante_persona_id_persona = e.persona_id_persona
join persona p on e.persona_id_persona = p.id_persona where id_persona='$_SESSION[id_persona]'";
$datos=$ob->con_retorno($sql);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Tramites</h1>
            <p>Tramites</p>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tramites</li>
            <li class="breadcrumb-item"><a href="#">Tramites</a></li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            <center><h1>Tramites Solicitados</h1></center>
        </div>
        <div class="card-body">
            <?php
            while ($row=mysqli_fetch_assoc($datos)){
                echo "<li><a href='visualizador.php?id=$row[id_tramite]'>$row[nombretramite]</a></li>";
            }
            ?>
        </div>

    </div>
</main>