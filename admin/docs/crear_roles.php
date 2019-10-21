<?php session_start();
include_once "menu.php";
include_once("../../modelo/mdl_privilegio.php");
$obj=new mdl_privilegio();
$datos=$obj->listar();
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Roles</h1>
            <p>Creacion de Rol</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="modal-modificar-rol.php">Crear Roles</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-title">Creacion de Roles</div>
                <div class="tile-body">
                    <form action="../../enrutador/enr_rol.php" method="post">
                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="nombre">Nombre del Rol</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="nombre" id="nombre"></div>

                            

                        </div>
                        <div class="form-group row"><label for="funcionalidad" class="col-md-4 col-form-label text-md-right">funcionalidad</label><div class="col-md-6">
                             <select class="custom-select" name="funcionalidad">
                                 <?php
                                    while ($row=mysqli_fetch_assoc($datos))
                                     {
                                        echo "<option value='$row[id_funcionalidad]'>".$row[nombre]."</option>";
                                     } 
                                 ?>
                             </select></div>
                            </div>

                        <div class="tile-footer row">
                            <div class="col-md-3">
                                <button class="btn btn-success" type="submit" name="agregar">Agregar</button>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-danger" href="vst_rol1.php">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>