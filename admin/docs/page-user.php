<?php include_once "menu.php";
?>

    <main class="app-content">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                <div class="col-md-4">
                    <div class="tile" style="background: #ADDBBF">
                        <div class="tile-body" >
                          <!--center>  <div style="width: 100px; height: 100px; -moz-border-radius: 50%; -webkit-border-radius: 50%; border-radius: 50%; border-color: #7c7c7c; border: #7c7c7c 5px solid"></div></center-->
                           <center><b> <h2 style="font-family:Century Schoolbook ">Perfil</h2></b></center>
                        <b></b>
                            <hr align="left" noshade="noshade" size="2" />
                            <center><h5 style="font-family:Century Schoolbook ">Datos personales</h5></center>
                            <p></p>
                            <b></b>
                            <b></b>
                            <div class="card" style="border-radius: 15px" >

                                <div class="card-body" style="background: lavender ; border: #00877a solid 2px; border-radius: 15px">
                                    <label for="nombre" class=" col-form-label text-md-right" style="font-family: 'Bahnschrift Condensed' ;font-size:18px;">Nombres:</label>
                                    <center><h5 style='text-transform: capitalize;'><?php echo $_SESSION['nombre'];?></h5></center>

                                    <label for="nombre" class="col-form-label text-md-right" style="font-family: 'Bahnschrift Condensed';font-size:18px;">Apellidos:</label>
                                    <center><h5 style='text-transform: capitalize;'><?php echo $_SESSION['papellido']." ".$_SESSION['sapellido'];?></h5></center>

                                    <label for="nombre" class="col-form-label text-md-right" style="font-family: 'Bahnschrift Condensed' ;font-size:18px;">DNI:</label>
                                    <center><h5 style='text-transform: capitalize;'><?php echo $_SESSION['ci'];?></h5></center>

                                    <label for="nombre" class="col-form-label text-md-right" style="font-family: 'Bahnschrift Condensed' ;font-size:18px;">Fono:</label>
                                    <center><h5 style='text-transform: capitalize;'><?php echo $_SESSION['telefono'];?></h5></center>

                                    <label for="nombre" class=" col-form-label text-md-right" style="font-family: 'Bahnschrift Condensed' ;font-size:18px;">Direccion:</label>
                                    <center><h5 style='text-transform: capitalize;'><?php echo $_SESSION['direccion'];?></h5></center>


                                <div class="card-footer">
                                    <center><a class="btn btn-success" href="#" onclick="mostrar();"><i class="fa fa-pencil" aria-hidden="true" ></i>Editar</a></center>
                                </div>
                                </div>
                            </div>

                          </div>
                    </div>
                </div>

                <div class="col-md-8 tile user-settings" style="background: #ADDBBF">


                      <!--img src="../../imagenes/infocal.png" width="150" height="100" style="float:left; margin:10px;"-->
                      <center><b><h2 style="font-family:'Century Schoolbook';">Modificar</h2></b></center>

                          <!--center> <img src="../../imagenes/infocal.png" alt="" width="600" height="300" style="filter:alpha(opacity=25);-moz-opacity:.25;opacity:.25;"></center-->
                    <hr align="left" noshade="noshade" size="2" />
                <form action="../../modelo/perfil.php" id="oculto" method="post" autocomplete="off" required style="display: none">
                    <div class="form-group row">
                        <div class="col-md-2"><label class="col-form-label-lg text-md-right" for="nombre">Nombres</label></div>
                    <div class="col-md-8"><input class="form-control" type="text" name="nombre" id="nombre" value="<?php echo $_SESSION['nombre'];?>" required autofocus onkeypress="return letras(event);" maxlength="50"></div>
                        <input hidden type="text" name="id_persona" id="id_persona" value="<?php echo $_SESSION['id_persona'];?>">
                        <input hidden type="text" name="rol" id="rol" value="<?php echo $_SESSION['id_rol'];?>">
                    </div>

                    <div class="form-group row">
                        <div class="col-md-2"><label class="col-form-label-lg text-md-right" for="papellido">Papellido</label></div>
                        <div class="col-md-8"><input class="form-control" type="text" name="papellido" id="papellido" value="<?php echo $_SESSION['papellido'];?>" required autofocus onkeypress="return letras(event);" maxlength="50"></div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-2"><label class="col-form-label-lg text-md-right" for="sapellido">Sapellido</label></div>
                        <div class="col-md-8"><input class="form-control" type="text" name="sapellido" id="sapellido" value="<?php echo $_SESSION['sapellido'];?>" required autofocus onkeypress="return letras(event);" maxlength="50"></div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-2"><label class="col-form-label-lg text-md-right" for="ci">CI</label></div>
                        <div class="col-md-8"><input class="form-control" type="text" name="ci" id="ci" value="<?php echo $_SESSION['ci'];?>" required onkeypress="return validar(event);" maxlength="10"></div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-2"><label class="col-form-label-lg text-md-right" for="telefono">Telefono</label></div>
                        <div class="col-md-8"><input class="form-control" type="text" name="telefono" id="telefono" value="<?php echo $_SESSION['telefono'];?>" required onkeypress="return numeros(event);" maxlength="11"></div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-2"><label class="col-form-label-lg text-md-right" for="direccion">Direccion</label></div>
                        <div class="col-md-8"><input class="form-control" type="text" name="direccion" id="direccion" value="<?php echo $_SESSION['direccion'];?>" maxlength="100"></div>
                    </div>
                    <p class="col-form-label-sm" style="color: red"><b>Aviso</b>:Si modifica sus datos tendra que volver a loguearse</p>


                    <div class="col-md-12">
                      <button class="btn btn-success" type="submit" name="modificar"><i class="fa fa-fw fa-lg fa-check-circle"  ></i> Guardar</button>
                    </div>
                  </div>
                </form>


            </div>
        </div>
    </main>
<script type="text/javascript">
    function mostrar(){
        document.getElementById('oculto').style.display = 'block';}
</script>
<script type="text/javascript" src="../../js/validacion.js"></script>