<?php

namespace App\Http\Livewire;

use Livewire\Component;

class User extends Component
{
    public $search;

    public function render()
    {

        return view('livewire.user',['users'=> \App\Models\User::query()->where('name', 'like', "%" . $this->search . "%")->get()]);
    }
}
