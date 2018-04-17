<?php

use Illuminate\Database\Seeder;
use \App\Models\Specification;
class SpecificationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Specification::truncate();
        //Hospital
        DB::table('specifications')->insert([
            [   'key' => generateKey(6),
                'subcategory_id' => 1,
                'name' => 'A+',
            ],
            [   'key' => generateKey(6),
                'subcategory_id' => 1,
                'name' => 'B+',
            ],
            [   'key' => generateKey(6),
                'subcategory_id' => 1,
                'name' => 'AB',
            ],
            [   'key' => generateKey(6),
                'subcategory_id' => 1,
                'name' => 'O-',
            ]
        ]);
        DB::table('specifications')->insert([
            'key' => generateKey(6),
            'subcategory_id' => 2,
            'name' => 'after 4 Weeks',
        ]);
      
        DB::table('specifications')->insert([
           [    'key' => generateKey(6),
                'subcategory_id' => 2,
                'name' => 'A Living or Died',
            ],
            [            'key' => generateKey(6),
                'subcategory_id' => 2,
                'name' => 'in 1 Hr.',
            ],
        ]);
        DB::table('specifications')->insert([
             [   'key' => generateKey(6),
                 'subcategory_id' => 4,
                 'name' => 'Part Living or Died',
             ],
             [   'key' => generateKey(6),
                'subcategory_id' => 4,
                'name' => 'in 1 Hr.',
             ],
             [  'key' => generateKey(6),
                'subcategory_id' =>5,
                'name' => 'Part Living or Died',
            ],
            [    'key' => generateKey(6),
                'subcategory_id' =>5,
                'name' => 'in 1 Hr.',
            ],
            [    'key' => generateKey(6),
                'subcategory_id' => 6,
                'name' => 'Part Living or Died',
            ],
            [    'key' => generateKey(6),
            'subcategory_id' => 6,
            'name' => 'in 1 Hr.',
             ],
             [    'key' => generateKey(6),
             'subcategory_id' => 7,
             'name' => 'Part Living or Died',
            ],
            [    'key' => generateKey(6),
            'subcategory_id' => 7,
            'name' => 'in 1 Hr.',
            ]
         ]);
        DB::table('specifications')->insert([
            [
                'key' => generateKey(6),
                'subcategory_id' => 8,
                'name' => 'Tissues Preserve in Bank',
            ],[
                'key' => generateKey(6),
                'subcategory_id' => 9,
                'name' => 'Tissues Preserve in Bank',
             ] ,[
                'key' => generateKey(6),
                'subcategory_id' => 10,
                'name' => 'Tissues Preserve in Bank',
             ]  ,[
                'key' => generateKey(6),
                'subcategory_id' => 11,
                'name' => 'Tissues Preserve in Bank',
             ] ,[
                'key' => generateKey(6),
                'subcategory_id' => 12,
                'name' => 'Tissues Preserve in Bank',
             ] 
             ,[
                'key' => generateKey(6),
                'subcategory_id' => 13,
                'name' => 'Tissues Preserve in Bank',
             ] ,[
                'key' => generateKey(6),
                'subcategory_id' => 14,
                'name' => 'Tissues Preserve in Bank',
             ] 
             ,[
                'key' => generateKey(6),
                'subcategory_id' => 15,
                'name' => 'Tissues Preserve in Bank',
             ],[
                'key' => generateKey(6),
                'subcategory_id' => 16,
                'name' => 'Tissues Preserve in Bank',
             ] ,[
                'key' => generateKey(6),
                'subcategory_id' => 17,
                'name' => 'After Brain Stem Death',
             ] ,[
                'key' => generateKey(6),
                'subcategory_id' => 17,
                'name' => 'Died',
             ] 
        ]);

    }
}
