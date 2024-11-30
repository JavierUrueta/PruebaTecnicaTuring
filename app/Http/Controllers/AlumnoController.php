<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class AlumnoController extends Controller
{
    // Mostrar todos los alumnos
    public function index()
    {
        $alumnos = Alumno::all();
        return view('director.students', compact('alumnos'));
    }

    // Mostrar el formulario para crear un nuevo alumno
    public function create()
    {
        return view('director.students');
    }

    // Guardar un nuevo alumno en la base de datos


    public function store(Request $request)
    {
        Log::info('Datos del request:', $request->all()); // Esto registrará los datos en storage/logs/laravel.log
        
        // Validación
        $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|unique:alumnos,correo',
            'password' => 'required|string|min:5',
            'grado' => 'required|string',
            'promedio' => 'required|numeric|min:0|max:10',
            'rol' => 'required|integer',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'correo.required' => 'El correo es obligatorio.',
            'correo.email' => 'El correo debe ser válido.',
            'grado.required' => 'El grado es obligatorio.',
            'promedio.required' => 'El promedio es obligatorio.',
            'rol.required' => 'El rol es obligatorio.',
        ]);

        //abort(500, 'si pasa 1');
        Log::info('Validación pasada.'); // Confirmación de que la validación fue exitosa
        try {
            $alumno = Alumno::create([
                'nombre' => $request->nombre,
                'correo' => $request->correo,
                'password' => bcrypt($request->password),
                'grado' => $request->grado,
                'promedio' => $request->promedio,
                'rol' => $request->rol,
            ]);
            // Redirigir a la página de alumnos con un mensaje de éxito
            return redirect()->route('director.students')->with('success', 'Alumno creado correctamente.');
            Log::info('Alumno creado correctamente:', ['id' => $alumno->id]);
        } catch (\Exception $e) {
            Log::error('Error al crear el alumno: ' . $e->getMessage());
            return back()->withErrors('Hubo un problema al crear el alumno.');
        }   
    }
    // Mostrar un alumno específico
    public function show($id)
    {
        $alumno = Alumno::findOrFail($id);
        return view('director.students', compact('alumno'));
    }

    // Mostrar el formulario para editar un alumno
    public function edit($id)
    {
        $alumno = Alumno::findOrFail($id); // Encuentra el alumno por ID
        return response()->json($alumno); // Devuelve los datos del alumno como respuesta JSON
    }

    // Actualizar la información de un alumno
    public function update(Request $request, $id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->update([
            'nombre' => $request->nombre,
            'correo' => $request->correo,
            'grado' => $request->grado,
            'promedio' => $request->promedio,
        ]);
    
        return redirect()->route('director.students')->with('success', 'Alumno actualizado correctamente');
    }

    // Eliminar un alumno
    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);
        $alumno->delete();
    
        return redirect()->route('director.students')->with('success', 'Alumno eliminado correctamente');
    }
    
}
