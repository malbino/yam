<?php
if(isset($_POST['submit']))
{
    include_once ('menu.php');
    include_once ('../../modelo/conexion.php');
    $con=new conexion();
    $sql="select * from persona join estudiante e on persona.id_persona = e.persona_id_persona
join tramite t on e.id_estudiante = t.estudiante_id_estudiante and e.persona_id_persona = t.estudiante_persona_id_persona
join tramite_plantilla t2 on t.Tramite_plantilla_idTramite_plantilla = t2.idTramite_plantilla where estudiante_persona_id_persona =$_POST[estudiante]";
    $datos=$con->con_retorno($sql);
    ?>
    <main class="app-content">

        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i>Tramites</h1>
                <p>Actualizacion de Tramites</p>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Tramites</li>
                <li class="breadcrumb-item active"><a href="#">Actualizacion Tramite</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <center>
                            <h3>Actualizacion de Tramite</h3>
                        </center>
                    </div>
                        <div class="card-body">
                            <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                <tr>
                                    <th>Codigo del Tramite</th>
                                    <th>Tipo de Tramite</th>
                                    <th>Fecha Creado</th>
                                    <th>Estudiante</th>
                                    <th>Estado del Tramite</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                while ($row=mysqli_fetch_assoc($datos)){
                                    echo "
    <tr>
        <td>$row[id_tramite]</td>
        <td style='text-transform: capitalize;'>$row[nombretramite]</td>
        <td>$row[fecha_ingreso]</td>
        <td style='text-transform: capitalize;'>$row[nombre]</td>
        <form method='post' action='../../modelo/mdl_actualizar.php'>
        <td><input class='col-md-12' type='text' value='Condicion Actual: $row[condicion]' disabled><br><select name='condicion' id='condicion'>
        <option value='Recepcion'>Recepcion</option>
        <option value='Elaboracion'>Elaboracion</option>
        <option value='Firmas'>Firmas</option>
        <option value='Despacho'>Despacho</option>
        <option value='Archivos'>Archivos</option>
</select><button type='submit' name='id_tramite' value='$row[id_tramite]'>Actualizar </button></td>
    <td hidden><input type='hidden' name='correo' value='$row[email]'></td>
    <td hidden><input type='hidden' name='tramite' value='$row[nombretramite]'></td>
    </form>
    </tr>
        ";
                                }
                                ?>
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
    </main>

    <?php
}
else {
include_once ('menu.php');
include_once ('../../modelo/conexion.php');
$con=new conexion();
$sql="select distinct id_persona,nombre,papellido,sapellido
from persona join estudiante e on persona.id_persona = e.persona_id_persona
  join tramite t on e.id_estudiante = t.estudiante_id_estudiante and e.persona_id_persona = t.estudiante_persona_id_persona
where activotramiteiniciado=1 and activoestudiante =1 and activo=1;";
$datos=$con->con_retorno($sql);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Tramites</h1>
            <p>Actualizacion de Tramites</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tramites</li>
            <li class="breadcrumb-item active"><a href="iniciar_tramite.php">Iniciar Tramite</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <center>
                        <h3>Actualizacion de Tramite</h3>
                    </center>
                </div>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="card-body">
                    <div class="form-group row">
                        <label for="estudiante" class="col-md-4 col-form-label text-md-right">Nombre Estudiante</label>
                        <div class="col-md-6">
                            <select data-live-search="true" class="selectpicker" name="estudiante" id="estudiante" required>
                                <option value="" disabled selected style="display: none">Nada Seleccionado</option>
                                <?php
                                while ($row=mysqli_fetch_assoc($datos)){
                                    echo "<option style='text-transform: capitalize;' value='$row[id_persona]'>$row[nombre] $row[papellido] $row[sapellido]</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="form-group row">
                        <div class="col-md-4">
                            <input class="btn btn-success" type="submit" name="submit" value="Buscar">
                        </div>
                    </div>
                </div>
                </form>

            </div>
        </div>
    </div>
</main>
<?php
}
if(@$_SESSION['error']=="exitoso"){
    echo "<script>swal(
        'Tramite Actualizado!',
        ' Actualizacion exitosa!',
        'success'
    )</script>";
    $_SESSION['error']=" ";
}
?>