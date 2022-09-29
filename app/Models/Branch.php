<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address'
    ];

    public function Department(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne( Department::class);
    }
}
