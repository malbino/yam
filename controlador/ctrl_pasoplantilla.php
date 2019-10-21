<?php
require("../modelo/mdl_pasoplantilla.php");
class ctrl_pasoplantilla
{
    public $obj_mod;

    function __construct()
    {
        $this->obj_mod = new mdl_pasoplantilla();
    }

    public function insertar_paso($n)
    {
        $this->obj_mod->set("duracion", $n["duracion"]);
        $this->obj_mod->set("nombrepasoplantilla", $n["nombrepasoplantilla"]);

        $this->obj_mod->insertar_paso();

    }
    public function listar_paso(){
        return $this->obj_mod->listar_paso();
    }

    public function modificar_paso($p){
        $this->obj_mod->set("duracion" ,$p['duracion']);
        $this->obj_mod->set("nombrepasoplantilla" ,$p['nombre']);
        $this->obj_mod->set("id_Pasoplantilla" ,$p['id_Pasoplantilla']);
        $this->obj_mod->modificar_paso();
        print_r($p);
    }
}