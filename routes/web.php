<?php
//Controllers
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\ArticuloController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PlanificacionDistribucionController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/**
 * ------------------------------------------------------------------------
 * Rutas De Inicio
 * ------------------------------------------------------------------------
 */
Route::get('/', function() {
    return redirect()->route('login');
});

/**
 * ------------------------------------------------------------------------
 * Rutas De Autenticación
 * ------------------------------------------------------------------------
 */
Route::get('/crear-cuenta',
    [RegisterController::class, 'index']
)->name('register');

Route::post('/crear-cuenta',
    [RegisterController::class, 'store']
)->name('register');

Route::get('/iniciar-sesion',
    [LoginController::class, 'index']
)->name('login');

Route::post('/iniciar-sesion',
    [LoginController::class, 'store']
)->name('login');

Route::post('/cerrar-sesion',
    [LoginController::class, 'destroy']
)->name('logout');



/**
 * ------------------------------------------------------------------------
 * Rutas De Perfil De Usuario
 * ------------------------------------------------------------------------
 */
Route::get('/home',
    [PerfilController::class, 'index']
)->name('perfil.index');



/**
 * ------------------------------------------------------------------------
 * Rutas De Inventario
 * ------------------------------------------------------------------------
 */
Route::get('/articulos',
    [ArticuloController::class, 'index']
)->name('articulos.index');



/**
 * ------------------------------------------------------------------------
 * Rutas De Cliente
 * ------------------------------------------------------------------------
 */
Route::get('/clientes',
    [ClienteController::class, 'index']
)->name('clientes.index');

Route::get('/clientes/{cliente}',
    [ClienteController::class, 'show']
)->name('clientes.show');



/**
 * ------------------------------------------------------------------------
 * Rutas De Empleado
 * ------------------------------------------------------------------------
 */
Route::get('/empleados',
    [EmpleadoController::class, 'index']
)->name('empleados.index');

Route::get('/empleados/create',
    [EmpleadoController::class, 'create']
)->name('empleados.create');

Route::post('/empleados',
    [EmpleadoController::class, 'store']
)->name('empleados.store');

Route::get('/empleados/{empleado}',
    [EmpleadoController::class, 'show']
)->name('empleados.show');

Route::delete('/empleados/{empleado}',
    [EmpleadoController::class, 'destroy']
)->name('empleados.destroy');



/**
 * ------------------------------------------------------------------------
 * Rutas De Pedido
 * ------------------------------------------------------------------------
 */
Route::get('/pedidos',
    [PedidoController::class, 'index']
)->name('pedidos.index');

Route::get('/pedidos/{pedido}',
    [PedidoController::class, 'show']
)->name('pedidos.show');



/**
 * ------------------------------------------------------------------------
 * Rutas De Planificación
 * ------------------------------------------------------------------------
 */
Route::get('/distribucion',
    [PlanificacionDistribucionController::class, 'index']
)->name('distribucion.index');

Route::get('/distribucion/create',
    [PlanificacionDistribucionController::class, 'create']
)->name('distribucion.create');

Route::post('/distribucion',
    [PlanificacionDistribucionController::class, 'store']
)->name('distribucion.store');

Route::get('/distribucion/{planificacionDistribucion}/edit',
    [PlanificacionDistribucionController::class, 'edit']
)->name('distribucion.edit');

Route::put('/distribucion/{planificacionDistribucion}',
    [PlanificacionDistribucionController::class, 'update']
)->name('distribucion.update');

Route::get('/distribucion/{planificacionDistribucion}',
    [PlanificacionDistribucionController::class, 'show']
)->name('distribucion.show');

Route::delete('/distribucion/{planificacionDistribucion}',
    [PlanificacionDistribucionController::class, 'destroy']
)->name('distribucion.destroy');
