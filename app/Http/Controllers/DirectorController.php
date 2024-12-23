<?php

namespace App\Http\Controllers;

use App\Models\Director;
use App\Models\Alumno;  
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*if  (Auth::user()) {
            dd('Usuario autenticado');
        } else {
            dd('No autenticado');
        }
        dd(auth('director')->user()); // Asegúrate de que estés usando el guard correcto*/
        return view('director.dashboard', ['director' => Auth::user()]);
    }

    public function students()
    {
        /*if  (Auth::user()) {
            dd('Usuario autenticado');
        } else {
            dd('No autenticado');
        }
        dd(auth('director')->user()); // Asegúrate de que estés usando el guard correcto*/
        $students = Alumno::all(); // Obtén todos los estudiantes
        return view('director.students', compact('students')); // Pasa los datos a la vista
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(Director $director)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Director $director)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Director $director)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Director $director)
    {
        //
    }
}
