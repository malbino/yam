<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuario</title>
    <link rel="stylesheet" href="css/main.css">
    <script type="text/javascript" src="../../js/validacion.js"></script>
    <?php include_once('menu.php');
    include_once ('../../modelo/mdl_estudio.php');
    $ob=new mdl_estudio();

    $car=$ob->listar();
    ?>
</head>
<body>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Carrera</h1>
            <p>Registro Carreras</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Estudio</li>
            <li class="breadcrumb-item"><a href="listar_carrera.php">Listar Carrera</a></li>
        </ul>
    </div>
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <center><h3 class="tile-title">Carrera</h3></center>
                    </div>
                    <form name="f1" action="../../enrutador/enr_estudio.php" method="post" autocomplete="off" required>
                    <div class="card-body">
                            <div class="form-group row">
                                <label for="nombre" class="col-md-4 col-form-label text-md-right">Nombre</label>
                                <div class="col-md-6"><input type="text" name="nombre" id="nombre" class="form-control" value="" required autofocus onkeypress="return letras(event);" maxlength="45"></div>
                            </div>

                             <div  class="form-group row"><label for="modalidad" class="col-md-4 col-form-label text-md-right">Modalidad</label><div class="col-md-6">
                                             <select class="custom-select" name="modalidad"  id="modalidad">
                                                <option>Semestral</option>
                                                <option>Anualizado</option>
                                             </select>
                                         </div>
                             </div>
                    </div>
                    <div class="card-footer">
                        <div class="form-group row" style="text-align:center">
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-info" name="registrar">
                                    <span class="glyphicon glyphicon-log-in"></span> registrar
                                </button>
                            </div>
                            <div class ="col-md-4"><button type="reset" class="btn btn-info">
                                    <span class="glyphicon glyphicon-pencil"></span>Limpiar
                                </button>
                            </div>
                            <div class ="col-md-4"><a class="btn btn-danger" href="menu.php">Cancelar
                                </a>
                            </div>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><center><h3>Carreras Creadas</h3></center></div>
                            <div class="card-body">
                                <?php
                                while ($row=mysqli_fetch_assoc($car)){
                                    echo "<div class='form-group row'>
                                 <button type='button' class='col-md-12 btn btn-default' style='text-transform: capitalize'>$row[nombrecarrera]</button>                       
                                </div>";
                                }
                                ?>
                            </div>
                            <div class="card-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
</body>
</html>
<?php
if(@$_SESSION['error']=="exitoso"){
echo "<script>swal(
        'Carrera Creada!',
        'Creacion Exitosa!',
        'success'
    )</script>";
$_SESSION['error']=" ";
}
elseif (@$_SESSION['error']=="falla"){
echo "<script>swal(
        'Falla al Crear Carrera!',
        'Creacion Fallida!',
        'error'
    )</script>";
$_SESSION['error']=" ";
}
?>