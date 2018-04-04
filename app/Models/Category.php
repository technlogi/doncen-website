<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function subcategories()
    {
        return $this->hasMany('\App\Models\Subcategory');
    }

    public function getImageAttribute($value)
    {
        if(!empty($value))
         return SVG_IMAGE($value);
        else
         return "";
    }
}
