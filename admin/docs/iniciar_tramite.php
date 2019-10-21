<?php
include_once ('menu.php');
require ('../../modelo/mdl_tramite.php');
$tram= new mdl_tramite();
$consulta_estudiante=$tram->listar_estudiante();
$consulta_tramite=$tram->listar_tramite();
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Pasos</h1>
            <p>Creacion de Pasos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="tramites.php">Crear Tramite</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
<div class="card-header"><center><h4>Iniciar tramite</h4></center></div>
                <form action="../../enrutador/enr_inicio_tramite.php" method="post" enctype="multipart/form-data">
                    <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-2"><label class="col-form-label text-md-right" for="nombretramite">Tipo de Tramite</label></div>
                    <div class="col-md-4"><select id="nombretramite" name="nombretramite" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
                            <option value="" disabled selected style="display: none">Nada Seleccionado</option>
                        <?php
                        while ($datos_tramite=mysqli_fetch_assoc($consulta_tramite))
                        {
                            echo "<option value='$datos_tramite[idTramite_plantilla]'>$datos_tramite[nombretramite]</option>";
                        }
                        ?>
                        </select></div>
                </div>
                <div class="form-group row">
                    <div class="col-md-2"><label class="col-form-label text-md-right" for="estudiante">Estudiante </label></div>
                    <div class="col-md-4"><select id="estudiante" name="estudiante" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
                            <option value="" disabled selected style="display: none">Nada Seleccionado</option>
                            <?php
                            while ($datos_estudiante=mysqli_fetch_assoc($consulta_estudiante))
                            {
                                echo "<option value='$datos_estudiante[id_estudiante]' style='text-transform: capitalize'>$datos_estudiante[nombre] $datos_estudiante[papellido] $datos_estudiante[sapellido]</option>";
                            }
                            ?>
                        </select></div>

                </div>
                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="anexo">Anexo de documentos (PDF)</label></div>
                            <div class="col-md-4"><input name="archivo" type="file" id="archivo" accept=".pdf"></div>
                        </div>


            </div>
            <div class="card-footer">
                <div class="form-group row">
                    <div class="col-md-2">
                        <button class="btn btn-success" type="submit" name="subirtramite">Finalizar
                        </button>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-get-started" type="reset">Cancelar</button>
                    </div>
                </div>
            </div>
                </form>
            </div>
        </div>
    </div>
</main>
<?php
if(@$_SESSION['error']=="falla"){
echo "<script>swal(
  'Tramite Falla!',
  'Registro Falla!',
  'error'
)</script>";
$_SESSION['error']=" ";
}
?>
