<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Compra;
use App\Models\Autor;
use App\Models\Usuario;
use Illuminate\Support\Facades\Session;
use App\Models\Comentario;
use App\Models\Deseado;
use Illuminate\Support\Facades\DB;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('usuario')) {
            $usuario = Usuario::FindOrFail(Session::get('usuario'));
            if ($usuario->idTipoUsuario == 1) {
                Session::put('rol', 'ADMIN');
            } else {
                Session::put('rol', 'CLIENTE');
            }
        } else {
            Session::forget('rol');
        }
        $libros = DB::table('libros as l')->join('autores as a', 'a.idAutor', '=', 'l.idAutor')->select('l.titulo', 'l.descripcion', 'l.imagen', 'a.nombre as autor', 'l.idAutor', 'l.idLibro')->get();
        return view('Libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Session::has('usuario')) {
            $usuario = Usuario::FindOrFail(Session::get('usuario'));
            if ($usuario->idTipoUsuario != 1) {
                return route('ingreso');
            } else {
                $autores = Autor::All();
                return view('libros.create', compact('autores'));
            }
        } else {
            return route('ingreso');
        }
    }

    public function guardarComentario(Request $request, $id) {
        $data = request()->validate([
            'apodo'=>'required|max:50',
            'comentario'=>'required|max:1000',
            'estrellas'=>'required',
        ], [
            'apodo.required'=>'El apodo no puede ser vacío',
            'apodo.max'=>'Máximo 50 caracteres para el apodo',
            'comentario.required'=>'Debe escribir el comentario',
            'comentario.max'=>'Máximo 200 caracteres para el comentario',
            'estrellas.required'=>'Debe ingresar una nota',
        ]);
        $comentario = new Comentario();
        $comentario->idLibro = $id;
        $comentario->nota = $request->estrellas;
        $comentario->comentario = $request->comentario;
        $comentario->apodo = $request->apodo;
        $comentario->save();
        return redirect()->route('libros.show', $id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Session::has('usuario')) {
            $usuario = Usuario::FindOrFail(Session::get('usuario'));
            if ($usuario->idTipoUsuario != 1) {
                return route('ingreso');
            } else {
                $data = request()->validate([
                    'titulo'=>'required|max:50',
                    'descripcion'=>'required|max:1000',
                    'precio'=>'required|min:0',
                ], [
                    'descripcion.required'=>'Descripcion no puede ser vacia',
                    'descripcion.max'=>'Máximo 1000 caracteres para la descripcion',
                    'titulo.required'=>'Debe escribir título',
                    'titulo.max'=>'Máximo 50 caracteres para el título',
                    'precio.required'=>'Debe escribir precio',
                    'precio.min'=>'El precio debe ser mínimo 0'
                ]);
                $libro = Libro::where('titulo', '=', $request->titulo)->get();
                if (count($libro) == 0) {
                        $libro = new Libro();
                        $libro->titulo = $request->titulo;
                        $libro->descripcion = $request->descripcion;
                        $libro->precio = $request->precio;

                        if (!is_null($request->imagen)) {
                            $data = request()->validate([
                                'imagen'=>'max:20',
                            ], [
                                'imagen.max'=>'La ruta es muy larga'
                            ]);
                            $libro->imagen = $request->imagen;
                        } else {
                            $libro->imagen = 'libro0.jpg';
                        }

                        if ($request->has('check')) {
                            $data = request()->validate([
                                'nombre'=>'required|max:50',
                                'biografia'=>'required|max:2000',
                            ], [
                                'biografia.required'=>'Descripcion no puede ser vacia',
                                'biografia.max'=>'Máximo 2000 caracteres para la biografía',
                                'nombre.required'=>'Debe escribir nombre',
                                'nombre.max'=>'Máximo 50 caracteres para el nombre'
                            ]);
                            $autor = Autor::where('nombre', '=', $request->nombre)->get();
                            if (count($autor) == 0) {
                                $autor = new Autor();
                                $autor->nombre = $request->nombre;
                                $autor->biografia = $request->biografia;
                                if (!is_null($request->imagenAutor)) {
                                    $data = request()->validate([
                                        'imagenAutor'=>'max:20',
                                    ], [
                                        'imagenAutor.max'=>'La ruta es muy larga'
                                    ]);
                                    $autor->imagen = $request->iamgenAutor;
                                } else {
                                    $autor->imagen = 'autor0.jpg';
                                }
                                $autor->save();
                                $libro->idAutor = $autor->idAutor;
                            } else {
                                return redirect()->back()->withErrors(['nombre'=>'El autor ya existe']);
                            }

                        } else {
                            $libro->idAutor = $request->idAutor;
                        }
                        $libro->save();
                        return redirect()->route('libros.index');

                } else {
                    return redirect()->back()->withErrors(['titulo'=>'El título ya existe']);
                }
            }
        } else {
            return route('ingreso');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            Session::put('compra', 'NO COMPRADO');
            Session::put('deseado', 'NO DESEADO');
            if (Session::has('usuario')) {
                $usuario = Usuario::FindOrFail(Session::get('usuario'));
                $compra = Compra::where('idUsuario', '=', Session::get('usuario'))->where('idLibro', '=', $id)->get();
                $deseado = Deseado::where('idUsuario', '=', Session::get('usuario'))->where('idLibro', '=', $id)->get();
                if (count($compra) > 0) {
                    Session::put('compra', 'COMPRADO');
                }
                if (count($deseado) > 0) {
                    Session::put('deseado', 'DESEADO');
                }
                if ($usuario->idTipoUsuario == 1) {
                    Session::put('rol', 'ADMIN');
                } else {
                    Session::put('rol', 'CLIENTE');
                }
            } else {
                Session::forget('rol');
            }
            $libro = DB::table('libros as l')->where('idLibro', '=', $id)->join('autores as a', 'a.idAutor', '=', 'l.idAutor')
            ->select('l.titulo', 'l.descripcion', 'l.imagen', 'a.nombre as autor', 'l.idAutor', 'l.idLibro', 'l.precio')->first();;
            $comentario = Comentario::where('idLibro', '=', $id)->get();
            $notaProm = '?';
            if (count($comentario) > 0) {
                $notaProm = 0;
                foreach ($comentario as $item) {
                    $notaProm += $item->nota;
                }
                $notaProm /= count($comentario);
                $notaProm = round($notaProm, 2);
            }
            return view('libros.show', compact('libro', 'comentario', 'notaProm'));

        } catch(\Exception $e) {
            return redirect()->route('libros.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
