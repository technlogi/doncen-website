<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function donationCategory()
    {
        $categories = Category::all();
        return view('web.page.donation_category',compact('categories'));
    }

    public function categories()
    {
        return view('web.page.categories');
    }
}
