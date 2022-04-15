<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Posts = [
            // Create Few Categories
            ['title' => 'Is mobil a need of era or time waste ?', 'slug' => 'Is-mobila-a-need-of-era-or-time-waste', 'description' => 'Technology Lorem ipsum init Technology Lorem ipsum init Technology Lorem ipsum init 
            Technology Lorem ipsum init Technology Lorem ipsum init Technology Lorem ipsum init Technology
             Lorem ipsum init Technology Lorem ipsum init Technology Lorem ipsum init Technology Lorem ipsum init 
             Technology Lorem ipsum init Technology Lorem ipsum init',
              'image' => '1646075937.jpg', 'user_id' => '1', 'category_id' => '1',],

              ['title' => 'How Computers make our life easier ?', 'slug' => 'How-Computers-make-our-life-easier', 'description' => 'Technology Lorem ipsum init Technology Lorem ipsum init Technology Lorem ipsum init 
              Technology Lorem ipsum init Technology Lorem ipsum init Technology Lorem ipsum init Technology
               Lorem ipsum init Technology Lorem ipsum init Technology Lorem ipsum init Technology Lorem ipsum init 
               Technology Lorem ipsum init Technology Lorem ipsum init',
                'image' => '1646112145.jpg', 'user_id' => '2', 'category_id' => '1',],

                ['title' => 'Traditional dresses in pakistan.', 'slug' => 'Traditional-dresses-in-pakistan', 'description' => 'Clothes Lorem ipsum init Clothes Lorem ipsum init Clothes Lorem ipsum init 
                Clothes Lorem ipsum init Clothes Lorem ipsum init Clothes Lorem ipsum init Clothes
                 Lorem ipsum init Clothes Lorem ipsum init Clothes Lorem ipsum init Clothes Lorem ipsum init 
                 Clothes Lorem ipsum init Clothes Lorem ipsum init',
                  'image' => '1646113816.jpg', 'user_id' => '1', 'category_id' => '2',],

                  ['title' => 'Office preferring dresses', 'slug' => 'Office-preferring-dresses', 'description' => 'Clothes Lorem ipsum init Clothes Lorem ipsum init Clothes Lorem ipsum init 
                  Clothes Lorem ipsum init Clothes Lorem ipsum init Clothes Lorem ipsum init Clothes
                   Lorem ipsum init Clothes Lorem ipsum init Clothes Lorem ipsum init Clothes Lorem ipsum init 
                   Clothes Lorem ipsum init Clothes Lorem ipsum init',
                    'image' => '1645093941.jpg', 'user_id' => '2', 'category_id' => '2',],
        ];
        foreach($Posts as $Post){
            Post::create($Post);
        }
    }
}
