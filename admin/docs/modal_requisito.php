<?php
include_once ('../../modelo/mdl_requisito.php');
include_once "menu.php";
$ob=new mdl_requisito();
$requi=$ob->listar_requisito();
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Requisitos</h1>
            <p>Creacion de Requisitos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="listar_requisito.php">Listar Requisitos</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
            <div class="col-md-6">
            <div class="card">
                <div class="card-header"><center><h3>Creacion de Requisitos</h3></center></div>
                    <form action="../../enrutador/enr_requisito.php"  method="post" autocomplete="off">
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="requisito" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6"><input id="requisito" name="requisito" type="text" class="form-control" value=""  required  maxlength="150"></div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="form-group row ">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary" name="insertar" >Agregar</button>
                                </div>
                            </div>
                        </div>
                    </form>
            </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><center><h3>Requisitos Creados</h3></center></div>
                    <div class="card-body">
                        <?php
                        while ($row=mysqli_fetch_assoc($requi)){
                            echo "<div class='form-group'>
                                 <p class='col-md-12 form-control' style='text-transform: capitalize; text-align: center;font-weight: bold'>$row[nombrerequisitoplatilla]</p>                       
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
    echo "<script>
swal(
  'Creacion exitosa !',
  'Requisto Creado!',
  'success'
)
</script>";
    $_SESSION['error']="";
}
elseif (@$_SESSION['error']=="falla"){
    echo "<script>swal(
  'Falla en Creacion !',
  'Requisito duplicado!',
  'error'
)</script>";
    $_SESSION['error']="";
}
?>









