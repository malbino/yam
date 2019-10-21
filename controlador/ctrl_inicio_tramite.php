<?php

require("../modelo/mdl_tramite.php");

class ctrl_inicio_tramite
{
    public $obj_mod;

    public function __construct()
    {
        $this->obj_mod = new mdl_tramite();
    }

    public function insertar($p)
    {
        $this->obj_mod->set("Tramite_plantilla_idTramite_plantilla", $p['nombretramite']);
        $this->obj_mod->set("estudiante_id_estudiante", $p['estudiante']);
         $resp=$this->obj_mod->insertar();
            return $resp;
    }
}