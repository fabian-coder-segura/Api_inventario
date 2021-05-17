<?php

namespace models;

use models\Model;

class Persona extends Model
{
    protected $id;
    protected $tipo_identificacion;
    protected $identificacion;
    protected $nombres;
    ;

    public function __construct()
    {
        $this->superClass($this);
        $this->table = 'personas';
    }
}