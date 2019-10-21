
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../bootstrap4/css/bootstrap.css">
    <script src="../bootstrap4/js/jquery-3.3.1.slim.min.js"></script>
    <script src="../bootstrap4/js/bootstrap.js"></script>
    <script src="../bootstrap4/js/cargar_tabla.js"></script>
    <?php include_once('modal/modal_requisito.php');
    include_once ('../controlador/ctrl_requisito.php');
    $obj=new ctrl_requisito();
    $resp=$obj->listar_requisito();
    ?>

    <title>Tramite</title>
</head>
<body>
<div class="row justify-content-center" >
    <div class="col-md-6">
<div class="card ">
    <div class="card-header">
        <center><h2>Tramite</h2></center>
    </div>
    <div class="card-body">
        <div class="form-control">
            <form action="" method="post">
                <div class="form-group row">
                    <div class="col-md-5 ">
                        <label class="col-form-label text-md-right"  for="nombre">Nombre</label>
                    </div>
                <div class="col-md-7">
                    <input type="text" id="nombre">
                </div>
                    <div class="col-md-2">

                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-5 ">
                        <label class="col-form-label text-md-right"  for="requisito">Requisito</label>
                    </div>
                    <div class="col-md-5">
                        <select class="custom-select"  id="requisito" name="requisito">
                            <option hidden value="default">Seleccione Requisito</option>
                            <?php
                            while($row=mysqli_fetch_assoc($resp)){
                                echo "<option>".$row['nombre']."</option>";
                            }?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <a href="../admin/docs/modal/modal_requisito.php" class="btn btn-primary" data-toggle="modal" data-target="#requisito">+</a>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6">
                        <input class="btn btn-primary" type="button"  value="Poner" id="poner" onclick="cargar_tabla()">
                    </div>
                </div>
                <div class="form-group row justify-content-center">
                    <div class="col-md-6">
                        <div class="form-control" id="tabla">

                        </div>
                </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card-footer"></div>
    </div>
    </div>
</div>
</body>
</html>