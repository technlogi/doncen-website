<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class ContactUsController extends Controller
{
    public function contactUs()
    {
        return view('admin.panel.contact.contact');
    }
    public function contacts(Request $request)
    {
        $donations = dataTable(
            ['id','name','email','subject','message','status','created_at', 'key'],
            'contact_us' ,
            'message',
            $request,
            $show= '', //route('posts.show',$category->id),
            $edit = '',                     // route('posts.edit',$category->id),
            $delete = 'admin.contact.delete',
            $status = 'admin.contact.status'
        );
        echo json_encode($donations);  
    }
    public function status_contact_us($key)
    {
        if(DB::table('contact_us')->where('key',$key)->count() > 0){
            $contactUs = DB::table('contact_us')->where('key',$key)->first();
            DB::table('contact_us')->where('key',$key)->
                                        update([
                                        'status' => !$contactUs->status 
                                        ]);
            return redirect()->back()->with('success','Status change successfully.');    
        }else{
            return redirect()->back()->with('error',"Something went Wrong.");    
        }                        
    }
     //delete data from contact table
     public function delete_contact_us($key)
     {
         if(DB::table('contact_us')->where('key',$key)->count() > 0){
             DB::table('contact_us')->where('key',$key)->delete();
             return redirect()->back()->with('success','Data removed successfully.');    
         }else{
             return redirect()->back()->with('error',"Something went worng.");    
         }                        
     }
 
}
