<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Deseado;
use App\Models\Libro;
use App\Models\Compra;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function login() {
        if(Session::has('usuario')) {
            Session::forget('usuario');
        }
        return view('Usuario.Login');
    }

    public function registro() {
        if(Session::has('usuario')) {
            Session::forget('usuario');
        }
        return view('Usuario.Registro');
    }

    public function verificarUsuario(Request $request) {
        $usuario = $request->usuario;
        $contraseña = $request->contraseña;
        $usuarios = Usuario::where('usuario', '=', $usuario)->get();
        if ($usuarios->count() != 0) {
            $hash = $usuarios[0]->contraseña;
            if ($hash == $contraseña) {
                Session()->regenerate();
                Session::put('usuario', $usuarios[0]->idUsuario);
                return redirect()->route('inicio');
            } else {
                return back()->withErrors(['contraseña'=>'Contraseña no válida']);
            }
        }
        else {
            return back()->withErrors(['usuario'=>'Usuario no encontrado']);
        }
    }

    public function registrarUsuario(Request $request) {
        try{
            DB::beginTransaction();
            $usuario = new Usuario();
            $usuario->usuario = $request->usuario;
            $usuario->contraseña = $request->contraseña;
            $usuario->email = $request->email;
            $usuario->saldo = 0;
            $usuario->idTipoUsuario = '2';
            $usuario->save();     
            Session()->regenerate();
            Session::put('usuario', $usuario->idUsuario);     
            DB::commit();
        }   
        catch(\Exception $e)
        {
         dd($e);
            DB::rollback();
        }
        return redirect()->route('inicio');
    }

    public function salir() {
        Session::forget('usuario');
        return back();
    }

    public function verPerfil($id) {
        if (Session::get('usuario') == $id) {
            $usuario = DB::table('usuarios as u')->join('tiposusuario as t', 't.idTipoUsuario', '=', 'u.idTipoUsuario')
            ->where('u.idUsuario', '=', $id)->select('u.usuario', 'u.saldo', 'u.idUsuario', 'u.email', 't.tipo')->first();
            return view('Usuario.perfil', compact('usuario'));
        } else {
            return redirect()->route('ingreso');
        }
    }

    public function verCompras($id) {
        if (Session::get('usuario') == $id) {
            $usuario = Usuario::FindOrFail($id);
            $compras = DB::table('compras as c')->join('libros as l', 'l.idLibro', '=', 'c.idLibro')->where('c.idUsuario', '=', $id)
            ->select('l.titulo', 'l.imagen', 'l.idLibro', 'c.fechaCompra')->orderBy('fechaCompra')->get();
            return view('Usuario.compras', compact('compras', 'usuario'));
        } else {
            return redirect()->route('ingreso');
        }
    }

    public function verDeseados($id) {
        if (Session::get('usuario') == $id) {
            $usuario = Usuario::FindOrFail($id);
            $deseados = DB::table('deseados as d')->join('libros as l', 'l.idLibro', '=', 'd.idLibro')->where('d.idUsuario', '=', $id)
            ->select('l.titulo', 'l.imagen', 'l.idLibro', 'd.fechaAgregado')->orderBy('fechaAgregado')->get();
            return view('Usuario.deseados', compact('deseados', 'usuario'));
        } else {
            return redirect()->route('ingreso');
        }
    }

    public function verSaldo($id) {
        if (Session::get('usuario') == $id) {
            $usuario = Usuario::FindOrFail($id);
            return view('usuario.saldo', compact('usuario'));
        } else {
            return redirect()->route('ingreso');
        }
    }

    public function agregarSaldo(Request $request, $id) {
        if (Session::get('usuario') == $id) {
            $usuario = Usuario::FindOrFail($id);
            $data = request()->validate([
                'saldo'=>'required|min:0',
            ], [
                'precio.required'=>'Debe escribir el saldo',
                'precio.min'=>'El saldo a agregar debe ser mínimo 0'
            ]);
            $usuario->saldo += $request->saldo;
            Usuario::where('idUsuario', '=', $usuario->idUsuario)->update(['saldo'=>$usuario->saldo]);
            return redirect()->route('perfil', $id);
        } else {
            return redirect()->route('ingreso');
        }
    }
}
