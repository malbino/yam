<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
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
<div class="container">
    <h1>listar</h1>
    <span>agregar <a href="#" target="_blank" class="glyphicon glyphicon-plus"></a></span>
    <form name="f2" action="../enrutador/enr_usuario.php" method="post">
    <table id="example" class="table table-striped table-bordered nowrap" style="width:100%">
        <thead>
            <tr>
                <th>USUARIO</th>
                <th>CLAVE</th>
                <th>PERSONA</th>
                <th>ELIMINAR</th>
                <th>MODIFICAR</th>

            </tr>
        </thead>
        <tbody>

        </tbody>
        <tfoot>
            <tr>
                <th>USUARIO</th>
                <th>CLAVE</th>
                <th>PERSONA</th>
                <th>ELIMINAR</th>
                <th>MODIFICAR</th>
            </tr>
        </tfoot>
    </table>
    </form>
</div>
</body>
</html>