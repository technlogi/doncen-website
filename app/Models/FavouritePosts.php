<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class FavouritePosts extends Model
{
	protected $table = 'favourite_posts';

    public function favouritePosts()
    {
        return $this->hasMany('\App\Models\DonationPosts');
    }

    // public function userFavouritePosts()
    // {
    //     return $this->hasMany('\App\Models\User');
    // }
}