<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class DonationController extends Controller
{
    //view for donation to render first page
    public function donation()
    {
        $states =\App\Models\State::all(); 
        return view('admin.panel.donations.donation',compact('states'));
    }
    //get donations item by ajax
    public function donations(Request $request)
    {
        $donations = dataTable(
            ['id','title','created_at','description','status', 'key'],
            'donation_posts' ,
            'title',
            $request,
            $show= 'admin.donations.show', //route('posts.show',$category->id),
            $edit = '',                     // route('posts.edit',$category->id),
            $delete = 'admin.donations.delete',
            $status = 'admin.donations.status'
        );
        echo json_encode($donations);  
    }
    //change donation status
    public function donationStatus($key)
    {
        if(DB::table('donation_posts')->where('key',$key)->count() > 0){
            $donation = DB::table('donation_posts')->where('key',$key)->first();
            DB::table('donation_posts')->where('key',$key)->
                                        update([
                                        'status' => !$donation->status 
                                        ]);
            return redirect()->back()->with('success','Status change successfully.');    
        }else{
            return redirect()->back()->with('error',"Donation post doen't exists at all.");    
        }                        
    }
    //delete donatation from donation table
    public function donationDelete($key)
    {
        if(DB::table('donation_posts')->where('key',$key)->count() > 0){
            DB::table('donation_posts')->where('key',$key)->delete();
            return redirect()->back()->with('success','Post deleted successfully.');    
        }else{
            return redirect()->back()->with('error',"Something went worng//.");    
        }                        
    }
    //
    public function donationShow($key)
    {
        if(DB::table('donation_posts')->where('key',$key)->count() > 0){
            $donation = DB::table('donation_posts')->where('key',$key)->first();
            $user = DB::table('users')->where('id',$donation->user_id)->first();
            $user_name = empty($user) ? '' : $user->name; 
            $user_type = DB::table('user_types')->where('id',$donation->user_type_id)->first();
            $specification = \App\Models\Specification::where('id',$donation->specification_id)->first();
            $donation_types =  DB::table('donation_types')->where('id',$donation->donation_type_id)->first();
            return view('admin.panel.donations.show',compact('donation','user_name','specification','user_type'));    
        }else{
            return redirect()->back()->with('error',"Something went worng.");    
        }            
    }
}
