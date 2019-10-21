<?php
@session_start();
require("conexion.php");
if (isset($_GET['id_Pasoplantilla']))
{
    $con= new conexion();
    $sql="update paso_plantilla set activopasoplantilla =0 where id_Pasoplantilla='$_GET[id_Pasoplantilla]'";
    $con->sin_retorno($sql);
    echo "<script> window.location.href='../admin/docs/listar_pasos.php';</script>";
}
else {
    class mdl_pasoplantilla
    {

        public $id_Pasoplantilla;
        public $duracion;
        public $nombrepasoplantilla;
        public $obj_con;

        function __construct()
        {
            $this->id_Pasoplantilla = 0;
            $this->duracion = 0;
            $this->nombrepasoplantilla = "";
            $this->obj_con = new conexion();
        }

        public function set($atributo, $valor)
        {
            $this->$atributo = $valor;

        }

        public function insertar_paso()
        {
            $sql="select * from paso_plantilla where nombrepasoplantilla = '$this->nombrepasoplantilla'";
            $dat=$this->obj_con->con_retorno($sql);
            $re=mysqli_fetch_assoc($dat);
            print_r($re);
            if($re['nombrepasoplantilla'] == "$this->nombrepasoplantilla" and $re['activopasoplantilla']==0){
                $sql1="update paso_plantilla set activopasoplantilla =1 where id_Pasoplantilla= $re[id_Pasoplantilla] ";

                if ($this->obj_con->con_retorno($sql1)) {
                    $_SESSION['error'] = "exitoso";
                } else {
                    $_SESSION['error'] = "falla";
                }
            }
            else {
                $sql = "insert into paso_plantilla (nombrepasoplantilla,activopasoplantilla,duracion) values ('$this->nombrepasoplantilla', 1,$this->duracion)";
                if ($this->obj_con->con_retorno($sql)) {
                    $_SESSION['error'] = "exitoso";
                } else {
                    $_SESSION['error'] = "falla";
                }
            }
        echo "<script> window.location.href='../admin/docs/pasosplatilla.php';</script>";
        }

        public function listar_paso()
        {
            $sql = "select * from paso_plantilla where activopasoplantilla=1";
            return $this->obj_con->con_retorno($sql);
        }

        public function modificar_paso()
        {
            $sql = "UPDATE paso_plantilla SET (duracion='$this->duracion',nombrepasoplantilla='$this->nombrepasoplantilla' where id_Pasoplantilla='$this->id_Pasoplantilla';";
            $this->obj_con->sin_retorno($sql);
        }
    }
}