<?php include_once "menu.php";
include_once ('../../modelo/mdl_cursoexterno.php');
$ob=new mdl_curso();

$cur=$ob->listar();
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Cursos</h1>
            <p>Cursos externos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active">Estudios</li>
            <li class="breadcrumb-item active"><a href="listar_cursoexterno.php">Listar Cursos</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
            <div class="card">
                <div class="card-header"><center><h3>Cursos externos</h3></center></div>
                <form action="../../enrutador/enr_cursosexternos.php" method="post" autocomplete="off">
                <div class="card-body">
                        <div class="form-group row">
                            <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6"><input class="form-control" type="text" name="nombre" id="nombre" value="" required onkeypress="return letras(event);" maxlength="45"></div>
                        </div>
                </div>
                <div class="card-footer">
                    <div class="form-group row">
                    <div class="col-md-3">
                        <button class="btn btn-success" type="submit" name="asignar">Registrar</button>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-danger" href="menu.php">Cancelar</a>
                    </div>
                    </div>
                </div>
                </form>
            </div>
            </div>

                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><center><h3>Cursos Creados</h3></center></div>
                        <div class="card-body">
                            <?php
                            while ($row=mysqli_fetch_assoc($cur)){
                                echo "<div class='form-group row'>
                                 <button type='button' class='col-md-12 btn btn-default'>$row[nombrecurso]</button>                       
                                </div>";
                            }
                            ?>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                </div>

            </div>
        </div>
        </div>
</main>
<script type="text/javascript" src="../../js/validacion.js"></script>
<?php
if(@$_SESSION['error']=="exitoso"){
    echo "<script>swal(
  'Curso Creado!',
  ' Creacion exitosa!',
  'success'
)</script>";
    $_SESSION['error']=" ";
}
elseif(@$_SESSION['error']=="falla"){
    echo "<script>swal(
  'Falla En Creacion!',
  'Ya existe o ingreso dato invalido!',
  'error'
)</script>";
    $_SESSION['error']=" ";
}
?>