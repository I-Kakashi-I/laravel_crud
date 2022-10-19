<?php

namespace App\Http\Livewire;

use Illuminate\Pagination\Paginator;
use Livewire\Component;
use Livewire\WithPagination;

class Inventory extends Component
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
        return view('livewire.inventory.index', ['items' => \App\Models\Inventory::query()->where('name', 'like', "%" . $this->search . "%")
            ->OrWhere('type', 'like', "%" . $this->search . "%")
            ->paginate(15)]);
    }
}
