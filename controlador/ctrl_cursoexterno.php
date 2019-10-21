<?php

require("../modelo/mdl_cursoexterno.php");

class ctrlcurso{
    public $obj_mod;

    public function __construct(){
        $this->obj_mod=new mdl_curso();
    }
    public function insertar($p){
        $this->obj_mod->set("nombrecurso" ,$p['nombre']);
        $this->obj_mod->insertar();
    }
    public function cursado($c){
        $this->obj_mod->cursado($c['curso'],$c['estudiante']);
    }

    public function modificar_curso($p){
        $this->obj_mod->set("nombrecurso" ,$p['nombre']);
        $this->obj_mod->set("id_Curso" ,$p['id_Curso']);
        $this->obj_mod->modificar_curso();
    }
}
?>