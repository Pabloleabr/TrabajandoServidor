<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmpleController extends Controller
{
    public function index()
    {
        // $empleados = DB::select('SELECT e.*, d.denominacion
        //                            FROM emple e
        //                            JOIN depart d
        //                              ON depart_id = d.id');

        $empleados = DB::table('emple', 'e')
            ->leftJoin('depart AS d', 'depart_id', '=', 'd.id')
            ->select('e.*', 'denominacion')
            ->get();

        return view('emple.index', [
            'empleados' => $empleados,
        ]);
    }

    public function show($id)
    {
        $empleado = $this->findEmpleado($id);

        // if (empty($empleado)) {
        //     return redirect('/emple')
        //         ->with('error', 'El empleado no existe');
        // }

        return view('emple.show', [
            'empleado' => $empleado,
        ]);
    }

    public function destroy($id)
    {
        $empleados = $this->findEmpleado($id);

        DB::delete('DELETE FROM emple WHERE id = ?', [$id]);

        return redirect()->back()
            ->with('success', 'Empleado borrado correctamente');
    }

    public function create()
    {
        $departamentos = DB::table('depart')
                        ->select('denominacion','id')
                        ->get();
        return view('emple.create',[
            'departamentos' => $departamentos,
        ]);
    }


    public function store()
    {
        $validados = $this->validar();

        $this->findDepart($validados['departId']);

        DB::table('emple')->insert([
            'nombre' => $validados['nombre'],
            'fecha_alt' => $validados['fechaAlt'],
            'salario' => $validados['salario'],
            'depart_id' => $validados['departId'],
        ]);

        return redirect('/emple')
            ->with('success', 'empleado insertado con éxito.');
    }

    public function edit($id)
    {
        $emple = $this->findEmpleado($id);
        $departamentos = DB::table('depart')
                        ->select('denominacion','id')
                        ->get();

        return view('emple.edit', [
            'emple' => $emple,
            'departamentos' => $departamentos,
        ]);
    }

    public function update($id)
    {
        $validados = $this->validar();
        $emple = $this->findEmpleado($id);

        DB::table('emple')->where('id', '=', $id)
        ->update([
            'nombre' => $validados['nombre'],
            'fecha_alt' => $validados['fechaAlt'],
            'salario' => $validados['salario'],
            'depart_id' => $validados['departId']
        ]);
        return redirect('/emple')
        ->with('success', 'empleado actualizado con exito');
    }

    private function findEmpleado($id)
    {
        $empleados = DB::select('SELECT e.*, d.denominacion
                                   FROM emple e
                                   JOIN depart d
                                     ON depart_id = d.id
                                  WHERE e.id = ?', [$id]);

        abort_unless($empleados, 404);

        return $empleados[0];
    }

    private function validar()
    {
        $validados = request()->validate([
            'nombre' => 'required|max:255',
            'fechaAlt' => 'date|nullable',
            'salario' => 'numeric|between:0.00,9999.99',
            'departId' => 'required|numeric'
        ]);

        return $validados;
    }

    private function findDepart($id)
    {
        $empleados = DB::select('SELECT denominacion
                                   FROM depart
                                  WHERE id = ?', [$id]);

        abort_unless($empleados, 404);

        return $empleados[0];
    }
}
