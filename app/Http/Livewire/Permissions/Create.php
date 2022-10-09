<?php

namespace App\Http\Livewire\Permissions;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;

class Create extends ModalComponent
{

    public $permission_name;

    protected $rules = [
        'permission_name' => 'required|min:3|unique:permissions,name',
    ];

    public function render()
    {
        return view('livewire.permissions.create');
    }

    public function updated($propertyName)
    {
        $this->validate();
    }

    public function create(){
        $this->validate();
        Permission::create(['name'=>$this->permission_name]);
        $this->emit('refresh');
        $this->closeModal();
    }

}
