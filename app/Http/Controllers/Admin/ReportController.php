<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use URL;

class ReportController extends Controller
{
    public function report()
    {
        return view('admin.panel.report.report');
    }
    public function reports(Request $request)
    {
        $donations = dataTable(
            ['id','report_subject','report','status','created_at', 'key'],
            'donation_post_reports' ,
            'report',
            $request,
            $show= '', //route('posts.show',$category->id),
            $edit = '',                     // route('posts.edit',$category->id),
            $delete = 'admin.reprot.delete',
            $status = 'admin.reprot.status'
        );
        echo json_encode($donations);  
    }

    public function storeReport(Request $request)
    { 
        if (Auth::guard('user')->check()){
            $user = Auth::guard('user')->user()->id;
        }else{
            session()->flash('error', 'You must logged in before report against any post.');
           return redirect('/user/login');
        }
        $this->validate($request , [
            'report_subject' => 'required|min:5',
            'report' => 'required|min:10'
        ]);
        $id = DB::table('donation_posts')->where('key',$request->key)->select('key','id')->first();
        DB::table('donation_post_reports')->insert([
           'report' => $request->report,
           'key' => generateKey(17),
           'report_subject' => $request->report_subject,
           'user_id' => $user,
           'donation_post_id' => $id->id,
           'created_at' => new \DateTime(),
           'updated_at' => new \DateTime()
        ]);
        session()->flash('success', 'Repost against this post has been submitted.');
        return redirect(URL::previous());
    }




public function storereview(Request $request)
    { 
        
        if (Auth::guard('user')->check()){
            $user = Auth::guard('user')->user()->id;
        }else{
            session()->flash('error', 'You must logged in before report against any post.');
           return redirect('/user/login');
        }
        // $this->validate($request , [
        //     'rate_input' => 'required|min:5',
        //     'review_subject' => 'required|min:10'
        // ]);

        $id = DB::table('donation_posts')->where('key',$request->key)->select('key','id')->first();
        DB::table('donation_post_review')->insert([
            'rate_input'=>$request->rate,
           'key' => generateKey(17),
           'review_subject' => $request->review_subject,
           'user_id' => $user,
           'donation_post_id' => $id->id,
           'created_at' => new \DateTime(),
           'updated_at' => new \DateTime()
        ]);
        
        session()->flash('success', 'Your review on this post has been submitted.');
       return redirect(URL::previous());
    }





    public function reportForm($key)
    { 
        $user_identity = $key;
        return view('web.main.reportForm',compact('user_identity'));
    }

 public function reviewForm($key)
    { 
        $user_identity = $key;
        return view('web.main.review',compact('user_identity'));
    }
    //change city status
    public function reportStatus($key)
    {
        if(DB::table('donation_post_reports')->where('key',$key)->count() > 0){
            $city = DB::table('donation_post_reports')->where('key',$key)->first();
            DB::table('donation_post_reports')->where('key',$key)->
                                        update([
                                        'status' => !$city->status 
                                        ]);
            return redirect()->back()->with('success','Status change successfully.');    
        }else{
            return redirect()->back()->with('error',"Something is worng.");    
        }                        
    }
    //delete donatation from donation table
    public function reportDelete($key)
    {
        if(DB::table('donation_post_reports')->where('key',$key)->count() > 0){
            DB::table('donation_post_reports')->where('key',$key)->delete();
            return redirect()->back()->with('success','Report removed successfully.');    
        }else{
            return redirect()->back()->with('error',"Something went worng.");    
        }                        
    }
}
