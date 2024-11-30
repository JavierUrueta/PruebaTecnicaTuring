<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Alumno;

class StudentsTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $queryString = ['search'];

    public function render()
    {
        $students = Alumno::query()
            ->where('nombre', 'like', '%' . $this->search . '%')
            ->orWhere('correo', 'like', '%' . $this->search . '%')
            ->paginate(10);

        return view('livewire.students-table', compact('students'));
    }
}

