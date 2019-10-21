<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
</head>
<body>

<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="reporte/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'csv', 'pdf', 'colvis' ]
        } );

        table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
</script>
</body>
<?php
$html="";

include ('mpdf/mpdf.php');
include_once ('../../modelo/conexion.php');
$con=new conexion();
if(isset($_POST['primero'])){
    if($_POST['fecha']){
        $datosprimero=$con->con_retorno("select id_tramite,nombretramite,nombretramite, CONCAT(p.nombre, ' ' , p.papellido,' ',p.sapellido) as estudiante,
  fecha_ingreso, concat_ws(' ',p2.nombre,p2.papellido,p2.sapellido ) as personal
from tramite join tramite_plantilla tp on tramite.Tramite_plantilla_idTramite_plantilla = tp.idTramite_plantilla
  join estudiante e on tramite.estudiante_id_estudiante = e.id_estudiante and tramite.estudiante_persona_id_persona = e.persona_id_persona
  join persona p on e.persona_id_persona = p.id_persona
  join empleado e2 on tramite.empleado_persona_id_persona = e2.persona_id_persona
  join persona p2 on e2.persona_id_persona = p2.id_persona where Tramite_plantilla_idTramite_plantilla=$_POST[tipotramite] and activotramite=1 and fecha_ingreso='$_POST[fecha]'");
    }
    else {
        $datosprimero = $con->con_retorno("select id_tramite,nombretramite,nombretramite, CONCAT(p.nombre, ' ' , p.papellido,' ',p.sapellido) as estudiante,
  fecha_ingreso, concat_ws(' ',p2.nombre,p2.papellido,p2.sapellido ) as personal
from tramite join tramite_plantilla tp on tramite.Tramite_plantilla_idTramite_plantilla = tp.idTramite_plantilla
  join estudiante e on tramite.estudiante_id_estudiante = e.id_estudiante and tramite.estudiante_persona_id_persona = e.persona_id_persona
  join persona p on e.persona_id_persona = p.id_persona
  join empleado e2 on tramite.empleado_persona_id_persona = e2.persona_id_persona
  join persona p2 on e2.persona_id_persona = p2.id_persona where Tramite_plantilla_idTramite_plantilla=$_POST[tipotramite] and activotramite=1");
    }
    ?>
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
    <thead>
    <tr>
        <th>Codigo del Tramite</th>
        <th>Tipo de Tramite</th>
        <th>Fecha Creado</th>
        <th>Estudiante</th>
    </tr>
    </thead>
    <tbody>
    <?php
    while ($row=mysqli_fetch_assoc($datosprimero)){
        echo "
    <tr>
        <td>$row[id_tramite]</td>
        <td>$row[nombretramite]</td>
        <td>$row[fecha_ingreso]</td>
        <td>$row[estudiante]</td>
    </tr>
        ";
    }
    ?>
    </tbody>
</table>
<?php
}
elseif (isset($_POST['segundo'])){
    $datossegundo=$con->con_retorno("select id_tramite,nombretramite,nombretramite, CONCAT(p.nombre, ' ' , p.papellido,' ',p.sapellido) as estudiante,
  fecha_ingreso, concat_ws(' ',p2.nombre,p2.papellido,p2.sapellido ) as personal
from tramite join tramite_plantilla tp on tramite.Tramite_plantilla_idTramite_plantilla = tp.idTramite_plantilla
  join estudiante e on tramite.estudiante_id_estudiante = e.id_estudiante and tramite.estudiante_persona_id_persona = e.persona_id_persona
  join persona p on e.persona_id_persona = p.id_persona
  join empleado e2 on tramite.empleado_persona_id_persona = e2.persona_id_persona
  join persona p2 on e2.persona_id_persona = p2.id_persona where estudiante_id_estudiante=$_POST[idestudiante]");
    ?>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
        <tr>
            <th>Estudiante</th>
            <th>Estado</th>
            <th>Fecha Ingreso</th>
            <th>Fecha Derivacion</th>
            <th>Tramite</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row=mysqli_fetch_assoc($datossegundo)){
            echo "
    <tr>
        <td>$row[estudiante]</td>
        <td>$row[condicion]</td>
        <td>$row[fecha_ingreso]</td>
        <td>$row[fecha_derivacion]</td>
        <td>$row[nombretramite]</td>
    </tr>
        ";
        }
        ?>
        </tbody>
    </table>
    <?php
}
elseif (isset($_POST['tercero'])) {
   $datostercero = $con->con_retorno("select id_tramite,nombretramite,nombretramite,condicion, CONCAT(p.nombre, ' ' , p.papellido,' ',p.sapellido) as estudiante,
  fecha_ingreso, concat_ws(' ',p2.nombre,p2.papellido,p2.sapellido ) as personal
from tramite join tramite_plantilla tp on tramite.Tramite_plantilla_idTramite_plantilla = tp.idTramite_plantilla
  join estudiante e on tramite.estudiante_id_estudiante = e.id_estudiante and tramite.estudiante_persona_id_persona = e.persona_id_persona
  join persona p on e.persona_id_persona = p.id_persona
  join empleado e2 on tramite.empleado_persona_id_persona = e2.persona_id_persona
  join persona p2 on e2.persona_id_persona = p2.id_persona where fecha_ingreso= '$_POST[fecha2]'");

        ?>
        <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
            <thead>
            <tr>
                <th>Fecha Ingreso</th>
                <th>Tramite</th>
                <th>Estudiante</th>
                <th>Estado</th>
            </tr>
            </thead>
            <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($datostercero)) {
                echo "
    <tr>
        <td>$row[fecha_ingreso]</td>
        <td>$row[nombretramite]</td>
        <td>$row[estudiante]</td>
        <td>$row[condicion]</td>
    </tr>
        ";
            }
            ?>
            </tbody>
        </table>
        <?php
}
elseif (isset($_POST['cuarto'])){
    $datoscuarto=$con->con_retorno("select id_tramite,nombretramite,nombretramite, CONCAT(p.nombre, ' ' , p.papellido,' ',p.sapellido) as estudiante,
  fecha_ingreso, concat_ws(' ',p2.nombre,p2.papellido,p2.sapellido ) as personal
from tramite join tramite_plantilla tp on tramite.Tramite_plantilla_idTramite_plantilla = tp.idTramite_plantilla
  join estudiante e on tramite.estudiante_id_estudiante = e.id_estudiante and tramite.estudiante_persona_id_persona = e.persona_id_persona
  join persona p on e.persona_id_persona = p.id_persona
  join empleado e2 on tramite.empleado_persona_id_persona = e2.persona_id_persona
  join persona p2 on e2.persona_id_persona = p2.id_persona where empleado_persona_id_persona=$_POST[personal]");
    ?>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
        <tr>
            <th>Personal</th>
            <th>Tramite</th>
            <th>fecha elaboracion</th>
            <th>Estudiante</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row=mysqli_fetch_assoc($datoscuarto)){
            echo "
    <tr>
        <td>$row[personal]</td>
        <td>$row[nombretramite]</td>
        <td>aun no existe</td>
        <td>$row[estudiante]</td>
    </tr>
        ";
        }
        ?>
        </tbody>
    </table>
    <?php
}
elseif (isset($_POST['quinto'])){
    $datosquinto=$con->con_retorno("select id_tramite,nombretramite,nombretramite, CONCAT(p.nombre, ' ' , p.papellido,' ',p.sapellido) as estudiante,
  fecha_ingreso, concat_ws(' ',p2.nombre,p2.papellido,p2.sapellido ) as personal
from tramite join tramite_plantilla tp on tramite.Tramite_plantilla_idTramite_plantilla = tp.idTramite_plantilla
  join estudiante e on tramite.estudiante_id_estudiante = e.id_estudiante and tramite.estudiante_persona_id_persona = e.persona_id_persona
  join persona p on e.persona_id_persona = p.id_persona
  join empleado e2 on tramite.empleado_persona_id_persona = e2.persona_id_persona
  join persona p2 on e2.persona_id_persona = p2.id_persona where condicion='$_POST[estadotramite]'");
    ?>
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
        <tr>
            <th>Personal</th>
            <th>Tramite</th>
            <th>fecha elaboracion</th>
            <th>Estudiante</th>
        </tr>
        </thead>
        <tbody>
        <?php
        while ($row=mysqli_fetch_assoc($datosquinto)){
            echo "
    <tr>
        <td>$row[personal]</td>
        <td>$row[nombretramite]</td>
        <td>aun no existe</td>
        <td>$row[estudiante]</td>
    </tr>
        ";
        }
        ?>
        </tbody>
    </table>
    <?php
}