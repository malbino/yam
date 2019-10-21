<?php
include_once ('menu.php');
include_once ('../../modelo/conexion.php');
if(isset($_POST['submit'])) {
    $id=$_POST['idtramite'];
}elseif (isset($_GET['i'])){
    $id=$_GET['i'];
}
$con=new conexion();
$sql ="select * from tramite_plantilla where idTramite_plantilla = $id and activotramite=1";
$tramite=$con->con_retorno($sql);
$sql2="select * from necesita
join requisito_plantilla rp on necesita.Requisito_plantilla_id_Requisitoplantilla = rp.id_Requisitoplantilla
where Tramite_plantilla_idTramite_plantilla=$id;";
$requisito=$con->con_retorno($sql2);
$sql3="select * from paso_plantilla
  join procede p on paso_plantilla.id_Pasoplantilla = p.paso_plantilla_id_Pasoplantilla
where tramite_plantilla_idTramite_plantilla=$id";
$paso=$con->con_retorno($sql3);
    ?>
<main class="app-content" xmlns="http://www.w3.org/1999/html">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Tramite</h1>
            <p>Modificacion de Tramite</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active">Modificar Tramite</li>
            <li class="breadcrumb-item active"><a href="tramites.php">Tramites</a></li>
        </ul>
    </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><center><h3>Modificar Tramite</h3></center></div>
                <div class="card-body">
                    <form action="../../modelo/mdl_modificar_tramite.php" method="post" autocomplete="off">
                    <div class="form-group row">
                        <?php $rowtramite=mysqli_fetch_assoc($tramite);
                        ?>

                        <label for="nombretramite" class="col-md-3 col-form-label text-md-right">Nombre Tramite</label>
                        <div class="col-md-6">
                            <input type="text" name="nombretramite" id="nombretramite" class="form-control" value="<?php echo $rowtramite['nombretramite']?>" maxlength="100">
                            <input type="text" name="idtramite" id="idtramite" class="form-control" value="<?php echo $rowtramite['idTramite_plantilla']?>" hidden>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-success col-md-8" type="submit" name="modificarnombre">Modificar nombre</button>
                        </div>

                    </div>
                    </form>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><center><h3>Requisitos</h3>
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalrequisito">
                                            Agregar Requisito
                                        </button>
                                    </center></div>
                                <div class="card-body">
                                    <?php

                                    $nu=1;
                                    while ( $rowrequsito=mysqli_fetch_assoc($requisito)){
                                        echo "<div class='form-group row'>
                                        <label for=\"Requisito$nu\" class=\"col-md-4 col-form-label text-md-right\">Nombre Requsito</label>
                        <div class=\"col-md-6\">
                            <input type=\"text\" name=\"Requisito$nu\" id=\"Requisito$nu\" class=\"form-control\" value=\" $rowrequsito[nombrerequisitoplatilla]\" maxlength=\"100\" readonly>
                        </div><a class='btn btn-danger' href='../../modelo/mdl_modificar_tramite.php?nombre=$rowrequsito[nombrerequisitoplatilla]'>Elminar</a></div>";
                                   $nu+=1; }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><center><h3>Pasos</h3><!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalpaso">
                                            Agregar Paso
                                        </button></center></div>
                                <div class="card-body">
                                    <?php
                                    $nu=1;
                                    while ( $rowpaso=mysqli_fetch_assoc($paso)){
                                        echo "<div class='form-group row'>
                                        <label for=\"paso$nu\" class=\"col-md-4 col-form-label text-md-right\">Nombre Requsito</label>
                        <div class=\"col-md-6\">
                            <input type=\"text\" name=\"paso$nu\" id=\"paso$nu\" class=\"form-control\" value=\" $rowpaso[nombrepasoplantilla]\" maxlength=\"40\" readonly>
                        </div><a class='btn btn-danger' href='../../modelo/mdl_modificar_tramite.php?paso=$rowpaso[nombrepasoplantilla]'>Elminar</a></div>";
                                        $nu+=1; }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </div>
                </div>



        <!-- Modal requisito -->
        <div class="modal fade" id="modalrequisito" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Agregar Requisito</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php
                        $sql4="select * from requisito_plantilla where activorequisitoplantilla =1";
                        $datosrequisito=$con->con_retorno($sql4);
                        ?>
                        <form action="../../modelo/mdl_modificar_tramite.php" method="post">
                        <div class="form-group row">
                            <label for="modalnombrerequisito" class="col-md-4 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6">
                                <select class="custom-select" name="modalnombrerequisito" id="modalnombrerequisito" onchange ="labores()">
                                    <option value="" disabled selected hidden>Nada Seleccionado</option>
                                    <?php
                                    while ($row=mysqli_fetch_assoc($datosrequisito)){
                                        echo "<option value='$row[id_Requisitoplantilla]'>".$row['nombrerequisitoplatilla']."</option>";
                                    }
                                    ?>
                                </select>
                                <input type="text" name="idtramite" value="<?php echo $id?>" hidden>
                                </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" name="modalrequisito" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    <!-- Modal requisito -->
    <div class="modal fade" id="modalpaso" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Paso</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?php
                    $sql5="select * from paso_plantilla where activopasoplantilla =1";
                    $datospaso=$con->con_retorno($sql5);
                    ?>
                    <form action="../../modelo/mdl_modificar_tramite.php" method="post">
                        <div class="form-group row">
                            <label for="modalnombrepaso" class="col-md-4 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6">
                                <select class="custom-select" name="modalnombrepaso" id="modalnombrepaso" onchange ="labores()">
                                    <option value="" disabled selected hidden>Nada Seleccionado</option>
                                    <?php
                                    while ($row=mysqli_fetch_assoc($datospaso)){
                                        echo "<option value='$row[id_Pasoplantilla]'>".$row['nombrepasoplantilla']."</option>";
                                    }
                                    ?>
                                </select>
                                <input type="text" name="idtramite" value="<?php echo $id?>" hidden>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="modalpaso" class="btn btn-primary">Guardar</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </main>
<?php
if(@$_SESSION['error']=="nombre"){
    echo "<script>swal(
  'Nombre Modificado!',
  ' Modificacion exitosa!',
  'success'
)</script>";
    $_SESSION['error']=" ";
}
elseif (@$_SESSION['error']=="requisito"){
    echo "<script>swal(
  'Requsito Eliminado!',
  ' Modificacion exitosa!',
  'success'
)</script>";
    $_SESSION['error']=" ";
}
elseif (@$_SESSION['error']=="paso"){
    echo "<script>swal(
  'Paso Eliminado!',
  ' Modificacion exitosa!',
  'success'
)</script>";
    $_SESSION['error']=" ";
}
elseif (@$_SESSION['error']=="requisitoagregado"){
    echo "<script>swal(
  'Requsito Agregado!',
  ' Modificacion exitosa!',
  'success'
)</script>";
    $_SESSION['error']=" ";
}
elseif (@$_SESSION['error']=="pasoagregado"){
    echo "<script>swal(
  'Paso Agregado!',
  ' Modificacion exitosa!',
  'success'
)</script>";
    $_SESSION['error']=" ";
}

?>