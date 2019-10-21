<?php

require("../modelo/mdl_estudio.php");

class ctrl_estudio{
    public $obj_mod;

    public function __construct(){
        $this->obj_mod=new mdl_estudio();
    }

    public function insertar($p){
        $this->obj_mod->set("nombre" ,$p['nombre']);
        $this->obj_mod->set("modalidad" ,$p['modalidad']);
        $this->obj_mod->insertar();
    }
    public function modificar_carrera($p){
        $this->obj_mod->set("nombre" ,$p['nombre']);
        $this->obj_mod->set("modalidad" ,$p['modalidad']);
        $this->obj_mod->set("id_Carrera" ,$p['id_carrera']);
        $this->obj_mod->modificar_carrera();
    }

}
