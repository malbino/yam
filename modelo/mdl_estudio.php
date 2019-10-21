<?php
@session_start();
require("conexion.php");
if (isset($_GET['id_carrera']))
{
    $con= new conexion();
    $sql="update carrera set activocarrera =0 where id_Carrera='$_GET[id_carrera]'";
    $con->sin_retorno($sql);
    echo "<script> window.location.href='../admin/docs/listar_carrera.php';</script>";
}
else {
    class mdl_estudio
    {
        public $id_Carrera;
        public $nombre;
        public $modalidad;
        public $obj_con;

        function __construct()
        {

            $this->id_usuario = 0;
            $this->nombre = "";
            $this->modalidad = "";
            $this->obj_con = new conexion();
        }

        public function set($atributo, $valor)
        {
            $this->$atributo = $valor;
        }

        public function insertar()
        {   $sql1="select * from carrera where nombrecarrera='$this->nombre'";
            $re=$this->obj_con->con_retorno($sql1);
            $dato=mysqli_fetch_assoc($re);
            if($dato['nombrecarrera']=="$this->nombre"){
                $sql2 = "update carrera set activocarrera =1 where nombrecarrera='$this->nombre'";
                $red=$this->obj_con->con_retorno($sql2);
                if ($red == " ") {
                    $_SESSION['error'] = "exitoso";
                } else {
                    $_SESSION['error'] = "falla";
                }
            }
            else {
                $sql = "INSERT INTO carrera (nombrecarrera,modalidad,activocarrera) VALUE ('$this->nombre','$this->modalidad',1);";
                $r=$this->obj_con->con_retorno($sql);
                if ($r == " ") {
                    $_SESSION['error'] = "exitoso";
                } else {
                    $_SESSION['error'] = "falla";
                }
            }
        }

        public function modificar_carrera()
        {
            $sql = "UPDATE carrera SET nombrecarrera='$this->nombre',modalidad='$this->modalidad' where id_Carrera='$this->id_Carrera';";
            $this->obj_con->sin_retorno($sql);

        }

        public function listar()
        {
            $sql = "SELECT * FROM carrera where activocarrera=1 order by nombrecarrera";
            return $this->obj_con->con_retorno($sql);
        }
    }
}