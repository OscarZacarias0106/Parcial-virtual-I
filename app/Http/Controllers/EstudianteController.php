<?php

namespace App\Http\Controllers;

use App\Models\categoria;
use App\Models\estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EstudianteController extends Controller
{
    //Lista Estudiante
    public function ListaEstudiante()
    {
        $estu = DB::table('estudiantes')
            ->join('categorias','estudiantes.id_categoria', '=', 'categorias.id_categoria')
            ->select('estudiantes.*', 'categorias.descripcion')
            ->paginate(100);

        return view('Estudiante.ListaEstudiante', compact('estu'));

    }

    //Formulario Estudiante
    public function fromEstudiante()
    {
        $categoria = categoria::all(); //Para agregar los datos en el formulario
        return view('Estudiante.fromEstudiante', compact('categoria'));
    }

    //Funcion para guardar los datos
    public function saveEstudiante(Request $request)
    {
        $datoStuden = request()->except('_token');

        $validator = $this->validate($request, [
            'nombre'=> 'required|string|max:75',
            'alias' =>'required|string|max:15',
            'foto'=>'required|max:245',
            'correo'=>'required|max:45|email',
            'fecha_nacimiento'=>'required|string|',
            'telefono'=>'required|string|max:25|',
            'id_categoria' => 'required',
        ]);

        //Para guardare la foto
        if($request->hasFile('foto')){
            $datoStuden['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        estudiante::create([
            'nombre'=> $validator['nombre'],
            'alias' =>$validator['alias'],
            'correo'=>$validator['correo'],
            'fecha_nacimiento'=>$validator['fecha_nacimiento'],
            'telefono'=>$validator['telefono'],
            'foto'=>$datoStuden['foto'],
            'id_categoria'=>$datoStuden['id_categoria'],
        ]);

        return redirect('/')->with('estudianteGuardar', 'Estudiante Guardado');
    }

    //Formulario de edicion
    public function editFromEstudiante($carne)
    {
        $categoria = categoria::all();
        $estu = estudiante::findOrFail($carne);

        return view('Estudiante.editEstudiante', compact('estu', 'categoria'));
    }

    //Funcion para guardar la edicion
    public function editEstudiante(Request $request, $carne)
    {
        $datoEstudiante = request()->except((['_token', '_method']));

        //Editar foto
        if($request->hasFile('foto')){

            $estu= estudiante::findOrFail($carne);

            Storage::delete('public/'.$estu->foto);
            $datoEstudiante['foto']=$request->file("foto")->store('uploads', 'public');
        }

        estudiante::where('carne', '=', $carne)->update($datoEstudiante);

        return redirect('/')->with('estudianteModificado', 'Estudiante Modificado');
    }


    public function destroy($carne)
    {
        $estu = estudiante::FindOrFail($carne);

        //Eliminar foto
        if(Storage::delete('public/'.$estu->foto)){
            estudiante::destroy($carne); //Eliminar a los estudiantes
        }

        return redirect('/')->with('estudianteModificado', 'El estudiante a sido eliminado');
    }
}
