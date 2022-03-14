@extends('welcome') <!--para heredar de base los estilos-->
@section('title','Lista Estudiantes') <!--titulo, nombre de esta seccion-->
@section('navbar')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="cold-md-11">
                <h1 class="text-center mb-5">Estudiantes</h1>

                <a class="btn btn-outline-success mb-3 btn-lg" href="{{url('/formEstudiante')}}">AGREGAR</a>

                <!--Mensaje de Eliminado-->
                @if(session('estudianteEliminado'))
                    <div class="alert alert alert-primary text-dark" style="background-color: #F1D914 ;">
                        {{session('estudianteEliminado')}}
                    </div>
                @endif

            <!--Mensaje de Modificado-->
                @if(session('estudianteModificado'))
                    <div class="alert alert-primary">
                        {{session('estudianteModificado')}}
                    </div>
                @endif

            <!--Mensaje de Guardado-->
                @if(session('estudianteGuardado'))
                    <div class="alert alert-success">
                        {{session('estudianteGuardado')}}
                    </div>
                @endif

                <div class="col-xl-30">
                    <table class="table table-dark table-hover text-dark">
                        <thead>
                        <tr style="background-color: #ABEBC6;">
                            <th>Carne</th>
                            <th>Foto</th>
                            <th>Alias</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Fecha de nacimiento</th>
                            <th>Telefono</th>
                            <th>Categoria</th>
                            <th>Acciones</th>
                        </tr>
                        </thead>

                        <tbody style="background-color: #1D9283 ;">
                        @foreach($estu as $estus)
                            <tr>
                                <td class="text-white text-center ">{{$estus->carne}}</td>
                                <td>
                                    <img src="{{ asset('storage').'/'. $estus->foto}}" class="img-fluid img-thumbnail"  width="100px" high="100px">
                                </td>

                                <td class="text-white">{{$estus->alias}}</td>
                                <td class="text-white">{{$estus->nombre}}</td>
                                <td class="text-white">{{$estus->correo}}</td>
                                <td class="text-white text-center">{{$estus->fecha_nacimiento}}</td>
                                <td class="text-white">{{$estus->telefono}}</td>
                                <td class="text-white">{{$estus->descripcion}}</td>

                                <td>

                                    <div class="btn-group">

                                        <a href="{{ route('editFromEstudiante', $estus->carne) }}" class="btn btn-primary mb-3 mr-2">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <form action="{{route('delete', $estus->carne)}}" method="POST">
                                            @csrf @method('DELETE')

                                            <button type="submit" onclick="return confirm('¿Desea eliminar al estudiante?');" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>

                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>

                    </table>
                </div>

                <!--paginas-->
                {{ $estu->links() }}

            </div>
        </div>
    </div>

@endsection
