<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;


class DirectorController extends Controller
{
    public function index()
    {
        // Solo vamos a devolver la vista por ahora
        return view('directors.index');
    }
}
