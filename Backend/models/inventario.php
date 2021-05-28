<?php

namespace models;

use models\Model;

class Inventario extends Model
{
    protected $id;
    protected $nombre;
    protected $descripcion;
    protected $disponibilidad;
    

    public function __construct()
    {
        $this->superClass($this);
        $this->table = 'objectos_inventario';
    }
}