<?php

namespace App\Http\Livewire;

use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class User extends Component
{
    use WithPagination;
    public $search;

    protected $paginationTheme = 'tailwind';

    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('users.index', ['users' => \App\Models\User::query()->where('name', 'like', "%" . $this->search . "%")
            ->OrWhere('email', 'like', "%" . $this->search . "%")
            ->paginate(15)]);
    }
}
