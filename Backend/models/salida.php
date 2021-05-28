<?php

namespace models;

use models\Model;

class Salida extends Model
{
    protected $id;
    protected $fecha;
    protected $cantidad;
    protected $persona_id;
    protected $objecto_inventario_id;
    

    public function __construct()
    {
        $this->superClass($this);
        $this->table = 'salidas';
    }

    public function get_persona()
    {
        $row=(new Persona())->find($this->persona_id);
        return $row;
    }

    public function get_inventario()
    {
        $row=(new Inventario())->find($this->invetario_objecto_id);
        return $row;
    }
}