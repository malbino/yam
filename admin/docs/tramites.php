<?php include_once/** @lang text */
("menu.php");
include_once ('../../modelo/mdl_requisito.php');
$ob=new mdl_requisito();
$dato=$ob->listar_requisito();
$pasos=$ob->listar_paso();
$tra=$ob->listar_tramites();

?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Tramite</h1>
            <p>Registro tramites</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item"><a href="modal_requisito.php">Crear Requisitos</a></li>
            <li class="breadcrumb-item"><a href="pasosplatilla.php">Crear Pasos</a></li>
        </ul>
    </div>
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <center><h3>Tramites</h3></center>
                    </div>
                    <form action="../../enrutador/enr_tramite.php" method="post" autocomplete="off">
                    <div class="card-body">

                            <div class="form-group row">
                                <div class="col-md-4"><label class="col-form-label text-md-right" for="nombre">Nombre</label></div>
                                <div class="col-md-8"><input class="form-control" type="text" required name="nombre" id="nombre" placeholder="Nombre del Tramite" maxlength="100"></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4"><label class="col-form-label text-md-right" for="req">Requisito</label></div>
                                <div class="col-md-8"><select id="req" class="selectpicker" required name="req[]"  multiple data-live-search="true">
                                        <option style="display: none" value="" disabled>Nada Seleccionado</option>
                                        <?php
                                        while($row=mysqli_fetch_assoc($dato)){
                                            echo "<option>".$row['nombrerequisitoplatilla']."</option>";
                                        }?>
                                    </select></div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-4"><label class="col-form-label text-md-right" for="pas">Pasos</label></div>
                                <div class="col-md-8"><select  id="pas" class="selectpicker" name="pas[]"  multiple data-live-search="true">
                                        <option style="display: none" value="" disabled>Nada Seleccionado</option>
                                        <?php
                                        while($p=mysqli_fetch_assoc($pasos)){
                                            echo "<option>".$p['nombrepasoplantilla']."</option>";
                                        }?>
                                    </select></div>
                            </div>
                    </div>
                        <div class="card-footer">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <button class="btn btn-success" type="submit" name="action">Finalizar
                                    </button>
                                </div>
                                <div class="col-md-6">
                                    <button class="btn btn-get-started" type="reset">Cancelar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><center><h3>Tramites Elaborados</h3></center></div>
                    <div class="card-body">
                      <?php
                      while ($row=mysqli_fetch_assoc($tra)){
                          echo "<div class='form-group row'>
                                 <button type='button' class='col-md-12 btn btn-default' style='text-transform: capitalize;'>$row[nombretramite]</button>                       
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
<script type="text/javascript" src="../../js/validacion.js"></script>
<?php
if(@$_SESSION['error']=="exitoso"){
echo "<script>swal(
        'Tramite Creado!',
        'Creacion exitosa!',
        'success'
    )</script>";
$_SESSION['error']=" ";
}
elseif(@$_SESSION['error']=="falla"){
echo "<script>swal(
        'Falla Al Crear!',
        'Ya existe o ingreso datos invalidos!',
        'error'
    )</script>";
$_SESSION['error']=" ";
}
?>