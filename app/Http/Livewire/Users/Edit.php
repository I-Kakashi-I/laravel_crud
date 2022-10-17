<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Validation\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;
use LivewireUI\Modal\ModalComponent;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Edit extends Component
{

    use WithFileUploads;

    public User $user;
    public $photo;
    public $allRoles;
    public $selectedRoles = [];
    public $allPermissions;
    public $selectedPermissions = [];


    protected function rules()
    {
        return [
            'userData.name' => ['required', 'string', 'max:255'],
            'userData.email' => ['required', 'email', 'max:255', "unique:users,email," . $this->userData->id],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
        ];
    }


    public function updated($propertyName)
    {
        if ($propertyName == 'selectedRoles')
            $this->checkRoles();
        elseif ($propertyName == 'selectedPermissions')
            $this->checkPermissions();
        $this->validateOnly($propertyName);
    }

    public function mount(User $user)
    {
        $this->userData = $user;
        $this->allRoles = Role::all();
        $this->selectedRoles = $this->userData->getRoleNames()->toArray();
        $this->allPermissions = Permission::all();
        $this->checkRoles();
    }

    public function render()
    {
        return view('users.edit');
    }


    public function update()
    {
        $this->validate();
        if ($this->photo) {
            $this->userData->updateProfilePhoto($this->photo);
        }
        $this->userData->syncRoles($this->selectedRoles);
        $this->userData->syncPermissions($this->selectedPermissions);
       return $this->redirect(route('users.index'));
    }

    private function checkPermissions()
    {


    }

    private function checkRoles()
    {
        if (count($this->selectedRoles) == 0) {
            $this->selectedPermissions = [];
        }
        foreach ($this->selectedRoles as $role) {
            $this->selectedPermissions = array_merge($this->selectedPermissions, Role::query()->where('name', $role)->first()->getAllPermissions()->map(fn(Permission $permission) => $permission->name)->toArray());
        }
       $userPermissions = $this->userData->permissions()->get()->map(fn( Permission $permission)=>$permission->name)->toArray();
        $this->selectedPermissions = array_merge($this->selectedPermissions, $userPermissions);
        $this->selectedPermissions = array_unique($this->selectedPermissions);

    }

}
