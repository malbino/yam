<?php
include_once ('menu.php');
if (isset($_GET['id'])) {
    include_once ('../../modelo/conexion.php');
    $ob = new conexion();
    $id = $_GET['id'];
    $sql = "select * from tramite where id_tramite='$id'";
    $datos = $ob->con_retorno($sql);
    $row = mysqli_fetch_assoc($datos);
    $condicion = $row['condicion'];
}
else{
    $condicion="";
}
?>

<main class="app-content">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-edit"></i>Usuario</h1>
            <p>Registro Cuenta</p>

        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
            <li class="breadcrumb-item">Cuenta</li>
            <li class="breadcrumb-item"><a href="#">Registro Cuenta</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card" >
                <div class="card-header">
                    <center><h3>Estado del Tramite</h3></center>
                </div>
                <div class="card-body row">
                    <div class="col-md-2"  id="uno">
                        <div class="card border-primary">
                            <div class="card-header"><center><h5>Recepcion</h5></center></div>
                            <div class="card-body">
                                <center><img src="imagenes/tramites/1.png" width="100" height="100"></center>
                            </div>
                            <div class="card-footer">
                                <?php if ($condicion=="Recepcion"){
                                    echo "<center><img src='imagenes/marca.png'></center>";
                                    echo "<center><p>Esta Aqui</p></center>";
                                }?>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-2" id="dos">
                        <div class="card border-primary">
                            <div class="card-header"><center><h5>Elaboracion</h5></center></div>
                            <div class="card-body">
                            <center><img src="imagenes/tramites/3.PNG"  width="100" height="100"></center>
                            </div>
                            <div class="card-footer">
                                <?php if ($condicion=="Elaboracion"){
                                    echo "<center><img src='imagenes/marca.png'></center>";
                                    echo "<center><p>Esta Aqui</p></center>";
                                }?>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-2" id="tres" >
                        <div class="card border-primary">
                            <div class="card-header"><center><h5>Firmas</h5></center></div>
                            <div class="card-body">
                                <center><img src="imagenes/tramites/3.jpg" width="100" height="100"></center>
                            </div>
                            <div class="card-footer">
                                <?php if ($condicion=="Firmas"){
                                    echo "<center><img src='imagenes/marca.png'></center>";
                                    echo "<center><p>Esta Aqui</p></center>";
                                }?>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-2" id="cuatro">
                        <div class="card border-primary">
                            <div class="card-header"><center><h5>Despacho</h5></center></div>
                            <div class="card-body">
                               <center><img src="imagenes/tramites/7.png" width="100" height="100"></center>
                            </div>
                            <div class="card-footer">
                                <?php if ($condicion=="Despacho"){
                                    echo "<center><img src='imagenes/marca.png'></center>";
                                    echo "<center><p>Esta Aqui</p></center>";
                                }?>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-2" id="cinco">
                        <div class="card border-primary">
                            <div class="card-header"><center><h5>Archivos</h5></center></div>
                            <div class="card-body">
                               <center> <img src="imagenes/tramites/4.jpg"  width="100" height="100"></center>
                            </div>
                            <div class="card-footer">
                                <?php if ($condicion=="Archivos"){
                                    echo "<center><img src='imagenes/marca.png'></center>";
                                    echo "<center><p>Esta Aqui</p></center>";
                                }?>
                            </div>
                        </div>
                    </div>

               </div>

            </div>
        </div>
    </div>
</main>