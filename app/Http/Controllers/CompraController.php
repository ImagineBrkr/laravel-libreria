<?php

namespace App\Http\Controllers;
use App\Models\Usuario;
use App\Models\Compra;
use App\Models\Libro;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Deseado;
use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;

class CompraController extends Controller
{
    public function realizarCompra($id) {
        if (Session::has('usuario')) {
            try {
                $usuario = Usuario::FindOrFail(Session::get('usuario'));
                $libro = Libro::FindOrFail($id);
                $compra = Compra::where('idUsuario', '=', $usuario->idUsuario)->where('idLibro', '=', $id)->get();
                if (count($compra) == 0) {
                    if ($usuario->saldo >= $libro->precio) {
                            $compra = new Compra();
                            $compra->idUsuario = $usuario->idUsuario;
                            $compra->idLibro = $libro->idLibro;
                            $compra->fechaCompra = now();
                            $compra->save();
                            $usuario->saldo -= $libro->precio;
                            Usuario::where('idUsuario', '=', $usuario->idUsuario)->update(['saldo'=>$usuario->saldo]);
                            $deseado = Deseado::where('idUsuario', '=', $usuario->idUsuario)->where('idLibro', '=', $id)->get();
                            if (count($deseado) > 0) {
                                $deseado[0]->delete();
                            }
                            return redirect()->route('libros.show', $id);
                    } else {
                        return redirect()->route('libros.show', $id)->withErrors(['libro'=>'Saldo insuficiente']);
                    }
                } else {
                    return redirect()->route('libros.show', $id)->withErrors(['libro'=>'Usted ya posee el libro']);
                }
            } catch(\Exception $e) {
                dd($e);
                return redirect()->back()->withErrors(['libro'=>'Error']);
            }
        } else {
            return redirect()->route('ingreso');
        }
    }

    public function reporteCompras($id) {
        if (Session::has('usuario')) {
            $usuario = Usuario::FindOrFail(Session::get('usuario'));
            if ($usuario->idTipoUsuario == 1) {
                $libro = DB::table('libros as l')->where('idLibro', '=', $id)->join('autores as a', 'a.idAutor', '=', 'l.idAutor')
                ->select('l.titulo', 'l.descripcion', 'l.imagen', 'a.nombre as autor', 'l.idLibro', 'l.precio', 'l.imagen')->first();;
                $compras = DB::select('call obtenerVentaPorLibro(?)', [$id]);
                $pdf = PDF::loadView('libros.pdfCompra', compact('compras', 'libro'));
                return $pdf->stream('compra.pdf');
            } else{
                return redirect()->route('inicio');
            }
        } else {
            return redirect()->route('ingreso');
        }
    }
}
