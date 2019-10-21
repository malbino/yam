<?php include_once "menu.php";
include_once ('../../modelo/conexion.php');
$con=new conexion();

if(isset($_POST['submit'])){
$sql ="select * from tramite_plantilla where idTramite_plantilla = $_POST[idtramite] and activotramite=1";
$tramite=$con->con_retorno($sql);
$sql2="select * from necesita
join requisito_plantilla rp on necesita.Requisito_plantilla_id_Requisitoplantilla = rp.id_Requisitoplantilla
where Tramite_plantilla_idTramite_plantilla=$_POST[idtramite];";
$requisito=$con->con_retorno($sql2);
$sql3="select * from paso_plantilla
  join procede p on paso_plantilla.id_Pasoplantilla = p.paso_plantilla_id_Pasoplantilla
where tramite_plantilla_idTramite_plantilla=$_POST[idtramite]";
$paso=$con->con_retorno($sql3);
    ?>
    <main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Tramite</h1>
            <p>Modificacion de Tramite</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active">Modificar Tramite</li>
            <li class="breadcrumb-item active"><a href="tramites.php">Crear Tramite</a></li>
        </ul>
    </div>
        <div class="col-md-12">
            <div class="card">
                <form action="#" method="post">
                <div class="card-header"><center><h3>Modificar Tramite</h3></center></div>
                <div class="card-body">
                    <div class="form-group row">
                        <?php $rowtramite=mysqli_fetch_assoc($tramite);
                        ?>
                        <label for="nombretramite" class="col-md-3 col-form-label text-md-right">Nombre Tramite</label>
                        <div class="col-md-6">
                            <input type="text" name="nombretramite" id="nombretramite" class="form-control" value="<?php echo $rowtramite['nombretramite']?>" maxlength="100">
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-success col-md-8">Modificar nombre</button>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><center><h3>Requisitos</h3></center></div>
                                <div class="card-body">
                                    <?php

                                    $nu=1;
                                    while ( $rowrequsito=mysqli_fetch_assoc($requisito)){
                                        echo "<div class='form-group row'>
                                        <label for=\"Requisito$nu\" class=\"col-md-4 col-form-label text-md-right\">Nombre Requsito</label>
                        <div class=\"col-md-6\">
                            <input type=\"text\" name=\"Requisito$nu\" id=\"Requisito$nu\" class=\"form-control\" value=\" $rowrequsito[nombrerequisitoplatilla]\" maxlength=\"100\" readonly>
                        </div></div>";
                                   $nu+=1; }
                                    ?>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header"><center><h3>Pasos</h3></center></div>
                                <div class="card-body">
                                    <?php
                                    $nu=1;
                                    while ( $rowpaso=mysqli_fetch_assoc($paso)){
                                        echo "<div class='form-group row'>
                                        <label for=\"paso$nu\" class=\"col-md-4 col-form-label text-md-right\">Nombre Requsito</label>
                        <div class=\"col-md-6\">
                            <input type=\"text\" name=\"paso$nu\" id=\"paso$nu\" class=\"form-control\" value=\" $rowpaso[nombrepasoplantilla]\" maxlength=\"40\" readonly>
                        </div></div>";
                                        $nu+=1; }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </form>
                </div>
                </div>
    </main>
<?php }
else {
    $sql = "select * from tramite_plantilla where activotramite=1";
    $tra = $con->con_retorno($sql);
}
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Tramite</h1>
            <p>Modificacion de Tramite</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active">Modificar Tramite</li>
            <li class="breadcrumb-item active"><a href="tramites.php">Crear Tramite</a></li>
        </ul>
    </div>
        <div class="col-md-12">
            <div class="card">
                <form action="modificar_tramite_final.php" method="post">
                <div class="card-header"><center><h3>Buscar Tramite</h3></center></div>
                <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-2 title">
                                <label for="idtramite" class="col-form-label">Seleccione Tramite</label>
                            </div>
                            <div class="col-md-3">
                                <select data-live-search="true" class="selectpicker" name="idtramite" id="idtramite" required="required">
                                    <option value="" disabled selected style="display: none">Nada Seleccionado</option>
                                    <?php
                                    while ($row=mysqli_fetch_assoc($tra)){
                                        echo "<option value='$row[idTramite_plantilla]'>$row[nombretramite]</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                </div>
                <div class="card-footer">
                    <div class="col-md-2"><input class="btn btn-success" type="submit" name="submit" value="Buscar"></div>
                </div>
                </form>
            </div>
        </div>

</main>
