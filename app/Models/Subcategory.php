<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    public function specifications()
    {
        return $this->hasMany('\App\Models\Specification');
    }

    public function category()
    {
        return $this->belongsTo('\App\Models\Category');
    }
}
