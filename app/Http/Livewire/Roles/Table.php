<?php

namespace App\Http\Livewire\Roles;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Table extends DataTableComponent
{
    use LivewireAlert;

    protected $model = Role::class;

    protected $listeners = ['refresh','destroy'];

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }

    public function columns(): array
    {
        return [
            Column::make('#', 'id'),
            Column::make('Name'),
            ButtonGroupColumn::make('Actions')
                ->attributes(function ($row) {
                    return [
                        'class' => 'space-x-2',
                    ];
                })
                ->buttons([
                    LinkColumn::make('View') // make() has no effect in this case but needs to be set anyway
                    ->title(fn($row) => 'View')
                        ->location(fn($row) => '')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900',

                            ];
                        }),

                    LinkColumn::make('Edit') // make() has no effect in this case but needs to be set anyway
                    ->title(fn($row) => 'Edit')
                        ->location(fn($row) => '')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800',
                            ];
                        }),

                    LinkColumn::make('Delete') // make() has no effect in this case but needs to be set anyway
                    ->title(fn($row) => 'Delete')
                        ->location(fn($row) => '')
                        ->attributes(function ($row) {
                            return [
                                'class' => 'focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900',
                                'wire:click.prevent' => "delete($row->id)"
                            ];
                        }),
                ]),
        ];
    }

    public function delete($id)
    {
        $this->confirm('Please Confirm This Action',  [
            'showConfirmButton' => true,
            'confirmButtonText' => 'Delete',
            'onConfirmed' => "destroy",
            'data'=>['id'=>$id]
        ]);
    }

    public function destroy($data){
        Permission::query()->findOrFail($data["data"]["id"])->delete();
        $this->reset();
        $this->alert('success', 'Deleted Successfully',['timer'=>3000]);
    }

    public function refresh()
    {
        $this->reset();
    }

}
