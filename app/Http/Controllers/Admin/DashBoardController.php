<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use \App\Models\User;
class DashBoardController extends Controller
{
    public function dashboard()
    {
        $users[] = Auth::user();
        $users[] = Auth::guard()->user();
        $users[] = Auth::guard('admin')->user();

        //dd($users);

        $total_user = User::count();
        
        return view('admin.home',compact('total_user'));
    }
}
