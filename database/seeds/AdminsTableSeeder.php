<?php

use Illuminate\Database\Seeder;
use \App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::truncate();
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
            'created_at' => new \DateTime()	,
            'updated_at' =>  new \DateTime()	
        ]);
    }
}
