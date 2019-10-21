<?php
include_once ('menu.php');
require ('../../modelo/mdl_cursoexterno.php');
$tram= new mdl_curso();
$consulta_curso=$tram->listar();
$consulta_estudiante=$tram->listar_estudiante();
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Pasos</h1>
            <p>Creacion de Pasos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="modal-modificar-rol.php">Crear Pasos</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center><h4>Inscripcion a curso externo</h4></center></div>
                <form action="../../enrutador/enr_cursosexternos.php" method="post">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="curso">Tipos de Cursos</label></div>
                            <div class="col-md-4"><select id="curso" name="curso" class="selectpicker" data-show-subtext="true" data-live-search="true" required>
                                    <option value="" disabled selected style="display: none">Nada Seleccionado</option>
                                    <?php
                                    while ($datos_curso=mysqli_fetch_assoc($consulta_curso))
                                    {
                                        echo "<option value='$datos_curso[id_Curso]'>$datos_curso[nombrecurso]</option>";
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
                                        echo "<option value='$datos_estudiante[id_persona]'>$datos_estudiante[nombre] $datos_estudiante[papellido] $datos_estudiante[sapellido]</option>";
                                    }
                                    ?>
                                </select></div>

                        </div>


                    </div>
                    <div class="card-footer">
                        <div class="form-group row">
                            <div class="col-md-2">
                                <button class="btn btn-success" type="submit" name="subircurso">Finalizar
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
if(@$_SESSION['error']=="exitoso"){
    echo "<script>swal(
  'Curso Iniciado!',
  ' Inicializacion exitosa!',
  'success'
)</script>";
    $_SESSION['error']=" ";
}
elseif(@$_SESSION['error']=="falla"){
    echo "<script>swal(
  'Falla En Iniciar!',
  'Ya existe o ingreso datos invalidos!',
  'error'
)</script>";
    $_SESSION['error']=" ";
}
?>