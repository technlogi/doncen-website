<?php

 namespace App\Http\Services\Api;
 use \App\Models\User;
 use DB;
 class ApiServices
 {
    public function uploadDonationImage($profile,$id){
        if(!empty($profile)){
            $imageName = $id."-".date('ymdhis')."-".str_random(4).".".$profile->getClientOriginalExtension();
            $profile->move(base_path('images/uploads/donation_post/'), $imageName);
            DB::table('donation_images')->insert([
                'donation_post_id' => $id ,
                'key' => generateKey(12),
                'image' => $imageName,
                'status' =>1 ,
                'created_at'=> new \DateTime(),
                'updated_at'=> new \DateTime()
            ]);
        }
    }
 }