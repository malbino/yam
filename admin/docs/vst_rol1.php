<?php
include_once ('menu.php');
include_once ('../../modelo/mdl_rol.php');

    $obj=new mdl_rol();
    $resp=$obj->listar();

?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Roles</h1>
            <p>Listado de Roles registrados en el sistema</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Roles</li>
            <li class="breadcrumb-item active"><a href="">Tabla Roles</a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-9">
            <div class="tile">
               <center><a href="crear_roles.php" class="btn btn-primary"><i class="fa fa-plus" aria-hidden="true"></i>Crear Nuevo Rol</a></center>
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRE</th>
                            <th>OPCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while($row=mysqli_fetch_assoc($resp)){
                            $id_rol=$row["id_rol"];
                            $nombre=$row["nombrerol"];
                            echo "<tr>";
                            echo "<td>".$row["id_rol"]."</td>";
                            echo "<td>".$row["nombrerol"]."</td>";
                            echo "<td > <a href='../../enrutador/enr_rol.php?id_rol=".$id_rol."' class='btn btn-danger'><i class=\"fa fa-trash-o\" aria-hidden=\"true\"></i></a>
                                <a href='modal-modificar-rol.php?id_rol=".$id_rol."&nombre=".$nombre."'  class='btn btn-success'><i class=\"fa fa-cog\" aria-hidden=\"true\"></i></a></td>";
                            echo "</tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Essential javascripts for application to work-->

<!-- The javascript plugin to display page loading on top-->
<!-- Page specific javascripts-->
<!-- Data table plugin-->
<script type="text/javascript" src="js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
<!-- Google analytics script-->
<script type="text/javascript">
    if(document.location.hostname == 'pratikborsadiya.in') {
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-72504830-1', 'auto');
        ga('send', 'pageview');
    }
</script>