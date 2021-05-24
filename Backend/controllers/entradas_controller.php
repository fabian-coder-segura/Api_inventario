<?php

namespace controllers;

use controllers\BaseController;
use models\Entrada;

class EntradaController extends BaseController
{
    public function index()
    {
        $model = new Entrada();
        $rows =  $model->all();
        return $rows;
    }

    public function detail($id)
    {
        $model = new Entrada();
        $row =  $model->find($id);
        return $row;
    }

    public function create($request)
    {
        $modelValidation = new Entrada();
        $data = $modelValidation->where([
            ['id', '=', $request['id']]
        ]);
        if (count($data) > 0) {
            return "El código ya se cuentra registrado";
        }

        $model = new Entrada();
        $model->set('fecha', $request['fecha']);
        $model->set('cantidad',  $request['cantidad']);
        $model->set('persona_id',  $request['persona_id']);
        $model->set('invetario_objeto_id',  $request['invetario_objeto_id']);
        $status = $model->save();
        return $status ? 'Registro guardado' : 'Error al guardar el registro';
    }

    public function update($id, $request)
    {

        $modelValidation = new Entrada();
        $data = $modelValidation->where([
            ['id', '<>', $id]
        ]);
        if (count($data) > 0) {
            return "El código ya se cuentra registrado";
        }

        $model = new Entrada();
        $model->set('id', $id);
        $model->set('fecha', $request['fecha']);
        $model->set('cantidad',  $request['cantidad']);
        $model->set('persona_id',  $request['persona_id']);
        $model->set('invetario_objeto_id',  $request['invetario_objeto_id']);
        $status = $model->update();
        return $status ? 'Registro actualizado' : 'Error al actualizar el registro';
    }

    public function delete($id)
    {
        $model = new Entrada();
        $model->set('id', $id);
        $status = $model->delete();
        return $status ? 'Registro eliminado' : 'Error al eliminar el registro';
    }
}
