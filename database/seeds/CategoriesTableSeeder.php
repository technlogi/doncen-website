<?php

use Illuminate\Database\Seeder;
use \App\Models\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();
        $categories = array(  0=>'Hospital',
                1=>'Food',
                2=>'Cloths & Accessory',
                3=>'Residence',
                4=>'Education',
                5=>'Litrature',
                6=>'Toys & Sports',
                7=>'FMCG',
                8=>'Agriculture',
                9=>'Service & Time',
                10=>'Tours & Traveling',
                11=>'Helpline Number',
                12=>'Beast(Include Animal & Birds)'
            );

        $svg = array(  0=>'Hospital.svg',
            1=>'Food.svg',
            2=>'ClothesAccessory.svg',
            3=>'Residence.svg',
            4=>'Education.svg',
            5=>'Literature.svg',
            6=>'ToysSports.svg',
            7=>'FMCG.svg',
            8=>'Agriculture.svg',
            9=>'ServicesTime.svg',
            10=>'ToursTraveling.svg',
            11=>'HelplineNumber.svg',
            12=>'Beast.svg'
        );

           for ($i=0; $i < 12 ; $i++) { 
            Category::create([
              'key' => generateKey(3),
              'name' => $categories[$i],
              'image' => $svg[$i],
              'title' =>  $categories[$i].'-title'
            ]);
           } 
    }
}
