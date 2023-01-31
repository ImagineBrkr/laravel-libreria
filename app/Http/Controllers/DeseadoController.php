<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Usuario;
use App\Models\Libro;
use App\Models\Deseado;
use App\Models\Compra;

class DeseadoController extends Controller
{
    
    public function agregarDeseado($id) {
        if (Session::has('usuario')) {
            try {
                $usuario = Usuario::FindOrFail(Session::get('usuario'));
                $libro = Libro::FindOrFail($id);
                $deseado = Deseado::where('idUsuario', '=', $usuario->idUsuario)->where('idLibro', '=', $id)->get();
                $compra = Compra::where('idUsuario', '=', $usuario->idUsuario)->where('idLibro', '=', $id)->get();
                if (count($deseado) == 0)  {
                    if (count($compra) == 0) {                   
                        $deseado = new Deseado();
                        $deseado->idUsuario = $usuario->idUsuario;
                        $deseado->idLibro = $libro->idLibro;
                        $deseado->fechaAgregado = now();
                        $deseado->save();
                        return redirect()->route('libros.show', $id);
                    } else {
                        return redirect()->route('libros.show', $id)->withErrors(['libro'=>'Libro ya obtenido']);
                    }
                } else {
                    return redirect()->route('libros.show', $id)->withErrors(['libro'=>'El libro ya está en la lista de deseados']);
                }
            } catch(\Exception $e) {
                dd($e);
                return redirect()->back()->withErrors(['libro'=>'Error']);
            }
        } else {
            return redirect()->route('ingreso');
        }
    }

    public function quitarDeseado($id) {
        if (Session::has('usuario')) {
            try {
                $usuario = Usuario::FindOrFail(Session::get('usuario'));
                $deseado = Deseado::where('idUsuario', '=', $usuario->idUsuario)->where('idLibro', '=', $id)->get();
                if (count($deseado) == 0) {
                    return redirect()->route('libros.show', $id)->withErrors(['libro'=>'El usuario no posee el libro en la lista de deseados']);
                } else {
                    $deseado[0]->delete();
                    return redirect()->route('libros.show', $id);
                }
            } catch(\Exception $e) {
                dd($e);
                return redirect()->back()->withErrors(['libro'=>'Error']);
            }
        } else {
            return redirect()->route('ingreso');
        }
    }

}
