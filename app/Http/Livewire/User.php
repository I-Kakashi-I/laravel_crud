<?php

namespace App\Http\Livewire;

use Livewire\Component;

class User extends Component
{
    public $search;

    public function render()
    {

        return view('users.index',['users'=> \App\Models\User::query()->where('name', 'like', "%" . $this->search . "%")->paginate(15)]);
    }
}
