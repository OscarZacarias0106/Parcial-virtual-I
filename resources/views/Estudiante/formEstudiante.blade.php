@extends('welcome') <!--para heredar de base los estilos-->
@section('title','Formulario Estudiantes') <!--titulo, nombre de esta seccion-->
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
                    <form action="{{ route('Estudiante.saveEstudiante')}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-header border-primary text-center text-white" style="background-color: #196F3D"; >AGREGAR ESTUDIANTE</div>

                        <div class="card-body border-primary" style="background-color: #BDFFD2;">
                            <form>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Email</label>
                                    <input type="email" name="correo" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Fecha de nacimiento</label>
                                    <input type="text" name="fecha_nacimiento" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Telefono</label>
                                    <input type="text" name="telefono" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">Alias</label>
                                    <input type="text" name="alias" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                </div>

                                <div class="input-group mb-3 col-md-13">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Foto</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="foto" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Eliga un archivo</label>
                                    </div>
                                </div>

                                <!--para elegir una categoria-->
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Categoria</label>
                                    <select name="id_categoria" class="form-control" id="exampleFormControlSelect1">
                                        <option class="text-center"> Seleccion una categoria
                                        @foreach($categoria as $categorias)
                                            <option value="{{$categorias->id_categoria}}"> {{$categorias->descripcion}}</option>
                                            @endforeach
                                            </option>
                                    </select>
                                </div>

                                <div class="row form-group">
                                    <button type="submit" class="btn btn col-md-9 offset-2 text-dark mb-2" style="background-color: #58D68D;">Guardar</button>

                                    <a class="btn btn-outline-secondary col-md-9 offset-2 text-dark" href="{{url('/')}}" role="button">Regresar</a>
                                </div>
                            </form>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
