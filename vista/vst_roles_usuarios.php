<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/datatables/css/bootstrap.min.css">

<link rel="stylesheet" href="../bootstrap/datatables/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/datatables/css/fixedHeader.bootstrap.min.css">
<link rel="stylesheet" href="../bootstrap/datatables/css/responsive.bootstrap.min.css">

<script src="../bootstrap/datatables/js/jquery-1.12.4.js"></script>


<script src="../bootstrap/datatables/js/jquery.dataTables.min.js"></script>
<script src="../bootstrap/datatables/js/dataTables.bootstrap.min.js"></script>
<script src="../bootstrap/datatables/js/dataTables.fixedHeader.min.js"></script>
<script src="../bootstrap/datatables/js/dataTables.responsive.min.js"></script>
<script src="../bootstrap/datatables/js/responsive.bootstrap.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		

		$(document).ready(function() {
    var table = $('#example').DataTable( {
        responsive: true
    } );
 
    new $.fn.dataTable.FixedHeader( table );
} );
	</script>
</head>
<body>
<?php
    require("../controlador/ctrl_agregarusuario.php");
    $obj=new ctrlUsuario();
    $resp=$obj->listar();
    //print_r($resp);
    // convertir el resultado en vectores php
?>


<div class="container">
<h1>Lista de personas</h1>
<br>
<span>Registrar Persona<a href="../admin/docs/vista/vst_agregarusuario.php" target="_blank" class="glyphicon glyphicon-plus"></a>
</span>	
<table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                
                <th>Nombre</th>
                <th>Paterno</th>
                 <th>Materno</th>
                 <th>Rol</th>
                <th>Eliminar</th>
                <th>Modificar</th>

                </tr>
        </thead>
        <tbody>

<?php


while($row=mysqli_fetch_assoc($resp)){

        // crear variables y vaciar los datos del vector a cada variable

        $carnet=$row["ci"];
         // ci del row es el nombre de la columna de la base datos.
        /*$nombre=$row["nombre"];
        $tel=$row["tel"];*/

      
      $cod=$row['id_persona'];
       $ci=$row['ci'];
        $tel=$row['telefono'];
        $dir=$row['direccion'];
        $nom=$row['nombre'];
        $pat=$row['papellido'];
        $mat=$row['sapellido'];


        echo "<tr>";
        echo "<td>".$row["nombre"]."</td>";
        echo "<td>".$row["papellido"]."</td>";
        echo "<td>".$row["sapellido"]."</td>";
        echo "<td>".$row["rol"]."</td>";
        echo "<td> <a href='../enrutador/enr_agregarusuario.php?codigo=".$cod."' class='glyphicon glyphicon-trash'></a></td>";
        echo "<td><a href='vst_modificarusuario.php?cod=".$cod."-".$nom."-".$pat."-".$mat."-".$ci."-".$tel."-".$dir."' class='glyphicon glyphicon-edit'></a></td>";
        echo "</tr>";


    }
?>            
        </tbody>
        <tfoot>
            <tr>
                <th>Nombre</th>
                <th>Paterno</th>
                 <th>Materno</th>
                 <th>Rol</th>
                <th>ELiminar</th>
                <th>Modificar</th>
                
            </tr>
        </tfoot>
    </table>

</div>


</body>
</html>