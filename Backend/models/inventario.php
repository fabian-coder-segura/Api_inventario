<?php

namespace models;

use models\Model;

class Inventario extends Model
{
    protected $id;
    protected $nombres;
    protected $descripcion;
    ;

    public function __construct()
    {
        $this->superClass($this);
        $this->table = 'objetos_inventario';
    }
}