<?php
session_start();
require("../controlador/ctrl_inicio_tramite.php");
$obj=new ctrl_inicio_tramite();
if (isset($_POST['subirtramite'])) {
   $resp= $obj->insertar($_POST);

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $tamanioa = $_FILES['archivo']['size'];
        $tamaniob=$tamanioa/1000000;
        if($tamanioa >= 5000000)
        {
            echo "<div class='col-md-9'>Error: Archivo demasiado grande, no debe superar 5 Mb.<br>Peso actual: <font color='red'>$tamaniob</font> Mb.</div>";
        }
        else
        {

            $tipoa = $_FILES['archivo']['type'];
            $limite=($_FILES["archivo"]["size"]);


            if($_FILES['archivo']['name']!="")
            {
                /*compatibles*/
                //excel--	application/vnd.openxmlformats-officedocument.spreadsheetml.sheet
                //word--	application/vnd.openxmlformats-officedocument.wordprocessingml.document
                //zip--		application/zip
                //pdf--		application/pdf
                if ($_FILES['archivo']['error'] > 0 || ($_FILES['archivo']['type']!='application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' && $_FILES['archivo']['type']!='application/vnd.openxmlformats-officedocument.wordprocessingml.document' && $_FILES['archivo']['type']!='application/zip' && $_FILES['archivo']['type']!='application/pdf'))
                {
                    echo "<div class='col-md-9'><center>Error: Formato de archivo incompatible.</center></div>";
                    //echo "Error: " . $_FILES['archivo']['error'] . "<br>";
                }
                else
                {
                    $tamaniototal=$limite;
                    if($tamaniototal>=500000000)
                    {
                        echo "<div class='col-md-9'><center>Usted ya no tiene espacio suficiente para subir este archivo, por favor primero libere espacio.<br><a href='apuntes_index.php' class='btn btn-sm btn-info'>Aceptar</a></center></div>";
                    }
                    else
                    {
                        $fecha = date_default_timezone_set('America/La_paz');
                        $fecha = date('Y_m_d');
                        $hora = date('G_i_s');
                        //echo "Nombre: " . $fecha.$hora.$_FILES['archivo']['name']."<br>";
                        $archivo=$fecha.'__'.$hora.'__'.$_FILES['archivo']['name'];
                        $carpeta = $_SERVER['DOCUMENT_ROOT'].'/yam/archivos/subidas/'.$resp;
                        if (!file_exists($carpeta)) {
                            mkdir($carpeta, 0777, true);
                        }
                        $carpeta_destino=$_SERVER['DOCUMENT_ROOT'].'/yam/archivos/subidas/'.$resp.'/';
                        //echo "Tipo: " . $_FILES['archivo']['type'] . "<br>";
                        //echo "<br>Tamaño: " . ($_FILES["archivo"]["size"]) . " kB<br>";
                        $tamanio=$_FILES["archivo"]["size"];
                        //echo "Carpeta temporal: " . $_FILES['archivo']['tmp_name'];
                        //ahora co la funcion move_uploaded_file lo guardaremos en el destino que queramos
                        move_uploaded_file($_FILES['archivo']['tmp_name'],
                            $carpeta_destino .$fecha.'__'.$hora.'__'. $_FILES['archivo']['name']);//<em id="__mceDel"> </em>
                    }
                }
            }
        }
        $rutafinal=$carpeta_destino .$fecha.'__'.$hora.'__'. $_FILES['archivo']['name'];

    }
}
