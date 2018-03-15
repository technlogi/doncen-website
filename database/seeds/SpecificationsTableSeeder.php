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
                'type' => 'Blood',
            ],
            [   'key' => generateKey(6),
                'subcategory_id' => 1,
                'name' => 'B+',
                'type' => 'Blood',
            ],
            [   'key' => generateKey(6),
                'subcategory_id' => 1,
                'name' => 'AB',
                'type' => 'Blood',
            ],
            [   'key' => generateKey(6),
                'subcategory_id' => 1,
                'name' => 'O-',
                'type' => 'Blood',
            ]
        ]);
        DB::table('specifications')->insert([
            'key' => generateKey(6),
            'subcategory_id' => 2,
            'name' => 'after 4 Weeks',
            'type' => 'Platelets',
        ]);
      
        DB::table('specifications')->insert([
           [    'key' => generateKey(6),
                'subcategory_id' => 2,
                'name' => 'A Living or Died',
                'type' => 'Kidneys',
            ],
            [            'key' => generateKey(6),
                'subcategory_id' => 2,
                'name' => 'in 1 Hr.',
                'type' => 'Kidneys',
            ],
        ]);
        DB::table('specifications')->insert([
             [   'key' => generateKey(6),
                 'subcategory_id' => 4,
                 'name' => 'Part Living or Died',
                 'type' => 'Lungs',
             ],
             [   'key' => generateKey(6),
                'subcategory_id' => 4,
                'name' => 'in 1 Hr.',
                'type' => 'Lungs',
             ],
             [  'key' => generateKey(6),
                'subcategory_id' =>5,
                'name' => 'Part Living or Died',
                'type' => 'Liver',
            ],
            [    'key' => generateKey(6),
                'subcategory_id' =>5,
                'name' => 'in 1 Hr.',
                'type' => 'Liver',
            ],
            [    'key' => generateKey(6),
                'subcategory_id' => 6,
                'name' => 'Part Living or Died',
                'type' => 'Pancreas',
            ],
            [    'key' => generateKey(6),
            'subcategory_id' => 6,
            'name' => 'in 1 Hr.',
            'type' => 'Pancreas',
             ],
             [    'key' => generateKey(6),
             'subcategory_id' => 7,
             'name' => 'Part Living or Died',
             'type' => 'Intestine',
            ],
            [    'key' => generateKey(6),
            'subcategory_id' => 7,
            'name' => 'in 1 Hr.',
            'type' => 'Intestine',
            ]
         ]);
        DB::table('specifications')->insert([
            [
                'key' => generateKey(6),
                'subcategory_id' => 8,
                'name' => 'Tissues Preserve in Bank',
                'type' => 'eyes'
            ],[
                'key' => generateKey(6),
                'subcategory_id' => 9,
                'name' => 'Tissues Preserve in Bank',
                'type' => 'ear'
             ] ,[
                'key' => generateKey(6),
                'subcategory_id' => 10,
                'name' => 'Tissues Preserve in Bank',
                'type' => 'skin'
             ]  ,[
                'key' => generateKey(6),
                'subcategory_id' => 11,
                'name' => 'Tissues Preserve in Bank',
                'type' => 'Heart valves'
             ] ,[
                'key' => generateKey(6),
                'subcategory_id' => 12,
                'name' => 'Tissues Preserve in Bank',
                'type' => 'Bones'
             ] 
             ,[
                'key' => generateKey(6),
                'subcategory_id' => 13,
                'name' => 'Tissues Preserve in Bank',
                'type' => 'Veins'
             ] ,[
                'key' => generateKey(6),
                'subcategory_id' => 14,
                'name' => 'Tissues Preserve in Bank',
                'type' => ' Cartilage'
             ] 
             ,[
                'key' => generateKey(6),
                'subcategory_id' => 15,
                'name' => 'Tissues Preserve in Bank',
                'type' => '  Tendons'
             ],[
                'key' => generateKey(6),
                'subcategory_id' => 16,
                'name' => 'Tissues Preserve in Bank',
                'type' => 'Ligaments'
             ] ,[
                'key' => generateKey(6),
                'subcategory_id' => 17,
                'name' => 'After Brain Stem Death',
                'type' => 'Heart'
             ] ,[
                'key' => generateKey(6),
                'subcategory_id' => 17,
                'name' => 'Died',
                'type' => 'Body'
             ] 
        ]);

    }
}
