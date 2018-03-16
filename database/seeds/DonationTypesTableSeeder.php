<?php

use Illuminate\Database\Seeder;

class DonationTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('donation_types')->truncate();
        DB::table('donation_types')->insert([
          [
            'key'=>generateKey(14),
            'name'=> 'Go & F2F',
            'status'=>1 ,
            'created_at'=> new \DateTime(),
            'updated_at'=> new \DateTime(),
          ],
          [
            'key'=>generateKey(14),
            'name'=> 'Call in & F2F',
            'status'=>1 ,
            'created_at'=> new \DateTime(),
            'updated_at'=> new \DateTime(),
          ],
          [
            'key'=>generateKey(14),
            'name'=> 'By Post',
            'status'=>1 ,
            'created_at'=> new \DateTime(),
            'updated_at'=> new \DateTime(),
          ],
          [
            'key'=>generateKey(14),
            'name'=> 'Any Other means',
            'status'=>1 ,
            'created_at'=> new \DateTime(),
            'updated_at'=> new \DateTime(),
          ]
        ]);
        
    }
}
