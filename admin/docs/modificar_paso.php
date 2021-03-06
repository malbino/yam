<?php
include_once "menu.php";
?>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i>Estudia</h1>
            <p>Modificacion de Pasos</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item active"><a href="vst_rol1.php">Modificar Pasos</a></li>
            <li class="breadcrumb-item active"><a href="modal-modificar-rol.php">Modificar</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-title">Modificacion de Pasos</div>
                <div class="tile-body">
                    <form action="../../enrutador/enr_pasoplantilla.php" method="post">
                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="numeropasoplantilla">numero</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="numeropasoplantilla" id="numeropasoplantilla" value="<?php echo $_GET['numeropasoplantilla'];?>"></div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="duracion">duracion</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="duracion" id="duracion" value="<?php echo $_GET['duracion'];?>"></div>

                        </div>

                        <div class="form-group row">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="nombre">nombre</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $_GET['nombrepasoplantilla'];?>"></div>

                        </div>
                        <div class="form-group row" style="display: none">
                            <div class="col-md-2"><label class="col-form-label text-md-right" for="id_Pasoplantilla">ID</label></div>
                            <div class="col-md-10"><input class="form-control" type="text" name="id_Pasoplantilla" id="id_Pasoplantilla" value="<?php echo $_GET['id_Pasoplantilla'];?>"></div>
                        </div>
                        <div class="tile-footer row">
                            <div class="col-md-3">
                                <button class="btn btn-success" type="submit" name="modificar_paso">Modificar</button>
                            </div>
                            <div class="col-md-3">
                                <a class="btn btn-danger" href="listar_pasos.php">Cancelar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>