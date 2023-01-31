<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DeseadoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function() {
    return view('index');
})->name('inicio');
Route::get('/login', [UsuarioController::class, 'login'])->name('ingreso');
Route::get('/registro', [UsuarioController::class, 'registro'])->name('registro');
Route::post('/login/usuario', [UsuarioController::class, 'verificarUsuario'])->name('ingresar');
Route::post('/registro/usuario', [UsuarioController::class, 'registrarUsuario'])->name('registrar');
Route::get('/salir', [UsuarioController::class, 'salir'])->name('salir');
Route::get('/perfil/{id}', [UsuarioController::class, 'verPerfil'])->name('perfil');
Route::get('/perfil/{id}/compras', [UsuarioController::class, 'verCompras'])->name('perfil.compras');
Route::get('/perfil/{id}/deseados', [UsuarioController::class, 'verDeseados'])->name('perfil.deseados');
Route::get('/perfil/{id}/saldo', [UsuarioController::class, 'verSaldo'])->name('perfil.saldo');
Route::post('/perfil/{id}/saldo/agregar', [UsuarioController::class, 'agregarSaldo'])->name('perfil.agregarSaldo');

Route::resource('autores', AutorController::class);
Route::resource('libros', LibroController::class);
Route::get('/comprar/{id}', [CompraController::class, 'realizarCompra'])->name('compra');
Route::get('/reporte/{id}', [CompraController::class, 'reporteCompras'])->name('compra.reporte');

Route::get('/deseados/{id}', [DeseadoController::class, 'agregarDeseado'])->name('usuario.deseado');
Route::get('/deseados/{id}/quitar', [DeseadoController::class, 'quitarDeseado'])->name('usuario.quitarDeseado');

Route::post('/libros/{id}/comentario', [LibroController::class, 'guardarComentario'])->name('comentario.store');