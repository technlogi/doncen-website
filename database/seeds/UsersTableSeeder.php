<?php

use Illuminate\Database\Seeder;
use \App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::create([
            'name' => 'user',
            'key' => generateKey(9) ,
            'email' => 'user@gmail.com',
            'password' => bcrypt('123456'),
            'created_at' =>new \DateTime()	,
            'updated_at' => new \DateTime()	
        ]);
         
    }
}
