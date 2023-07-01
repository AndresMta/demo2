<?php

namespace App\Http\Controllers;

//Models
use App\Models\Empleado;

use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function show(Empleado $empleado) {
        return view('empleado.show', [
            'empleado' => $empleado
        ]);
    }

    public function index() {
        $empleados = Empleado::paginate(10);

        return view('empleado.listado', [
            'empleados' => $empleados
        ]);
    }


    public function create() {
        return view('empleado.create');
    }


    public function store(Request $request) {
        $this->validate($request, [
            'tipoEmpleado' => 'required',
            'email' => 'required|email',
            'domicilio' => 'required',
            'dni' => 'required',
            'apellido' => 'required',
            'nombre' => 'required'
        ]);

        $empleado = Empleado::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'dni' => $request->dni,
            'domicilio' => $request->domicilio,
            'email' => $request->email,
            'tipoEmpleado' => $request->tipoEmpleado,
            'password' => '$04$ioq12meuJh9jIbv6hTUEuuMRrXieYeUwF.0VfyjiLeyxHwjQ/4BJW'
        ]);

        return redirect()->route('empleados.show', ['empleado' => $empleado]);
    }

    public function destroy(Empleado $empleado) {

        try {
            $empleado->delete();
        } catch (\Throwable $th) {
            return back()->with('mensaje', 'No se puedo eliminar empleado. Esta asociado a una distribución');
        }

        return back();
    }

}
