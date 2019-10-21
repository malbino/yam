<?php
@session_start();
require("conexion.php");
if (isset($_GET['id_Curso']))
{
    $con= new conexion();
    $sql="update curso set activocurso =0 where id_Curso='$_GET[id_Curso]'";
    $con->sin_retorno($sql);
    echo "<script> window.location.href='../admin/docs/listar_cursoexterno.php';</script>";
}
else {
    class mdl_curso
    {
        public $id_Curso;
        public $nombrecurso;
        public $obj_con;
        public $nombre;

        function __construct()
        {

            $this->id_Curso = 0;
            $this->nombrecurso = "";
            $this->nombre = "";
            $this->obj_con = new conexion();
        }

        public function set($atributo, $valor)
        {
            $this->$atributo = $valor;
        }

        public function insertar()
        {
            $sql1="select * from curso where nombrecurso='$this->nombrecurso'";
            $re=$this->obj_con->con_retorno($sql1);
            $dato=mysqli_fetch_assoc($re);
                if ($dato['nombrecurso']=="$this->nombrecurso") {
                    $sql = "update curso set activocurso =1 where nombrecurso='$this->nombrecurso'";
                    $res = $this->obj_con->con_retorno($sql);
                    if ($res == " ") {
                        $_SESSION['error'] = "exitoso";
                    } else {
                        $_SESSION['error'] = "falla";
                    }
                }
            else {
                $sql2 = "INSERT INTO curso (nombrecurso,activocurso) VALUE ('$this->nombrecurso',1);";
                $resp = $this->obj_con->con_retorno($sql2);
                if ($resp == " ") {
                    $_SESSION['error'] = "exitoso";
                } else {
                    $_SESSION['error'] = "falla";
                }
            }
        }

        public function listar()
        {
            $sql = "SELECT * FROM curso where activocurso=1 order by nombrecurso";
            return $this->obj_con->con_retorno($sql);
        }

        public function listar_estudiante()
        {
            $sql = "select * from persona where rol=3 and activo=1";
            return $this->obj_con->con_retorno($sql);
        }

        public function buscar_estudiante($b)
        {
            $sql = "select * from estudiante where persona_id_persona=$b";
            return $this->obj_con->con_retorno($sql);
        }

        public function cursado($cur, $per)
        {
            $datos = $this->buscar_estudiante($per);
            $d = mysqli_fetch_assoc($datos);
            $sql = "insert into cursado values ($cur,$d[id_estudiante],$per)";
            $re=$this->obj_con->con_retorno($sql);
            if ($re == " ") {
                $_SESSION['error'] = "exitoso";
            } else {
                $_SESSION['error'] = "falla";
            }

        }

        public function modificar_curso()
        {
            $sql = "UPDATE curso SET nombrecurso='$this->nombrecurso' where id_Curso='$this->id_Curso';";
            $this->obj_con->sin_retorno($sql);

        }
    }
}
?>
