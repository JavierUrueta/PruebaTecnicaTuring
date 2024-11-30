<div>
    <input type="text" wire:model="search" placeholder="Buscar estudiantes" class="form-control mb-3">

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Grado</th>
                <th>Promedio</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->nombre }}</td>
                    <td>{{ $student->correo }}</td>
                    <td>{{ $student->grado }}</td>
                    <td>{{ $student->promedio }}</td>
                    <!-- Botón de edición -->
                    <td>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal-{{ $student->id }}">
                            <!-- Icono de edición -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </button>
                    </td>
                    <!-- Botón de eliminar -->
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $student->id }}">
                            <!-- Icono de eliminar -->
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </td>
                    <!-- Modal de edición único para este alumno -->
                    <div class="modal fade" id="editModal-{{ $student->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel-{{ $student->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="editModalLabel-{{ $student->id }}">Editar Alumno</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('director.students.update', $student->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="nombre-{{ $student->id }}" class="form-label">Nombre</label>
                                            <input type="text" class="form-control" id="nombre-{{ $student->id }}" name="nombre" value="{{ $student->nombre }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="correo-{{ $student->id }}" class="form-label">Correo</label>
                                            <input type="email" class="form-control" id="correo-{{ $student->id }}" name="correo" value="{{ $student->correo }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="grado-{{ $student->id }}" class="form-label">Grado</label>
                                            <input type="text" class="form-control" id="grado-{{ $student->id }}" name="grado" value="{{ $student->grado }}" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="promedio-{{ $student->id }}" class="form-label">Promedio</label>
                                            <input type="text" class="form-control" id="promedio-{{ $student->id }}" name="promedio" value="{{ $student->promedio }}" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Actualizar Alumno</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal de eliminación -->
                    <div class="modal fade" id="deleteModal-{{ $student->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteModalLabel-{{ $student->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="deleteModalLabel-{{ $student->id }}">Eliminar Alumno</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ¿Estás seguro de que deseas eliminar al alumno <strong>{{ $student->nombre }}</strong>? Esta acción no se puede deshacer.
                                </div>
                                <div class="modal-footer">
                                    <form action="{{ route('alumnos.destroy', $student->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    {{ $students->links() }}
</div>
<script>
    // Obtener todos los botones de editar
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            // Obtener el ID del alumno desde el atributo data-id
            const studentId = this.getAttribute('data-id');
            
            // Hacer una solicitud Ajax para obtener los datos del alumno
            fetch(`/students/${studentId}/edit`) // Asegúrate de tener la ruta correcta
                .then(response => response.json())
                .then(data => {
                    // Llenar los campos del formulario con los datos del alumno
                    document.getElementById('nombre').value = data.nombre;
                    document.getElementById('correo').value = data.correo;
                    document.getElementById('grado').value = data.grado;
                    document.getElementById('promedio').value = data.promedio;
                    document.getElementById('student_id').value = data.id;
                })
                .catch(error => console.error('Error al cargar los datos del alumno:', error));
        });
    });
</script>

