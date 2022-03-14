@extends('welcome') <!--para heredar de base los estilos-->
@section('title','Editar Categoria') <!--titulo, nombre de esta seccion-->
@section('navbar')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-7 mt-5">

                <!--Validacion de errores-->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif

                <div class="card border-success">
                    <form action="{{ route('categoria.update', $categoria->id_categoria)}}" method="POST" enctype="multipart/form-data">
                        @csrf @method('PATCH')

                        <div class="card-header border-success text-center text-white" style="background-color: #21618C"; >MODIFICAR CATEGORIA</div>

                        <div class="card-body" style="background-color: #D6EAF8;">

                            <div class="form-group text-center">
                                <label for="exampleInputEmail1">Descripcion</label>
                                <input type="text" name="descripcion" class="form-control " id="exampleInputEmail1"
                                       aria-describedby="emailHelp" value="{{$categoria->descripcion}}">
                            </div>


                            <div class="row form-group">
                                <button type="submit" class="btn btn col-md-9 offset-2 text-dark mb-2" style="background-color: #5499C7;">Modificar</button>

                                <a class="btn btn-outline-secondary col-md-9 offset-2 text-dark" href="{{url('/categoria')}}" role="button">Regresar</a>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
