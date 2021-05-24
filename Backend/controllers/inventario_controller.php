<?php

namespace controllers;

use controllers\BaseController;
use models\Inventario;

class InventarioController extends BaseController
{
    public function index()
    {
        $model = new Inventario();
        $rows =  $model->all();
        return $rows;
    }

    public function detail($id)
    {
        $model = new Inventario();
        $row =  $model->find($id);
        return $row;
    }

    public function create($request)
    {
        $modelValidation = new Inventario();
        $data = $modelValidation->where([
            ['id', '=', $request['id']]
        ]);
        if (count($data) > 0) {
            return "El código ya se cuentra registrado";
        }

        $model = new Inventario();
        $model->set('id', $request['id']);
        $model->set('nombre',  $request['nombre']);
        $model->set('descripcion',  $request['descripcion']);
        $status = $model->save();
        return $status ? 'Registro guardado' : 'Error al guardar el registro';
    }

    public function update($id, $request)
    {

        $modelValidation = new Inventario();
        $data = $modelValidation->where([
            ['id', '<>', $id]
        ]);
        if (count($data) > 0) {
            return "El código ya se cuentra registrado";
        }

        $model = new Inventario();
        $model->set('id', $request['id']);
        $model->set('nombre',  $request['nombre']);
        $model->set('descripcion',  $request['descripcion']);
        $status = $model->update();
        return $status ? 'Registro actualizado' : 'Error al actualizar el registro';
    }

    public function delete($id)
    {
        $model = new Inventario();
        $model->set('id', $id);
        $status = $model->delete();
        return $status ? 'Registro eliminado' : 'Error al eliminar el registro';
    }
}
