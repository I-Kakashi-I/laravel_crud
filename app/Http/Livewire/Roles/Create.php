<?php

namespace App\Http\Livewire\Roles;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Create extends ModalComponent
{

    public $role_name;

    protected $rules = [
        'role_name' => 'required|min:3|unique:roles,name',
    ];

    public function render()
    {
        return view('livewire.roles.create');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function create(){
        $this->validate();
        Role::create(['name'=>$this->role_name]);
        $this->emit('refresh');
        $this->closeModal();
    }

}
