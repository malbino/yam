<?php
include_once ('prueba_cabecera.php');
?>
<html>
<body>
<div class="app-content">
    <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-plus-circle"></i>
            <div class="info">
              <a href="#" onclick="mostrartabla();"><h4>Crear rol</h4></a>
            </div>
          </div>
    </div>
 <script type="text/javascript" src="js/tabla.js"></script>
    <div class="row" id="tabla" style="display:none">
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title">Simple Table</h3>
            <table class="table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Username</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Mark</td>
                  <td>Otto</td>
                  <td>@mdo</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Jacob</td>
                  <td>Thornton</td>
                  <td>@fat</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>Larry</td>
                  <td>the Bird</td>
                  <td>@twitter</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
</div>

</body>
</html>