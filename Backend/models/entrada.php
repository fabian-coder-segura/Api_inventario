<?php

namespace models;

use models\Model;

class Entrada extends Model
{
    protected $id;
    protected $fecha;
    protected $cantidad;
    protected $persona_id;
    protected $objecto_inventario_id;
    ;

    public function __construct()
    {
        $this->superClass($this);
        $this->table = 'entradas';
    }

    public function get_persona()
    {
        $row=(new Persona())->find($this->persona_id);
        return $row;
    }

    public function get_inventario()
    {
        $row=(new Inventario())->find($this->invetario_objeto_id);
        return $row;
    }
}