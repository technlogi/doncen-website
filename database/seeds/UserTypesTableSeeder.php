<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_types')->truncate();
        DB::table('user_types')->insert([
            [
                'key'=>generateKey(10),
                'name'=> 'Donor',
                'status'=>1 ,
                'created_at'=> new \DateTime(),
                'updated_at'=> new \DateTime(),
            ],
            [
                'key'=>generateKey(10),
                'name'=>'Helper of Donor',
                'status'=>1 ,
                'created_at'=> new \DateTime(),
                'updated_at'=> new \DateTime(),
            ],
            [
                'key'=>generateKey(10),
                'name'=>'Donee',
                'status'=>1 ,
                'created_at'=> new \DateTime(),
                'updated_at'=> new \DateTime(),
            ],
            [
                'key'=>generateKey(10),
                'name'=>'Helper of Donee',
                'status'=>1 ,
                'created_at'=> new \DateTime(),
                'updated_at'=> new \DateTime(),
            ]
        ]);
    }
}
