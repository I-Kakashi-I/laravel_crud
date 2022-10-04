<?php


namespace App\Traits;


use App\Models\Department;
use Illuminate\Database\Eloquent\Model;

trait FilterTrait
{

    public function getFilterFor($model, $label = "name"): array
    {
        $filterData = [];
        $model->each(function (Model $databaseModel) use (&$filterData, $label) {
            $filterData[$databaseModel->id] = $databaseModel[$label];
        });
        return $filterData;
    }

}
