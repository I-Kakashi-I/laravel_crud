<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Employee extends Component
{
    public $search;

    public function render()
    {

        return view('employees.index', ['employees' => \App\Models\Employee::query()
            ->where('name', 'like', "%" . $this->search . "%")
            ->OrWhere('position','like', "%" . $this->search . "%")
            ->paginate(20)]);
    }
}
