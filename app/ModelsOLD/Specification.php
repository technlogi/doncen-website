<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    public function subcategory()
    {
        return $this->belongsTo('\App\Models\Subcategory');
    }
}
