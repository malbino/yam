<?php
include_once ('menu.php');
include_once ('../../modelo/mdl_requisito.php');
$objeto=new mdl_requisito();
$datos=$objeto->listar_requisito();
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Tramites</h1>
            <p>Listado de Requisitos registrados en el sistema</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Tramites</li>
            <li class="breadcrumb-item active"><a href="modal_requisito.php">Crear requisitos</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <a class="btn btn-secondary" href="modal_requisito.php"><i class="fa fa-plus" aria-hidden="true"></i>Crear Requisito </a>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead class="thead-light">
                        <tr>
                            <th>Nro</th>
                            <th>Nombre</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $nu=1;
                        while($row=mysqli_fetch_assoc($datos)){
                            echo "<tr>";
                            echo "<td>$nu</td>";
                            echo "<td style='display: none'>$row[id_Requisitoplantilla]</td>";
                            echo "<td style='text-transform: capitalize;'>".$row['nombrerequisitoplatilla']."</td>";
                            $id_requisito=$row['id_Requisitoplantilla'];
                            $nombre=$row['nombrerequisitoplatilla'];
                            echo "<td><a class='btn btn-danger col-md-5' href='../../modelo/mdl_requisito.php?id_Requisitoplantilla=".$id_requisito."'><i class='fa fa-trash-o' aria-hidden='true'></i></a>
                            <a class=' btn btn-success col-md-5' href='modificar_requisito.php?id_Requisitoplantilla=".$id_requisito."&nombrerequisitoplatilla=".$nombre."'><i class='fa fa-cog' aria-hidden='true'></i></a></td>";
                            echo "</tr>";
                            $nu+=1;
                        }?>
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