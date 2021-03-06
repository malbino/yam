<?php
include_once ('../../modelo/mdl_requisito.php');
include_once 'menu.php';
$ob=new mdl_requisito();
$paso=$ob->listar_paso();
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Pasos</h1>
            <p>Creacion de Pasos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tramites</li>
            <li class="breadcrumb-item active"><a href="listar_pasos.php">Listar Pasos</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-6">
            <div class="card">
                <div class="card-header"><center><h3>Creacion de Pasos</h3></center>
                </div>
                <form action="../../enrutador/enr_pasoplantilla.php"  method="post" autocomplete="off">
                <div class="card-body">
                    <div class="form-group row ">

                        <label for="nombrepasoplantilla" class="col-md-4 col-form-label text-md-right">Nombre del Paso</label>
                        <div class="col-md-6"><input id="nombrepasoplantilla" name="nombrepasoplantilla" type="text" class="form-control" value="" required onkeypress="return letras(event);" maxlength="45" ></div>

                    </div>

                        <div class="form-group row ">
                                <label for="duracion" class="col-md-4 col-form-label text-md-right">Duracion Aproximada &nbsp;<sub><i>(En Dias)</i></sub></label>
                            <div class="col-md-6">
                                <input id="duracion" name="duracion" type="number" class="form-control" value="" min="0">
                            </div>
                        </div>
                </div>
                    <div class="card-footer">
                        <div class="form-group row ">
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-success" name="insertarpaso" >Agregar</button>
                            </div>

                        <div class="col-md-3">
                            <a type="button" href="tramites.php" class="btn btn-danger" name="insertar" >Cancelar</a>
                        </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header"><center><h3>Pasos Creados</h3></center></div>
                        <div class="card-body">
                            <?php
                            while ($row=mysqli_fetch_assoc($paso)){
                                echo "<div class='form-group '>
                                 <p  class='col-md-12 form-control' style='text-transform: capitalize'>$row[nombrepasoplantilla]</p>                       
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
    </div>
</main>
<script type="text/javascript" src="../../js/validacion.js"></script>
<?php
if(@$_SESSION['error']=="exitoso"){
    echo "<script>
swal(
  'Creacion exitosa !',
  'Paso Creado!',
  'success'
)
</script>";
    $_SESSION['error']="";
}
elseif (@$_SESSION['error']=="falla"){
    echo "<script>swal(
  'Falla en Creacion !',
  'Paso duplicado!',
  'error'
)</script>";
    $_SESSION['error']="";
}
?>










