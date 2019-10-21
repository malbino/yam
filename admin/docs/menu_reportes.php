<?php
date_default_timezone_set('America/Boa_Vista');
$fecha= strftime("%d %m %Y");
$hora= strftime("%H %M %S");
include_once ('menu.php');
include_once ('../../modelo/conexion.php');
$con=new conexion();
$sql="select * from tramite_plantilla where activotramite=1";
$sql1="select * from persona join estudiante e on persona.id_persona = e.persona_id_persona
where activoestudiante=1 and activo=1";
$sql3="select * from empleado join persona p on empleado.persona_id_persona = p.id_persona
where activoempleado=1 and activo =1";
$sql4="select distinct condicion from tramite where activotramiteiniciado=1";
$datosestudiante=$con->con_retorno($sql1);
$datostipotramite=$con->con_retorno($sql);
$datospersonal=$con->con_retorno($sql3);
$datostramite=$con->con_retorno($sql4);
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-home"></i>Reportes</h1>
            <p>Reportes Tramites</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="index.php">Pagina Principal
                </a></li>
        </ul>
    </div>
    <div class="card">
        <div class="card-header">
            <center>
                <h3>Menu de Reportes</h3>
                <?php
               
                ?>
            </center></div>
        <div class="card-body">
<!--     primer reporte  1.-Tipo de Tramite y fecha     -->
            <h5 style="font-family:Century Schoolbook">Reportes por Tramite y Fecha</h5>
            <form action="reportes.php" method="post">
            <div class="form-group row">
                <div class="col-md-2 title">
                    <label for="tipotramite" class="col-form-label">Tipo de Tramite</label>
                </div>
                <div class="col-md-3">
                    <select data-live-search="true" class="selectpicker" name="tipotramite" id="tipotramite" required>
                        <option value="" disabled selected style="display: none">Nada Seleccionado</option>
                        <?php
                        while ($row=mysqli_fetch_assoc($datostipotramite)){
                            echo "<option value='$row[idTramite_plantilla]'>$row[nombretramite]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2">
                    <label class="col-form-label" for="fecha">Fecha y Hora</label>
                </div>
                <div class="col-md-3">
                    <input id="fecha" name="fecha" type="date"><sup>Opcional</sup>
                </div>
                <div class="col-md-2"><button type="submit" name="primero" class="btn btn-info">Generar Reporte</button></div>
            </div>
            </form>
            <hr align="left" noshade="noshade" size="2" />
<!--    segundo reporte        -->
            <h5 style="font-family:Century Schoolbook">Reportes por Estudiante</h5>
            <form action="reportes.php" method="post">
            <div class="form-group row">
                <div class="col-md-2 title">
                    <label for="idestudiante" class="col-form-label">Seleccione estudiante</label>
                </div>
                <div class="col-md-3">
                    <select data-live-search="true" class="selectpicker" name="idestudiante" id="idestudiante" required="required">
                        <option value="" disabled selected style="display: none">Nada Seleccionado</option>
                        <?php
                        while ($row=mysqli_fetch_assoc($datosestudiante)){
                            echo "<option value='$row[id_estudiante]'>$row[nombre] $row[papellido] $row[sapellido]</option>";

                        }
                        ?>
                    </select>
            </div>
                <div class="col-md-2"><button type="submit" name="segundo" class="btn btn-info">Generar Reporte</button></div>
            </div>
            </form>
            <hr align="left" noshade="noshade" size="2" />
<!--    tercero reporte        -->
            <h5 style="font-family:Century Schoolbook">Reportes por Fecha</h5>
            <form action="reportes.php" method="post">
            <div class="form-group row">
                <div class="col-md-2 title">
                    <label for="fecha2" class="col-form-label">Seleccione fecha</label>
                </div>
                <div class="col-md-3">
                    <input required name="fecha2" id="fecha2" type="date">
                </div>
                <div class="col-md-2"><button type="submit" name="tercero" class="btn btn-info">Generar Reporte</button></div>
            </div>
            </form>
            <hr align="left" noshade="noshade" size="2" />
<!--    cuarto reporte        -->
            <h5 style="font-family:Century Schoolbook">Reportes por Personal</h5>
            <form action="reportes.php" method="post">
            <div class="form-group row">
                <div class="col-md-2 title">
                    <label for="personal" class="col-form-label">Seleccione Personal</label>
                </div>
                <div class="col-md-3">
                    <select data-live-search="true" class="selectpicker" name="personal" id="personal" required>
                        <option value="" disabled selected style="display: none">Nada Seleccionado</option>
                        <?php
                        while ($row=mysqli_fetch_assoc($datospersonal)){
                            echo "<option value='$row[persona_id_persona]'>$row[nombre] $row[papellido] $row[sapellido]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2"><button type="submit" name="cuarto" class="btn btn-info">Generar Reporte</button></div>
            </div>
            </form>
            <hr align="left" noshade="noshade" size="2" />
<!--    quinto reporte        -->
            <h5 style="font-family:Century Schoolbook">Reportes por Estado</h5>
            <form action="reportes.php" method="post">
            <div class="form-group row">
                <div class="col-md-2 title">
                    <label for="estadotramite" class="col-form-label">Estado Tramite</label>
                </div>
                <div class="col-md-3">
                    <select data-live-search="true" class="selectpicker" name="estadotramite" id="estadotramite" required>
                        <option value="" disabled selected style="display: none">Nada Seleccionado</option>
                        <?php
                        while ($row=mysqli_fetch_assoc($datostramite)){
                            echo "<option value='$row[condicion]'>$row[condicion]</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="col-md-2"><button type="submit" name="quinto" class="btn btn-info">Generar Reporte</button></div>
            </div>
            </form>
        </div>
        <div class="card-footer"></div>
    </div>
</main>
