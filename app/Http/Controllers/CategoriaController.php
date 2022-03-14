<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    //Para visualizar la lista de categoria
    public function index()
    {
        $datos['categoria'] = categoria::paginate(10);//paginacion

        return view('Categoria.ListaCategoria', $datos);
    }

    //Para llegar al formulario
    public function create()
    {
        return view('Categoria.formCategoria');
    }

    //Funcion para guardar a categoria
    public function store(Request $request)
    {
        $validator = $this->validate($request,['descripcion'=>'required|string|max:45:categorias']);

        categoria::create([
            'descripcion' => $validator['descripcion'],
        ]);

        return redirect('/categoria')->with('categoriaGuardada', 'Categoria Guardada');
    }

    //Formulario
    public function edit($id_categoria)
    {
        $categoria = categoria::findOrFail($id_categoria);

        return view('Categoria.editCategoria', compact('categoria'));
    }

    public function update(Request $request, $id_categoria)
    {
        $datoCategoria = request()->except((['_token', '_method']));
        categoria::where('id_categoria', '=', $id_categoria)->update($datoCategoria);

        return redirect('/categoria')->with('categoriaModificada', "La categoria a sido moficiada");
    }

    public function destroy($id_categoria)
    {
        categoria::destroy($id_categoria);

        return redirect('/categoria')->with('categoriaEliminada', "Esta categoria a sido eliminada");
    }
}
