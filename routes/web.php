<?php

use App\Http\Controllers\CategoriaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

//Ruta de la lista
Route::get('/', [EstudianteController::class,'listaEstudiante']);

//Ruta de formulario
Route::get('/formEstudiante', [EstudianteController::class, 'formEstudiante']);

//Ruta para guardar
Route::post('/Estudiante/formEstudiante', [EstudianteController::class, 'saveEstudiante'])->name('Estudiante.saveEstudiante');

//Ruta de formulario de editar
Route::patch('/edit.form/{carne}', [EstudianteController::class, 'editFormEstudiante'])->name('editFormEstudiante');

//Ruta de edicion
Route::patch('/edit/{carne}', [EstudianteController::class, 'editEstudiante'])->name('editEstudiante');

//Ruta para eliminar
Route::delete('/delete/{carne}', [EstudianteController::class, 'destroy'])->name('delete');

//Ruta unica de la Tabla Categoria
Route::resource('categoria', CategoriaController::class);


