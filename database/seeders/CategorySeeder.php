<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Categories = [
            // Create Few Categories
            ['name' => 'Technology'],
            ['name' => 'Cloths'],
        ];
        foreach($Categories as $Category){
            Category::create($Category);
        }
    }
}
