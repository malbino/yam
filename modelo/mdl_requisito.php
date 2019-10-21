<?php
@session_start();
require("conexion.php");
if (isset($_GET['id_Requisitoplantilla']))
{
    $con= new conexion();
    $sql="update requisito_plantilla set activorequisitoplantilla =0 where id_Requisitoplantilla='$_GET[id_Requisitoplantilla]'";
    $con->sin_retorno($sql);
    echo "<script> window.location.href='../admin/docs/listar_requisito.php';</script>";
}
else {
class mdl_requisito
{
    private $id_requisito;
    public $nombrerequisitoplatilla;
    public $obj_con;

    function __construct()
    {
        $this->id_requisito = 0;
        $this->nombrerequisitoplatilla = "";
        $this->obj_con = new conexion();
    }

    public function set($atributo, $valor)
    {
        $this->$atributo = $valor;

    }

    public function insertar_requisito()
    {
        $sql="select * from requisito_plantilla where nombrerequisitoplatilla= '$this->nombrerequisitoplatilla' ";
        $dat=$this->obj_con->con_retorno($sql);
        $re=mysqli_fetch_assoc($dat);
        if($re['nombrerequisitoplatilla']== "$this->nombrerequisitoplatilla" and $re['activorequisitoplantilla']==0){
            $sql="update requisito_plantilla set activorequisitoplantilla =1 where nombrerequisitoplatilla= '$this->nombrerequisitoplatilla' ";
            if ($this->obj_con->con_retorno($sql)) {
                $_SESSION['error'] = "exitoso";
            } else {
                $_SESSION['error'] = "falla";
            }
        }
        else {
            $sql = "insert into requisito_plantilla (nombrerequisitoplatilla,activorequisitoplantilla) value ('$this->nombrerequisitoplatilla' , 1)";
            if ($this->obj_con->con_retorno($sql)) {
                $_SESSION['error'] = "exitoso";
            } else {
                $_SESSION['error'] = "falla";
            }
        }
        echo "<script> window.location.href='../admin/docs/modal_requisito.php';</script>";
    }

    public function listar_requisito()
    {
        $sql = "select * from requisito_plantilla where activorequisitoplantilla=1 order by nombrerequisitoplatilla";
        return $this->obj_con->con_retorno($sql);
    }

    public function listar_paso()
    {
        $sql = "select * from paso_plantilla where activopasoplantilla=1 ";
        return $this->obj_con->con_retorno($sql);
    }

    public function modificar_requisito()
    {
        $sql = "UPDATE requisito_plantilla SET nombrerequisitoplatilla='$this->nombrerequisitoplatilla' where id_Requisitoplantilla='$this->id_requisito';";
        $this->obj_con->sin_retorno($sql);
    }

    public function listar_tramites()
    {
        $sql = "select * from tramite_plantilla where activotramite=1 order by nombretramite";
        return $this->obj_con->con_retorno($sql);
    }

    public function eliminar_requisito()
    {
        $sql = "update requisito_plantilla set activorequisitoplantilla =0 where id_Requisitoplantilla='$this->id_requisito'";
        return $this->obj_con->con_retorno($sql);
    }


}
}