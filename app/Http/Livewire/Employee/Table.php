<?php

namespace App\Http\Livewire\Employee;

use App\Models\Branch;
use App\Models\Department;
use App\Models\Employee;
use App\Traits\FilterTrait;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\MultiSelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\NumberFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class Table extends DataTableComponent
{
    use FilterTrait;

    protected $model = Employee::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
    }


    public function filters(): array
    {
        return [
            SelectFilter::make('Department')
                ->options(Department::query()->get()->keyBy('id')
                    ->map(fn($model) => $model->name)
                    ->toArray())
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('department_id', $value);
                }),
            SelectFilter::make('Branches')
                ->options(Branch::query()->get()->keyBy('id')
                    ->map(fn($model) => $model->name)
                    ->toArray())
                ->filter(function (Builder $builder, string $value) {
                    $builder->where('branch_id', $value);
                }),
            MultiSelectFilter::make('Gender')
                ->options(
                    [
                        'male'=>'Male',
                        'female'=>'Female',
//
                    ]
                )->filter(function (Builder $builder,  $value) {
                    $builder->whereIn('gender', $value);
                }),

            MultiSelectFilter::make('License')
                ->options(
                    [
                        '1' => 'Has License',
                        '0'=>'No License'
//
                    ]
                )->filter(function (Builder $builder,  $value) {
                    $builder->whereIn('has_license', $value);
                }),
        ];
    }

    public function builder(): Builder
    {
        return \App\Models\Employee::query()->with(['branch','department'])
            ->select(); // Select some things
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->sortable(),
            Column::make('Name','name')
                ->searchable()
                ->sortable(),
            Column::make('Department','department_id')->format(
                fn($value, $row, Column $column) => $row->department->name
            )->sortable(),

            Column::make('Branch','branch_id')->format(
                fn($value, $row, Column $column) => $row->branch->name
            )->sortable(),

//            Column::make('Branch', 'branch.name')->searchable(),
        ];
    }
}
