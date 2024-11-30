@extends('layouts.director-navbar')

@section('content')
<div class="container" style="margin-top: 1em">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agregar Alumno
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Alumno</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="{{ route('director.alumno.store') }}">
                @csrf
                <div class="modal-body">
                    <!-- Campo Nombre -->
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <!-- Campo Correo -->
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" required>
                    </div>

                    <!-- Campo Contraseña (valor por defecto) -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="text" class="form-control" id="password" name="password" value="12345" readonly>
                    </div>

                    <!-- Campo Grado -->
                    <div class="mb-3">
                        <label for="grado" class="form-label">Grado</label>
                        <input type="text" class="form-control" id="grado" name="grado" required>
                    </div>

                    <!-- Campo Promedio -->
                    <div class="mb-3">
                        <label for="promedio" class="form-label">Promedio</label>
                        <input type="number" class="form-control" id="promedio" name="promedio" step="0.01" required>
                    </div>

                    <!-- Campo Rol (valor por defecto) -->
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <input type="text" class="form-control" id="rol" name="rol" value="4" readonly>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Crear Alumno</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top: 1em">
    @livewire('students-table')
</div>
@endsection