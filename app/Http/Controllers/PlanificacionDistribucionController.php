<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

//Models
use App\Models\Empleado;
use App\Models\Pedido;
use App\Models\PlanificacionDistribucion;
use App\Models\PlanificacionDistribucionPedido;

class PlanificacionDistribucionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        return view('distribucion.index', [
            'distribuciones' => PlanificacionDistribucion::paginate(10)
        ]);
    }

    public function show(PlanificacionDistribucion $planificacionDistribucion) {
        return view('distribucion.show', [
            'distribucion' => $planificacionDistribucion
        ]);
    }

    public function create() {
        return view('distribucion.create', [
            'distribuidores' => Empleado::where('tipoEmpleado', 'Distribuidor')->get()
        ]);
    }

    public function store(Request $request) {
        $this->validate($request, [
            'pedidos'  => 'required',
            'empleado' => 'required',
            'fecha'    => 'required'
        ]);

        //Cambiar el estado de los pedidos.
        $pedidos = implode(',', $request->pedidos);
        DB::table('pedidos')
            ->whereIn('id', $request->pedidos)
            ->update(['estado' => 'En Distribucion']);


        //Armar la planificación de distribucion
        $distribucion = PlanificacionDistribucion::create([
            'fecha'       => $request->fecha,
            'empleado_id' => $request->empleado,
            'estado'      => 'Creada'
        ]);

        //Armar la planificacion_distirbucion_pedidos
        foreach($request->pedidos as $pedido) {
            PlanificacionDistribucionPedido::create([
                'pedido_id' => $pedido,
                'planificacion_distribucion_id' => $distribucion->id
            ]);
        }

        return redirect()->route('distribucion.show', $distribucion->id);
    }

    public function destroy(PlanificacionDistribucion $planificacionDistribucion) {
        foreach ($planificacionDistribucion->planificacionDistribucionPedido as $planificacionPedido) {
            $planificacionPedido->pedido->estado = 'Armado';
            $planificacionPedido->pedido->save();
            $planificacionPedido->delete();
        }

        $planificacionDistribucion->delete();

        return redirect()->route('distribucion.index');
    }


    public function edit(PlanificacionDistribucion $planificacionDistribucion) {
        return view('distribucion.edit', [
            'distribucion' => $planificacionDistribucion,
            'distribuidores' => Empleado::where('tipoEmpleado', 'Distribuidor')->get()
        ]);
    }

    public function update(Request $request, PlanificacionDistribucion $planificacionDistribucion) {
        $this->validate($request, [
            'pedidos'  => 'required',
            'empleado' => 'required',
            'fecha'    => 'required'
        ]);



        //Eliminar todos los pedidos viejos y cambio el estado.
        foreach ($planificacionDistribucion->planificacionDistribucionPedido as $distribucionPedido) {
            $distribucionPedido->pedido->estado = 'Armado';
            $distribucionPedido->pedido->save();
            $distribucionPedido->delete();
        }

        //Cambiar el estado de los pedidos nuevos.
        $pedidos = implode(',', $request->pedidos);
        DB::table('pedidos')
            ->whereIn('id', $request->pedidos)
            ->update(['estado' => 'En Distribucion']);

        //Agregar los nuevos pedidos.
         //Armar la planificacion_distirbucion_pedidos
         foreach($request->pedidos as $pedido) {
            PlanificacionDistribucionPedido::create([
                'pedido_id' => $pedido,
                'planificacion_distribucion_id' => $planificacionDistribucion->id
            ]);
        }

        //Cambiar la fecha y distribuidor.
        $planificacionDistribucion->empleado_id = $request->empleado;
        $planificacionDistribucion->fecha = $request->fecha;
        $planificacionDistribucion->save();

        return redirect()->route('distribucion.show', ['planificacionDistribucion' => $planificacionDistribucion]);
    }
}

