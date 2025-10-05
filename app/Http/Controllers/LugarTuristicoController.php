<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LugarTuristicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    // Esta línea le dice a Laravel: busca en 'resources/views/lugares/'
    // un archivo llamado 'create.blade.php' y muéstralo.
    return view('lugares.create'); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    // 1. Validación de los datos del formulario
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'required|string',
        'ubicacion' => 'required|string|max:255',
    ]);

    // 2. Creación del nuevo registro en la base de datos
    // Usa el modelo para crear un nuevo lugar con los datos ya validados
    LugarTuristico::create($validated);

    // 3. Redirección a la página principal con un mensaje de éxito
    return redirect('/lugares')->with('success', '¡Lugar turístico creado exitosamente!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(LugarTuristico $lugarTuristico)
    {
       // Gracias al "Route Model Binding" de Laravel, la variable $lugarTuristico
       // ya contiene el lugar turístico que se quiere editar.

       // Simplemente retornamos una nueva vista llamada 'edit.blade.php'
       // y le pasamos los datos de ese lugar.
       return view('lugares.edit', ['lugar' => $lugarTuristico]);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
