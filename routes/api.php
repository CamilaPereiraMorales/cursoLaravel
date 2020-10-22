<?php

use Illuminate\Http\Request;
use App\Models\Empleado;

//listar los empleados

Route::get('empleados', function () {
    $empleados = Empleado::get();
    return $empleados ;
});

 //return $request->all(); devuelve todo
    //return $request->input('estado_civil');  va a devolvernos unicamente el valor del parametro que le consultamos dentro del input

// Ruta para guardar empleado
Route::post('empleados', function(Request $request) {
   $request->validate([
       'nombres' => 'required|max:50',
       'apellido' => 'required|max:50',
       'cedula' => 'required|max:20',
       'email' => 'required|max:50|email|unique:empleados',
       'lugar_nacimiento' => 'required|max:50',
       'telefono' => 'required|max:50'
   ]);

   $empleado = new Empleado;
   $empleado->nombres = $request->input('nombres');
   $empleado->apellido = $request->input('apellido'); 
   $empleado->cedula = $request->input('cedula');
   $empleado->email = $request->input('email');
   $empleado->lugar_nacimiento = $request->input('lugar_nacimiento');
   $empleado->telefono = $request->input('telefono');
   $empleado->save();
   return "Empleado Creado";
});

// Ruta para obtener datos de un empleado
Route::get('empleados/{id}', function($id) {
    $empleado = Empleado::FindOrFail($id);
    return $empleado;
});

//Ruta para actualizar empleado
Route::put('empleados/{id}', function(Request $request, $id) {
    $request->validate([
        'nombres' => 'required|max:50',
        'apellido' => 'required|max:50',
        'cedula' => 'required|max:20',
        'email' => 'required|max:50|email|unique:empleados,email,'. $id,
        'lugar_nacimiento' => 'required|max:50',
        'telefono' => 'required|max:50'
    ]);

    $empleado = Empleado::findOrFail($id);
    $empleado->nombres = $request->input('nombres');
    $empleado->apellido = $request->input('apellido'); 
    $empleado->cedula = $request->input('cedula');
    $empleado->email = $request->input('email');
    $empleado->lugar_nacimiento = $request->input('lugar_nacimiento');
    $empleado->telefono = $request->input('telefono');
    $empleado->save();
    return "Empleado Actualizado";
});

// Ruta para eliminar empleados
Route::delete('empleados/{id}', function($id){
    $empleado = Empleado::FindOrFail($id);
    $empleado->delete();
    return "Empleado eliminado";
});