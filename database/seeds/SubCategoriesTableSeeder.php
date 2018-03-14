<?php

use Illuminate\Database\Seeder;
use \App\Models\Subcategory;

class SubCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subcategory::truncate();
        $hospital = array(0=>'Blood',1=>'Platelets',2=>'Kidneys',3=>'Lungs',4=>'Liver',5=>'Pancreas',6=>'Intestines',7=>'Eye (Cornea)',8=>'Ear',9=>'Skin',10=>'Heart Valves',11=>'Bone',12=>'Veins',13=>'Cartilage',14=>'Tendons',15=>'Ligaments',16=>'Heart',17=>'Body');        for ($i=0; $i <= 17 ; $i++) { 
            Subcategory::create([
              'key' => generateKey(8),
              'category_id' => 1,
              'name' => $hospital[$i],
              'created_at' => new \DateTime()	,
              'updated_at' =>  new \DateTime()
            ]);
        }
        
        $food = array(0=>'Vegitable',1=>'Grain',2=>'Pulse',3=>'Fruit',4=>'Cooked Food',5=>'Drink',6=>'Spices',7=>'Sweet',8=>'Milk Products',9=>'Snack',10=>'Other');
        for ($i=0; $i <= 10 ; $i++) { 
            Subcategory::create([
              'key' => generateKey(8),
              'category_id' => 2,
              'name' => $food[$i],
              'created_at' => new \DateTime()	,
              'updated_at' =>  new \DateTime()
            ]);
        }
        $cloth = array(0=> 'Clothes',1=> 'Footwear',2=> 'Accessories',3=> 'Seasonal Clothing',4=> 'Other');
        for ($i=0; $i <= 4 ; $i++) { 
            Subcategory::create([
              'key' => generateKey(8),
              'category_id' => 3,
              'name' => $cloth[$i],
              'created_at' => new \DateTime()	,
              'updated_at' =>  new \DateTime()
            ]);
        }
        $residence =array( 0 =>'Lodgement',1=>'Orphanage',2=>'Hostel',3=>'Other');
        for ($i=0; $i <= 3 ; $i++) { 
            Subcategory::create([
              'key' => generateKey(8),
              'category_id' => 4,
              'name' => $residence[$i],
              'created_at' => new \DateTime()	,
              'updated_at' =>  new \DateTime()
            ]);
        }
        $education = array(0=>'Study',1=>'Uniform',2=>'Books',3=>'Stationary',4=>'Teaching',5=>'Other');
        for ($i=0; $i <= 5 ; $i++) { 
            Subcategory::create([
              'key' => generateKey(8),
              'category_id' => 5,
              'name' => $education[$i],
              'created_at' => new \DateTime()	,
              'updated_at' =>  new \DateTime()
            ]);
        }
        $litrature = array(0=>'General Knowledge',1=>'Novel',2=>'Poem',3=>'Drama',4=>'Short story',5=>'Novella',6=>'Myths',7=>'Play',8=>'Other');
        for ($i=0; $i <= 8 ; $i++) { 
            Subcategory::create([
              'key' => generateKey(8),
              'category_id' => 6,
              'name' => $litrature[$i],
              'created_at' => new \DateTime()	,
              'updated_at' =>  new \DateTime()
            ]);
        }
        $toy = array(0=>'Toys',1=>'Indoor',2=>'Outdoor',3=>'Other'      );
        for ($i=0; $i <= 3 ; $i++) { 
            Subcategory::create([
              'key' => generateKey(8),
              'category_id' => 7,
              'name' => $toy [$i],
              'created_at' => new \DateTime()	,
              'updated_at' =>  new \DateTime()
            ]);
        }
        $FMCG = array(0=>'Daily routine',1=>'Grocery',2=>'Other');
        for ($i=0; $i <= 2 ; $i++) { 
            Subcategory::create([
              'key' => generateKey(8),
              'category_id' => 8,
              'name' => $FMCG[$i],
              'created_at' => new \DateTime()	,
              'updated_at' =>  new \DateTime()
            ]);
        }
        $agirculture = array(0=>'Seeds',1=>'Manure',2=>'Agriculture Equipments',3=>'Counselling',4=>'Other');
        for ($i=0; $i <= 4 ; $i++) { 
            Subcategory::create([
              'key' => generateKey(8),
              'category_id' => 9,
              'name' => $agirculture[$i],
              'created_at' => new \DateTime()	,
              'updated_at' =>  new \DateTime()
            ]);
        }
        $service = array(0=>'Counselling',1=>'Social Work',2=>'welfare',3=>'Other');  
        for ($i=0; $i <= 3 ; $i++) { 
            Subcategory::create([
              'key' => generateKey(8),
              'category_id' => 10,
              'name' => $service[$i],
              'created_at' => new \DateTime()	,
              'updated_at' =>  new \DateTime()
            ]);
        }
        $tour = array(0=>'Teerth Yatra',1=>'Picnic', 2=>'Other');
        for ($i=0; $i <= 2 ; $i++) { 
            Subcategory::create([
              'key' => generateKey(8),
              'category_id' => 11,
              'name' => $tour[$i],
              'created_at' => new \DateTime()	,
              'updated_at' =>  new \DateTime()
            ]);
        }
        $help = array(0=>'Help line No');
            Subcategory::create([
              'key' => generateKey(8),
              'category_id' => 12,
              'name' => $help[0],
              'created_at' => new \DateTime()	,
              'updated_at' =>  new \DateTime()
            ]);
        $beast = array(0=> 'Beast Residece',1=>'Food',2=>'Health Care',3=>'Other');
        for ($i=0; $i <= 3 ; $i++) { 
            Subcategory::create([
            'key' => generateKey(8),
            'category_id' => 13,
            'name' => $beast[$i],
              'created_at' => new \DateTime()	,
              'updated_at' =>  new \DateTime()
            ]);
        }
    
    
    }
}
