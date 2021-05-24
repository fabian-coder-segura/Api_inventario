<?php

namespace controllers;

use controllers\BaseController;
use models\Persona;

class PersonaController extends BaseController
{
    public function index()
    {
        $model = new Persona();
        $rows =  $model->all();
        return $rows;
    }

    public function detail($id)
    {
        $model = new Persona();
        $row =  $model->find($id);
        return $row;
    }

    public function create($request)
    {
        $modelValidation = new Persona();
        $data = $modelValidation->where([
            ['numero_identificacion', '=', $request['identificacion']]
        ]);
        if (count($data) > 0) {
            return "La persona ya se cuentra registrado";
        }

        $model = new Persona();
        $model->set('tipo_identificacion', $request['tipo_identificacion']);
        $model->set('numero_identificacion',  $request['numero_identificacion']);
        $model->set('nombres',  $request['nombres']);
        $status = $model->save();
        return $status ? 'Registro guardado' : 'Error al guardar el registro';
    }

    public function update($id, $request)
    {

        $modelValidation = new Persona();
        $data = $modelValidation->where([
            ['numero_identificacion', '=', $request['identificacion']]
        ]);
        if (count($data) > 0) {
            return "La persona ya se cuentra registrado";
        }

        $model = new Persona();
        $model->set('tipo_identificacion', $request['tipo_identificacion']);
        $model->set('numero_identificacion',  $request['numero_identificacion']);
        $model->set('nombres',  $request['nombres']);
        $status = $model->save();
        return $status ? 'Registro guardado' : 'Error al guardar el registro';
    }

    public function delete($id)
    {
        $model = new Persona();
        $model->set('id', $id);
        $status = $model->delete();
        return $status ? 'Registro eliminado' : 'Error al eliminar el registro';
    }
}